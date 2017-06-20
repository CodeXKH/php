
<?php
/**
 * 后台用户管理主控制器
 * @author XiaoKeHao
 *
 */
class Main extends My_Controller {
	/**
	 * 加载用户列表，默认显示10条
	 */
	public function index() {
		$username=$this->uri->segment(5);
		$this->load->model ( 'admin/user/UserModel', 'user' );
		$list ['user'] = $this->user->get_user ($username);
		$list ['count'] = $this->user->get_count ($username);
		$list ['username'] = $username;
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/user/index', $list );
	}
	
	/**
	 * 根据选择分页数，加载用户
	 */
	public function user_page() {
		$pagenumber = $this->input->post ( 'pagenumber' );
		$username= $this->input->post ( 'username' );
		$this->load->model ( 'admin/user/UserModel', 'user' );
		$list = $this->user->get_page ( $pagenumber,$username);
		echo json_encode ( $list );
	}
	
	
	/**
	 * 加载添加用户视图
	 */
	public function add() {
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/user/add' );
	}
	
	/**
	 * 添加用户
	 */
	public function user_add() {
		$username = $this->input->post ( 'username' );
		$email = $this->input->post ( 'email' );
		$password = md5 ( $this->input->post ( 'password' ) );
		
		$data = array (
				'username' => $username,
				'password' => $password,
				'email' => $email
		);
		
		$this->load->model ( 'admin/user/UserModel', 'user' );
		
		$exist = $this->user->get_user_exist ( $username);
		if ($exist > 0) {
			echo 2; // 用户存在
		} else {
		$data = $this->user->get_add ( $data );
			if ($data > 0) {
				echo 1; // 添加成功;
			} else {
				echo 0; // 添加失败;
			}
		} 
	}
	
	/**
	 * 根据id删除用户
	 */
	public function user_delete() {
		$id = $this->input->post ( 'id' );
		$this->load->model ( 'admin/user/UserModel', 'user' );
		$data = $this->user->get_delete ( $id );
		echo $data;
	}
	
	/**
	 * 根据id更新用户
	 */
	public function user_update() {
		$id= $this->input->post ( 'id' );
		$username = $this->input->post ( 'username' );
		$password= $this->input->post ( 'password' );
		$email= $this->input->post ( 'email' );
		$data=array(
				'username'=>$username,
				'password'=>$password,
				'email'=>$email
		);
		$this->load->model ( 'admin/user/UserModel', 'user' );
		$data = $this->user->get_edit( $id,$data);
		echo $data;
	}
	
	/**
	 * 更新视图
	 */
	public function edit() {
		$id=$this->uri->segment(5);
		$this->load->model ( 'admin/user/UserModel', 'user' );
		$admin = $this->user->get_user_byId( $id );
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/user/edit' ,$admin);		
	}	

		
}

?>