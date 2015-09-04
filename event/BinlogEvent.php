<?php

namespace \Parser\Event;

class BinlogEvent
{
    // binlog event header definition
    // ref: https://dev.mysql.com/doc/internals/en/binlog-event-header.html
    protected $eventHeaderLength = 19;
    protected $eventHeaderFormat = array(
        'timestamp'  => array(
            'len'    => 4,
            'type'   => 'uint32'
        ),
        'event_type' => array(
            'len'    => 1,
            'type'   => 'uint8',
        ),
        'server_id'  => array(
            'len'    => 1,
            'type'   => 'uint32',
        ),
        'event_size' => array(
            'len'    => 4,
            'type'   => 'uint32',
        ),
        'log_pos'    => array(
            'len'    => 4,
            'type'   => 'uint32',
        ),
        'flags'      => array(
            'len'    => 2,
            'type'   => 'uint16',
        ),
    );

    // post_header + payload
    protected  $eventBodyFormat;
    
    public function __construct($packet)
    {
        $this->packet = $packet;
    }

    protected function parseEventHeader()
    {
        foreach ($this->eventHeaderFormat as $k => $v) {
            $rawField = $this->packet->readSize($v['len']);
            $func = 'read' . $v['type'];
            $field = $this->packet->$func($rawField);
            $this->eventHeader[$k] = $field;
        }
    }

    protected function parseEventBody()
    {
        
    }
    
    public function getEvent()
    {
        $header = $this->parseEventHeader();
        $body = $this->parseEventBody();
        
        $event = array(
            'header' => $header,
            'body' => body,
        );

        return $event;
    }

    
    protected function readTableId()
    {
        $tableId = $this->packet->read(6) .  $this->packet->int2byte(0) . $this->packet->int2byte(0);

        return unpack('J', $tableId)[0];
    }

}