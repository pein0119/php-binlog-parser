<?php

namespace \Parser\Event;

class RowsEvent extends BinlogEvent
{
    protected $tableId;
    protected $columns;
    protected $columnName;
    protected $tableMap;
    
    protected $allowedRowsEvents = array(
        EventType::WRITE_ROWS_EVENT_V2  => 'WriteRowsEvent',
        EventType::UPDATE_ROWS_EVENT_V2 => 'UpdateRowsEvent',
        EventType::DELETE_ROWS_EVENT_V2 => 'DeleteRowsEvent',
    );

    protected function readTableId()
    {
        $rawTableId = $this->packet->readSize(6);
        $rawTableId .= $this->packet->int2byte(0) . $this->packet->int2byte(0);

        $this->tableId = $this->packet->readUint64($rawTableId);
    }

    protected function readColumn()
    {
        
    }
}