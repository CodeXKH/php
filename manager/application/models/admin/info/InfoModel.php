<?php
/**
 * 采购模型
 * @author XiaoKeHao
 *
 */
class InfoModel extends CI_Model {
	
	
	/**
	 * 加载采购列表，显示前十条
	 */
	public function get_info($people) {
		if (empty($people)) {
			$res=$this->db->select()
			->from('info')
			->limit(10,0)  //和sql语句的limit数字是相反的。
			->order_by('id desc')
			->get()
			->result();
			return $res;
		}
		$res=$this->db->select()
		->from('info')
		->like('name', $people)
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
	public function get_count($people) {
		if (empty($people)) {
			$query = $this->db->query("SELECT * FROM	info ");
		}else{
			$query = $this->db->query ( "SELECT * FROM	info  WHERE people LIKE '%".$people."%'");
		}
		$count = $query->num_rows ();
		return ceil ( $count / 10 );
	}
	
	/**
	 * 根据分页加载用户
	 */
	public function get_page($pagenumber,$people) {
		if (empty($people)){
			$res=$this->db->select()
			->from('info')
			->limit(10,($pagenumber-1)*10)  //和sql语句的limit数字是相反的。
			->order_by('id desc')
			->get()
			->result();
			return $res;
		}
		$res=$this->db->select()
		->from('info')
		->like('name', $people)
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
		$del=$this->db->delete('info',array('id'=>$id));
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
		$res=$this->db->insert('info',$data);
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
		$res=$this->db->update('info',$data,array('id'=>$id));
		if ($res) {
			return 1;
		}else{
			return 2;
		}
	}
	
	/**
	 * 根据id查询用户
	 */
	public function get_info_byId($id) {
		$query = $this->db->get_where('info', array('id' => $id));
		$row = $query->row();
		//echo $this->db->last_query();
		return $row;
	}
	
	
}

?>