<?php
class Upload extends CI_Controller {
	
	/**
	 * 初始化加载首页
	 */
	public function index() {
		$username = $this->session->userdata ( 'username' );
		
		if (! isset ( $username )) {
			redirect ( base_url () . 'login' ); // 重定向到登录页面(绝对地址，隐藏index.php)
		} else {
			
			$this->load->model ( 'client/user/UploadModel', 'upload' ); // 调用模型获取数据
			$list ['file_type'] = $this->upload->get_file_type ();
			
			$this->load->view ( 'client/common/head' );
			$this->load->view ( 'client/upload', $list );
			$this->load->view ( 'client/common/foot' );
		}
	}
	public function imgupload() {
		$targetFolder = 'static/uploadify/uploads'; // Relative to the root
		
		if (! empty ( $_FILES )) {
			$tempFile = $_FILES ['Filedata'] ['tmp_name'];
			$targetPath = $_SERVER ['DOCUMENT_ROOT'] . $targetFolder;
			$this->load->helper ( 'randname' );
			$_FILES ['Filedata'] ['name'] = getRandomName ( $_FILES ['Filedata'] ['name'] );
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
				echo $_FILES ['Filedata'] ['name'];
			} else {
				echo '上传错误.';
			}
		}
	}
	public function addfile() {
		$username = $this->session->userdata ( 'username' );
		
		if (! isset ( $username )) {
			redirect ( base_url () . 'login' ); // 重定向到登录页面(绝对地址，隐藏index.php)
		} else {
			
			$title = $this->input->post ( 'title' );
			$link = $this->input->post ( 'link' );
			$typeid = $this->input->post ( 'typeid' );
			$describe = $this->input->post ( 'describe' );
			$imghtml = $this->input->post ( 'imghtml' );
			$imgone = $this->input->post ( 'imgone' );
			
			$this->load->model ( 'client/user/UploadModel', 'file' ); // 调用文件模型
			$username = $this->session->userdata ( 'username' );
			$user = $this->file->get_member ( $username );
			$memberid = $user [0]->uid;
			
			$data = array (
					'title' => $title,
					'link' => $link,
					'typeid' => $typeid,
					'imgone' => $imgone,
					'memberid' => $memberid,
					'describe' => $describe 
			);
			
			$fileno = $this->file->insert_file ( $data );
			
			if (! empty ( $fileno )) {
				$imgarray = str_split ( $imghtml, 22 );
				$datarray = array ();
				foreach ( $imgarray as $key ) {
					array_push ( $datarray, array (
							'fileid' => $fileno,
							'img' => $key 
					) );
				}
				$imgno = $this->file->insert_file_img ( $datarray );
				if ($imgno > 0) {
					echo 1; // 文件图片上传成功;
				} else {
					echo 0; // 文件图片上传失败;
				}
			}
		}
	}
}
