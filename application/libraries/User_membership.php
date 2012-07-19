<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_membership
{
	var $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library('session');
		
	}//function
	
	
	/** 
	 * Creates a new user
	 *
	 * @access	public
	 * @param	array   $user_data  Array with user data such as firstname,lastname,username,userpass,email
	 * @return  mixed	An array containing two elements error (1 or 0) and user_id
	 */
	function create_user($user_data=array())
	{
		$result_user=array();
		$result_user['error']=1;
		$result_user['user_id']=0;
		
		if(count($user_data)>0)
		{
			$found_user=$this->find_username($user_data['username']);
			if(!$found_user)
			{		
				$this->CI->db->trans_start();
				$result=$this->CI->db->insert('app_users',$user_data);

				$query = $this->CI->db->query('SELECT LAST_INSERT_ID()');
				$row = $query->row_array();
				$user_id=$row['LAST_INSERT_ID()'];

				//create profile
				$data=array();
				$data['user_id']=$user_id;
				$data['address']='';
				$data['city']='';
				$data['state']='';
				$data['phone']='';
				$data['mobile']='';
				
				$result=$this->CI->db->insert('app_profile',$data);
				
				$this->CI->db->trans_complete();			
			}
		}
		
		return $result_user;
		
	
	}//function
	
	
	/** 
	 * Get the user profile
	 *
	 * @access	public
	 * @param	integer $user_id
	 * @return  object	Object with user data
	 */
	function get_profile($user_id=0)
	{
		$query=$this->CI->db->get_where('app_profile',array('user_id'=>$user_id));
		$result=$query->result();
		
		return $result;
	}
	
	/** 
	 * Updates existing user
	 *
	 * @access	public
	 * @param   $user_id
	 * @param	array   $user_data  Array with user data such as firstname,lastname,username,userpass,email
	 * @return mixed	false if error or update result
	 */
	function update_user($user_id=0,$user_data=array())
	{
		if(!empty($user_id) && count($user_data)>0)
		{
			$found_user=$this->find_username($user_data['username']);
		
			if($found_user)
			{		
				$this->CI->db->where('id', $user_id);
				$result=$this->CI->db->update('app_users',$user_data);
			
				return $result;
			}
		}
		
		return false;
		
	
	}//function
	
	/** 
	 * Updates user profile
	 *
	 * @access	public
	 * @param   $user_id
	 * @param	array   $user_data  Array with user data such as firstname,lastname,username,userpass,email
	 * @return mixed	false if error or update result
	 */
	function update_profile($user_id=0,$user_data=array())
	{
		if(!empty($user_id) && count($user_data)>0)
		{			
			$this->CI->db->where('user_id', $user_id);
			$result=$this->CI->db->update('app_profile',$user_data);
			
			return $result;
		}
		
		return false;
		
	
	}//function
	
	/** 
	 * Delete User
	 *
	 * @access public
	 * @param  string	$user_id
	 * @return boolean
	 */
	function delete_user($user_id=0)
	{		
		if(!empty($user_id))
		{	
			$this->CI->db->where('id', $user_id);
			$result=$this->CI->db->delete('app_users');
				
			return $result;
		}
		
		return false;
		
	}//function 
	
	
	/** 
	 * Gets User list
	 *
	 * @access public
	 * @return array
	 */
	function get_users()
	{
		$this->CI->db->order_by('id','asc');
		$query=$this->CI->db->get('app_users');
		return $query->result();
	}//function
	
	
	/** 
	 * Finds a Username
	 *
	 * @access public
	 * @param string $username  User Username
	 * @return boolean
	 */
	function find_username($username='')
	{
		$query=$this->CI->db->get_where('app_users',array('username'=>$username));
		$result=$query->result();
		
		if($query->num_rows() > 0)
		{
			return $result;
		}
		
		return false;
	}//function
	
	/** 
	 * Get user data
	 *
	 * @access public
	 * @param  int
	 * @return object
	 */
	function get_user($user_id=0)
	{
		$query=$this->CI->db->get_where('app_users',array('id'=>$user_id));
		$result=$query->result();
		
		return $result;
		
	}//function
	
	/** 
	 * Get role
	 *
	 * @access public
	 * @param  int
	 * @return object
	 */
	function get_role($role_id=0)
	{
		$query=$this->CI->db->get_where('app_roles',array('id'=>$role_id));
		$result=$query->result();
		
		return $result;
		
	}//function
	
	
	/** 
	 * Finds a Role
	 *
	 * @access public
	 * @param  string $rolename  Role name
	 * @return boolean
	 */
	function find_role($rolename='')
	{
		$query=$this->CI->db->get_where('app_roles',array('name'=>$rolename));
		$result=$query->result();
		
		if($query->num_rows() > 0)
		{
			return $result;
		}
		
		return false;
	}//function	
	
	/** 
	 * Creates a Role
	 *
	 * @access public
	 * @param string $rolename  Role name
	 * @return nothing
	 */
	function create_role($rolename='')
	{
		if(!empty($rolename))
		{
			$data=array();
			$data['name']=$rolename;
		
			$found_role=$this->find_role($rolename);
		
			if(!$found_role)
			{		
				$result=$this->CI->db->insert('app_roles',$data);
			}
		}
	}//function
	
	/** 
	 * Updates existing role
	 *
	 * @access	public
	 * @param   $role_id
	 * @param	array   $role_data
	 * @return mixed	false if error or update result
	 */
	function update_role($role_id=0,$role_data=array())
	{
		if(!empty($role_id) && count($role_data)>0)
		{
			$found_role=$this->get_role($role_id);
		
			if($found_role)
			{		
				$this->CI->db->where('id', $role_id);
				$result=$this->CI->db->update('app_roles',$role_data);
			
				return $result;
			}
		}
		
		return false;
		
	
	}//function
	
	
	/** 
	 * Finds User-Role Assignment
	 *
	 * @access public
	 * @param  integer $user_id  User ID
	 * @param  integer $role_id  Role ID
	 * @return boolean
	 */
	 function find_role_assignment($user_id=0,$role_id=0)
	 {
	 	if(!empty($user_id) && !empty($role_id))
	 	{
	 		
	 		$query=$this->CI->db->get_where('app_user_roles',array('user_id'=>$user_id,'role_id'=>$role_id));
			$result=$query->result();
		
			if($query->num_rows() > 0)
			{ 
				return $result;
			}
		 }
	 	
	 	return false;
	 }
	
	/** 
	 * Adds a User to existing Role
	 *
	 * @access public
	 * @param  string $rolename  Role name
	 * @return boolean
	 */
	 function add_user_to_role_with_username($username='',$rolename='')
	 {
	 	if(!empty($rolename) && !empty($username))
		{
			$role_obj=$this->find_role($rolename);
			$user_obj=$this->find_username($username);
			if($role_obj && $user_obj)
			{
				$role_id=$role_obj[0]->id;
				$user_id=$user_obj[0]->id;
				$found_assignment=$this->find_role_assignment($user_id,$role_id);
				if(!$found_assignment)
				{
					$data=array();
					$data['user_id']=$user_id;
					$data['role_id']=$role_id;
					$result=$this->CI->db->insert('app_user_roles',$data);
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
		return true;
	 }//function
	
	/** 
	 * Adds a User to existing Role
	 *
	 * @access public
	 * @param  int		$user_id
	 * @param  int		$role_id
	 * @return boolean
	 */
	 function add_user_to_role_with_id($user_id=0,$role_id=0)
	 {
	 	if(!empty($user_id) && !empty($role_id))
		{
			$found_assignment=$this->find_role_assignment($user_id,$role_id);
			if(!$found_assignment)
			{
				$data=array();
				$data['user_id']=$user_id;
				$data['role_id']=$role_id;
				$result=$this->CI->db->insert('app_user_roles',$data);
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}

		return true;
	 }//function
	 
	 /** 
	 * Get the roles list
	 *
	 * @access public
	 * @return array
	 */
	 function get_roles()
	 {	
	 	$this->CI->db->order_by('id','asc');
 		$query=$this->CI->db->get('app_roles');
		$result=$query->result();
			 
		return $result; 
	 }
	
	/** 
	 * Delete Role
	 *
	 * @access public
	 * @param  int		$role_id
	 * @return boolean
	 */
	function delete_role($role_id=0)
	{		
		if(!empty($role_id))
		{	
			$this->CI->db->where('id', $role_id);
			$result=$this->CI->db->delete('app_roles');

			return $result;
		}

		return false;

	}//function
	 
	 
	/** 
	 * Return User Roles
	 *
	 * @access public
	 * @param  string $username  Username
	 * @return array
	 */
	 function get_user_roles_by_username($username='')
	 {
	 	if(!empty($username))
	 	{
	 		$user_obj=$this->find_role_username($username);
	 		if($user_obj)
	 		{
	 			$user_id=$user_obj[0]->id;
	 			
	 			$this->CI->db->select('app_user_roles.id,app_roles.id as role_id,app_roles.name');
	 			$this->CI->db->from('app_roles');
	 			$this->CI->db->join('app_user_roles','app_roles.id=app_user_roles.role_id','inner');
	 			$this->CI->db->where('app_user_roles.user_id',$user_id);	 			
	 			$query=$this->CI->db->get();
				$result=$query->result();
		
				if($query->num_rows() > 0)
				{
					return $result;
				}
	 			
	 		}
	 		else
			{
	 			return false;
	 		}
	 	}
	 	
	 	return false;
	 }//function
	
	
	/** 
	 * Return User Roles
	 *
	 * @access public
	 * @param  int $user_id
	 * @return array
	 */
	 function get_user_roles_by_id($user_id=0)
	 {
	 	if(!empty($user_id))
	 	{

	 		$this->CI->db->select('app_user_roles.id,app_roles.id as role_id,app_roles.name');
 			$this->CI->db->from('app_roles');
 			$this->CI->db->join('app_user_roles','app_roles.id=app_user_roles.role_id','inner');
 			$this->CI->db->where('app_user_roles.user_id',$user_id);	 			
 			$query=$this->CI->db->get();
			$result=$query->result();

			if($query->num_rows() > 0)
			{ 
				return $result;
			}
	 		else{
	 			return false;
	 		}
	 	}

	 	return false;
	 }//function
	 
	 
	 /** 
	 * Return If User has a Role
	 *
	 * @access public
	 * @param  int		$user_id
	 * @param  string	$rolename
	 * @return boolean
	 */
	 function user_has_role($user_id=0,$rolename='')
	 {
	 	if(!empty($user_id) && !empty($rolename))
	 	{
	 		$role_obj=$this->find_role($rolename);
			if($role_obj)
			{
				$role_id=$role_obj[0]->id;
	 			return $this->find_role_assignment($user_id,$role_id);
	 		}
	 	}
	 	
	 	return false;
	 }//function
	 
	 /** 
	 * Removes role from user
	 *
	 * @access public
	 * @param  int		$user_id
	 * @param  int		$role_id
	 * @return boolean
	 */
	 function remove_user_role($user_id=0,$role_id=0)
	 {
	 	if(!empty($user_id) && !empty($role_id))
	 	{
 			$this->CI->db->where('user_id', $user_id);
 			$this->CI->db->where('role_id', $role_id);
			$result=$this->CI->db->delete('app_user_roles');
			
			return $result;
	 	}
	 	
	 	return false;
	 }//function
	 
	
	 /** 
	 * Authenticates User and creates session vars
	 *
	 * @param string $username  User name
	 * @param string $password  User password
	 * @return Boolean
	 * @access public
	 */
	 function authenticate($username='',$password='')
	 {
	 	if(!empty($username) && !empty($password))
	 	{
	 		/* Debug
			$this->CI->db->_compile_select(); 
			*/
	 		
	 		$this->CI->db->where('username', $username);
	 		$this->CI->db->where('password', md5($password));
	 		
	 		$query=$this->CI->db->get('app_users');
			$result=$query->result();
			
			/* Debug
			echo $this->CI->db->last_query();
			*/
		
			if($query->num_rows() > 0)
			{
				$ses_array=array();
				$ses_array['app_membership_id']=$result[0]->id;
				$ses_array['app_membership_email']=$result[0]->email;
				$ses_array['app_membership_username']=$result[0]->username;
				$ses_array['app_membership_name']=$result[0]->firstname.' '.$result[0]->lastname;
					
				$this->CI->session->set_userdata($ses_array);
				
				return true; 
			}
	 		
	 	}
	 	return false;
	 
	 }//function
	 
	
	/** 
	 * Logouts User
	 *
	 * @access public
	 * @return void
	 */	 
	 function logout_user()
	 {
	 	$this->CI->session->sess_destroy();
	 }//function
	 	
}//class

/* End of file User_membership.php */
/* Location: ./application/libraries/User_membership.php */
?>