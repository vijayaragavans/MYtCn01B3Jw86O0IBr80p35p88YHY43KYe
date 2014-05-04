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

class Browser extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();        			
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_behaviour');   
        $this->load->library('core/sh_common'); 
        $this->load->library('core/sh_browser'); 

        
        $this->start = '';
        $this->perPage = 5;
        $this->current_date = date("Y-m-d H:i:s");
        
        $this->email_date = date("Y-M-d");
        
        $this->url = $_SERVER['REQUEST_URI'];

        $this->url_input = split('/', $this->url);

        $this->url_count = count($this->url_input) -1;
        
        $this->url_category = count($this->url_input) -2;


    }
    
	/*
	 * Function: Index 
	 * Purpose : Loading the landing page
	 */	
    
	public function index()
	{
	
	   $user_data = $this->session->userdata('mystat');
	   
	   $user_api_key = $user_data['user_api_key'];
	   
	   if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
	   	
	   		redirect(SITE_URL."home/login");
	   		
	   }


	   $page =  $this->url_input[$this->url_count];

	   ( is_numeric( $page ) ) ? $lang_code =  $this->url_input[$this->url_category] :  $lang_code = $page ;
	   
	   $fromStart = $this->perPage * $page;

	   $code = array( 'where_by_browser' => $lang_code );

	   $total_pages = $this->sh_common->pagination( $user_api_key, $code, 'all', 'all' );

	   $details = $this->sh_browser->Get_Browser_Details( $user_api_key, $this->perPage, $fromStart,  $lang_code);

	   $file = 'site/browser.html';
		
	   $this->mysmarty->assign('user', $user_data);
	   $this->mysmarty->assign('current_page', $page);
	   $this->mysmarty->assign('total_pages', $total_pages);
	   $this->mysmarty->assign('browser_code', $lang_code);
	   $this->mysmarty->assign('details', $details);
	   $this->mysmarty->assign('filename',$file);
	   $this->mysmarty->assign('details',$details);
	   
	   $this->mysmarty->display('home.html'); 

		
	}
	

	# Purpose: Getting the visitors details based on the country
	# Landing page

	public function user_language_details()
	{
		
	   $user_data = $this->session->userdata('mystat');
	   
	   $user_api_key = $user_data['user_api_key'];
	   
	   if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
	   	
	   		redirect(SITE_URL."home/login");
	   		
	   }

 
	   $page =  $this->url_input[$this->url_count];

	   ( is_numeric( $page ) && $page != 1 ) ? $lang_code =  $this->url_input[$this->url_category] :  $lang_code = $page ;
	   
	   $fromStart = $this->perPage * $page;

	   $code = array( 'lang_code' => "$lang_code" );

	   $total_pages = $this->sh_common->pagination( $user_api_key, $code, 'all', 'all' );

	   $details = $this->sh_language->Get_Lang_Details( $user_api_key, $this->perPage, $fromStart, $lang_code );
	   
	   $file = 'site/view_language_visits.html';
		
	   $this->mysmarty->assign('user', $user_data);
	   $this->mysmarty->assign('current_page', $page);
	   $this->mysmarty->assign('total_pages', $total_pages);
	   $this->mysmarty->assign('code', $lang_code);
	   $this->mysmarty->assign('details', $details);
	   $this->mysmarty->assign('filename',$file);
	   $this->mysmarty->assign('details',$details);
	   
	   $this->mysmarty->display('home.html'); 
			
	  }
	
}

/* End of file home.php */
?>