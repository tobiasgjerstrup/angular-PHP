<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
ini_set('display_errors', 'Off');

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);


switch ($queries['ID']) {
    case 'JSON':
        $array = array("test" => 1, "test2" => 2, "test3" => 2, "test4" => 2, "test5" => 2, "test6" => 2, "test7" => 2, "test8" => 2);
        $json = json_encode($array);
        echo($json);
        break;
    default:
        echo ("Invalid ID");
        break;
}
