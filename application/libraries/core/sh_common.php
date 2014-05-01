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
 
class Sh_common
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
        $this->_CI->load->helper(array('form', 'url', 'cookie'));           
        $this->_CI->config->load('mail_vars', TRUE);
    }
    
    
    
    # Purpose: Dynamically getting the date range
    public function Get_Date_Range (  )
    {
    	
       $start_dt = $this->_CI->input->cookie('start') ;
       $end_dt = $this->_CI->input->cookie('end') ;
       
       if( ( $start_dt == '' || $start_dt == null ) && ( $end_dt == '' || $end_dt == null ) )
       {
        
            $d1 = strtotime(date("Y-m-d", strtotime("-29 day")));

            $date['start_dt'] = date('Y-m-d', $d1);
            $date['end_dt'] = date('Y-m-d');
            
            $expire_time = time()+3600*24*30;
            setcookie('start', date('M d Y', strtotime($date['start_dt']) ), $expire_time, '/');
            setcookie('end', date('M d Y', strtotime($date['end_dt']) ), $expire_time, '/');
       }else{
        
            $date['start_dt'] = date('Y-m-d', strtotime( $start_dt ) );
            $date['end_dt'] = date('Y-m-d', strtotime( $end_dt ) );
        
       }    

        return $date;

    }
    
        
}
/* End of file users.php */