
<?php
/**
 * 加载验证码控制类
 * @author XiaoKeHao
 *
 */
class Captcha extends CI_Controller {
	public function index() {
		$this->load->model('CaptchaModel','captcha');
		$this->load->helper ( 'captcha' );   
		echo $this->captcha->get_captcha();
	}
}

?>

 