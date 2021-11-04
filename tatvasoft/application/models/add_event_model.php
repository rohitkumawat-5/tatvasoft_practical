<?php
class Add_event_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function add_event($data)
    {
    	$res=$this->db->insert('events',$data);
    	return $res;
    }

    public function update_event($data,$id)
    {
    	$res=$this->db->update('events',$data);
    	$this->db->where('id',$id);
    	return $res;
    }

    public function delete_event($id)
    {
    	$res=$this->db->delete('events', array('id' => $id));
    	
    	return $res;
    }

    public function show_event($id='')
    {
    	$this->db->select('*');
    	$this->db->from('events');
    	if(!empty($id))
    	{
    		$this->db->where('id',$id);
    		$data=$this->db->get()->row_array();
    	}
    	else
    	{
    		$data=$this->db->get()->result_array();
    	}
    	
    	return $data;
    }

}