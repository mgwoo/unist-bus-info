<?php
require_once 'get_inf.php';

// header('Content-Type: application/json; charset=utf-8;Access-Control-Allow-Origin: *;Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS;Access-Control-Max-Age: 3600;Access-Control-Allow-Headers: Origin,Accept,X-Requested-With,Content-Type,Access-Control-Request-Method,Access-Control-Request-Headers,Authorization');
header('Content-Type: application/json; charset=utf-8;');

/*
if(!isset($_POST["mode"]) || !isset($_GET['way'])) {
	echo "Wrong ACCESS! \n";
	die;
}
 */

$debug = $_GET["debug"];
$noticeCont = array( 
    array("type" => 1,      "name" => "UNIST",                  "param" => ""),
    array("type" => 0,      "name" => "UNIST",                  "param" => "unist"),
    array("type" => 0,      "name" => "UNIST입구",              "param" => "unistEntrance"),
    array("type" => 0,      "name" => "UNIST산단캠",            "param" => "unistIndust"),
    array("type" => 1,      "name" => "언양",                   "param" => ""),
    array("type" => 0,      "name" => "언양터미널",             "param" => "ey_stat"),
    array("type" => 0,      "name" => "KTX울산역",              "param" => "ktx"),
    array("type" => 1,      "name" => "천상1교사거리",          "param" => ""),
    array("type" => 0,      "name" => "천상1교사거리/학교행",   "param" => "chunsang_ey"),
    array("type" => 0,      "name" => "천상1교사거리/울산행",   "param" => "chunsang_us"),
    array("type" => 1,      "name" => "구영리",                 "param" => ""),
    array("type" => 0,      "name" => "굿모닝힐",               "param" => "90ri_good"),
    array("type" => 0,      "name" => "우미린1차",              "param" => "90ri_umirin_01"),
    array("type" => 0,      "name" => "우미린2차",              "param" => "90ri_umirin_02"),
    array("type" => 0,      "name" => "대리마을",               "param" => "90ri_deri"),
    array("type" => 1,      "name" => "울산대",                 "param" => ""),
    array("type" => 0,      "name" => "신복로터리",             "param" => "sinbok"),
    array("type" => 0,      "name" => "울산대학교",             "param" => "ulde"),
    array("type" => 1,      "name" => "기타",                   "param" => ""),
    array("type" => 0,      "name" => "성남동",                 "param" => "sungnam"),
    array("type" => 0,      "name" => "공업탑로타리",           "param" => "ind_tow"),
    array("type" => 0,      "name" => "시외버스터미널",         "param" => "terminal")
);

echo urldecode(json_encode($noticeCont, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
?>
