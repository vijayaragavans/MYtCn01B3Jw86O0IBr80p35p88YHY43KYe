<?php	 	
/**
 * The Users class file.
 *
 * @category   : Users
 * @package    : None
 * @author     : Vijayaragavan Sivagurusamy
 * @license    : myanalytics
 * @link       : libraries/core/sh_demographics.php
 * 
 */
 
class Sh_demographics
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
        // take advantage of codeigniter libraries
        // use $this->_CI in place of normal codeigniter $this
        $this->_CI = & get_instance();
        // load users model
        $this->_CI->load->library('external/Mandrill');
        $this->_CI->load->model('demographics_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    
    
    
    
    public function Get_All_Data( $user_api_key, $data_type )
    {
    	$response = false;
    	
    	$response = $this->_CI->demographics_model->Get_All_Data( $user_api_key, $data_type );
    	
    	return $response;    	
    }
    
    
}
/* End of file users.php */