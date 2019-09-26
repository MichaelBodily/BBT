<?php
session_start();

if (isset($_POST['captcha']) && $_SESSION['code'] != $_POST['captcha']) {
  $_SESSION['code'] = '';
  $captcha_wrong = true;
  //include_once('next-steps.php');
  header('Location: demo-sorry.html');
  exit;
}

if (($_POST['uname']!='') && ($_POST['email']!='') && ($_POST['subject']!=''))
{		
	include_once("mails/lead_class_mail.php");	
	
	//map request values to local variable	
	$uname = htmlspecialchars(strip_tags($_POST['uname']));	
	$email = $_POST['email'];
	$company = htmlspecialchars(strip_tags($_POST['company']));	
	$telno = htmlspecialchars(strip_tags($_POST['telno']));
	$comments = htmlspecialchars(strip_tags($_POST['comments']));
	$subject = $_POST['subject'];
	
	$token_array = array(
	 'uname' => $uname,
	 'email' => $email,
	 'telno' => $telno,
	 'comments' => $comments,
	 'company' => $company,
	 'subject' => $subject
	);
	
	
	$lead_class_mail = new lead_class_mail($token_array);

	
	$validate_fields = array(
	 'name' => 'Please Enter Name',
	 'email' => 'Please Enter Email Address'
	 );
						 
	$lead_class_mail->validate_fields = $validate_fields;
	
	//company notification email inputs	
	$lead_class_mail->bb_subject = $subject;	
	$lead_class_mail->mail_body('requestinfoTemplate.php'); 
	$lead_class_mail->bb_from_email = "demo@betterbranches.com";		
	$lead_class_mail->bb_name = "Better Branches Technology"; //Company Name		
	$lead_class_mail->bb_to_email = "demo@betterbranches.com";	
	
	//prospective client confirmation email
	$lead_class_mail->auto_response_flag = 1;
	$lead_class_mail->auto_response_name= $uname;
	$lead_class_mail->auto_response_to_email = $email;
	$lead_class_mail->auto_response_subject = "Confirmation-Better Branches Technology"; 
	$lead_class_mail->auto_response_from_email = "demo@betterbranches.com";
	$lead_class_mail->auto_response_mail_body('confirmation.php'); // call a function to build the header in this function 		
	// 
	//print_r($lead_class_mail);exit;

	$lead_class_mail->send_mail_body(); // check for auto response mail in send_mail_body() function 
	header('Location: demo-thank-you.html');
	}
	else
	{
		header('Location: index.html');
	}
?>