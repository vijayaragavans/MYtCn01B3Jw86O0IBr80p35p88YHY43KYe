<?php	 		 
/**
 * The Behaviour model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     libraries/core/sh_behaviour.php
 *
 */
 
class Behaviour_Model extends CI_Model
{
 
	 public $_dataMap = ''; 
	 
    function Get_All_Tags( $user_api_key, $start_date, $end_date )
    {

        $this->db->select("distinct( actions.action_label ) as label, count(actions.action_label) as total_visits");
        $this->db->from(TOOL_DB_NAME.'.actions');
        $this->db->where(array('actions.user_api_key'=>$user_api_key, "actions.action_label !="=> '' ));        
        $this->db->where("DATE(`tag_created_on`) BETWEEN '$start_date' AND '$end_date' ");

        $this->db->group_by('actions.action_label');
        $query = $this->db->get();
        
       $db_results = $query->result_array();		 
    
        if (count($db_results) > 0 )
        { 
            return $db_results;
            
        } else {            
            return  FALSE;
        } 
    }
    
    
    function Get_Tag_Details( $type, $tag, $user_api_key )
    {
    	
    	if($type == 1)
    	{
    		
	        $this->db->select("count(distinct actions.tag_id) as total, DATE(actions.tag_created_on) as dates");
	        $this->db->from(TOOL_DB_NAME.'.actions');
	        $this->db->where(array('actions.user_api_key'=>$user_api_key, "actions.action_label" => $tag ));
		    $this->db->group_by('DATE(`tag_created_on`) ');
		    $this->db->order_by('actions.tag_created_on', 'ASC');
        
    	}
  
        $query = $this->db->get();
        
		$db_results = $query->result_array();		 
    
        if (count($db_results) > 0 )
        { 
            return $db_results;
            
        } else {            
            return  FALSE;
        } 
    }

    
    function Get_All_Browsers($api)
    {
    	
	        $this->db->select("distinct(traffic.user_browser_name) as browser_name");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
	        $this->db->where(array('traffic.user_api_key'=>$api));
	        
	        $query = $this->db->get();
	        
			$db_results = $query->result_array();
	    
	        if (count($db_results) > 0 )
	        { 
	            return $db_results;
	            
	        } else {            
	            return  FALSE;
	        } 
    }

    
    function Get_Data( $browser, $api_key )
    {
    	
    	
	        $this->db->select("*");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
	        $this->db->where(array('traffic.user_api_key'=>$api_key, "traffic.user_browser_name" => $browser));
	        
	        $query = $this->db->get();
	        
			$db_results = $query->result_array();
	    
	        if (count($db_results) > 0 )
	        { 
	            return $db_results;
	            
	        } else {            
	            return  FALSE;
	        } 
    }
    
    
    public function Get_All_Datas($api_key, $data_type)
    {
    	
    	if($data_type == ''){
    		
	        $this->db->select("actions.action_label as label, count(actions.tag_id) as visits");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
	        $this->db->join(TOOL_DB_NAME.'.actions', 'actions.traffic_id = traffic.traffic_id', 'left');	        
	        $this->db->where(array('traffic.user_api_key'=>$api_key, 'actions.user_api_key' => $api_key, 'actions.action_label !=' => ''));
	        $this->db->group_by("actions.action_label");
    	}else if($data_type){
    		
	        $this->db->select("actions.action_label as label, count(actions.tag_id) as visits");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
	        $this->db->join(TOOL_DB_NAME.'.actions', 'actions.traffic_id = traffic.traffic_id', 'left');	        
	        $this->db->where(array('traffic.user_api_key'=>$api_key, 'actions.user_api_key' => $api_key, 'actions.action_label ' => $data_type));
	        $this->db->group_by("actions.action_label");
    	}
    	
	        
	        $query = $this->db->get();
	        
			$db_results = $query->result_array();
	    
	        if (count($db_results) > 0 )
	        { 
	            return $db_results;
	            
	        } else {            
	            return  FALSE;
	        } 
    
    }
        
}
/* End of file users_model.php */
?>