
<?php
/**
 * 后台部门管理主控制器
 * @author XiaoKeHao
 *
 */
class Main extends My_Controller {
	/**
	 * 加载部门列表，默认显示10条
	 */
	public function index() {
		$name= urldecode($this->uri->segment(5));
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$list ['depart'] = $this->depart->get_depart ($name);
		$list ['count'] = $this->depart->get_count ($name);
		//echo  urldecode($name);
		$list ['name'] = $name;
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/depart/index', $list );
	}
	
	/**
	 * 根据选择分页数，加载部门
	 */
	public function depart_page() {
		$pagenumber = $this->input->post ( 'pagenumber' );
		$name= $this->input->post ( 'name' );
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$list = $this->depart->get_page ( $pagenumber,$name);
		echo json_encode ( $list );
	}
	
	
	/**
	 * 加载添加部门视图
	 */
	public function add() {
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/depart/add' );
	}
	
	/**
	 * 添加部门
	 */
	public function depart_add() {
		$name = $this->input->post ( 'name' );
		$data = array (
				'name' => $name
		);
		
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		
		$exist = $this->depart->get_depart_exist ( $name);
		if ($exist > 0) {
			echo 2; // 部门存在
		} else {
		$data = $this->depart->get_add ( $data );
			if ($data > 0) {
				echo 1; // 添加成功;
			} else {
				echo 0; // 添加失败;
			}
		} 
	}
	
	/**
	 * 根据id删除部门
	 */
	public function depart_delete() {
		$id = $this->input->post ( 'id' );
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$data = $this->depart->get_delete ( $id );
		echo $data;
	}
	
	/**
	 * 根据id更新部门
	 */
	public function depart_update() {
		$id= $this->input->post ( 'id' );
		$name = $this->input->post ( 'name' );
		$data=array(
				'name'=>$name
		);
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$data = $this->depart->get_edit( $id,$data);
		echo $data;
	}
	
	/**
	 * 更新视图
	 */
	public function edit() {
		$id=$this->uri->segment(5);
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$admin = $this->depart->get_depart_byId( $id );
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/depart/edit' ,$admin);		
	}	
	
	/**
	 * 查询部门实体
	 */
	public function depart_select() {
		$id = $this->input->post ( 'id' );
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$depart = $this->depart->get_depart_byId( $id );
		echo json_encode ( $depart);
	}	
		
}

?>