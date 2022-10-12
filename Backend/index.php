<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Methods: POST, PUT, GET, OPTIONS');
ini_set('display_errors', 'Off');

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);


switch ($queries['ID']) {
    case 'JSON':
        foreach (scandir("./assets/json") as $jsonFile) {
            if (strpos($jsonFile, ".json") !== false) {
                $json = file_get_contents("./assets/json/" . $jsonFile);
                $json = json_decode($json);
                $json = json_encode($json);
                print_r($json);
            }
        }
        break;
    case 'PUT':
        /* PUT data comes in on the stdin stream */
        $putdata = fopen("php://input", "r");

        /* Open a file for writing */
        $fp = fopen("myputfile.ext", "w");

        /* Read the data 1 KB at a time
        and write to the file */
        while ($data = fread($putdata, 1024))
            fwrite($fp, $data);

        /* Close the streams */
        fclose($fp);
        fclose($putdata);
        break;
    default:
        echo ("Invalid ID");
        break;
}
