<?php header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header("HTTP/1.1 200 OK");
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
        $json->data[0]->title = fread($putdata, 1024);
        $json = json_encode($json);
        $fp = fopen("./assets/json/1.json", "w");
        fwrite($fp, $json);
        fclose($fp);
        fclose($putdata);
        break;
    case 'REMOVE':
        $putdata = fopen("php://input", "r");
        $json = file_get_contents("./assets/json/1.json");
        $json = json_decode($json);
        unset($json->data[fread($putdata, 1024)]); //remove some data
        $json->data = array_values($json->data); //reindex data
        $json = json_encode($json);
        $fp = fopen("./assets/json/1.json", "w");
        fwrite($fp, $json);
        fclose($fp);
        fclose($putdata);
        break;
    case 'CREATE':
        $putdata = fread(fopen("php://input", "r"), 1024);
        if (empty($putdata))
            die();
        $json = file_get_contents("./assets/json/1.json");
        $json = json_decode($json, true);
        $data = array(
            'title' => $putdata,
            "description" => array(
                'line 1',
                'line 2',
                'line 3'
            ),
            'image' => "http://localhost:8000/assets/img/person-icon.png"
        );
        array_push($json['data'], $data);
        $json = json_encode($json);
        $fp = fopen("./assets/json/1.json", "w");
        fwrite($fp, $json);
        fclose($fp);
        print_r($json);
        fclose($putdata);
        break;
    default:
        echo ("Invalid ID");
        break;
}
