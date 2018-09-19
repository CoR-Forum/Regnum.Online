<?php
date_default_timezone_set('Europe/Berlin');
header("Content-type: image/png");
$image = imagecreatetruecolor(250, 20)
or die("Cannot Initialize new GD image stream");
$col_transparent = imagecolorallocatealpha($image, 255, 255, 255, 127);
$col_red = imagecolorallocate($image, 255, 255, 0);

imagefill($image, 0, 0, $col_transparent);  // set the transparent colour as the background.
imagecolortransparent($image, $col_transparent); // actually make it transparent

imagestring($image, 5, 10, 5, printSpawnings("rha", 2), $col_red);
imagepng($image);
imagedestroy($image);

function printSpawnings($boss, $lines) {
    $respawns["thork"]=392404;$respawns["rha"]=392404;$respawns["eve"]=392404;
    $ur_spawns["rha"]=1459308374;
    $ur_spawns["eve"]=1458436243;
    $ur_spawns["thork"]=1459163449;
    $spawn=$ur_spawns[$boss];
    $respawn=$respawns[$boss];
    $now=time();
    $now_day=date('d',time());
    while($spawn < $now)
        $spawn += $respawn;
    $spawn -= $respawn;
    if($now_day==date('d',$spawn)) {
        $times[]='Today '.date('H:i',$spawn).' ';
    }
    for($i=1; $i<$lines; $i++) {
        $spawn += $respawn;
        $spawn_day = date('d', $spawn);
        if($spawn_day==$now_day)
            $times[]='Today '.date('H:i',$spawn).' ';
        else if($spawn_day==$now_day+1)
            $times[]='Tomorrow '.date('H:i',$spawn).' ';
        else
            $times[]=date('l',$spawn).' '.date('H:i',$spawn).' ';
    }
    $str = "";
    foreach($times as $time) {
        $str .= replace($time);
    }
    return $str;
}
function replace($raw) {
    $str = $raw;
    $str = str_replace("Monday", "Monday", $str);
    $str = str_replace("Tuesday", "Tuesday", $str);
    $str = str_replace("Wednesday", "Wednesday", $str);
    $str = str_replace("Thursday", "Thursday", $str);
    $str = str_replace("Friday", "Friday", $str);
    $str = str_replace("Saturday", "Saturday", $str);
    $str = str_replace("Sunday", "Sunday", $str);


    return $str;
}