<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

/**
 * 初始化加载首页
 */
	public function index()
	{
/* 		$password='admin';
		$salt = substr ( uniqid ( rand () ), - 6 );
		$password = md5 ( md5 ( $password ) . '7e86f3' );
		$this->load->helper ( 'client' );
		echo client_url (); */
/* 		$this->load->model ( 'client/user/LoginModel', 'logino' ); // 调用模型获取数据
		$username='admin';
		$data= $this->logino->getSalt ( $username);
	
		if (!empty($data[0]->salt)) {
			echo 'buwiekong';
		}else {
			echo 'kong;';
		} */
/* 
		$a="201605151327266986.jpg201605151327261379.jpg";
		$a=str_split($a,22);
		$imgarray=array();
		foreach ($a as $key) {
			array_push($imgarray, array('fileid' => 1,	'img' => $key));
		}
	
			$this->load->model ( 'client/user/UploadModel', 'logino' ); // 调用模型获取数据
		$data= $this->logino->insert_file_img ( $imgarray);
		echo  $data; */
/* 		$this->load->model ( 'client/user/PersonModel', 'person' ); // 调用模型获取数据
		$username="admin";
		
		$list= $this->person->get_person_file_count ($username);
		var_dump($list); */
		
		
		
	}
}
