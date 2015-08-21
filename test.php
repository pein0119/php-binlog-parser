<?php

$binlog = file_get_contents('mysql-bin.000008');

$tableMapEvent = substr($binlog, 200, 309-200);

$tableMapBody = substr($tableMapEvent, 19);

var_dump(bin2hex($tableMapBody));

$tableId = substr($tableMapBody, 0, 6);

function int2byte($data)
{
    return pack('C', $data);
}

$tableId .= int2byte(0) . int2byte(0);

$unpackArr = unpack('I2', $tableId);

$tableId = $unpackArr[1] + ($unpackArr[2] << 32);

$flags = substr($tableMapBody, 6, 2);

var_dump(unpack('S', $flags));

$nameLength = substr($tableMapBody, 8, 1);

var_dump(unpack('C', $nameLength));

$name = substr($tableMapBody, 9, 12);

var_dump($name);

$tableNameLength = substr($tableMapBody, 22, 1);

var_dump(unpack('C', $tableNameLength));

$tableName = substr($tableMapBody, 23, 12);

var_dump($tableName);

$columnCount = substr($tableMapBody, 36, 1);

var_dump(unpack('C', $columnCount));

$columns = substr($tableMapBody, 37, 29);

var_dump(bin2hex($columns), unpack('C*', $columns));