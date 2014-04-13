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

class Home extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();        			
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');  
        $this->load->library('core/sh_behaviour');          
        $this->config->load('mail_vars', TRUE);
        
        $this->current_date = date('Y-m-d');
    }
    
	/*
	 * Function: Index 
	 * Purpose : Loading the landing page
	 */	
    
	public function index()
	{
		
		$user_info = false;

		$user_data = $this->session->userdata('mystat');
		
	   	$user_api_key = $user_data['user_api_key'];
	   		
	   //VISITS DETAILS
	   
	   $start_dt = $this->input->cookie('start') ;
	   $end_dt = $this->input->cookie('end') ;
	   
	   if( ( $start_dt == '' || $start_dt == null ) && ( $end_dt == '' || $end_dt == null ) )
	   {
	   	
			$d1 = strtotime(date("Y-m-d", strtotime("-29 day")));

			$start_dt = date('Y-m-d', $d1);
			
			$end_dt = date('Y-m-d');
			
	   		$this->input->set_cookie('start', Date('MM d Y', $start_dt )) ;
	   		$this->input->set_cookie('end', Date('MM d Y', $end_dt )) ;
	   }
	   
	   $visits = $this->users->Visits( $user_api_key, $start_dt, $end_dt  );
	   
	   $count_unique = $this->users->Count_Unique( $user_api_key );
	   
	   $count_repeat = $this->users->Count_Repeat( $user_api_key );
	   	   
	   $total_visits = $this->users->Total_Visits( $user_api_key );		//	Total Visits Count
	   
	   $unique_visits = $this->users->Unique_Visits( $user_api_key );		//	Unique Visits Count
	   
	   $visits_details = '';
	   $i = 0;
	   $Mon = '';
	   foreach($visits as $visit){

	   		if($i > 0 ) $comma = ',';
	   		$rtt = explode('-', $visit['dates']);
	   		$mont = $rtt[1]-1;
	   		$utc_date = $rtt[0].', '.$mont.', '.$rtt[2]; 
	   		$visits_details .= $comma. '[Date.UTC('.$utc_date.'),'.$visit['total'].']';
	   		$i++;
	   }
	   
	   	$browser = $this->sh_behaviour->Get_All_Browsers( $user_api_key );
	   
	   	if(isset($user_data['user_id'])){

	   	   $file = 'site/landing.html';
	   	   
	   }else{
		  redirect(SITE_URL."home/login");
	   }			
	   
		   $this->mysmarty->assign('user', $user_data);
		   $this->mysmarty->assign('visits', $visits_details);
	   	   $this->mysmarty->assign('browsers', $browser);
	   	   $this->mysmarty->assign('unique_visits', $unique_visits->unique_visits);
	   	   $this->mysmarty->assign('total_visits', $total_visits->total_visits);
		   $this->mysmarty->assign('count_unique', $count_unique);		   
		   $this->mysmarty->assign('count_repeat', $count_repeat);		   
		   $this->mysmarty->assign('active_user_count', $active_user_count);
	  	   $this->mysmarty->assign('filename',$file);            
		   $this->mysmarty->display('home.html'); 
		
	}
	
	
	/*
	 * Function: login
	 * Purpose : Client / Admin Login Page
	 */	
	
	public function login()
	{
	   $user_data = false;
		
	   $user_data = $this->session->userdata('mystat');
	   
	   if($user_data['user_id'] > 0 )
	   {
		   redirect(SITE_URL."home/index");
	   }
	   
	   $file = 'site/login.html';
	   $this->mysmarty->assign('filename', $file);
	   $this->mysmarty->display('home.html'); 
	   
	}
	
	public function processLogin( )
	{
	
	   $user_data = $this->session->userdata('mystat');
	   
	   if($user_data['user_id'] > 0 )
	   {
		   redirect(SITE_URL."home/index");
	   }
	
	    $usuage = $this->security->xss_clean( $this->input->post('for') );
	    if($usuage != 'login')
	    {
		   redirect(SITE_URL."home/login");
	    }
	    
		$user_name = $this->security->xss_clean( $this->input->get_post('username') );
		   
	    $user_password = md5($this->security->xss_clean( $this->input->get_post('user_password') ));
	       
	    $response = $this->users->userLogin( $user_name, $user_password );
	       
	    if(isset($response) && $response['user_id'] != '')
	    {
	       
	    	$sessionUserdata['user_id'] = $response['user_id'];
	    	$sessionUserdata['user_unique_key'] = $response['user_unique_id'];
	    	$sessionUserdata['username'] = $response['user_name'];
			$sessionUserdata['display_name'] = $response['user_email'];
			$sessionUserdata['user_type'] = $response['user_type'];
			$sessionUserdata['user_api_key'] = $response['user_api_key'];
			$sessionUserdata['user_logo'] = $response['user_logo'];
			
			$this->session->unset_userdata('mystat');
			
		    $this->session->set_userdata(array('mystat'=>$sessionUserdata));
		    
		    echo 'success';
		    die;
		}else{
			echo 0;
			die;
		} 
	       
	}
	
	/*
	 * Function: LogOut
	 * Purpose : LogOut the User From SuperTag
	 */	
	
	public function logout()
	{
		
		$this->session->unset_userdata('mystat');
		$this->session->unset_userdata('admin_view');
		
		redirect(SITE_URL."home/login");
	
	}
	
	
	/*
	 * Function: Add User Request
	 * Purpose : Add New User Request
	 */	
	
	public function add_user_request()
	{
	
		   $user_data = $this->session->userdata('mystat');
	   
		  if($user_data){
			   	$file = 'site/add_user_request.html';
	       		$this->mysmarty->assign('user', $user_data);
			   	$this->mysmarty->assign('filename', $file);
			   	$this->mysmarty->display('home.html');
		  }else{
		  		redirect(SITE_URL."home/login");
		  }
	
	}
	
	
	
	
	/*
	 * Function: Invite Users
	 * Purpose : invite Users 
	 */	
	
	public function invite_user()
	{
		
	    $user_data = $this->session->userdata('mystat');
	    
		$user_email = $this->security->xss_clean( $this->input->get_post('user_email') );
		
		if( $user_email  != '' ){
			
			$validate = $this->users->Check_User_Availability( $user_email );
			
			if($validate == '' || $validate == null )
			{
			    $invite_response = $this->users->Invite_user( $user_email );
			    
		       	$this->mysmarty->assign('success', 'Invited successfully!');
			    
			}else{
				
		       	$this->mysmarty->assign('error', 'Process Failed. Email ID already exists!');
			}
		}
	       		$this->mysmarty->assign('user', $user_data);		
			   	$file = 'site/add_user_request.html';		
			   	$this->mysmarty->assign('filename', $file);
			   	$this->mysmarty->display('home.html');
		
	}

	
	public function update_user_info()
	{
		$unique_id = $this->security->xss_clean( $this->input->get_post('uniq') );
		
		$check = $this->users->Check_User($unique_id);
		
		if($check > 0){
			   	$file = 'site/add_user_info.html';
				$this->mysmarty->assign('filename', $file);
				$this->mysmarty->assign('info', $check);
				$this->mysmarty->display('home.html');
		}else{
			redirect(SITE_URL."home/login/");
		}
		
		
	}
	
	
    public function add_user()
    {
    	
    	$response =false;
    	
    	$user_name = $this->security->xss_clean( $this->input->get_post('user_name') );	
    	
    	$user_password = $this->security->xss_clean( $this->input->get_post('user_password') );	
    	$user_id = $this->security->xss_clean( $this->input->get_post('user_id') );	
    	
    	if($user_id > 0){

    		$response = $this->users->add_user( $user_id, $user_name, $user_password );
    		
    		redirect(SITE_URL."home/login/");
    	}
    	
    	redirect(SITE_URL."home/login/");
    	    	
    	
    }
	

}

/* End of file home.php */
?>