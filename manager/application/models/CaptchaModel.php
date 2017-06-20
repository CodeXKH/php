<?php
/*
 * 存储验证码信息model
 */
class CaptchaModel extends CI_Model{
	public function get_captcha() {
		$rand = strtoupper ( substr ( md5 ( rand () ), 0, 4 ) );
		$session_rand = array (
				"rand" => $rand 
		);
		//$this->session->sess_destroy();
		$this->session->set_userdata('captcha',$session_rand); // 验证码的值存入session
		$img = array (
				'word' => $rand,
				'img_path' => './captcha/',
				'img_url' => base_url () . '/captcha/',
				'img_width' => '100',
				'font_size' => 18,
				'font_path' => './static/fonts/Aunty Lils Dots.ttf',
				'img_height' => '36',
				'expiration' => 10   // 验证码图片销毁时间
		); 

		$rec = create_captcha ( $img );
		return $rec['image']; // 输出img格式图片
	}
}

?>