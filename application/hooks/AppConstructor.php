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

            $mystat      = $this->CI->session->userdata('mystat');

            $response = $this->CI->users->List_Of_Sites( $mystat['user_id'] );

            $current_site = $this->CI->input->cookie('current_site');

            if( ( $current_site != '' || $current_site != NULL || !empty( $current_site) ) && $response['user_api_key'] != $current_site )
            {

                    $sessionUserdata['current_site'] = $current_site;
                    
                    $this->CI->session->unset_userdata('current_site');
                    
                    $this->CI->session->set_userdata(array('current_site'=>$sessionUserdata));
            }

            $this->CI->mysmarty->assign('list_of_sites',  $response);

    }    
	
	
}
?>
