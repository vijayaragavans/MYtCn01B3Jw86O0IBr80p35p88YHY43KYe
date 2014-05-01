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

class Country extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();        			
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_behaviour');   
        $this->load->library('core/sh_common'); 
        $this->load->library('core/sh_country'); 
          
        
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
	

	# Purpose: Getting the visitors details based on the country
	# Landing page

	public function user_country_details()
	{
		
	   $user_data = $this->session->userdata('mystat');
	   
	   $user_api_key = $user_data['user_api_key'];
	   
	   if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
	   	
	   		redirect(SITE_URL."home/login");
	   		
	   }


	   $page =  $this->url_input[$this->url_count];

	   ( is_numeric( $page ) ) ? $country_code =  $this->url_input[$this->url_category] :  $country_code = $page ;
	   
	   $fromStart = $this->perPage * $page;

	   echo $fromStart;
	   
	   $total_pages = $this->pagination( $user_api_key, $country_code  );
	   
	   $details = $this->sh_country->Get_All_Details( $user_api_key, $this->perPage, $fromStart, $country_code );
	   
	   $file = 'site/view_country_visits.html';
		
	   $this->mysmarty->assign('user', $user_data);
	   $this->mysmarty->assign('current_page', $page);
	   $this->mysmarty->assign('total_pages', $total_pages);
	   $this->mysmarty->assign('country_code', $country_code);
	   $this->mysmarty->assign('details', $details);
	   $this->mysmarty->assign('filename',$file);
	   $this->mysmarty->assign('details',$details);
	   
	   $this->mysmarty->display('home.html'); 
			
	  }
	
}

/* End of file home.php */
?>