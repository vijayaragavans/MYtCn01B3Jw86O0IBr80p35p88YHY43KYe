<?php	 	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * Controller  : Home, Landing Page
	 * Created on  : 20-03-2013
	 * Created By  : Vijayaragavan Sivagurusamy
	 * Contact Me  : vijayaragavan.sivagurusamy@gmail.com
	 * Modified On :
	 * Modified By :	  
	 * Project     : myanalytics
	 * Version	   : 1.0
	 */

class Resume extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();        			
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');
        $this->load->library('core/sh_resume');
        
        $this->url = $_SERVER['REQUEST_URI'];

        $this->url_input = split('/', $this->url);

        $this->url_count = count($this->url_input) -1;
        
        $this->current_date = date('Y-m-d H:i:s');
        
    }
    
	/*
	 * Function: Index 
	 * Purpose : Loading the landing page
	 */	
    
	public function index()
	{
	
	   $user_data = $this->session->userdata('hwa');
	   
	   if($user_data['user_id'] > 0)
	   {
			$pauses = $this->sh_resume->List_Of_Pauses( $user_data['user_id'] );	   	
			
	   }else{
	   	redirect(SITE_URL."home/login");
	   }
	   
	   
		
	   	$file = 'site/resume.html';
	   	$this->mysmarty->assign('pauses',$pauses);
		$this->mysmarty->assign('user', $user_data);
		$this->mysmarty->assign('filename',$file);            
		$this->mysmarty->display('home.html'); 
		
	}
	
	
	
	public function add_pause_action()
	{
		
		$response = false;
		
		$user = $this->session->userdata('hwa');
		
		if($user['user_id'] > 0)
		{
			
			$arr = array(
						"pause_title" => $this->security->xss_clean( $this->input->get_post('title') ),
						"pause_start" => $this->security->xss_clean( $this->input->get_post('start') ),
						"paused_by"		=> $user['user_api_key'],
						"pause_end" => $this->security->xss_clean( $this->input->get_post('end') ),
						"pause_created_on" => $this->current_date,
			
			);
		}else{
			redirect(SITE_URL."home/login/");
		}
		
		$response = $this->sh_resume->Add_New_Pause_Action($arr);
		
		echo $response;
		die;
	}
	
	
}

/* End of file home.php */
?>