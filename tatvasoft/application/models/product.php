<?php
class Product extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_product_category()
    {
    	$this->db->select('id,category');
    	$this->db->from('category');
    	return $this->db->get()->result_array();
	}

	public function get_product_sub_category()
	{
		$this->db->select('id,sub_category');
    	$this->db->from('sub_category');
    	return $this->db->get()->result_array();
	}
}

?>