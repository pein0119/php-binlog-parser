<?php

class RowsEvent extends BinlogEvent
{
    protected $tableId;
    
    protected $allowedRowsEvents = array(
        EventType::WRITE_ROWS_EVENT_V2  => 'WriteRowsEvent',
        EventType::UPDATE_ROWS_EVENT_V2 => 'UpdateRowsEvent',
        EventType::DELETE_ROWS_EVENT_V2 => 'DeleteRowsEvent',
    );

    public function __construct($packet)
    {
        parent::__construct($packet);
    }

    protected function readTableId()
    {
        $rawTableId = $this->packet->readSize(6);
        $rawTableId .= $this->packet->int2byte(0) . $this->packet->int2byte();
    }
}