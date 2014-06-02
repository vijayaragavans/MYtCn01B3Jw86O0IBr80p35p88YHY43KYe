<?php	 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

class behaviour extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();        			
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_behaviour');   
        
        $this->url = $_SERVER['REQUEST_URI'];

        $this->url_input = split('/', $this->url);

        $this->url_count = count($this->url_input) -1;
        
        $this->url_category = count($this->url_input) -2;

        $this->start_date = $this->input->cookie('start') ;
        $this->end_date = $this->input->cookie('end') ;

        $this->start_date = Date('Y-m-d', strtotime($this->start_date) );
        $this->end_date = Date('Y-m-d', strtotime($this->end_date) );
    }
    
	/*
	 * Function: Index 
	 * Purpose : Loading the landing page
	 */	
    

	public function index()
	{

	   $Userdata = $this->session->userdata('mystat');
	   
	   $current_site = $this->session->userdata('current_site');

	   $api_key = $current_site['current_site'];

	   if( empty( $Userdata['user_id']) ){

	   	redirect(SITE_URL."home/index");

	   }

	   $tags = $this->sh_behaviour->Get_All_Tags( $api_key, $this->start_date, $this->end_date );

	   $file = 'site/behaviour.html';

	   $this->mysmarty->assign('user',$Userdata);
	   $this->mysmarty->assign('tags',$tags);
	   
	   $this->mysmarty->assign('filename',$file);
            
	   $this->mysmarty->display('home.html'); 


	}

	public function index_old()
	{
		
	   $keyword =  $this->url_input[$this->url_count];
		
	   $Userdata = $this->session->userdata('mystat');
	   
	   $current_site = $this->session->userdata('current_site');

	   $api_key = $current_site['current_site'];

	   if($Userdata['user_id'] > 0){
       	
       	   $tags = $this->sh_behaviour->Get_All_Tags( $api_key );

	    $visitor_flow = $this->users->VisitorsFlow( $api_key, 2 );

		   $unique_total = '';
		   $i = 0;
			$comma = ',';
		   $Mon = '';
		for($i=0; $i< count($visitor_flow); $i++)
		{
			$old_label = $tags[$i]['label'];

			($tags[$i] != '') ? $label  .= $comma ."'$old_label'": NULL;		// Labels for Charts

			if( $visitor_flow[$i-1]['dates'] == $visitor_flow[$i]['dates'])
			{
				$out[$visitor_flow[$i]['dates']] .=  $comma. $visitor_flow[$i]['count_of'];
			}else{
				$out[$visitor_flow[$i]['dates']] = $comma .$visitor_flow[$i]['count_of'];
			}


		}


		$action_labels = '[ Date ' .$label. ']';

			$action_data =  $action_labels;
		foreach($visitor_flow as $flow )
		{
			if( !in_array($flow['dates'], $action_dat)  )
			{
				$action_dat[ ] = $flow['dates'];
				$dats = $flow['dates'];
				$action_data .= $comma. '['. "'$dats'" .$out[$dats]. ']' ;

			}

		}
		$data_type = '';
		   
		$datas =  $this->sh_behaviour->Get_All_Datas($api_key, $data_type);

		$file = 'site/behaviour.html';


	   	$this->mysmarty->assign('unique_total', $unique_total);
	   	
		$this->mysmarty->assign('visits', $action_data);
	   	$this->mysmarty->assign('datas',$datas);
	   	$this->mysmarty->assign('user',$Userdata);
	   	$this->mysmarty->assign('tags',$tags);
	   	
	   }
	   
	   	$this->mysmarty->assign('filename',$file);
            
		$this->mysmarty->display('home.html'); 
		
	}
	
	
	
	public function track_event( )
	{
		
	   $user_data = $this->session->userdata('mystat');
		
	   $current_site = $this->session->userdata('current_site');

	   $api_key = $current_site['current_site'];

	   $tag = $this->security->xss_clean( $this->input->get_post('__') );
	   
		   if($user_data['user_id'] > 0)
		   {
		   	
       		  $tags = $this->sh_behaviour->Get_All_Tags( $api_key );
		   	
		   	   $tag_graph_details = $this->sh_behaviour->Get_Tag_Details( 1, $tag, $api_key);
		   	   
			   $unique_total = '';
			   $i = 0;
			   $Mon = '';
			   foreach($tag_graph_details as $visitor){
		
			   		if($i > 0 ) $comma = ',';
			   		$day = date('d', strtotime($visitor['dates']) );
			   		$Mon .= $comma. date('M', strtotime($visitor['dates']) );
			   		$unique_total .= '['.$day. ','.$visitor['total'].'],' ;
			   		$i++;
			   }
			   
		   }
		   
		    $labels = array("label_name" => "Action Label", "count_of_value" =>"VISITS");
			   
		    $datas =  $this->sh_behaviour->Get_All_Datas($api_key, $tag);
			
	   	    $file = 'site/behaviour.html';
		   
	  		$this->mysmarty->assign('datas',$datas);
	  		$this->mysmarty->assign('labels',$labels);
	  		$this->mysmarty->assign('user',$user_data);
	   	 	$this->mysmarty->assign('tags',$tags);
	  		$this->mysmarty->assign('unique_total',$unique_total);
	  		$this->mysmarty->assign('filename',$file);
			$this->mysmarty->display('home.html'); 
	  		
	   
	}
	
	
	
	public function visits()
	{
		
	   $keyword =  $this->url_input[$this->url_count];
	   
	   $user_info = false;

	   $admin_view = $this->session->userdata('admin_view');
	   
	   $Userdata = $this->session->userdata('mystat');
	   
	   $current_site = $this->session->userdata('current_site');

	   $api_key = $current_site['current_site'];

	   if(isset($admin_view['user_api_key']) )
	   {
	   		$user_api_key = $admin_view['user_api_key'];
	   		
	   }else{
	   	
	   		$user_api_key = $Userdata['user_api_key'];
	   		
	   }
	
	   $this->mysmarty->assign('user', $Userdata);
	   
	   if($keyword == 'unique' || $keyword == 'repeat' )
	   {
	   		$key = $keyword;
	   }else{
	   		$keywords = explode('&', $keyword);
	   		
	   		$key = $keywords[0];
	   }
	   
	   //VISIT DETAILS
	   $visit_details = $this->users->VisitsDetails( $key, $user_api_key );
	   
	   if($keywords[1] == 'download')
	   {
	   		$contents="user_screen_size,user_browser_size,url,user_agent_lang,user_ip,city,country,browser_name,browser_version,referrer,platform,cookieset,useragent,server_name,created_on\n";
	   		
	   		foreach($visit_details as $visit)
	   		{
	   			$contents .= $visit['user_screen_size'].',';
	   			$contents .= $visit['user_browser_size'].',';
	   			$contents .= $visit['url'].',';
	   			$contents .= $visit['user_agent_lang'].',';
	   			$contents .= $visit['user_ip'].',';
	   			$contents .= $visit['user_city'].',';
	   			$contents .= $visit['user_country'].',';
	   			$contents .= $visit['user_browser_name'].',';
	   			$contents .= $visit['user_browser_version'].',';
	   			$contents .= $visit['referrer'].',';
	   			$contents .= $visit['plateform'].',';
	   			$contents .= $visit['cookieset'].',';
	   			$contents .= $visit['useragent'].',';
	   			$contents .= $visit['server_name'].',';
	   			$contents .= $visit['data_created_on']. "\n";
	   		}
	   		
	   		$contents = strip_tags($contents); 
			Header("Content-Disposition: attachment; filename=$user_api_key".date('d-m-Y').".csv");
			print $contents;
			die;
	   	
	   }
	   
	   
	   
	   // 1 - Unique Visitors, 2 - Repeating Visitors, 3 - All Visitors
	   $unique_visitors = $this->users->VisitorsFlow( $user_api_key, 1 );
	   
	   $repeat_visitors = $this->users->VisitorsFlow( $user_api_key, 2 );
	   
	   
	   $count_unique = $this->users->Count_Unique( $user_api_key );
	   
	   $count_repeat = $this->users->Count_Repeat( $user_api_key );
	   
	   $newArr = array();
	   $newUniqArr = array();
	   
		foreach ($repeat_visitors as $val) {
		    $newArr[] = $val['dates'];    
		}
		
	   $repeaters = array_count_values($newArr);
	   
		
		foreach ($unique_visitors as $vals) {
		    $newUniqArr[] = $vals['dates'];
		}
	   
	   $uniques = array_count_values($newUniqArr);
		
	   $unique_total = '';
	   $i = 0;
	   $Mon = '';
	   
	   foreach( array_unique( $newUniqArr ) as $dates){
			
	   
	   		if($i > 0 ) $comma = ',';
	   		$rtt = explode('-', $dates);
	   		$daye = $dates;
	   		$mont = $rtt[1]-1;
	   		$utc_date = $rtt[0].', '.$mont.', '.$rtt[2]; 
	   		$unique_total .= $comma. '[Date.UTC('.$utc_date.'),'.$uniques[$daye].']' ;	   		
	   		$i++;
	   }
	   
	   $repeat_total = '';
	   $j = 0;
	   $Mon = '';	   
	   foreach($repeat_visitors as $visitor){

	   		if($j > 0 ) $commas = ',';
	   		$rtt = explode('-', $visitor['dates']);
	   		$daye = $visitor['dates'];
	   		$mont = $rtt[1]-1;
	   		$utc_repeat_date = $rtt[0].', '.$mont.', '.$rtt[2]; 
	   		$repeat_total .= $commas. '[Date.UTC('.$utc_repeat_date.'),'.$repeaters[$daye].',]' ;
	   		$j++;
	   }
	   

//	GET ALL THE BROWSER NAME
	   
	   	if($Userdata && $Userdata['user_type'] == '2' ){

	   	   $file = 'site/welcome.html';
	   	   
	   }else if( $Userdata && $Userdata['user_type'] == '1'){
	   	
	   	   $file = 'site/welcome.html';
	   	
	   }else{
			$file = 'site/login.html';
	   }			
	   
	   		$this->mysmarty->assign('month',$Mon);	   		
	   		$this->mysmarty->assign('visit_details',$visit_details);	   		
	   		$this->mysmarty->assign('count_repeat', $count_repeat);
	   		$this->mysmarty->assign('keyword', $keyword);	   		
	   		$this->mysmarty->assign('count_unique',$count_unique);	   		 
		  	$this->mysmarty->assign('unique_total',$unique_total);
	  		$this->mysmarty->assign('repeat_total',$repeat_total);
	  		$this->mysmarty->assign('filename',$file);
            
			$this->mysmarty->display('home.html'); 
	}
}

/* End of file home.php */
?>