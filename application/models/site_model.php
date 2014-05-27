<?php	 		 	
/**
 * The Country model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     models/site_models.php
 *
 */
 
class Site_Model extends CI_Model
{
 
        public $_dataMap = ''; 
	 
        function Add_New_Site( $data )
        {
            
         $this->db->insert(TOOL_DB_NAME.'.sites', $data);

         return $this->db->insert_id(); 
         }

}
/* End of file users_model.php */
?>