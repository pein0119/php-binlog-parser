<?php

class Packet
{
    private $rawBinlogEvent;
    private $readByte = 0;
    private $timestamp;
    private $eventType;
    private $serverId;
    private $logPos;
    private $flags;
    private $event;
    

    private $eventMap = array(
        EventType::WRITE_ROWS_EVENT_V2  => 'WriteRowsEvent',
        EventType::UPDATE_ROWS_EVENT_V2 => 'UpdateRowsEvent',
        EventType::DELETE_ROWS_EVENT_V2 => 'DeleteRowsEvent',
    );
    
    public function __construct($data)
    {
        $this->rawBinlogEvent = $data;
        // read binlog event header
        // https://dev.mysql.com/doc/internals/en/binlog-event-header.html
        $eventHeader = unpack('cIcIIIH', $this->read(20));
        $this->timestamp = $eventHeader[1];
        $this->eventType = $eventHeader[2];
        $this->serverId = $eventHeader[3];
        $this->eventSize = $eventHeader[4];
        $this->logPos = $eventHeader[5];
        $this->flags = $eventHeader[6];

        $eventSizeWithoutHeader = $this->eventSize - 19;

        if (isset($this->eventMap[$this->eventType])) {
            $this->event = new $this->eventMap[$this->eventType](
                $this, $eventSizeWithoutHeader
            );
        } 
    }
    
    public function read($size)
    {
        $size = intval($size);
        if (strlen($this->rawBinlogEvent) <= $size) {
            $chunk = substr($this->rawBinlogEvent, 0, $size);
            $this->rawBinlogEvent = substr($this->rawBinlogEvent, $size);
            $this->readByte += $size;
        } else {
            $chunk = $this->rawBinlogEvent;
            $this->readByte = strlen($this->rawBinlogEvent);
        }

        return $chunk;
    }

    public function readUint8()
    {
        return unpack('C', $this->read(1));
    }

    public function readUint16()
    {
        
    }

    public function int2byte($i)
    {
        return pack('C', $i);
    }
}