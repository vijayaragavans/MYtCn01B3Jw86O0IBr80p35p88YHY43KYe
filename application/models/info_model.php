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
 
class Info_Model extends CI_Model
{
 
	 public $_dataMap = ''; 
	 
    
    
    function Get_All_Notifications( $api_key, $perPage, $fromStart, $start_dt, $end_dt, $country_code   )
    {
    	
    	$this->db->select(" * ");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key'=>$api_key ));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");

         if( isset( $country_code ) && $country_code != 'all' )
            $this->db->where("traffic.user_country_code =", $country_code);

        $this->db->order_by('traffic.data_created_on', DESC);
        $this->db->limit( $perPage, $fromStart);
        
        $query = $this->db->get();
        
		$db_results = $query->result_array();	
		
		 if (count($db_results) > 0 )
        {   
        	return $db_results;
        } else {
        	 return false;
        } 
    	
    }
    
	 
    function Pagination( $api_key, $code, $start_dt, $end_dt )
    {

        $this->db->select("*");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where('traffic.user_api_key', $api_key);

        if( $start_dt != 'all' && $end_dt != 'all' )
            $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");

            //if( array_key_exists('lang_code', $code) )

            if( key($code) == 'lang_code' )
            {
                    $this->db->where( 'traffic.user_agent_lang', $code["lang_code"] );

            }elseif( key($code) == 'group_by_language' )
            {
                    $this->db->group_by('traffic.user_agent_lang');

            }elseif( key($code) == 'group_by_country' )
            {
                    $this->db->group_by('traffic.user_country');

            }elseif( key($code) == 'where_by_country' )
            {
                    $this->db->where("traffic.user_country_code =", $code);

            }elseif( key($code) == 'group_by_city' )
            {
                    $this->db->group_by('traffic.user_city');

            }elseif( key($code) == 'where_by_city' )
            {
                    $this->db->where("traffic.user_city =", $code['where_by_city']);

            }

        $query = $this->db->get();

        $db_results = $query->result();
	
        if (count($db_results) > 0 )
        {
            return count($db_results);
            
        } else {            
        	 return FALSE;
        }  
        
    }
    
    
    
    function Export_Data( $api_key, $start_dt, $end_dt )
    {
        $this->db->select("*");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where('traffic.user_api_key', $api_key);
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");

        $query = $this->db->get();
        
		$db_results = $query->result_array();
	
        if (count($db_results) > 0 )
        {
            return $db_results;
            
        } else {            
        	 return FALSE;
        }  
    }
    
    
}
/* End of file users_model.php */
?>