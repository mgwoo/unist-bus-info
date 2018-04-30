<?php

//echo "why are you visit this pages?\n";

////////////////////////////////////////////////////////////////////////////////
// UNIF; UNIST Nonofficial Information Forward
// by lino@HeXA
// by LeMonTreE
//
// History
//  2011.12.16 - Alpha version released
//  2012.04.25 - inserted information about 133, 233 and 733. 
//          by LeMonTreE@HeXA. 
//    2012.05.09 - modifying ways to get bus information totally.
//    2013.11.03 - removed error of forced termination of bus.
//  2014.06.22 - m.its.ulsan.kr -> apis.its.ulsan.kr.  change Sources. 
//
////////////////////////////////////////////////////////////////////////////////

function min_sec($sec) {
    // 0 minutes left.
    if(floor($sec/60) == 0)    {
        return ($sec-floor($sec/60)*60)."초";
    }
    else {
        return floor($sec/60)."분";
    }
}

function insert_colon($num) {
    return substr($num,0,2).":".substr($num,2,2);
}

// string parser
function strParser($target, $init, $term) {
    $temp = substr(strstr($target, $init), strlen($init));
    if ($temp == NULL) {
        return NULL;
    }
    else {
        return substr($temp, 0, strpos($temp, $term));
    }
}



function GetJsonBusData($mode, $busnum, $routeid, $stopid) {

    // generate url1. from given data.
    $url1 = "http://apis.its.ulsan.kr:8088/Service4.svc/RouteArrivalInfo.xo?ctype=A&routeid=".$routeid."&stopid=".$stopid;
    
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)';
    $ch = curl_init();  
    curl_setopt ($ch, CURLOPT_URL,$url1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt ($ch, CURLOPT_SSLVERSION,1); 
    curl_setopt ($ch, CURLOPT_HEADER, 0); 
    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt ($ch, CURLOPT_USERAGENT, $agent); 
    curl_setopt ($ch, CURLOPT_TIMEOUT, 4); // Time Limit : 4 Seconds.
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $xmldata = simplexml_load_string($result);
    $xmldata = json_decode(json_encode((array)$xmldata), TRUE);
    
    //print_r($xmldata);

    curl_close($ch); 

    // get data from RSS. apis.its.ulsan.kr:8888/ 
    if($result != "") {

        //print_r($xmldata);

        $buscnt = $xmldata[RouteArrivalInfoResult][RouteArrivalInfo][MsgBody][BUSINFO][BUSCNT];
        $beflink = $xmldata[RouteArrivalInfoResult][RouteArrivalInfo][MsgBody][BUSINFO][CurrentArrivalInfo][ArrivalInfoTable][0];
        $nxtlink = $xmldata[RouteArrivalInfoResult][RouteArrivalInfo][MsgBody][BUSINFO][CurrentArrivalInfo][ArrivalInfoTable][1];

        //echo ($buscnt);
        //print_r($beflink);

        // $buscnt : 0 -> bus END
        // $buscnt : 1 -> busnum is one
        // $buscnt : 2 -> busnum is two

        // $fir_stat : 0 -> about to start bus..
        // $fir_stat : 1 -> bus is on the road..

        // has no bus.
        if($buscnt == 0) {
            return array("busNum" => $busnum, "busCnt" => intval($buscnt), "busStop" => intval($stopid));
        }
        // bus exists. 
        else {
            if($buscnt >= 2) {
                return array("busNum" => $busnum, "busCnt" => intval($buscnt), "busStop" => intval($stopid), 
                    "befStat" => intval($beflink[STATUS]), 
                    "befTime" => ((intval($beflink[STATUS]) === 1)? insert_colon($beflink[REMAINTIME]):min_sec($beflink[REMAINTIME])), 
                    "befStopName" => $beflink[STOPNAME], 
                    "befStopCnt" => intval($beflink[REMAINSTOPCNT])+1,
                    "nxtStat" => intval($nxtlink[STATUS]), 
                    "nxtTime" => ((intval($nxtlink[STATUS]) === 1)? insert_colon($nxtlink[REMAINTIME]):min_sec($nxtlink[REMAINTIME])), 
                    "nxtStopName" => $nxtlink[STOPNAME], 
                    "nxtStopCnt" => intval($nxtlink[REMAINSTOPCNT])+1);
            }
            else {
                $curlink= $xmldata[RouteArrivalInfoResult][RouteArrivalInfo][MsgBody][BUSINFO][CurrentArrivalInfo][ArrivalInfoTable];
                return array("busNum" => $busnum, "busCnt" => intval($buscnt), "busStop" => intval($stopid),
                    "befStat" => intval($curlink[STATUS]), 
                    "befTime" => ((intval($curlink[STATUS]) === 1)? insert_colon($curlink[REMAINTIME]):min_sec($curlink[REMAINTIME])), 
                    "befStopName" => $curlink[STOPNAME], 
                    "befStopCnt" => intval($curlink[REMAINSTOPCNT])+1);
            }
        }
    }
    else {
        return array("busNum" => $busnum, "busCnt" => 1, "busStop" => intval($stopid),
                "befStat" => 0, 
                "befTime" => 0000, 
                //"befStopName" => '개발자에게연락', 
                "befStopName" => '울산서버사망', 
                "befStopCnt" => 0);
    }
}

//$mode : 0 for html, 1 for kakao.
function get_busdata($mode, $busnum, $routeid, $stopid, $url2) {

    // generate url1. from given data.
    $url1 = "http://apis.its.ulsan.kr:8088/Service4.svc/RouteArrivalInfo.xo?ctype=A&routeid=".$routeid."&stopid=".$stopid;
    
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)';
    $ch = curl_init();  
    curl_setopt ($ch, CURLOPT_URL,$url1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt ($ch, CURLOPT_SSLVERSION,1); 
    curl_setopt ($ch, CURLOPT_HEADER, 0); 
    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt ($ch, CURLOPT_USERAGENT, $agent); 
    curl_setopt ($ch, CURLOPT_TIMEOUT, 4); // Time Limit : 4 Seconds.
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $xmldata = simplexml_load_string($result);

    curl_close($ch); 

    // get data from RSS. apis.its.ulsan.kr:8888/ 
    if($result != "") {

        //print_r($xmldata);

        $buscnt = $xmldata->RouteArrivalInfoResult->RouteArrivalInfo->MsgBody->BUSINFO->BUSCNT;
        $beflink = $xmldata->RouteArrivalInfoResult->RouteArrivalInfo->MsgBody->BUSINFO->CurrentArrivalInfo->ArrivalInfoTable[0];
        $nxtlink = $xmldata->RouteArrivalInfoResult->RouteArrivalInfo->MsgBody->BUSINFO->CurrentArrivalInfo->ArrivalInfoTable[1];

        // $buscnt : 0 -> bus END
        // $buscnt : 1 -> busnum is one
        // $buscnt : 2 -> busnum is two

        // $fir_stat : 0 -> about to start bus..
        // $fir_stat : 1 -> bus is on the road..

        // has no bus.
        if($buscnt == 0) {
            return get_str($mode, $busnum, $buscnt);
        }
        // bus exists. 
        else {
            //if($buscnt >= 2) {
                return get_str($mode, $busnum, $buscnt, 
                        ($beflink->STATUS), ($beflink->REMAINTIME), ($beflink->STOPNAME), ($beflink->REMAINSTOPCNT+1),
                        ($nxtlink->STATUS), ($nxtlink->REMAINTIME), ($nxtlink->STOPNAME), ($nxtlink->REMAINSTOPCNT+1));
            //}
            
            return get_str($mode, $busnum, $buscnt, 
                    ($beflink->STATUS), ($beflink->REMAINTIME), ($beflink->STOPNAME), ($beflink->REMAINSTOPCNT+1));
        }
    }
    else {
        // get data from m.its.ulsan.kr. 
        $ch = curl_init();  

        curl_setopt ($ch, CURLOPT_URL,$url2);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt ($ch, CURLOPT_SSLVERSION,1); 
        curl_setopt ($ch, CURLOPT_HEADER, 0); 
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt ($ch, CURLOPT_USERAGENT, $agent); 
        curl_setopt ($ch, CURLOPT_TIMEOUT, 60); // Time Limit : 3 Seconds.
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        curl_close($ch); 

        $result = strParser($result, "</dl>", "</div>");
        $result = strip_tags($result);
        $result = preg_replace("/\s+/", "", $result)."<END>";

        $now_tmp = strParser($result, "이번버스", "다음버스")."<END>";
        $now_time = strParser($now_tmp, "도착시간", "통과위치");
        $now_pos = strParser($now_tmp, "통과위치","<END>");

        $next_tmp = strParser($result, "다음버스","<END>")."<END>";
        $next_time = strParser($next_tmp, "도착시간", "통과위치");
        $next_pos = strParser($next_tmp, "통과위치","<END>");
        
        // Get_Now_Time_Data
        if($now_time != NULL)
        {
            $first_tr = "<tr><td rowspan = 2 id='lf'>".$bus."</td><td id='md'>현재버스<br /><b>".$now_time."</b>뒤 도착</td><td id='rg'>".$now_pos."</td></tr>";
        }
        else
        {
            // now bus time empty. Check terminal StartTime
            $now_start = strParser($now_tmp, "기점출발시간", "<END");
            
            if($now_start != NULL)
            {
                // StartTime Exist
                $first_tr = "<tr><td rowspan = 2 id='lf'>".$bus."</td><td id='md'>현재버스<br /><b>[".$now_start."]</b></td><td id='rg'>기점출발예정</td></tr>";
            }
            else
            {
                // StartTime empty. (bus end)
                $first_tr = "<tr><td id='lf'>".$bus."</font></td><td id='md'></td><td id='rg'>버스 종료</td></tr>";

                // bus end Flag
                $is_end = true;
            }
        }

        $second_tr = "";

        // Get_Next_Time_Data
        if($next_time != NULL && $next_pos != "")
        {
            // next bus time and next position exist
            $second_tr = "<tr><td id='md'>다음버스<br /><b>".$next_time."</b>뒤 도착</td><td id='rg'>".$next_pos."</td></tr>";
        }
        // already 'NOW bus' $is_End, ignore $NEXT bus information. (bus_end)
        else if(!$is_end)
        {
            // next bus time empty. Check terminal StartTime
            $next_start = strParser($next_tmp, "기점출발시간", "<END"); 

            if($next_start != NULL)
            {
                // next bus information EXIST
                $second_tr = "<tr><td id='md'>다음버스<br /><b>[".$next_start."]</b></td><td id='rg'>기점출발예정</td></tr>";
            }
        }
        
        return "<table class = 'context'>".$first_tr.$second_tr."</table>";
    }
}

// $mode : 0 for html, 1 for KAKAO.

// $buscnt : 0 -> bus END
// $buscnt : 1 -> busnum is one
// $buscnt : 2 -> busnum is two

// $fir_stat : 0 -> about to start bus..
// $fir_stat : 1 -> bus is on the road..

// $sec_stat is also...

function get_str ($mode, $busnum, $buscnt, 
    $fir_stat = NULL, $fir_time = NULL, $fir_stop = NULL, $fir_rem = NULL, 
    $sec_stat = NULL, $sec_time = NULL, $sec_stop = NULL, $sec_rem = NULL) {

/*
echo "mode : ".$mode.endl($mode);
echo "busnum : ".$busnum.endl($mode);
echo "buscnt : ".$buscnt.endl($mode);

echo "fir_stat : ".$fir_stat.endl($mode);
echo "sec_stat : ".$sec_stat.endl($mode);
echo "fir_time : ".$fir_time.endl($mode);
echo "fir_stop : ".$fir_stop.endl($mode);
*/



    // html mode
    if($mode == 0) {
        // bus is ended
        if($buscnt == 0) {
            return "<table class = 'context'><tr><td id='lf'>".$busnum."</font></td><td id='md'></td><td id='rg'>버스 종료</td></tr></table>";
        }
        // general cases.
        else if ($buscnt >= 1) {

            // make first string.
            if($fir_stat == 1) {
                $first_str = "<tr><td rowspan = 2 id='lf'>".$busnum."</td><td id='md'>현재버스<br /><b>[".insert_colon($fir_time)."]</b></td><td id='rg'>기점출발예정</td></tr>";
            }
            else if($fir_stat == 0) {
                $first_str = "<tr><td rowspan = 2 id='lf'>".$busnum."</td><td id='md'>현재버스<br /><b>".min_sec($fir_time)."</b>뒤 도착</td><td id='rg'>".$fir_stop."<br />(".$fir_rem." 정거장 전)</td></tr>";
            }

            // make second string.
            if($buscnt >= 2) {
                if($sec_stat == 1) {
                    $second_str = "<tr><td id='md'>다음버스<br /><b>[".insert_colon($sec_time)."]</b></td><td id='rg'>기점출발예정</td></tr>";
                }
                else if($sec_stat == 0) {
                    $second_str = "<tr><td id='md'>다음버스<br /><b>".min_sec($sec_time)."</b>뒤 도착</td><td id='rg'>".$sec_stop."<br />(".$sec_rem." 정거장 전)</td></tr>";
                }
            }
            return "<table class = 'context'>".$first_str.$second_str."</table>";
        }

    }
    // kakao mode.
    else if($mode == 1) {
        // bus is ended
        if($buscnt == 0) {
            return $busnum."번 버스 종료";
        }
        // general cases.
        else if ($buscnt >= 1) {

            // make first string.
            if($fir_stat == 1) {
                $first_str = $busnum."번\n[".insert_colon($fir_time)."] 기점출발예정\n";

            }
            else if($fir_stat == 0) {
                $first_str = $busnum."번\n".min_sec($fir_time)." 뒤 - ".$fir_stop."(".$fir_rem." 전)\n";
            }

            // make second string.
            if($buscnt >= 2) {
                if($sec_stat == 1) {
                    $second_str = "[".insert_colon($sec_time)."] 기점출발예정\n\n";
                }
                else if($sec_stat == 0) {
                    $second_str = min_sec($sec_time)." 뒤 - ".$sec_stop."(".$sec_rem." 전)\n\n";
                }
            }
            else
                $second_str = "\n";
            
            return $first_str.$second_str;
        }
    }
    // json mode.
    else if($mode == 2) {
        // bus is ended
        if($buscnt == 0) {
            return $busnum."번 버스 종료";
        }
        // general cases.
        else if ($buscnt >= 1) {

            // make first string.
            if($fir_stat == 1) {
                $first_str = $busnum."번\n[".insert_colon($fir_time)."] 기점출발예정\n";

            }
            else if($fir_stat == 0) {
                $first_str = $busnum."번\n".min_sec($fir_time)." 뒤 - ".$fir_stop."(".$fir_rem." 전)\n";
            }

            // make second string.
            if($buscnt >= 2) {
                if($sec_stat == 1) {
                    $second_str = "[".insert_colon($sec_time)."] 기점출발예정\n\n";
                }
                else if($sec_stat == 0) {
                    $second_str = min_sec($sec_time)." 뒤 - ".$sec_stop."(".$sec_rem." 전)\n\n";
                }
            }
            else
                $second_str = "\n";
            
            return $first_str.$second_str;
        }
    }
}

function get_time($mode, $title = NULL) {
    if($mode == 0) {
        return "<div id='time'> 현재 시간 ".date("H:i",time())." </div>";
    }
    else if($mode == 1) {
        return $title." - 현재 시간 ".date("H:i",time())."\n";
    }

}

function get_title($mode, $large_str, $small_str) {
    if($mode == 0) {
        return "<table class = 'title'><tr><td id='title'>".$large_str."</td></tr><tr><td id='dir'>".$small_str."</td></tr></table>";
    }
    else if ($mode == 1) {
        return "<".$large_str." ".$small_str.">\n";
    }
}

function endl($mode) {
    if($mode == 0)
        return "<br />";
    else
        return "\n";
}

function footer($mode) {
    if($mode == 1)
        return "http://bus.hexa.pro\n유니스트 버스종합정보";
}

//refresh Cycle : 10 seconds.
function is_diftime($str)
{
    if(substr($str, 0, 7) != substr(date('dHis',time()), 0, 7))
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>
