<?php
/******
****	Minecraft Skin Cacher
****	Copyright 2020, CunterFuck.com
****	This script was created by
****	SkyWalker, aka SkyWalker3200
****	You are not allowed to modify, or redistrute this script without WRITTEN CONSENT
****	From SkyWalker himself.
*******/


function download($file_source, $file_target) {
    $rh = fopen($file_source, 'rb');
    $wh = fopen($file_target, 'w+b');
    if (!$rh || !$wh) {
        return false;
    }

    while (!feof($rh)) {
        if (fwrite($wh, fread($rh, 4096)) === FALSE) {
            return false;
        }
        echo ' ';
        flush();
    }

    fclose($rh);
    fclose($wh);

    return true;
}
?>