<?php
ini_set('display_errors','Off');

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

if (isset($queries['ID'])) {
    echo("you searched for an ID!");
} else {
    echo("invalid query");
}