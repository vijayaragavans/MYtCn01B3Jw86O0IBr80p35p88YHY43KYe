<?php	 	
/**
 * The Users class file.
 *
 * @category   : Users
 * @package    : None
 * @author     : Vijayaragavan Sivagurusamy
 * @license    : myanalytics
 * @link       : libraries/core/sh_site.php
 * 
 */
 
class Sh_site
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
        $this->_CI->load->library('core/users');
        $this->_CI->load->model('site_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         

        $this->current_date = date('Y-m-d H:i:s');
    }
    
    
    public function Add_New_Site( $input_site_label, $input_site_url, $user_id )
    {
    	$response = false;
    	
              $key = $this->_CI->users->Generate_API('13');

            $data = array(
                    'site_api_key' => $key,
                    'site_name' => $input_site_label,
                    'site_url' => $input_site_url,     
                    'created_by' => $user_id,
                     'site_created_on'  =>  $this->current_date

                );

    	$response = $this->_CI->site_model->Add_New_Site( $data );
    	
    	return $response;    	
    }
        
        
}
/* End of file users.php */