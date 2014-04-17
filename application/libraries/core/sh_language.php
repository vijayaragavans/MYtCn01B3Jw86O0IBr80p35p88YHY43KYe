<?php	 	
/**
 * The Users class file.
 *
 * @category Users
 * @package  None
 * Created By  : Vijayaragavan Sivagurusamy
 * Contact Me  : vijayaragavan.sivagurusamy@gmail.com
 * @license    : myanalytics
 * @link       : libraries/core/sh_client.php
 * @version	   : 1.0
 */
 
class Sh_language
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
        $this->_CI->load->model('language_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    
    
    public function Top_Language( $placeholder, $api_key, $start_dt, $end_dt )
    {

    	$response = false;

    	$response = $this->_CI->language_model->Top_Language( $placeholder, $api_key, $start_dt, $end_dt );

    	return $response;
    }    
    
    
}
/* End of file users.php */