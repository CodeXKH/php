<?php 
	/**
	 * 查询用户登录模型
	 * @author XiaoKeHao
	 *
	 */
	class LoginModel extends CI_Model{
		public  function get_user($name,$password){
			$query = $this->db->get_where('admin', array('username' => $name,'password'=>$password))->num_rows();      //返回查询的行数;
			//echo $this->db->last_query();
			return $query;
		}
	}
?>