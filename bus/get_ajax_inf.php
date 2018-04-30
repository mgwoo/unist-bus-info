<?php
require_once 'get_inf.php';

/*
if(!isset($_POST["mode"]) || !isset($_GET['way'])) {
	echo "Wrong ACCESS! \n";
	die;
}
*/
$way = $_GET["way"];
$mode = $_POST["mode"];

//Notice
if($mode == "notice")
{
?>
<table class='title' id='title'><tr><td>UNIF Notice</tr></td></table>
<table class='title'><tr><td>
17.7.10<br />
노선이 순환으로 변경된 337 정보를 업데이트 하였습니다.<br />
공업탑과 삼산을 경유하는 357 정보도 함께 업데이트 하였습니다.<br />
</tr></td></table>
<table class='title'><tr><td>
17.3.18<br />
침수로 인한 구점촌교 운행정보를 업데이트 하였습니다.<br />
신복로터리에서 304 버스 정보 추가하였습니다.<br />
빠른 피드백이 가능하도록 MailTo로 링크를 변경하였습니다<br />
UCSD 인턴 등으로 업데이트가 늦어진점 죄송합니다.<br />
</tr></td></table>
<table class='title'><tr><td>
16.2.25<br />
대곡, 복합웰컴센터(작천정) 정보 업데이트 완료<br />
대곡행은 D, 작천정행은 J로 표기하였습니다.<br />
</tr></td></table>
<table class='title'><tr><td>
16.2.7<br />
<s>바야흐로 대 자취시대를 맞아</s><br />
구영리/굿모닝힐, 구영리/대리마을 추가하였습니다<br />
<s>자취생들을 응원합니다!</s><br />
</tr></td></table>
<table class='title'><tr><td>
15.7.15<br />
카카오톡 공유 추가<br /></tr></td></table>
<table class='title'><tr><td>
15.2.26<br />
성남동 정보 추가<br />
<s>133은 넣기 되게 애매하게 돌아가는거 아시죠?</s><br /></tr></td></table>
<table class='title'><tr><td>
15.1.1<br />
304번 노선 정보 추가<br />
천상1교사거리 반대방향 정보추가(언양/울산)<br /></tr></td></table>
<table class='title'><tr><td>
14.12.24<br />
새로고침 기능 추가!<br />
건의사항 링크 수정! <s>네이버 폼은 사회악입니다</s></tr></td></table>
<table class='title'><tr><td>
14.10.21<br />
357번 노선, 여분 소스 수정<br />
신복로터리, 언양정류장, 울대 1127번 정보 추가.<br /></tr></td></table>
<table class='title'><tr><td>
14.06.27<br />
UI 개선 완료<br /></tr></td></table>
<table class='title'><tr><td>
14.06.22.<br />
범서삼거리 명칭 변경(->천상1교사거리)<br />
소스 변경으로 인한 속도 향상<br />
이전 정거장 정보 추가<br /></tr></td></table>
<table class='title'><tr><td>
14.05.28.<br />
공업탑 및 삼산(터미널) 추가<br /></tr></td></table>
<table class='title'><tr><td>
14.05.26.<br />
제작자가 드디어 <b>전역</b>했습니다.<br />
IOS 및 일부 Android에서 글씨크기 큰/작은현상 수정<br />
상위 로고 및 IOS WebApp Img 변경<s>(칙칙해서)</s><br /></tr></td></table>
<table class='title'><tr><td>
14.03.25.<br />
UTF인코딩 뻗은거 다시 수정하고...<br />
ajax으로 다시 처음부터 다시만들었습니다<b>(ㅋㅋ 사지방에서ㅡㅡ;)</b><br />
<s>지랩에서 파일옮기고있는데..와 학교 정말 좋아졌네요</s><br />
아이폰 웹어플 형태로 사파리 이동없이 사용할수 있습니다.</tr></td></table>
<table class='title'><tr><td>
13.11.02.<br />
버스 강제종료 버그 모든 페이지 수정;<br />
UNIF_index페이지 장시간 로드 문제점 수정.<br /></tr></td></table>
<table class='title'><tr><td>
13.05.26.<br />
버스(133,233) 강제종료 버그(-_-)수정;<br /></tr></td></table>
<table class='title'><tr><td>
13.04.20.<br />
휴가나와서(-__-) 버스종료시 나오는 오류 해결<br />
133, 233도 서버에서 받아오는 방식으로 전환<br />
<s>index만 고쳤으니 ulde랑 ktx랑 90리는 다다님이 고쳐주세요<br/></s></tr></td></table>
<table class='title'><tr><td>
12.07.01.<br />
2012.04.23. linoegg 님이 육군 전산병으로 입대.<br />
2012.05.21. LeMonTreE (=본인)이 공군 전산병으로 입대한 관계로<br />
문제가 생겨도 고칠 수 없는게 현실입니다. (현재 훈련소 마치고 첫 격려외박중..)<br />
이점 양해 해주시면 감사하겠습니다..<br />
<s>(다다님 버스 운행종료때 오류 뜨는것좀 ^^)</s><br /></tr></td></table>
<table class='title'><tr><td>
12.05.09.<br />
모든 file_get_contents() 오류를 제거하였습니다.<br/>
정보를 받아오는 사이트구조가 바뀌어서<br/>
4시간동안 처음부터 새로 짰습니다 ㅠㅠ<br/>
다시는 이런일이 일어나지 않기를 바라며..<br/></tr></td></table>
<table class='title'><tr><td>
12.05.08. <br />
구영리, 범서삼거리 버스정보 추가했습니다.<br/>
링크 양이 많아져서 모든 링크는 unif.wo.tc에 모아놨습니다;<br/>
아이패드 로딩이미지 추가했습니다. <br/></tr></td></table>
<table class='title'><tr><td>
12.05.06 <br />
총재클럽에 업로드 되었습니다.<br/></tr></td></table>
<?php
}
//UNIST
// http://apis.its.ulsan.kr:8088/Service4.svc/RouteArrivalInfo.xo?ctype=A&routeid=".$routeid."&stopid=".$stopid;

else if($mode == "unist")
{
	$us_337 = get_busdata($way, '337','196103373', '40234');

	// Due to strange ULSAN INFO!
	$ey_337 = get_busdata($way, '337','196103374', '40228');
	$ey_304J = get_busdata($way, '304J','196103042', '40234');
	$ey_304D = get_busdata($way, '304D','196103044', '40234');
	
	$us_133 = get_busdata($way, "133", "194101332", "40234");
	$us_233 = get_busdata($way, "233", "196102332", "40234");
	$us_733 = get_busdata($way, "733", "196107332", "40234");

	$us_304_down = get_busdata($way, "304J", "196103041", "40234");
	$us_304_up = get_busdata($way, "304D", "196103043", "40234");

	$saveData = get_time($way, "UNIST").
		get_title($way, "UNIST", "태화강역 방향").$us_133.$us_233.$us_733.$us_337.endl($way).
		get_title($way, "UNIST", "천상경유, 울산대 방향").$us_304_down.$us_304_up.endl($way).
		get_title($way, "UNIST", "KTX울산역, 언양정류장 방향".endl($way)."(J:작천정, D:대곡)").$ey_337.$ey_304J.$ey_304D;

	echo $saveData;
	echo footer($way);
}
//UNIST Entrance
else if($mode == "unistEntrance")
{
	$ey_327 = get_busdata($way, "327", "196103273", "40229");
	$ey_357 = get_busdata($way, "327", "196103573", "40229");
	$ey_807 = get_busdata($way, "807", "196108073", "40229");
	$ey_304D = get_busdata($way, "304D", "196103044", "40229");

	$uni_133 = get_busdata($way, "133", "194101331", "40230");
	$uni_233 = get_busdata($way, "233", "196102331", "40230");
	$uni_733 = get_busdata($way, "733", "196107331", "40230");
	$uni_337U = get_busdata($way, "337", "196103373", "40230");
	$uni_304DU;
	$uni_304DE;
	$uni_304JU;
	$uni_304JE;

	// Due to strange ULSAN INFO! (40230 -> 40228)
	$uni_337E = get_busdata($way, "337", "196103373", "40228");

	$uni_304J = get_busdata($way, "304J", "196103041", "40230");
	$uni_304D = get_busdata($way, "304D", "196103043", "40230");

	$saveData = get_time($way, "UNIST입구").
		get_title($way, "UNIST입구", "UNIST 방향").$uni_133.$uni_233.$uni_733.$uni_337U.$uni_337E.$uni_304J.$uni_304D.endl($way).
		get_title($way, "UNIST입구", "KTX울산역, 언양정류장 방향").$ey_327.$ey_357.$ey_807.endl($way);

	echo $saveData;
	echo footer($way);
}
//ey_station
else if($mode == "ey_stat")
{
	// data URL from its.ulsan.kr
	$us_304_down = get_busdata($way, "304J", "196103041", "30348");
	$us_327 = get_busdata($way, "327", "196103273", "30348");
	$us_337 = get_busdata($way, "337", "196103373", "30348");
	$us_357 = get_busdata($way, "357", "196103573", "30348");
	$us_807 = get_busdata($way, "807", "196108073", "30348");

	$saveData = get_time($way, "언양터미널").
		get_title($way, "언양터미널", "UNIST 방향").$us_304_down.$us_337.endl($way).
		get_title($way, "언양터미널", "UNIST 방향, UNIST 미경유.".endl($way)."천상1교사거리, 사연 환승").$us_327.$us_357.$us_807;

	echo $saveData;
}
//ktx_ulsan_station
else if($mode == "ktx")
{
	// data URL from its.ulsan.kr
	$us_304_down = get_busdata($way, "304J", "196103041", "15414");
	$us_304_up = get_busdata($way, "304D", "196103043", "15414");
	$us_327 = get_busdata($way, "327", "196103273", "15414");
	$us_337 = get_busdata($way, "337", "196103373", "15414");
	$us_357 = get_busdata($way, "357", "196103573", "15414");
	$us_807 = get_busdata($way, "807", "196108073", "15414");

	$saveData = get_time($way, "KTX울산역").
		get_title($way, "KTX울산역", "UNIST 방향").$us_304_down.$us_304_up.$us_337.endl($way).
		get_title($way, "KTX울산역", "UNIST 방향, UNIST 미경유.".endl($way)."사연, 과기원입구 환승").$us_327.$us_357.$us_807;

	echo $saveData;
	echo footer($way);
}
// chun-sang 1gyo-intersection. toward ey direction.
else if($mode == "chunsang_ey")
{
	// data URL from its.ulsan.kr
	$ey_133 = get_busdata($way, "133", "194101331", "40213"); 
//	$ey_233 = get_busdata($way, "233", "196102331", "40213");
	$ey_733 = get_busdata($way, "733", "196107331", "40213");

//	$ey_337 = get_busdata($way, "337", "196103373", "40213");
	$ey_304J = get_busdata($way, "304J", "196103042", "15514");
	$ey_304D = get_busdata($way, "304D", "196103044", "15514");

	$ey_327 = get_busdata($way, "327", "196103273", "40213");
	$ey_807 = get_busdata($way, "807", "196108073", "40213");

	$ey_5005 = get_busdata($way, "5005", "196150052", "40213");

//	$ch_123 = get_busdata($way, "123", "194101231", "20808");
//	$ch_307 = get_busdata($way, "307", "196103072", "20808");
//	$ch_317 = get_busdata($way, "317", "196103172", "20808");
//	$ch_433 = get_busdata($way, "433", "196104332", "20808");

	$saveData = get_time($way, "천상1교 사거리 - 학교행").
		get_title($way, "천상1교 사거리(40213)", "UNIST 방향").$ey_133.$ey_733.endl($way).
		get_title($way, "천상1교 사거리(15514)", "UNIST 방향").$ey_304J.$ey_304D.endl($way).
		get_title($way, "천상1교 사거리(40213)", "KTX울산역 방향, UNIST 미경유").$ey_327.$ey_807.$ey_5005.endl($way);

	echo $saveData;
	echo footer($way);
}
// chun-sang 1gyo-intersection. toward us direction.
else if($mode == "chunsang_us")
{
	// data URL from its.ulsan.kr
	$us_133 = get_busdata($way, "133", "194101332", "40214");
//	$us_233 = get_busdata($way, "233", "196102332", "40214");
	$us_733 = get_busdata($way, "733", "196107332", "40214");
//	$us_337 = get_busdata($way, "337", "196103373", "40214");
	$us_327 = get_busdata($way, "327", "196103273", "40214");
	$us_807 = get_busdata($way, "807", "196108073", "40214");
	$us_5005 = get_busdata($way, "5005", "196150051", "40214");

//	$us_123 = get_busdata($way, "123", "194101232", "40214");
//	$us_307 = get_busdata($way, "307", "196103071", "40214");
	$us_317 = get_busdata($way, "317", "196103171", "40214");
	$us_433 = get_busdata($way, "433", "196104331", "40214");
	
	$ch_304J = get_busdata($way, "304J", "196103041", "15513");
	$ch_304D = get_busdata($way, "304D", "196103043", "15513");
	$ch_357 = get_busdata($way, "357", "196103573", "15513");
		
	$saveData = get_time($way, "천상1교 사거리 - 울산행").
		get_title($way, "천상1교 사거리(40214)", "태화강역 방향").$us_133.$us_317.$us_327.$us_433.$us_733.$us_807.$us_5005.endl($way).
		get_title($way, "천상1교 사거리(15513)", "천상 경유 태화강역 방향").$ch_304J.$ch_304D.$ch_357;

	echo $saveData;
	echo footer($way);
}
//90ri_good. 
else if($mode == "90ri_good")
{
	// data URL from its.ulsan.kr
	$ey_133 = get_busdata($way, "133", "194101331", "20424");
	$ey_733 = get_busdata($way, "733", "196107331", "20424");


	$ey_327 = get_busdata($way, "327", "196103273", "20424");
	$ey_433 = get_busdata($way, "433", "196104332", "20424");
	$ey_807 = get_busdata($way, "807", "196108073", "20424");

	$saveData = get_time($way, "구영리/굿모닝힐").
		get_title($way, "구영리/굿모닝힐", "UNIST 방향").$ey_133.$ey_733.endl($way).
		get_title($way, "구영리/굿모닝힐", "UNIST미경유, 천상1교사거리 환승").$ey_327.$ey_433.$ey_807;

	echo $saveData;
	echo footer($way);
}
//90_Umirin 1. 
else if($mode == "90ri_umirin_01")
{
	// data URL from its.ulsan.kr
	$ey_133 = get_busdata($way, "133", "194101331", "20422");
	$ey_733 = get_busdata($way, "733", "196107331", "20422");

	$saveData = get_time($way, "구영리/우미린1차").
		get_title($way, "구영리/우미린1차", "UNIST 방향").$ey_133.$ey_733;

	echo $saveData;
	echo footer($way);
}
//90_Umirin 2. 
else if($mode == "90ri_umirin_02")
{
	// data URL from its.ulsan.kr
	$ey_133 = get_busdata($way, "133", "194101331", "20416");
	$ey_733 = get_busdata($way, "733", "196107331", "20416");
	$ey_5002 = get_busdata($way, "5002", "196150022", "20416");
	$ey_5005 = get_busdata($way, "5005", "196150052", "20416");

	$saveData = get_time($way, "구영리/우미린2차").
		get_title($way, "구영리/우미린2차", "UNIST 방향").$ey_133.$ey_733.endl($way).
		get_title($way, "구영리/우미린2차", "KTX울산역 방향, UNIST 미경유").$ey_5002.$ey_5005;

	echo $saveData;
	echo footer($way);
}
//90ri_deri. 
else if($mode == "90ri_deri")
{
	// data URL from its.ulsan.kr
	$ey_133 = get_busdata($way, "133", "194101331", "20414");
	$ey_733 = get_busdata($way, "733", "196107331", "20414");

	$ey_327 = get_busdata($way, "327", "196103273", "20414");
	$ey_433 = get_busdata($way, "433", "196104332", "20414");
	$ey_807 = get_busdata($way, "807", "196108073", "20414");

	$saveData = get_time($way, "구영리/대리마을").
		get_title($way, "구영리/대리마을", "UNIST 방향").$ey_133.$ey_733.endl($way).
		get_title($way, "구영리/대리마을", "UNIST미경유, 천상1교사거리 환승").$ey_327.$ey_433.$ey_807;

	echo $saveData;
	echo footer($way);
}
//sumgnam
else if($mode == "sungnam")
{
	$ey_233 = get_busdata($way, "233", "196102331", "21606");
	$ey_123 = get_busdata($way, "123", "194101231", "21606");
		
	$saveData = get_time($way, "성남동").
		get_title($way, "성남동", "UNIST 방향").$ey_233.endl($way).
		get_title($way, "성남동", "UNIST 방향, UNIST 미경유.".endl($way)."천상1교사거리 환승").$ey_123;

	echo $saveData;
	echo footer($way);
}
//sinbok
else if($mode == "sinbok")
{
	// data URL from its.ulsan.kr
	$ey_733 = get_busdata($way, "733", "196107331", "30704");
	$ey_304 = get_busdata($way, "304", "196103042", "30704");
	$ey_307 = get_busdata($way, "307", "196103072", "30704");

	$saveData = get_time($way, "신복로터리").
		get_title($way, "신복로터리", "UNIST 방향").$ey_304.$ey_733.endl($way).
		get_title($way, "신복로터리", "UNIST 방향, UNIST 미경유.".endl($way)."천상1교사거리 환승").$ey_307;

	echo $saveData;
	echo footer($way);

}
//ulsan_university
else if($mode == "ulde")
{
	// data URL from its.ulsan.kr
	$ey_304J = get_busdata($way, "304J", "196103042", "30708");
	$ey_304D = get_busdata($way, "304D", "196103044", "30708");
	$ey_733 = get_busdata($way, "733", "196107331", "30708");
	$ey_307 = get_busdata($way, "307", "196103072", "30708");
	$bs_1127 = get_busdata($way, "1127", "196111272", "30707");

	$saveData = get_time($way, "울산대학교").
		get_title($way, "울산대학교", "UNIST 방향").$ey_304J.$ey_304D.$ey_733.endl($way).
		get_title($way, "울산대학교", "UNIST 방향, UNIST 미경유.".endl($way)."천상1교사거리 환승").$ey_307;
		get_title($way, "울산대학교", "부산 노포동 방향").$bs_1127;

	echo $saveData;
	echo footer($way);

}
//siktam
else if($mode == "siktam")
{
	// data URL from its.ulsan.kr
	$ey_337 = get_busdata($way, "337", "196103373", "40412");
	$ey_733 = get_busdata($way, "733", "196107331", "40412");

	$ey_307 = get_busdata($way, "307", "196103072", "40412");
	$ey_317 = get_busdata($way, "317", "196103172", "40412");
	$ey_327 = get_busdata($way, "327", "196103273", "40412");
	$ey_357 = get_busdata($way, "357", "196103574", "40412");
	$ey_807 = get_busdata($way, "807", "196108073", "40412");


	$ey_1703 = get_busdata($way, "1703", "193117031", "40412");
	$ey_1713 = get_busdata($way, "1713", "193117131", "40412");

	$saveData = get_time($way, "달동현대앞(식탐돼지)").
		get_title($way, "달동현대앞(식탐돼지)", "UNIST 방향").$ey_337.$ey_733.endl($way).
		get_title($way, "달동현대앞(식탐돼지)", "UNIST 방향, UNIST 미경유.".endl($way)."천상1교사거리, 사연 환승").$ey_307.$ey_317.$ey_327.$ey_357.$ey_807.endl($way).
		get_title($way, "달동현대앞(식탐돼지)", "UNIST 방향, UNIST 미경유.".endl($way)."'천상'하차. '천상1교사거리'환승 고속버스").$ey_1703.$ey_1713;

	echo $saveData;
	echo footer($way);
}
//tower of industry
else if($mode == "ind_tow")
{
	// data URL from its.ulsan.kr
	$ey_733 = get_busdata($way, "733", "196107331", "40404");
	$ey_307 = get_busdata($way, "307", "196103072", "40404");
	$ey_1703 = get_busdata($way, "1703", "193117031", "40404");
	$ey_1713 = get_busdata($way, "1713", "193117131", "40404");

	$ey_317 = get_busdata($way, "317", "196103172", "40402");
	$ey_327 = get_busdata($way, "327", "196103273", "40402");
	$ey_357 = get_busdata($way, "357", "196103573", "40402");
	$saveData = get_time($way, "공업탑").
		get_title($way, "공업탑(40404)", "UNIST 방향").$ey_304.$ey_733.endl($way).
		get_title($way, "공업탑(40404)", "UNIST 방향, UNIST 미경유.".endl($way)."사연, 과기원 입구 환승").$ey_307.endl($way).
		get_title($way, "공업탑(40402)", "UNIST 방향, UNIST 미경유.".endl($way)."사연, 과기원 입구 환승").$ey_317.$ey_327.$ey_357.endl($way).
		get_title($way, "공업탑(40404)", "UNIST 방향, UNIST 미경유.".endl($way)."'천상'하차. '입압'환승 고속버스").$ey_1703.$ey_1713;

	echo $saveData;
	echo footer($way);
}
//Bus_Terminal
else if($mode == "terminal")
{
	// data URL from its.ulsan.kr
	$ey_133 = get_busdata($way, "133", "194101331", "40420");
	$ey_337 = get_busdata($way, "337", "196103373", "40420");
	$ey_733 = get_busdata($way, "733", "196107331", "40420");

	$ey_307 = get_busdata($way, "307", "196103072", "40420");
	$ey_317 = get_busdata($way, "317", "196103172", "40420");
	$ey_327 = get_busdata($way, "327", "196103273", "40420");
	$ey_357 = get_busdata($way, "357", "196103573", "40420");

	$ey_807 = get_busdata($way, "807", "196108073", "40420");

	$saveData = get_time($way, "시외고속버스터미널").
		get_title($way, "시외고속버스터미널", "UNIST 방향").$ey_133.$ey_337.$ey_733.endl($way).
		get_title($way, "시외고속버스터미널", "UNIST 방향, UNIST 미경유.".endl($way)."사연, 과기원입구 환승").$ey_307.$ey_317.$ey_327.$ey_357.$ey_807;

	echo $saveData;
	echo footer($way);
}
else
{
	echo "Wrong Access!!".endl($way)."잘못된 접근입니다.";
}
?>
