<?php

namespace \Parser\Event;

class TableMapEvent extends BinlogEvent
{
    private $columnMetaLen = array(
        FieldType::STRING     => 2,
        FieldType::VAR_STRING => 2,
        FieldType::VARCHAR    => 2,
        FieldType::BLOB       => 1,
        FieldType::DECIMAL    => 2,
        FieldType::NEWDECIMAL => 2,
        FieldType::DOUBLE     => 1,
        FieldType::FLOAT      => 1,
        FieldType::ENUM       => 2,
        FieldType::SET        => 2,
        FieldType::BIT        => 0,
        FieldType::DATE       => 0,
        FieldType::DATETIME   => 0,
        FieldType::TIMESTAMP  => 0,
        FieldType::TIME       => 0,
        FieldType::TINY       => 0,
        FieldType::SHORT      => 0,
        FieldType::INT24      => 0,
        FieldType::LONG       => 0,
        FieldType::LONGLONG   => 0,
    );

    public function __construct($packet)
    {
        
    }
    
    private function parseEventBody()
    {
        
    }
}