<?php

class RowsEvent extends BinlogEvent
{
    private $allowedRowsEvents = array(
        EventType::WRITE_ROWS_EVENT_V2  => 'WriteRowsEvent',
        EventType::UPDATE_ROWS_EVENT_V2 => 'UpdateRowsEvent',
        EventType::DELETE_ROWS_EVENT_V2 => 'DeleteRowsEvent',
    );

    public function __construct()
    {
        
    }
}