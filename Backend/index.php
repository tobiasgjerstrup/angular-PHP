<?php header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Methods: POST, PUT, GET, OPTIONS');
ini_set('display_errors', 'Off');
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
switch ($queries['ID']) {
    case 'JSON':
        $json = file_get_contents("./assets/json/1.json");
        $json = json_decode($json);
        $json = json_encode($json);
        print_r($json);
        break;
    case 'PUT':
        $putdata = fopen("php://input", "r");
        $json = file_get_contents("./assets/json/1.json");
        $json = json_decode($json);
        foreach($json->data as $test){
            $test = fread($putdata, 1024);
        }
        print_r($json);
        $json->data->{'0'}->title = "test";
        $json = json_encode($json);
        $fp = fopen("myputfile.ext", "w");
        fwrite($fp, $json);
        fclose($fp);
        fclose($putdata);
        break;
    default:
        echo ("Invalid ID");
        break;
}