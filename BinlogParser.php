<?php

namespace \Parser;

class BinlogParser
{
    public static function parse($message)
    {
        $packet = new Packet($message);
        $binlogEvent = new $allowedRowsEvents[$packet];
        $event = $binlogEvent->getEvent();

        return $event;
    }
}