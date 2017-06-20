<?php
/**
 * 获取图片上传随机数名称
 */

function getRandomName($filename) {
	$pos=strrpos($filename, '.');
	$fileExt=strtolower(substr($filename, $pos));
	$t=getdate();
	$year=$t['year'];
	$mon = $t ['mon'] > 10 ? $t ['mon'] : "0" . $t ['mon'];
	$day = $t ['mday'] > 10 ? $t ['mday'] : "0" . $t ['mday'];
	$hours = $t ['hours'] > 10 ? $t ['hours'] : "0" . $t ['hours'];
	$minutes = $t ['minutes'] > 10 ? $t ['minutes'] : "0" . $t ['minutes'];
	$seconds = $t ['seconds'] > 10 ? $t ['seconds'] : "0" . $t ['seconds'];
	return $year . $mon . $day . $hours . $minutes . $seconds . rand ( 1000, 9999 ) . $fileExt;
}

?>
