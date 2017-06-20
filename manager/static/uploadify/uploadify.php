<?php
/*
 * Uploadify
 * Copyright (c) 2012 Reactive Apps, Ronnie Garcia
 * Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */

// Define a destination
$targetFolder = '/uploads'; // Relative to the root

//$fileName = $this->getRandomName($fileName);
$id=$_POST['id'];
echo  $id;
if (!empty($_FILES)) {
	$tempFile = $_FILES ['Filedata'] ['tmp_name'];
	$targetPath = $_SERVER ['DOCUMENT_ROOT'] . $targetFolder;
	$_FILES ['Filedata'] ['name']=getRandomName($_FILES ['Filedata'] ['name']);
	$targetFile = rtrim ( $targetPath, '/' ) . '/' . $_FILES ['Filedata'] ['name'];
	// Validate the file type
	$fileTypes = array (
			'jpg',
			'jpeg',
			'JPG',
			'gif',
			'png' 
	); // File extensions
	$fileParts = pathinfo ( $_FILES ['Filedata'] ['name'] );
	
	if (in_array ( $fileParts ['extension'], $fileTypes )) {
		move_uploaded_file ( $tempFile, iconv ( "UTF-8", "gb2312", $targetFile ) ); // 解决上传乱码问题
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
/**
 * 获取图片上传随机数名称
 */
function getRandomName($filename) {
	$pos = strrpos ( $filename, "." );
	$fileExt = strtolower ( substr ( $filename, $pos ) );
	// ini_set('date.timezone', 'Asia/Shanghai');
	$t = getdate ();
	$year = $t [year];
	$mon = $t [mon] > 10 ? $t [mon] : "0" . $t [mon];
	$day = $t [mday] > 10 ? $t [mday] : "0" . $t [mday];
	$hours = $t [hours] > 10 ? $t [hours] : "0" . $t [hours];
	$minutes = $t [minutes] > 10 ? $t [minutes] : "0" . $t [minutes];
	$seconds = $t [seconds] > 10 ? $t [seconds] : "0" . $t [seconds];
	return $year . $mon . $day . $hours . $minutes . $seconds . rand ( 1000, 9999 ) . $fileExt;
	
}
?>