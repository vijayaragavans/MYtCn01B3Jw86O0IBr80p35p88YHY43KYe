<?php	 		 	
/**
 * The users model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     model/resume_model.php
 *
 */
 
class Resume_Model extends CI_Model
{
 
	 public $_dataMap = ''; 
	 
    function Add_New_Pause_Action( $arr )
    {

	 $this->db->insert(TOOL_DB_NAME.'.pause', $arr);
	 
	 return $this->db->insert_id(); 
    	
    }
    
	 
	 
   function List_Of_Pauses( $user_id  )
    {
    	
        $this->db->select("*");
        $this->db->from(TOOL_DB_NAME.'.pause');        
        $this->db->join(TOOL_DB_NAME.'.users', 'users.user_id = pause.paused_by', 'left');
        $this->db->where(array('pause.paused_by'=>$user_id));
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