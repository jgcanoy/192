<?php
class Exmail extends CI_Controller
{
function index()
{
	$this->load->helper('email');
	// Set SMTP <span id="IL_AD3" class="IL_AD">Configuration</span>
	$emailConfig = array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'exquest2012@gmail.com',
		'smtp_pass' => 'moneyishappiness',
	);
	 
	// Set your email information
	$from = array('email' => 'exquest2012@gmail.com', 'name' => 'Exquest');
	$to = array('jgcanoy@gmail.com'); // can still add more people to send mail here.
	$subject = 'ExQuest';
	$message = 'Trial trial trial trial trial trial';
	 
	// Load CodeIgniter Email library
	$this->load->library('email', $emailConfig);
	 
	// Sometimes you have to set the new line character for better result
	$this->email->set_newline("\r\n");
	 
	// Set email preferences
	$this->email->from($from['email'], $from['name']);
	$this->email->to($to);
	$this->email->subject($subject);
	$this->email->message($message);
	 
	// Ready to send email and check whether the email was successfully sent
	if (!$this->email->send()) {
		// Raise <span id="IL_AD5" class="IL_AD">error message</span>
		show_error($this->email->print_debugger());
	}
	else {
		// Show success notification or other things here
		echo 'Success to send email';
	} 
 }
 }
 ?>