<?php
$iflag = false;
$andflag = false;
// when User agent == iPhone.
if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone'))
{
    $iflag = true;
    $icon = "./bus/res/apple-touch-icon.png";
    $startup = "./bus/res/startup_iphone.png";

}
// when User agent == iPad.
else if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
    $iflag = true;
    $icon = "./bus/res/apple-touch-icon.png";
    $startup = "./bus/res/startup_ipad.png";
}
// when User agent == Android.
else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android'))
{
    $andflag = true;
}

if($iflag)
{
?>
<link rel="apple-touch-icon" href="<?php echo $icon?>" />
<link rel="apple-touch-startup-image" href="<?php echo $startup?>" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<?php
}
else if($andflag)
{
?>
<link rel="shortcut icon" href="./bus/res/shortcut.ico">
<?php
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./bus/res/style.css" />
<link rel="stylesheet" href="./bus/res/jm/jquery.mobile-1.3.2.min.css">
