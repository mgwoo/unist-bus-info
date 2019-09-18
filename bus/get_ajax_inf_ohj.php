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
$way = 0;
$mode = $_GET["mode"];
$debug = $_GET["debug"];

//Notice
if($mode == "notice")
{
    $noticeCont = array( 
		array("date" => "19.9.18", "content" => "304 대곡 지원 폐지, 233의 우미린1차 경유 업데이트 및 유니스트 정류장의 일부 오류가 수정 되었습니다!")
        array("date" => "18.3.12", "content" => "433(삭제), 743 버스 정보가 업데이트되었습니다!"),
        array("date" => "17.10.1", "content" => "오현준(dhguswns23)님의 도움으로 nodeJS 기반 Front-end 개선을 완료하였습니다.\n사이트가 상당히 깔끔해졌어요!"),
        array("date" => "17.7.10", "content" => "노선이 순환으로 변경된 337 정보를 업데이트 하였습니다.\n공업탑과 삼산을 경유하는 357 정보도 함께 업데이트 하였습니다."),
        array("date" => "17.3.18", "content" => "침수로 인한 구점촌교 운행정보를 업데이트 하였습니다.\n신복로터리에서 304 버스 정보 추가하였습니다.\n빠른 피드백이 가능하도록 MailTo로 링크를 변경하였습니다\nUCSD 인턴 등으로 업데이트가 늦어진점 죄송합니다."),
        array("date" => "16.2.25", "content" => "대곡, 복합웰컴센터(작천정) 정보 업데이트 완료\n대곡행은 D, 작천정행은 J로 표기하였습니다."),
        array("date" => "16.2.7", "content" => "바야흐로 대 자취시대를 맞아\n구영리/굿모닝힐, 구영리/대리마을 추가하였습니다\n자취생들을 응원합니다!"),
        array("date" => "15.7.15", "content" => "카카오톡 공유 추가"),
        array("date" => "15.2.26", "content" => "성남동 정보 추가"),
        array("date" => "15.1.1", "content" => "304번 노선 정보 추가\n천상1교사거리 반대방향 정보추가(언양/울산)"),
        array("date" => "14.12.24", "content" => "새로고침 기능 추가\n건의사항 링크 수정(네이버 폼)"),
        array("date" => "14.10.21", "content" => "357번 노선, 여분 소스 수정\n신복로터리, 언양정류장, 울대 1127번 정보 추가"),
        array("date" => "14.6.27", "content" => "UI 개선 완료"),
        array("date" => "14.6.22", "content" => "범서삼거리 명칭 변경(->천상1교사거리)\n소스 변경으로 인한 속도 향상\n이전 정거장 정보 추가"),
        array("date" => "14.5.28", "content" => "공업탑 및 삼산(터미널) 추가"),
        array("date" => "14.5.26", "content" => "제작자가 드디어 <b>전역</b>했습니다.\nIOS 및 일부 Android에서 글씨크기 큰/작은현상 수정\n상위 로고 및 IOS WebApp Img 변경<s>칙칙해서</s>"),
        array("date" => "14.3.25", "content" => "UTF인코딩 뻗은거 다시 수정하고...\najax으로 다시 처음부터 다시만들었습니다<b>(ㅋㅋ 사지방에서 ㅡㅡ;)</b>\n<s>지랩에서 파일옮기고있는데.. 와 학교 정말 좋아졌네요</s>\n아이폰 웹어플 형태로 사파리 이동없이 사용할 수 있습니다."),
        array("date" => "13.11.2", "content" => "버스 강제종료 버그 모든 페이지 수정\nUNIF_index 페이지 장시간 로드 문제점 수정"),
        array("date" => "13.5.26", "content" => "버스(133,233) 강제종료 버그(-_-)수정"),
        array("date" => "13.4.20", "content" => "휴가나와서(-_-) 버스 정료시 나오는 오류 해결\n133,233도 서버에서 받아오는 방식으로 전환\n<s>index만 고쳤으니 ulde랑 ktx랑 90리는 다다님이 고쳐주세요</s>"),
        array("date" => "12.7.1", "content" => "12.4.23. linoegg님이 육군 전산병으로 입대\n12.5.21. LeMonTreE(=본인)이 공군 전산병으로 입대한 관계로\n문제가 생겨도 고칠 수 없는게 현실입니다. (현재 훈련소 마치고 첫 격려외박중..)\n이 점 양해 해주시면 감사하겠습니다.\n<s>(다다님 버스 운행종료때 오류 뜨는것좀 ^^)</s>"),
        array("date" => "12.5.9", "content" => "모든 file_get_contents() 오류를 제거하였습니다\n정보를 받아오는 사이트 구조가 바뀌어서\n4시간동안 처음부터 새로 짰습니다 ㅠㅠ\n다시는 이런일이 일어나지 않기를 바라며.."),
        array("date" => "12.5.8", "content" => "구영리, 범서삼거리 버스정보 추가했습니다.\n링크 양이 많아져서 모든 링크는 unit.wo.tc에 모아놨습니다.\n아이패드 로딩이미지 추가했습니다."),
        array("date" => "12.5.6", "content" => "총재클럽에 업로드 되었습니다.")); 
    echo urldecode(json_encode($noticeCont, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//UNIST
// http://apis.its.ulsan.kr:8088/Service4.svc/RouteArrivalInfo.xo?ctype=A&routeid=".$routeid."&stopid=".$stopid;

else if($mode == "unist")
{
    $us_337 = GetJsonBusData($way, '337','196103373', '40234');
    
    //print_r($us_337);

    // Due to strange ULSAN INFO!
    //$ey_337 = GetJsonBusData($way, '337','196103373', '40228');
    $ey_304 = GetJsonBusData($way, '304','196103042', '40234');
    
    $us_133 = GetJsonBusData($way, "133", "194101332", "40234");
    $us_233 = GetJsonBusData($way, "233", "196102332", "40234");
    $us_733 = GetJsonBusData($way, "733", "196107332", "40234");
    $us_743 = GetJsonBusData($way, "743", "193107432", "40234");

    $us_304 = GetJsonBusData($way, "304", "196103041", "40234");

    $saveData = array("mainTitle" => "UNIST",
                    "group"=> array(array("title" => "UNIST", 
                                "subTitle" => "태화강역 방향",
                                "buses" => array($us_133,$us_233,$us_337,$us_733)),
                              array("title" => "UNIST",
                                "subTitle" => "천상경유, 울산대 방향", 
                                "buses" => array($us_304, $us_743)),
                              array("title" => "UNIST",
                                "subTitle" => "KTX울산역, 언양정류장 방향\n(J:작천정, D:대곡)",
                                "buses" => array($ey_304))));
    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//UNIST Entrance
else if($mode == "unistEntrance")
{
    $ey_327 = GetJsonBusData($way, "327", "196103273", "40230");
    $ey_357 = GetJsonBusData($way, "357", "196103573", "40230");
    $ey_807 = GetJsonBusData($way, "807", "196108073", "40230");
	$ey_857 = GetJsonBusData($way, "857", "196108573", "40230");

    $uni_133 = GetJsonBusData($way, "133", "194101331", "40230");
    $uni_233 = GetJsonBusData($way, "233", "196102331", "40230");
    $uni_733 = GetJsonBusData($way, "733", "196107331", "40230");
    $uni_743 = GetJsonBusData($way, "743", "193107431", "40230");
    $uni_337U = GetJsonBusData($way, "337", "196103373", "40230");

    // Due to strange ULSAN INFO! (40230 -> 40228)
    $uni_337E = GetJsonBusData($way, "337", "196103373", "40203");

    $uni_304 = GetJsonBusData($way, "304", "196103041", "40230");

    $saveData = array("mainTitle" => "UNIST입구",
                    "group"=> array(array("title" => "UNIST입구", 
                                "subTitle" => "UNIST 방향",
                                "buses" => array($uni_133, $uni_233, $uni_733, $uni_743, $uni_337U, $uni_337E, $uni_304)),
                              array("title" => "UNIST 입구",
                                "subTitle" => "KTX울산역, 언양정류장 방향", 
                                "buses" => array($ey_327, $ey_357, $ey_807, $ey_857))));
    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//UNIST sandan 
else if($mode == "unistIndust")
{
    $uni_743 = GetJsonBusData($way, "743", "193107431", "22418");
    $us_743 = GetJsonBusData($way, "743", "193107432", "22417");

    $saveData = array("mainTitle" => "UNIST산단캠퍼스",
                    "group"=> array(array("title" => "UNIST산단캠퍼스", 
                                "subTitle" => "UNIST 방향",
                                "buses" => array($uni_743)),
                              array("title" => "UNIST산단캠퍼스",
                                "subTitle" => "태화강역 방향", 
                                "buses" => array($us_743))));
    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//ey_station
else if($mode == "ey_stat")
{
    // data URL from its.ulsan.kr
    $us_304_down = GetJsonBusData($way, "304", "196103041", "30348");
    $us_327 = GetJsonBusData($way, "327", "196103273", "30348");
    $us_337 = GetJsonBusData($way, "337", "196103373", "30348");
    $us_357 = GetJsonBusData($way, "357", "196103573", "30348");
    $us_807 = GetJsonBusData($way, "807", "196108073", "30348");

    $saveData = array("mainTitle" => "언양터미널",
                    "group"=> array(array("title" => "언양터미널",
                                "subTitle" => "UNIST 방향",
                                "buses" => array($us_304_down,$us_337)),
                              array("title" => "언양터미널",
                                "subTitle" => "UNIST 방향, UNIST 미경유\n천상1교사거리, 사연 환승", 
                                "buses" => array($us_327, $us_357, $us_807))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//ktx_ulsan_station
else if($mode == "ktx")
{
    // data URL from its.ulsan.kr
    $us_304_down = GetJsonBusData($way, "304", "196103041", "15414");
    $us_327 = GetJsonBusData($way, "327", "196103273", "15414");
    $us_337 = GetJsonBusData($way, "337", "196103373", "15414");
    $us_357 = GetJsonBusData($way, "357", "196103573", "15414");
    $us_807 = GetJsonBusData($way, "807", "196108073", "15414");

    $saveData = array("mainTitle" => "KTX울산역",
                    "group"=> array(array("title" => "KTX울산역",
                                "subTitle" => "UNIST 방향",
                                "buses" => array($us_304_down, $us_337)),
                              array("title" => "KTX울산역",
                                "subTitle" => "UNIST 방향, UNIST 미경유\n사연, 과기원입구 환승", 
                                "buses" => array($us_327, $us_357, $us_807))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
// chun-sang 1gyo-intersection. toward ey direction.
else if($mode == "chunsang_ey")
{
    // data URL from its.ulsan.kr
    $ey_133 = GetJsonBusData($way, "133", "194101331", "40213"); 
//    $ey_233 = GetJsonBusData($way, "233", "196102331", "40213");
    $ey_733 = GetJsonBusData($way, "733", "196107331", "40213");

//    $ey_337 = GetJsonBusData($way, "337", "196103373", "40213");
    $ey_304 = GetJsonBusData($way, "304", "196103042", "15514");

    $ey_327 = GetJsonBusData($way, "327", "196103273", "40213");
    $ey_807 = GetJsonBusData($way, "807", "196108073", "40213");

    $ey_5005 = GetJsonBusData($way, "5005", "196150052", "40213");

//    $ch_123 = GetJsonBusData($way, "123", "194101231", "20808");
//    $ch_307 = GetJsonBusData($way, "307", "196103072", "20808");
//    $ch_317 = GetJsonBusData($way, "317", "196103172", "20808");
//    $ch_433 = GetJsonBusData($way, "433", "196104332", "20808");

    $saveData = array("mainTitle" => "천상1교 사거리 - 학교행",
                    "group"=> array(array("title" => "천상1교 사거리",
                                "subTitle" => "UNIST 방향",
                                "buses" => array($ey_133, $ey_733, $ey_304)),
                              array("title" => "천상1교 사거리",
                                "subTitle" => "KTX울산역 방향, UNIST 미경유",
                                "buses" => array($ey_327, $ey_807))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
// chun-sang 1gyo-intersection. toward us direction.
else if($mode == "chunsang_us")
{
    // data URL from its.ulsan.kr
    $us_133 = GetJsonBusData($way, "133", "194101332", "40214");
//    $us_233 = GetJsonBusData($way, "233", "196102332", "40214");
    $us_733 = GetJsonBusData($way, "733", "196107332", "40214");
//    $us_337 = GetJsonBusData($way, "337", "196103373", "40214");
    $us_327 = GetJsonBusData($way, "327", "196103273", "40214");
    $us_807 = GetJsonBusData($way, "807", "196108073", "40214");
    $us_5005 = GetJsonBusData($way, "5005", "196150051", "40214");

//    $us_123 = GetJsonBusData($way, "123", "194101232", "40214");
//    $us_307 = GetJsonBusData($way, "307", "196103071", "40214");
    $us_317 = GetJsonBusData($way, "317", "196103171", "40214");
//    $us_433 = GetJsonBusData($way, "433", "196104332", "40214");
    
    $ch_304 = GetJsonBusData($way, "304", "196103041", "15513");
    $ch_357 = GetJsonBusData($way, "357", "196103573", "15513");
        
    $saveData = array("mainTitle" => "천상1교 사거리 - 울산행",
                    "group"=> array(array("title" => "천상1교 사거리",
                                "subTitle" => "태화강역 방향",
                                "buses" => array($us_133, $us_317,$us_327, $us_733, $us_807, $us_5005)),
                              array("title" => "천상1교 사거리",
                                "subTitle" => "천상 경유 태화강역 방향",
                                "buses" => array($ch_304, $ch_357))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//90ri_good. 
else if($mode == "90ri_good")
{
    // data URL from its.ulsan.kr
    $ey_133 = GetJsonBusData($way, "133", "194101331", "20424");
    $ey_233 = GetJsonBusData($way, "233", "196102331", "20424");
	$ey_733 = GetJsonBusData($way, "733", "196107331", "20424");

    $ey_327 = GetJsonBusData($way, "327", "196103273", "20424");
//    $ey_433 = GetJsonBusData($way, "433", "196104331", "20424");
    $ey_807 = GetJsonBusData($way, "807", "196108073", "20424");

    $saveData = array("mainTitle" => "구영리/굿모닝힐",
                    "group"=> array(array("title" => "구영리/굿모닝힐",
                                "subTitle" => "UNIST 방향",
                                "buses" => array($ey_133, $ey_233, $ey_733)),
                              array("title" => "구영리/굿모닝힐",
                                "subTitle" => "UNIST미경유, 천상1교사거리 환승",
                                "buses" => array($ey_327, $ey_807))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//90_Umirin 1. 
else if($mode == "90ri_umirin_01")
{
    // data URL from its.ulsan.kr
    $ey_133 = GetJsonBusData($way, "133", "194101331", "20422");
	$ey_233 = GetJsonBusData($way, "233", "196102331", "20422");
    $ey_733 = GetJsonBusData($way, "733", "196107331", "20422");

    $saveData = array("mainTitle" => "구영리/우미린1차",
                    "group"=> array(array("title" => "구영리/우미린1차",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_133, $ey_233, $ey_733))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//90_Umirin 2. 
else if($mode == "90ri_umirin_02")
{
    // data URL from its.ulsan.kr
    $ey_133 = GetJsonBusData($way, "133", "194101331", "20416");
	$ey_233 = GetJsonBusData($way, "233", "196102331", "20416");
    $ey_733 = GetJsonBusData($way, "733", "196107331", "20416");
    $ey_5002 = GetJsonBusData($way, "5002", "196150022", "20416");
    $ey_5005 = GetJsonBusData($way, "5005", "196150052", "20416");

    $saveData = array("mainTitle" => "구영리/우미린2차",
                    "group"=> array(array("title" => "구영리/우미린2차",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_133, $ey_233, $ey_733)),
                              array("title" => "구영리/우미린2차",
                                "subTitle" => "KTX울산역 방향, UNIST 미경유",
                                "buses" => array($ey_5002, $ey_5005))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//90ri_deri. 
else if($mode == "90ri_deri")
{
    // data URL from its.ulsan.kr
    $ey_133 = GetJsonBusData($way, "133", "194101331", "20414");
    $ey_733 = GetJsonBusData($way, "733", "196107331", "20414");

    $ey_327 = GetJsonBusData($way, "327", "196103273", "20414");
    $ey_807 = GetJsonBusData($way, "807", "196108073", "20414");

    $saveData = array("mainTitle" => "구영리/대리마을",
                    "group"=> array(array("title" => "구영리/대리마을",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_133, $ey_733)),
                              array("title" => "구영리/대리마을",
                                "subTitle" => "UNIST미경유, 천상1교사거리 환승",
                                "buses" => array($ey_327, $ey_807))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//sumgnam
else if($mode == "sungnam")
{
    $ey_233 = GetJsonBusData($way, "233", "196102331", "21606");
    $ey_123 = GetJsonBusData($way, "123", "194101231", "21606");

    $saveData = array("mainTitle" => "성남동",
                    "group"=> array(array("title" => "성남동",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_233)),
                              array("title" => "성남동",
                                "subTitle" => "UNIST방향, UNIST미경유\n천상1교사거리 환승",
                                "buses" => array($ey_123))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//sinbok
else if($mode == "sinbok")
{
    // data URL from its.ulsan.kr
    $ey_733 = GetJsonBusData($way, "733", "196107331", "30704");
    $ey_743 = GetJsonBusData($way, "743", "193107431", "30704");
    $ey_304 = GetJsonBusData($way, "304", "196103042", "30704");
    $ey_307 = GetJsonBusData($way, "307", "196103071", "30704");

    $saveData = array("mainTitle" => "신복로터리",
                    "group"=> array(array("title" => "신복로터리",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_304, $ey_733, $ey_743)),
                              array("title" => "신복로터리",
                                "subTitle" => "UNIST방향, UNIST미경유\n천상1교사거리 환승",
                                "buses" => array($ey_307))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));

}
//ulsan_university
else if($mode == "ulde")
{
    // data URL from its.ulsan.kr
    $ey_304 = GetJsonBusData($way, "304", "196103042", "30708");
    $ey_733 = GetJsonBusData($way, "733", "196107331", "30708");
    $ey_743 = GetJsonBusData($way, "743", "193107431", "30708");
    $ey_307 = GetJsonBusData($way, "307", "196103071", "30708");
    $bs_1127 = GetJsonBusData($way, "1127", "196111272", "30707");

    $saveData = array("mainTitle" => "울산대학교",
                    "group"=> array(array("title" => "울산대학교",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_304, $ey_733, $ey_743)),
                              array("title" => "울산대학교",
                                "subTitle" => "UNIST방향, UNIST미경유\n천상1교사거리 환승",
                                "buses" => array($ey_307)),
                              array("title" => "울산대학교",
                                "subTitle" => "부산 노포동 방향",
                                "buses" => array($bs_1127))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//tower of industry
else if($mode == "ind_tow")
{
    // data URL from its.ulsan.kr
    $ey_733 = GetJsonBusData($way, "733", "196107331", "40404");
    $ey_307 = GetJsonBusData($way, "307", "196103071", "40404");
    $ey_1703 = GetJsonBusData($way, "1703", "193117031", "40404");
    $ey_1713 = GetJsonBusData($way, "1713", "193117131", "40404");
    
    $ey_743 = GetJsonBusData($way, "743", "193107431", "40402");

    $ey_317 = GetJsonBusData($way, "317", "196103172", "40402");
    $ey_327 = GetJsonBusData($way, "327", "196103273", "40402");
    $ey_357 = GetJsonBusData($way, "357", "196103573", "40402");
    
    $saveData = array("mainTitle" => "공업탑",
                    "group"=> array(array("title" => "공업탑",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_733, $ey_743)),
                              array("title" => "공업탑",
                                "subTitle" => "UNIST방향, UNIST미경유\n사연, 과기원 입구 환승",
                                "buses" => array($ey_307, $ey_317, $ey_327, $ey_357)),
                              array("title" => "공업탑",
                                "subTitle" => "UNIST방향, UNIST미경유\n천상 하차 입압 환승 고속버스",
                                "buses" => array($ey_1703, $ey_1713))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
//Bus_Terminal
else if($mode == "terminal")
{
    // data URL from its.ulsan.kr
    $ey_133 = GetJsonBusData($way, "133", "194101331", "40420");
    $ey_337 = GetJsonBusData($way, "337", "196103373", "40420");
    $ey_733 = GetJsonBusData($way, "733", "196107331", "40420");
    $ey_743 = GetJsonBusData($way, "743", "193107431", "40420");

    $ey_307 = GetJsonBusData($way, "307", "196103071", "40420");
    $ey_317 = GetJsonBusData($way, "317", "196103172", "40420");
    $ey_327 = GetJsonBusData($way, "327", "196103273", "40420");
    $ey_357 = GetJsonBusData($way, "357", "196103573", "40420");

    $ey_807 = GetJsonBusData($way, "807", "196108073", "40420");

    $saveData = array("mainTitle" => "시외고속버스터미널",
                    "group"=> array(array("title" => "시외고속버스터미널",
                                "subTitle" => "UNIST방향",
                                "buses" => array($ey_133, $ey_337, $ey_733, $ey_743)),
                              array("title" => "시외고속버스터미널",
                                "subTitle" => "UNIST방향, UNIST미경유\n사연, 과기원 입구 환승",
                                "buses" => array($ey_307, $ey_317, $ey_327, $ey_357, $ey_807))));

    echo urldecode(json_encode($saveData, ($debug == 1)? JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE));
}
else
{
    echo "Wrong Access!!".endl($way)."잘못된 접근입니다.";
}
?>
