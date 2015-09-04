<?php

class EventType
{
    const UNKNOWN_EVENT            = 0x00;
    const START_EVENT_V3           = 0x01;
    const QUERY_EVENT              = 0x02;
    const STOP_EVENT               = 0x03;
    const ROTATE_EVENT             = 0x04;
    const INTVAR_EVENT             = 0x05;
    const LOAD_EVENT               = 0x06;
    const SLAVE_EVENT              = 0x07;
    const CREATE_FILE_EVENT        = 0x08;
    const APPEND_BLOCK_EVENT       = 0x09;
    const EXEC_LOAD_EVENT          = 0x0a;
    const DELETE_FILE_EVENT        = 0x0b;
    const NEW_LOAD_EVENT           = 0x0c;
    const RAND_EVENT               = 0x0d;
    const USER_VAR_EVENT           = 0x0e;
    const FORMAT_DESCRIPTION_EVENT = 0x0f;
    const XID_EVENT                = 0x10;
    const BEGIN_LOAD_QUERY_EVENT   = 0x11;
    const EXECUTE_LOAD_QUERY_EVENT = 0x12;
    const TABLE_MAP_EVENT          = 0x13;
    const PRE_GA_WRITE_ROWS_EVENT  = 0x14;
    const PRE_GA_UPDATE_ROWS_EVENT = 0x15;
    const PRE_GA_DELETE_ROWS_EVENT = 0x16;
    const WRITE_ROWS_EVENT_V1      = 0x17;
    const UPDATE_ROWS_EVENT_V1     = 0x18;
    const DELETE_ROWS_EVENT_V1     = 0x19;
    const INCIDENT_EVENT           = 0x1a;
    const HEARTBEAT_LOG_EVENT      = 0x1b;
    const IGNORABLE_LOG_EVENT      = 0x1c;
    const ROWS_QUERY_LOG_EVENT     = 0x1d;
    const WRITE_ROWS_EVENT_V2      = 0x1e;
    const UPDATE_ROWS_EVENT_V2     = 0x1f;
    const DELETE_ROWS_EVENT_V2     = 0x20;
    const GTID_LOG_EVENT           = 0x21;
    const ANONYMOUS_GTID_LOG_EVENT = 0x22;
    const PREVIOUS_GTIDS_LOG_EVENT = 0x23;
}