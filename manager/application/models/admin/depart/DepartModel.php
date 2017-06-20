<?php
/**
 * 部门模型
 * @author XiaoKeHao
 *
 */
class DepartModel extends CI_Model {
	
	
	/**
	 * 加载部门列表，显示前十条
	 */
	public function get_depart($name) {
		if (empty($name)) {
			$res=$this->db->select()
			->from('depart')
			->limit(10,0)  //和sql语句的limit数字是相反的。
			->order_by('id desc')
			->get()
			->result();
			return $res;
		}
		$res=$this->db->select()
		->from('depart')
		->like('name', $name)
		->limit(10,0)  //和sql语句的limit数字是相反的。
		->order_by('id desc')
		->get()
		->result();
		//echo $this->db->last_query();
		return $res;
		
	}
	
	/**
	 * 加载用户总行数
	 */
	public function get_count($name) {
		if (empty($name)) {
			$query = $this->db->query("SELECT * FROM	depart ");
		}else{
			$query = $this->db->query ( "SELECT * FROM	depart  WHERE name LIKE '%".$name."%'");
		}
		$count = $query->num_rows ();
		return ceil ( $count / 10 );
	}
	
	/**
	 * 根据分页加载用户
	 */
	public function get_page($pagenumber,$name) {
		if (empty($name)){
			$res=$this->db->select()
			->from('depart')
			->limit(10,($pagenumber-1)*10)  //和sql语句的limit数字是相反的。
			->order_by('id desc')
			->get()
			->result();
			return $res;
		}
		$res=$this->db->select()
		->from('depart')
		->like('name', $name)
		->limit(10,($pagenumber-1)*10)  //和sql语句的limit数字是相反的。
		->order_by('id desc')
		->get()
		->result();
		return $res;
	}
	
	
	/**
	 * 根据id删除用户
	 */
	public function get_delete($id) {
		$del=$this->db->delete('depart',array('id'=>$id));
		if ($del) {
			return 1;
		}else{
			return 2;
		}
	}
	
	
	/**
	 * 添加用户
	 */
	public function get_add($data) {
		$res=$this->db->insert('depart',$data);
		if ($res) {
			return 1;
		}else{
			return 2;
		}
	}
	
	
	/**
	 * 更新用户
	 */
	public function get_edit($id,$data) {
		$res=$this->db->update('depart',$data,array('id'=>$id));
		if ($res) {
			return 1;
		}else{
			return 2;
		}
	}
	
	/**
	 * 根据id查询用户
	 */
	public function get_depart_byId($id) {
		$query = $this->db->get_where('depart', array('id' => $id));
		$row = $query->row();
		//echo $this->db->last_query();
		return $row;
	}
	
	
	/**
	 * 判断用户是否存在
	 */
	public function get_depart_exist($name) {
		$count=$this->db->get_where('depart', array('name'=>$name))->num_rows();
		return $count;
	}
	
}

?>