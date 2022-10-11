<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
ini_set('display_errors', 'Off');

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);


switch ($queries['ID']) {
    case 'JSON':
        $array = array();
        // $array = array("title" => "Temp Title", "description" => "This is a description this is another line", "test3" => 2, "test4" => 2, "test5" => 2, "test6" => 2, "test7" => 2, "test8" => 2);
        $array['title'] = "Temp Title";
        $array['description'] = array();
        $descriptionLines = array("line1", "line2", "line3");
        foreach ($descriptionLines as $descriptionLine) {
            array_push($array['description'], $descriptionLine);
        }
        $json = json_encode($array);
        echo ($json);
        break;
    default:
        echo ("Invalid ID");
        break;
}
