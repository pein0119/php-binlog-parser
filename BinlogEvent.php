<?php

class BinlogEvent
{
    private $packet;
    private $eventSize;
    private $tableMap;
    
    public function __construct($packet, $eventSize, $tableMap)
    {
        $this->packet = $packet;
        $this->eventSize = $eventSize;
        $this->tableMap = $tableMap;
    }

    protected function readTableId()
    {
        $tableId 
    }
}