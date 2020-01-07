<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
     public function get_location($id)
    {
        $this->db->where('sno',$id);  
        $q = $this->db->get('location');
        $res = $q->row_array();
        return  $res['location_nm'];
    }
   
	
}
?>