<?php	 		 	
/**
 * The users model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     model/users_model.php
 *
 */
 
class Users_Model extends CI_Model
{
 
	 public $_dataMap = ''; 
    /**
     * Constructor - loads the CI database class and intiallizes the _dataMap array.
     *
     * @access public
     *
     * @return none
     */
    function Users_Model()
    {
        parent::__construct();        
       
    }
    function userLogin( $username, $password )
    {
    	
    	$this->db->select("user_id, user_name, user_unique_id, user_email, user_api_key, user_type, user_logo, user_created_on");
        $this->db->from(TOOL_DB_NAME.'.users');
        $this->db->where(array('users.user_email'=>$username, "users.user_password"=> $password, "users.user_is_active"=> '1'));
        $this->db->limit(1);
        $query = $this->db->get();
        
		$db_results = $query->result_array();	
		
		 if (count($db_results) > 0 )
        {   
        	return $db_results[0];
        } else {            
        	 return 0;
        } 
        
         
    }
 	/**
     * @method updatePassword - To change the password
     * @param string   $uid  User ID
     * @param string   $password  New Password
     * @access public
     * @return boolean
     */    
    function updatePassword($uid,$curpass,$password)
    {
    	
    	$this->db->select("tool_users.tool_user_id,password");
        $this->db->from(TOOL_DB_NAME.'.tool_users');      
        $this->db->where('tool_users.tool_user_id', $uid);        
        $query = $this->db->get();
		$db_results = $query->result();		
		
		if($db_results[0]->password != md5($curpass))
		{			
			return "-1"; 
		}
		else 
		{
		  	  	
	    	$data = array(
	               'password' => md5($password)                
	         );
			 $this->db->where('tool_users.tool_user_id', $uid);
			 $this->db->update(TOOL_DB_NAME.'.tool_users', $data);
			 return "1";
		}
    	
    }
    function registerUser($data)
    {
         //$this->db->where('tb_users.username', $username); 
	 $this->db->insert(TOOL_DB_NAME.'.users', $data);         
         //echo $this->db->last_query(); 
         //die;
	 return $this->db->insert_id(); 
        
    }
    
    
    function Check_User( $unique_id )
    {
    	
        $this->db->select("user_id, user_email");
        $this->db->from(TOOL_DB_NAME.'.users');        
        $this->db->where(array('users.user_unique_id'=>$unique_id, "users.user_is_active"=> '0'));
        $this->db->limit('1');
        
        $query = $this->db->get();
		$db_results = $query->result_array();		 
    
        if (count($db_results) > 0 )
        { 
            return $db_results[0];
            
        } else {            
            return  FALSE;
        } 
    }
    
    
    function add_user( $user_id, $data )
    {
    	
		$this->db->where('users.user_id', $user_id);
		$this->db->update(TOOL_DB_NAME.'.users', $data);    	
		
		return "1";
    	
    }


    
    function VisitorsFlow( $user_api_key, $type  )
    {
        
        if($type == 1){
        	
        	$this->db->select("DATE(traffic.data_created_on) as dates");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
        	$this->db->where(array('traffic.user_api_key '=>$user_api_key ));
	        $this->db->group_by('user_ip');
	        $this->db->order_by('traffic.data_created_on', 'DESC');	        
	        
        }else if($type == 2){

	        $this->db->select("count(traffic.user_ip) as count_of,  count( distinct traffic.user_ip ) as total, DATE(traffic.data_created_on) as dates");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
        	$this->db->where(array('traffic.user_api_key '=>$user_api_key ));
	        $this->db->group_by('DATE(`data_created_on`)');
	        $this->db->group_by('user_ip');	        
	        $this->db->having('count_of > 1');
	        $this->db->order_by('traffic.data_created_on', 'ASC');
	        $this->db->limit(6);
	        
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
    
    
    function Check_User_Availability( $user_email )
    {
    	
        $this->db->select("user_id");
        $this->db->from(TOOL_DB_NAME.'.users');
        $this->db->where(array('users.user_email '=>$user_email));
        
        $query = $this->db->get();
        
		$db_results = $query->result_array();		 
    
        if (count($db_results) > 0 )
        { 
            return $db_results[0];
            
        } else {            
            return  FALSE;
        } 
    }


    
    function Count_Unique( $user_api_key )
    {
    	
        $this->db->select("traffic_id");
	    $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key '=> $user_api_key ));
	    $this->db->group_by('traffic.user_ip');
	    
        $query = $this->db->get();
        
		$db_results = $query->result_array();		 
	    		
		
		if (count($db_results) > 0 )
        { 
            return count($db_results);
            
        } else {            
            return  FALSE;
        } 
    }
    
    
    function Count_Repeat($user_api_key, $start_dt, $end_dt, $country, $country_code  )
    {
    	
	        $this->db->select("count(traffic.user_ip) as count_of,  user_ip");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
        	$this->db->where(array('traffic.user_api_key '=>$user_api_key ));
	        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
	        
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
			$this->db->where($whare);
        }
        
	                	
        	$this->db->group_by('user_ip');	        
	        $this->db->having('count_of > 1');

	        $query = $this->db->get();
	        
			$db_results = $query->result_array();		 
	    
	        if (count($db_results) > 0 )
	        { 
	            return count($db_results);
	            
	        } else {            
	            return  FALSE;
	        } 
	        
    }
    
    
    
    function Visits( $user_api_key, $start_dt, $end_dt, $country, $country_code )
    {
    	
        $this->db->select("count(traffic.user_ip) as total, DATE(traffic.data_created_on) as dates");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key '=>$user_api_key ));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        
        /*
         * By dafault country & country code is 0
         */
        
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
			$this->db->where($whare);
        }
        
                
        $this->db->group_by(" DATE(`data_created_on`)");
	    $this->db->order_by("traffic.data_created_on", ASC);	        
	    $this->db->limit(6);
    
        $query = $this->db->get();
        
		$db_results = $query->result_array();		 
    
        if (count($db_results) > 0 )
        { 
            return $db_results;
            
        } else {            
            return  FALSE;
        } 
    
    }
    
    
    function VisitsDetails( $keyword, $user_api_key )
    {
    	
         
        if($keyword == 'unique'){

		        $this->db->select("*");
			    $this->db->from(TOOL_DB_NAME.'.traffic');
		        $this->db->where(array('traffic.user_api_key '=> $user_api_key ));
			    $this->db->group_by('traffic.user_ip');
        		        
        }else if($keyword == 'repeat'){

	        $this->db->select("*");
	        $this->db->from(TOOL_DB_NAME.'.traffic');
        	$this->db->where(array('traffic.user_api_key '=>$user_api_key ));
	        $this->db->group_by('user_ip');
	        $this->db->having('count(traffic.user_ip) > 1');
        		        
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
    
    function View_User_Details( $api_key )
    {
    	
    	$this->db->select("user_id, user_name, user_unique_id, user_email, user_api_key, user_type, user_logo, user_created_on");
        $this->db->from(TOOL_DB_NAME.'.users');
        $this->db->where(array('users.user_api_key'=>$api_key , "users.user_is_active"=> '1'));
        $this->db->limit(1);
        $query = $this->db->get();
        
		$db_results = $query->result_array();	
		
		 if (count($db_results) > 0 )
        {   
        	return $db_results[0];
        } else {            
        	 return false;
        } 
    }

    
    function Total_Visits( $api_key, $start_dt, $end_dt, $country, $country_code    )
    {
    
    	$this->db->select("count(traffic_id) as total_visits");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key'=>$api_key));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
			$this->db->where($whare);
        }
        
                
        $this->db->limit(1);
        $query = $this->db->get();
        
		$db_results = $query->result();	
		
		 if (count($db_results) > 0 )
        {   
        	return $db_results[0];
        } else {            
        	 return false;
        } 
    }
    
    
    function Unique_Visits( $api_key, $start_dt, $end_dt, $country, $country_code    )
    {
    	$this->db->select("count(1) as unique_visits");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key'=>$api_key));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
			$this->db->where($whare);
        }
        
                
        $this->db->group_by('traffic.user_ip');
        $query = $this->db->get();
        
		$db_results = $query->result();	
		
		 if (count($db_results) > 0 )
        {   
        	return $db_results;
        } else {
        	 return false;
        } 
    
    }
    
    
    function Latest_Hits( $api_key, $start_dt, $end_dt, $country, $country_code   )
    {
    	
    	$this->db->select("DISTINCT(user_ip) as ip, user_country, data_created_on");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key'=>$api_key));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
			$this->db->where($whare);
        }
        
                
        //$this->db->group_by('traffic.user_ip');
        $this->db->order_by('traffic.data_created_on', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        
		$db_results = $query->result();	
		
		 if (count($db_results) > 0 )
        {   
        	return $db_results;
        } else {
        	 return false;
        } 
    }
    
    
    
    function Get_Browser( $browser, $api_key, $start_dt, $end_dt, $country, $country_code  )
    {
    	
    	$this->db->select("count(traffic_id) as count_of_broswer, user_browser_name ");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key'=>$api_key, 'traffic.user_browser_name'=>$browser));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
			$this->db->where($whare);
        }
        
        $this->db->limit(1);
        $query = $this->db->get();
        
		$db_results = $query->result();	
		
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