<?php
/*
 *  Author  : Charles Davis
 *  Date    : 3/10/2020
 *  File    : testing.php
 *  
 *  Description:
 *  This file is to test functions before 
 *  they are added to the main area
 *
 */

function html_table($data = array())
{
    $rows = array();
    foreach ($data as $row) 
    {
        $cells = array();
        foreach ($row as $cell) 
        {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    return "<table class='hci-table'>" . implode('', $rows) . "</table>";
}

$data = array(
    array('1' => 'hello', '4' => 'name'),
    array('2' => 'world!', '5' => 'is'),
    array('3' => 'my', '6' => 'Bob'),
);

echo html_table($data); 
