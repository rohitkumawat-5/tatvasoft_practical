<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->data = array();
        $this->load->model('LoginUser');
        $this->load->model('product');
        
		
    }

	public function user_login()
	{
		if ($this->session->userdata('username')) {
			redirect('Login/dashbord');
		}
		$this->load->view('include/header');
		$this->load->view('login');
		$this->load->view('include/footer');
	}

	public function user_register()
	{
		if ($this->session->userdata('username')) {
			redirect('Login/dashbord');

		}
		$this->load->view('include/header');
		$this->load->view('register');
		$this->load->view('include/footer');
	}

	public function do_login()
	{
		$username=$this->input->post('username');
	    $password=$this->input->post('password');
	    $login=$this->LoginUser->login($username,$password);
	    if($login>0)
	    {
	    	$this->session->set_userdata('username', $username);
	    	if ($this->session->userdata('username')) {
               $response=array('success'=>'1');
               echo json_encode($response);
            }
	    }
	    else
	    {
	    	$response=array('success'=>'0');
            echo json_encode($response);
	    }
	}

	public function do_register()
	{

		$username = $this->input->post('username');
	    $password = $this->input->post('password');
	    $mobile_no= $this->input->post('mobile_no');
	    $name     = $this->input->post('name');

	    $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('profile'))
        {
                $error = array('status' => $this->upload->display_errors());
                echo json_encode($error);
        		exit;
                
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $profile=$data['upload_data']['file_name'];
        }

        $mobileNo_row=$this->LoginUser->check_mobileNo_exist($mobile_no);
        if($mobileNo_row>0)
        {
        	$response=array('status'=>'This Mobile Number Is Already Use');
        	echo json_encode($response);
        	exit;
        }

        $username_row=$this->LoginUser->check_username_exist($username);
        if($username_row>0)
        {
        	$response=array('status'=>'This Username Is Not Available');
        	echo json_encode($response);
        	exit;
        }

        $user_data=array('name'=>$name,'username'=>$username,'password'=>$password,'mobile_no'=>$mobile_no,'profile'=>$profile);
        $res=$this->LoginUser->register_user($user_data);
        if($res==true)
        {
        	$response=array('status'=>'User Register Successfully');
        	echo json_encode($response);
        	exit;
        }
        else
        {
        	$response=array('status'=>'User Not Register');
        	echo json_encode($response);
        	exit;
        }
	    
	}

	public function dashbord()
	{
		if (!$this->session->userdata('username')) {
			redirect('Login/user_login');
		}
		$this->load->view('include/header');
		$this->load->view('dashbord');
		$this->load->view('include/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		if (!$this->session->userdata('username')) {
			redirect('Login/user_login');
		}
	}

	public function add_product()
	{
		if (!$this->session->userdata('username')) {
			redirect('Login/user_login');
		}

		$category=$this->product->get_product_category();
		$sub_category=$this->product->get_product_sub_category();
		$data=array('category'=>$category,'sub_category'=>$sub_category);
		$this->load->view('include/header');
		$this->load->view('add_product',$data);
		$this->load->view('include/footer');
	}

}

?>