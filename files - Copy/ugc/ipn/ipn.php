<?php	 	
mysql_connect("localhost","root","");
mysql_select_db("tntooldb");
require_once('/files/bugmaster/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
     

if(isset ($_REQUEST['payment_status']))
{
   
    $c_id = $_REQUEST['cid'];
    $mc_gross = $_REQUEST['mc_gross'];
    $payment_status = $_REQUEST['payment_status'];
    $first_name = $_REQUEST['first_name'];
    $address_status = $_REQUEST['address_status'];
     
    $payment_date= $_REQUEST['payment_date'];
    
    
    $SQL = "SELECT count(id) FROM tm_user_subscription WHERE c_id =".$c_id;
    
    $q = mysql_query($SQL);
    $cnt = mysql_num_rows($q);
    if($cnt === 0)
    {
        
            $SQL = "INSERT INTO tm_user_subscription 
                    (
                    id,
                    c_id,
                    amount3,
                    address_status,
                    subscr_date,
                    payer_id,
                    address_street,
                    address_zip, 	
                    first_name,
                    plan_name,
                    payer_email,
                    item_number,
                    payment_status
                    ) VALUES (
                    0,
                    '".$c_id."',
                    '".$mc_gross."', 
                    '".$address_status."',
                    '".$payment_date."',
                    '".$_REQUEST['payer_id']."',  
                    '".$_REQUEST['address_street']."', 
                    '".$_REQUEST['address_zip']."',      
                    '".$_REQUEST['first_name']."',  
                    '".$_REQUEST['item_name']."',  
                    '".$_REQUEST['payer_email']."', 
                    '".$_REQUEST['item_number']."',             
                    '".$_REQUEST['payment_status']."'  
                    ) " ;
           mysql_query($SQL);
           
           
           
        
    }else if($cnt === 1)
    {
        $SQL = "UPDATE tm_user_subscription 
                       SET                       
                       amount3 = '".$mc_gross."', 
                       address_status = '".$address_status."',
                       subscr_date  = '".$payment_date."',
                       payer_id = '".$_REQUEST['payer_id']."',  
                       address_street = '".$_REQUEST['address_street']."', 
                       address_zip = '".$_REQUEST['address_zip']."',  	
                       first_name = '".$_REQUEST['first_name']."',  
                       plan_name = '".$_REQUEST['item_name']."',
                       payer_email = '".$_REQUEST['payer_email']."',
                       item_number = '".$_REQUEST['item_number']."', 
                       payment_status = '".$_REQUEST['payment_status']."'
                       WHERE c_id = ".$c_id ;
           mysql_query($SQL); 
        
        
    }
    
    
     $SQL = "UPDATE tm_corporate SET sub_id = '".$_REQUEST['item_number']."' WHERE c_id  =".$c_id;
    
     $q = mysql_query($SQL);
      
     
    $SQL = "SELECT c_id,c_name,c_domaiin,c_address,c_status,c_email,c_phone,sub_id FROM tm_user_subscription WHERE c_id =".$c_id;
    
    $q = mysql_query($SQL);
    
    while ($row = mysql_fetch_assoc($q))
    {
       $c_name = $row['c_name'];
       $c_email = $row['c_email'];
       
        
    }
    
     
    $body             = file_get_contents('contents.html');
    $body             = eregi_replace("[\]",'',$body);

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host       = "mail.gmail.com"; // SMTP server
    $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
    $mail->Username   = "anoopkp06@gmail.com";  // GMAIL username
    $mail->Password   = "anoopkp2224001";            // GMAIL password

    $mail->SetFrom('anoopkp06@gmail.com', 'Ticket Master');

    $mail->AddReplyTo("anoopkp06@gmail.com","Ticket Master");

    $mail->Subject    = "Subscription Confirmation";

    $mail->AltBody    = " 
        
    <b> Dear Subsriber , </b> <br>
    <p>You have successfully subscribed Ticket Master.We will send you the Access URL and login credentials with in 24 Hours.  </p> 
       
    <p><b>Your Payment Details: </b>
    <br> Amount Subscibed : ".$mc_gross." <br>
    <br> Subsciption Date : ".$payment_date." <br>    
    <br> Payment Status  : ".$_REQUEST['payment_status']." <br>     
    <br>
    <br>
    Thanks and Regards,<br>
    Misty Group.<br>
    </p> 
    "; // optional, comment out and test

    $mail->MsgHTML($body);

    $address = $c_email;
    $mail->AddAddress($address, $c_name);

    //$mail->AddAttachment("images/phpmailer.gif");      // attachment
    //$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

    if(!$mail->Send()) {
      //echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      //echo "Message sent!";
    }



    
}

?>