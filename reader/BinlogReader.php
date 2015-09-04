<?php

class BinlogReader
{
    private $fetcher;
    
    public function __construct($fetcher)
    {
        $this->fetcher = $fetcher;
    }

    public function fetchOneBinlogEvent()
    {
        $rawBinlogEvent = $this->fetcher->fetch();

        return $rawBinlogEvent;
    }
}