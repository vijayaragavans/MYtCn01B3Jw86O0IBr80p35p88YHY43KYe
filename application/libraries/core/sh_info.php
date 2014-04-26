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
 
class Sh_info
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
        $this->_CI->load->model('info_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    
    
    public function Get_All_Notifications( $user_api_key, $perPage, $fromStart, $start_dt, $end_dt  )
    {
    	$response = false;
    	
    	$response = $this->_CI->info_model->Get_All_Notifications( $user_api_key, $perPage, $fromStart, $start_dt, $end_dt  );
    	
    	return $response;    	
    }
    
    
    public function Pagination( $user_api_key, $start_dt, $end_dt, $country_code  )
    {
    	$response = false;
    	
    	$response = $this->_CI->info_model->Pagination( $user_api_key, $start_dt, $end_dt, $country_code );
    	
    	return $response;    	
    }
    
    
    
    public function Export_Data( $user_api_key, $start_dt, $end_dt  )
    {
    	$response = false;
    	
    	$response = $this->_CI->info_model->Export_Data( $user_api_key, $start_dt, $end_dt  );
    	
    	return $response;    	
    }
    
    
    public function Get_All_Details( $user_api_key, $perPage, $fromStart, $start_dt, $end_dt, $country_code  )
    {
    	$response = false;
    	
    	$response = $this->_CI->info_model->Get_All_Details( $user_api_key, $perPage, $fromStart, $start_dt, $end_dt, $country_code  );
    	
    	return $response;    	
    }
    
}
/* End of file users.php */