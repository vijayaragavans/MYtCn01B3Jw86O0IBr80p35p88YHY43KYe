<?php	 	
/**
 * The Users class file.
 *
 * @category   : Users
 * @package    : None
 * @author     : Vijayaragavan Sivagurusamy
 * @license    : myanalytics
 * @link       : libraries/core/sh_resume.php
 * 
 */
 
class Sh_resume
{
    private $_CI;    

    /**
     * Constructor.
     * Loads the CI instance, the users_model and some useful helpers.
     * Creates a users_lib object, populated if passed a valid $init.    
     * @param string/int $init - user id or email of user to load   
     * @access public   
     * @return none
     */
    public function __construct($init = false)
    {
        // use $this->_CI in place of normal codeigniter $this
        $this->_CI = & get_instance();
        // load users model
        $this->_CI->load->library('external/Mandrill');
        $this->_CI->load->model('resume_model');
        $this->_CI->config->load('mail_vars', TRUE);
    }
    
    
    public function Add_New_Pause_Action( $arr )
    {
    	
    	$response = false;
    	
    	$response = $this->_CI->resume_model->Add_New_Pause_Action( $arr );
    	
    	return $response;
    	
    }
    
    
    public function List_Of_Pauses( $user_id  )
    {
    	
    	$response = false;
    	
    	$response = $this->_CI->resume_model->List_Of_Pauses( $user_id );
    	
    	return $response;
    	
    }
    
        
}
/* End of file users.php */