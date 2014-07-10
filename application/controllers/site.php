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

class Site extends CI_Controller {
	
	function __construct()
	    {
	        parent::__construct();        			
	        // load the necessary libraries
	        $this->load->library('form_validation');   
	        $this->load->helper(array('form', 'url', 'cookie'));           
	        $this->load->library('core/users');   
	        $this->load->library('core/sh_site');   
	        
	    }
    
	/*
	 * Function: Index 
	 * Purpose : Loading the landing page
	 */	
    
	public function index()
	{
	
	   $Userdata = $this->session->userdata('mystat');
	   
	   if($Userdata){

	       	redirect(SITE_URL."home/index/");

	   }else{

		$file = 'site/login.html';

	   }
	   	$this->mysmarty->assign('filename',$file);
            
		$this->mysmarty->display('home.html'); 
		
	}
	
	
	public function add_new_site()
	{
		$user_data = $this->session->userdata('mystat');
		   
		if($user_data['user_id'] == '' || $user_data['user_id'] == null ){

		   	redirect(SITE_URL."home/login");

		}

		$usuage = $this->security->xss_clean( $this->input->post('for') );

		if($usuage == 'add_site')
		{
			if($_SERVER['HTTP_HOST'] == DEMO_URL){
				echo 'demo';
				die;

			}else{
				$input_site_url = $this->security->xss_clean( $this->input->post('input_site_url') );
				$input_site_label = $this->security->xss_clean( $this->input->post('input_site_label') );
				$response = $this->sh_site->Add_New_Site( $input_site_label, $input_site_url, $user_data['user_id'] );
				echo $response;
				die;

			}

		}

	   
	   	$file = 'site/add_new_site.html';
	    	$this->mysmarty->assign('user', $user_data);
	   	$this->mysmarty->assign('track',$track);            
	   	$this->mysmarty->assign('filename',$file);            
		$this->mysmarty->display('home.html'); 
	}
	
	
}

/* End of file home.php */
?>