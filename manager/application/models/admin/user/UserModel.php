<?php
/**
 * 用户信息模型
 * @author XiaoKeHao
 *
 */
class UserModel extends CI_Model {
	
	
	/**
	 * 加载用户列表，显示前十条
	 */
	public function get_user($username) {
		if (empty($username)) {
			$res=$this->db->select()
			->from('admin')
			->limit(10,0)  //和sql语句的limit数字是相反的。
			->order_by('id desc')
			->get()
			->result();
			return $res;
		}
		$res=$this->db->select()
		 ->from('admin')
		 ->like('username', $username)
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
	public function get_count($username) {
		if (empty($username)) {
			$query = $this->db->query("SELECT * FROM	admin ");
		}else{
			$query = $this->db->query ( "SELECT * FROM	admin  WHERE username LIKE '%".$username."%'");
		}
		$count = $query->num_rows ();
		return ceil ( $count / 10 );
	}
	
	/**
	 * 根据分页加载用户
	 */
	public function get_page($pagenumber,$username) {
		if (empty($username)){
			$res=$this->db->select()
			->from('admin')
			->limit(10,($pagenumber-1)*10)  //和sql语句的limit数字是相反的。
			->order_by('id desc')
			->get()
			->result();
			return $res;
		}
		$res=$this->db->select()
		->from('admin')
		->like('username', $username)
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
		$del=$this->db->delete('admin',array('id'=>$id)); 	
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
		$res=$this->db->insert('admin',$data);
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
		$res=$this->db->update('admin',$data,array('id'=>$id));
		if ($res) {
			return 1;
		}else{
			return 2;
		}
	}
	
	/**
	 * 根据id查询用户
	 */
	public function get_user_byId($id) {
		$query = $this->db->get_where('admin', array('id' => $id));
		$row = $query->row();
		return $row;
	}
		
	
	/**
	 * 判断用户是否存在
	 */
	public function get_user_exist($username) {
		$count=$this->db->get_where('admin', array('username'=>$username))->num_rows();
		return $count;
	}
	
}

?>