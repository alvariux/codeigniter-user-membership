<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('membership/index');
	}
	
	public function login()
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post('sent');
		if(!empty($sent))
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$result=$this->user_membership->authenticate($username,$password);
			
			if($result)
			{
				redirect('membership/index');
			}
			else
			{
				redirect('membership/login');
			}
		}
		
		$this->load->view('membership/login');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('membership/index');
	}
	
	public function users()
	{
		$this->load->library('User_membership');
		
		$data=array();
		
		$data['user_list']=$this->user_membership->get_users();
		
		$this->load->view('membership/user_list',$data);
	}
	
	public function add_user()
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post('sent');
		if(!empty($sent))
		{
			$data=array();
			$data['firstname']=$this->input->post('firstname');
			$data['lastname']=$this->input->post('lastname');
			$data['username']=$this->input->post('username');
			$data['password']=$this->input->post('password');
			$data['email']=$this->input->post('email');
			
			$this->user_membership->create_user($data);
			
			redirect('membership/users');
		}
		
		$this->load->view('membership/user_add');
	}
	
	public function edit_user($user_id=0)
	{
		$this->load->library('User_membership');
		if(!empty($user_id))
		{	
			$data=array();
			$data['user_data']=$this->user_membership->get_user($user_id);
			$this->load->view('membership/user_edit',$data);
		}
	}
	
	public function save_user()
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post("sent");
		$user_id=$this->input->post("user_id");
		
		if(!empty($sent) && !empty($user_id))
		{
			$user_data=array();
			$user_data['firstname']=$this->input->post('firstname');
			$user_data['lastname']=$this->input->post('lastname');
			$user_data['username']=$this->input->post('username');
			$user_data['email']=$this->input->post('email');
			
			$this->user_membership->update_user($user_id,$user_data);
		}
		
		redirect('membership/users');
	}
	
	public function change_password($user_id)
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post('sent');
		if(!empty($sent))
		{
			$user_id=$this->input->post('user_id');
			$user_data=array();
			$user_data['password']=$this->input->post('password');

			$this->user_membership->update_user($user_id,$user_data);
			
			redirect('membership/users');
		}
		else if(!empty($user_id))
		{	
			$data=array();
			$data['user_data']=$this->user_membership->get_user($user_id);
			$this->load->view('membership/change_password',$data);
		}
	}
	
	public function delete_user($user_id)
	{
		$this->load->library('User_membership');
		if(!empty($user_id))
		{
			$this->user_membership->delete_user($user_id);
		}
		
		redirect('membership/users');
	}
	
	public function profile_user($user_id)
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post('sent');
		if(!empty($sent))
		{
			$user_id=$this->input->post('user_id');
			$user_data=array();
			$user_data['address']=$this->input->post('address');
			$user_data['city']=$this->input->post('city');
			$user_data['state']=$this->input->post('state');
			$user_data['phone']=$this->input->post('phone');
			$user_data['mobile']=$this->input->post('mobile');

			$this->user_membership->update_profile($user_id,$user_data);
			
			redirect('membership/users');
		}
		else if(!empty($user_id))
		{	
			$data=array();
			$data['user_profile']=$this->user_membership->get_profile($user_id);
			$this->load->view('membership/user_profile',$data);
		}
		
		
	}
	
	public function profile()
	{
		$this->load->library('User_membership');
		
		$user_id=$this->session->userdata('app_membership_id');
		if(!empty($user_id))
		{
			$data=array();
			$data['user_profile']=$this->user_membership->get_profile($user_id);
			$this->load->view('membership/view_profile',$data);
		}
	}
	
	public function admin_page()
	{
		$this->load->library('User_membership');
		
		$user_id=$this->session->userdata('app_membership_id');
		$data=array();
		$data['message']='';
		
		if($this->user_membership->user_has_role($user_id,'admin'))
		{
			$data['message']='Welcome admin user';
		}
		else{
			$data['message']='You do not have the admin role';
		}
		
		$this->load->view('membership/error',$data);
		
	}
	
	public function user_page()
	{
		$this->load->library('User_membership');
		
		$user_id=$this->session->userdata('app_membership_id');
		$data=array();
		$data['message']='';
		
		if($this->user_membership->user_has_role($user_id,'user'))
		{
			$data['message']='Welcome user';
		}
		else{
			$data['message']='You do not have the user role';
		}
		
		$this->load->view('membership/error',$data);
		
	}
	
	public function roles()
	{
		$this->load->library('User_membership');
		
		$data=array();
		
		$data['roles_list']=$this->user_membership->get_roles();
		
		$this->load->view('membership/roles_list',$data);
	}
	
	public function add_role()
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post('sent');
		if(!empty($sent))
		{
			
			$rolename=$this->input->post('name');
			
			$this->user_membership->create_role($rolename);
			
			redirect('membership/roles');
		}
		
		$this->load->view('membership/role_add');
	}
	
	public function edit_role($role_id=0)
	{
		$this->load->library('User_membership');
		if(!empty($role_id))
		{	
			$data=array();
			$data['role_data']=$this->user_membership->get_role($role_id);
			$this->load->view('membership/role_edit',$data);
		}
	}
	
	public function save_role()
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post("sent");
		$role_id=$this->input->post("role_id");
		
		if(!empty($sent) && !empty($role_id))
		{
			$role_data=array();
			$role_data['name']=$this->input->post('name');
			
			
			$this->user_membership->update_role($role_id,$role_data);
		}
		
		redirect('membership/roles');
	}
	
	public function delete_role($role_id)
	{
		$this->load->library('User_membership');
		if(!empty($role_id))
		{
			$this->user_membership->delete_role($role_id);
		}
		
		redirect('membership/roles');
	}
	
	public function user_roles()
	{
		$this->load->library('User_membership');
		$user_id=$this->session->userdata('app_membership_id');
		
		if(!empty($user_id))
		{
			$data=array();
			$data['user_data']=$this->user_membership->get_user($user_id);
			$data['user_roles']=$this->user_membership->get_user_roles_by_id($user_id);
			$data['role_list']=$this->user_membership->get_roles();
			
			$this->load->view('membership/user_roles',$data);
		}
	}
	
	public function add_user_role()
	{
		$this->load->library('User_membership');
		
		$sent=$this->input->post('sent');
		if(!empty($sent))
		{
			$user_id=$this->input->post('user_id');
			$role_id=$this->input->post('role_id');
			
			$this->user_membership->add_user_to_role_with_id($user_id,$role_id);
			
			redirect('membership/user_roles/'.$user_id);
		}
		
		redirect('membership/index');
	}
	
	public function delete_user_role($user_id=0,$role_id=0)
	{
		$this->load->library('User_membership');
		
		if(!empty($user_id) && !empty($role_id))
		{
			$this->user_membership->remove_user_role($user_id,$role_id);
			
			redirect('membership/user_roles/'.$user_id);
		}
		
		redirect('membership/index');
	}
}

/* End of file membership.php */
/* Location: ./application/controllers/membership.php */