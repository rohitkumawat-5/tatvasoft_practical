<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('add_event_model');
    }

    public function add_event($id='')
    {
    	$data=array();
    	if(!empty($id))
    	{

    		$data['data']=$this->add_event_model->show_event($id);

    	}
    	$this->load->view('include/header');
    	$this->load->view('add_event',$data);
    	$this->load->view('include/footer');
    }

    public function add_event_data()
    {
    	
    	$event_title=$this->input->post('event_title');
    	$start_date=$this->input->post('start_date');
    	$end_date=$this->input->post('end_date');
    	$recurence_1=$this->input->post('recurence_1');
    	$recurence_2=$this->input->post('recurence_2');
    	if(empty($event_title))
    	{
    		$event_title_error=array('msg'=>'Please Enter Title of Event');
    		echo json_encode($event_title_error);
    		exit;
    	}

    	if(empty($start_date))
    	{
    		$start_date_error=array('msg'=>'Please Select Event Start Date');
    		echo json_encode($start_date_error);
    		exit;
    	}

    	if(empty($end_date))
    	{
    		$end_date_error=array('msg'=>'Please Select Event End Date');
    		echo json_encode($end_date_error);
    		exit;
    	}

    	if(empty($recurence_1))
    	{
    		$recurence_1_error=array('msg'=>'Please Select Recurence !');
    		echo json_encode($recurence_1_error);
    		exit;
    	}

    	if(empty($recurence_2))
    	{
    		$recurence_2_error=array('msg'=>'Please Select Recurence !');
    		echo json_encode($recurence_2_error);
    		exit;
    	}

    	$startDate=date('Y-m-d',strtotime($start_date));
    	$endDate=date('Y-m-d',strtotime($end_date));
    	$data=array('event_title'=>$event_title,'start_date'=>$startDate,'end_date'=>$endDate,'recurence_1'=>$recurence_1,'recurence_2'=>$recurence_2);

    	$res=$this->add_event_model->add_event($data);
    		if($res==true)
	    	{
	    		$response=array('msg'=>'Event Added');
	    		echo json_encode($response);
	    		exit;
	    	}
	    	else
	    	{
	    		$response=array('msg'=>'Event Not Added');
	    		echo json_encode($response);
	    		exit;
	    	}
    	
    	
    	



    }

    public function show_event()
    {
    	$data['data']=$this->add_event_model->show_event();

    	$this->load->view('include/header');
    	$this->load->view('show_event',$data);
    	$this->load->view('include/footer');
    }

    public function update_event($id)
    {
    	
    	$this->add_event($id);
    }

    public function delete_event($id)
    {
    	$res=$this->add_event_model->delete_event($id);
    	if($res==true)
    	{
    		$this->show_event();
    	}
    }

    public function view_event($id)
    {
    	$data['data']=$this->add_event_model->show_event($id);
    	$this->load->view('veiw_event',$data);
    }

    public function update_event_data()
    {
    	$event_title=$this->input->post('event_title');
    	$start_date=$this->input->post('start_date');
    	$end_date=$this->input->post('end_date');
    	$recurence_1=$this->input->post('recurence_1');
    	$recurence_2=$this->input->post('recurence_2');
    	if(empty($event_title))
    	{
    		$event_title_error=array('msg'=>'Please Enter Title of Event');
    		echo json_encode($event_title_error);
    		exit;
    	}

    	if(empty($start_date))
    	{
    		$start_date_error=array('msg'=>'Please Select Event Start Date');
    		echo json_encode($start_date_error);
    		exit;
    	}

    	if(empty($end_date))
    	{
    		$end_date_error=array('msg'=>'Please Select Event End Date');
    		echo json_encode($end_date_error);
    		exit;
    	}

    	if(empty($recurence_1))
    	{
    		$recurence_1_error=array('msg'=>'Please Select Recurence !');
    		echo json_encode($recurence_1_error);
    		exit;
    	}

    	if(empty($recurence_2))
    	{
    		$recurence_2_error=array('msg'=>'Please Select Recurence !');
    		echo json_encode($recurence_2_error);
    		exit;
    	}

    	$startDate=date('Y-m-d',strtotime($start_date));
    	$endDate=date('Y-m-d',strtotime($end_date));
    	$data=array('event_title'=>$event_title,'start_date'=>$startDate,'end_date'=>$endDate,'recurence_1'=>$recurence_1,'recurence_2'=>$recurence_2);

    		$id=$this->input->post('id');
    		
    		$res=$this->add_event_model->update_event($data,$id);
    		if($res==true)
	    	{
	    		$response=array('msg'=>'Event Updated');
	    		echo json_encode($response);
	    		exit;
	    	}
	    	else
	    	{
	    		$response=array('msg'=>'Event Not Updated');
	    		echo json_encode($response);
	    		exit;
	    	}
    	
    	
    }

}

?>