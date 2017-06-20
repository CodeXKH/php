
<?php
/**
 * 后台采购管理主控制器
 * @author XiaoKeHao
 *
 */
class Main extends My_Controller {
	/**
	 * 加载采购列表，默认显示10条
	 */
	public function index() {
		$people= urldecode($this->uri->segment(5));
		$this->load->model ( 'admin/info/InfoModel', 'info' );
		$list ['info'] = $this->info->get_info ($people);
		$list ['count'] = $this->info->get_count ($people);
		//echo  urldecode($people);
		$list ['people'] = $people;
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/info/index', $list );
	}
	
	/**
	 * 根据选择分页数，加载采购
	 */
	public function info_page() {
		$pagenumber = $this->input->post ( 'pagenumber' );
		$people= $this->input->post ( 'people' );
		$this->load->model ( 'admin/info/InfoModel', 'info' );
		$list = $this->info->get_page ( $pagenumber,$people);
		echo json_encode ( $list );
	}
	
	
	/**
	 * 加载添加采购视图
	 */
	public function add() {
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$name=null;
		$list ['depart'] = $this->depart->get_depart( $name);
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/info/add' ,$list);
	}
	
	/**
	 * 添加采购
	 */
	public function info_add() {
		$people= $this->input->post ( 'people' );
		$departId= $this->input->post ( 'departId' );
		$createTime= $this->input->post ( 'createTime' );
		$price= $this->input->post ( 'price' );
		$detail= $this->input->post ( 'detail' );
	
		$data = array (
				'people' => $people,
				'departId' => $departId,
				'createTime' => $createTime,
				'price' => $price,
				'detail' => $detail
		);
		$this->load->model ( 'admin/info/InfoModel', 'info' );
		$data = $this->info->get_add ( $data );
		if ($data > 0) {
			echo 1; // 添加成功;
		} else {
			echo 0; // 添加失败;
		}
	}
	
	/**
	 * 根据id删除采购
	 */
	public function info_delete() {
		$id = $this->input->post ( 'id' );
		$this->load->model ( 'admin/info/InfoModel', 'info' );
		$data = $this->info->get_delete ( $id );
		echo $data;
	}
	
	/**
	 * 根据id更新采购
	 */
	public function info_update() {
		$id= $this->input->post ( 'id' );
		$people= $this->input->post ( 'people' );
		$departId= $this->input->post ( 'departId' );
		$createTime= $this->input->post ( 'createTime' );
		$price= $this->input->post ( 'price' );
		$detail= $this->input->post ( 'detail' );
		
		$data = array (
				'people' => $people,
				'departId' => $departId,
				'createTime' => $createTime,
				'price' => $price,
				'detail' => $detail
		);
		
		$this->load->model ( 'admin/info/InfoModel', 'info' );
		$data = $this->info->get_edit( $id,$data);
		echo $data;
	}
	
	/**
	 * 更新视图
	 */
	public function edit() {
		$id=$this->uri->segment(5);
		$this->load->model ( 'admin/info/InfoModel', 'info' );
		$list ['info'] = $this->info->get_info_byId( $id );
		$this->load->model ( 'admin/depart/DepartModel', 'depart' );
		$name=null;
		$list ['depart'] = $this->depart->get_depart( $name);
		
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/info/edit' ,$list);		
	}	

		
}

?>