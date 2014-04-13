<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class AppConstructor extends CI_Hooks {

    private $CI;    
    // member parametrs    
    
    /**
     * @method __construct
     * @param string/int $init - user id or email of user to load      
     * @access public    
     * @return none
     */
    public function __construct($init = false)
    {
    	parent::__construct();      

        $this->CI = & get_instance();
        $this->CI->load->library('core/users');  
        $this->CI->load->helper(array('form', 'url', 'cookie')); 

    } 
    /**
     * @method doConstruct
     * @param  none      
     * @access public    
     * @return $response
     */
    function doConstruct()
    {
    	$view_info = false;
       
	}    
	
	
}
?>
