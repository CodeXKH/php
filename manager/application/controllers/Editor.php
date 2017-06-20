
<?php
/**
 * wangEditor图片上传
 * @author XiaoKeHao
 *
 */
class Editor extends CI_Controller {
	public function index() {

		$targetFolder = 'uploads/'; // Relative to the root
		if (!empty($_FILES)) {
			$fileStyle=array_keys($_FILES)[0];
			$tempFile = $_FILES [$fileStyle] ['tmp_name'];
			$targetPath = $_SERVER ['DOCUMENT_ROOT'] . $targetFolder;
			$targetFile = rtrim ( $targetPath, '/' ) . '/' . $_FILES [$fileStyle] ['name'];
			// Validate the file type
			$fileTypes = array (
					'jpg',
					'jpeg',
					'JPG',
					'gif',
					'png'
			); // File extensions
			$fileParts = pathinfo ( $_FILES [$fileStyle] ['name'] );
		
			if (in_array ( $fileParts ['extension'], $fileTypes )) {
				move_uploaded_file ( $tempFile, iconv ( "UTF-8", "gb2312", $targetFile ) ); // 解决上传乱码问题
				echo base_url().$targetFolder.$_FILES [$fileStyle] ['name'];
			} else {
				echo '上传失败';
			} 
		}
		
	
	}
	
	
}

?>

 