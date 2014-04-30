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

class Info extends CI_Controller {
	

     public $date;

     function __construct()
    {
        parent::__construct();        			
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/sh_info');   
        
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
	
	   $Userdata = $this->session->userdata('mystat');
	   
       if($Userdata){
       		redirect(SITE_URL."home/index/");
       }else{
			$file = 'site/login.html';
	   }
	   	$this->mysmarty->assign('filename',$file);
            
		$this->mysmarty->display('home.html'); 
		
	}
	
	
	public function view_all_notification()
	{
	   $user_data = $this->session->userdata('mystat');
	   
	   $user_api_key = $user_data['user_api_key'];
	   
	   $page =  $this->url_input[$this->url_count];
	   
	   if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
	   	
	   		redirect(SITE_URL."home/login");
	   		
	   }
	   
	   $fromStart = $this->perPage * $page;
	   
	   $details = $this->sh_info->Get_All_Notifications( $user_api_key, $this->perPage, $fromStart );
	   
	   $file = 'site/notification.html';
		
	   $this->mysmarty->assign('user', $user_data);
	   $this->mysmarty->assign('details', $details);
	   $this->mysmarty->assign('filename',$file);
	   $this->mysmarty->assign('details',$details);
	   
	   $this->mysmarty->display('home.html'); 
	
	}
	
	
	
	public function all_visits()
	{
		
	   $user_data = $this->session->userdata('mystat');
	   
	   $user_api_key = $user_data['user_api_key'];
	   
	   $page =  $this->url_input[$this->url_count];
	   
	   if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
	   	
	   		redirect(SITE_URL."home/login");
	   		
	   }
	   
	   $fromStart = $this->perPage * $page;

	   $date = $this->Get_Date_Range( );

	   $total_pages = $this->pagination( $user_api_key, $date['start_dt'], $date['end_dt']  );
	   
	   $details = $this->sh_info->Get_All_Notifications( $user_api_key, $this->perPage, $fromStart, $date['start_dt'], $date['end_dt'] );
	   
	   $file = 'site/notification.html';
		
	   $this->mysmarty->assign('user', $user_data);
	   $this->mysmarty->assign('current_page', $page);
	   $this->mysmarty->assign('total_pages', $total_pages);
	   $this->mysmarty->assign('details', $details);
	   $this->mysmarty->assign('filename',$file);
	   $this->mysmarty->assign('details',$details);
	   
	   $this->mysmarty->display('home.html'); 
	   	   
	}




	# Purpose: Dynamically getting the date range
	# using at all_visits()

	public function Get_Date_Range(  )
	{

	   $start_dt = $this->input->cookie('start') ;
	   $end_dt = $this->input->cookie('end') ;
	   
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
	
	
	
	public function pagination( $user_api_key, $start_dt, $end_dt, $country_code  )
	{
		
        $result = '';
		$count =  ceil( $this->sh_info->Pagination( $user_api_key, $start_dt, $end_dt, $country_code  ) / floor($this->perPage) );
        
        return $count-1;
	}
	
	
	public function Export_Data()
	{
		
	   $user_data = $this->session->userdata('mystat');
	   
	   $user_api_key = $user_data['user_api_key'];
		
	   $start_dt = $this->input->cookie('start') ;
	   $end_dt = $this->input->cookie('end') ;
	   
	   
	   $start_dt = date('Y-m-d', strtotime( $start_dt ) );
	   $end_dt = date('Y-m-d', strtotime( $end_dt ) );
	   
			
	   $data = $this->sh_info->Export_Data( $user_api_key, $start_dt, $end_dt  );
	   
			$contents="Id, Url, Screen Size, User agent lang, Visitor Ip, City, Country, Browser, Plateform, isCookieSet ( Yes - 1 No - 0 ), User Agent, Data Created On \n";

	   		foreach($data as $visit)
	   		{
	   			$contents .= $visit['traffic_id'].',';
	   			$contents .= $visit['url'].',';
	   			$contents .= $visit['user_browser_size'].',';
	   			$contents .= $visit['user_agent_lang'].',';
	   			$contents .= $visit['user_ip'].',';
	   			$contents .= $visit['user_city'].',';
	   			$contents .= $visit['user_country'].',';
	   			$contents .= $visit['user_browser_name']. ' ' .$visit['user_browser_version'].',';
	   			$contents .= $visit['platform'].',';
	   			$contents .= $visit['cookieset'].',';
	   			$contents .= $visit['useragent'].',';
	   			$contents .= $visit['data_created_on']."\n";
	   		}
	   		
	   		$contents = strip_tags($contents); 
			Header("Content-Disposition: attachment; filename=export".date('d-m-Y').".csv");
			print $contents;
			die;
			
	}
	
	# Purpose: Getting the visitors details based on the country
	# Landing page

	public function user_country_details()
	{
		
	   $user_data = $this->session->userdata('mystat');
	   
	   $user_api_key = $user_data['user_api_key'];
	   
	   $page =  $this->url_input[$this->url_count];
	   
	   ( is_numeric( $page ) ) ? $country_code =  $this->url_input[$this->url_category] :  $country_code = $page ;
	   
	   if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
	   	
	   		redirect(SITE_URL."home/login");
	   		
	   }
	   
	   $date = $this->Get_Date_Range( );

	   $fromStart = $this->perPage * $page;
	   
	   $total_pages = $this->pagination( $user_api_key, $date['start_dt'], $date['end_dt'], $country_code  );
	   
	   $details = $this->sh_info->Get_All_Details( $user_api_key, $this->perPage, $fromStart, $date['start_dt'], $date['end_dt'], $country_code );
	   
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