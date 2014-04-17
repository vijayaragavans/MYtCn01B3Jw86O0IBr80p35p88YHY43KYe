<?php	 		 	
/**
 * The Country model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     libraries/core/sh_country.php
 *
 */
 
class Country_Model extends CI_Model
{
 
	 public $_dataMap = ''; 
	 
    
    
    function Top_Country( $placeholder, $api_key, $start_dt, $end_dt )
    {
    	
    	$this->db->select(" count(traffic_id) as count_of_hits, user_country ");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key'=>$api_key, 'traffic.user_country !='=>'' ));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        $this->db->group_by('traffic.user_country');
        $this->db->order_by('count_of_hits', DESC);
        
        ($placeholder == 1) ? $this->db->limit(1) : $this->db->limit('1','1');
        
        $query = $this->db->get();
        
		$db_results = $query->result_array();	
		
		 if (count($db_results) > 0 )
        {   
        	return $db_results[0];
        } else {
        	 return false;
        } 
    	
    }
    
	 
        
}
/* End of file users_model.php */
?>