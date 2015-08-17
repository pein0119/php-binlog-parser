<?php

class BinlogParser
{
    public static function parse($rawBinlogEvent)
    {
        $eventType = $rawBinlogEvent->eventType;

        if (isset($allowedRowsEvents[$eventType])) {
            $event = new $allowedRowsEvents[$eventType];
        }
    }
}