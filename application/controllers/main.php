<?php
	class Main extends CI_Controller {
		function _construct() {
			parent::CI_Controller();
		}
		function index() {
			if($this->session->userdata('id')) redirect('/user/');
			else {
				$data['title'] = "ExQuest | Log-in";
				$data['css'] = base_url()."/css/theme.css";
				
				$this->load->view('login_view.php', $data);
			}
		}
		function check() {
			$this->load->model('users');
			$id = $this->users->find($_POST['email'], $_POST['pass']);
			if($id != 0) {
				$query = $this->users->userRow($id);
				$user = $query->row_array();
				$this->session->set_userdata($user);
				redirect('/user/');
			}
			else {
				echo "Login Failed. ";
				echo anchor('/', 'Back to Home');
			}
		}
		function sendsuccess() {
			$data['title'] = "ExQuest | Register";
			
			$this->load->view('send_success', $data);
		}
		
	function sendKey(){
			$email = $_POST['email'];
			$this->load->helper('string');
			$activationKey = random_string('unique');
		
			//add email and activationKey to users table in db
			$this->load->model('ems_model');
			$this->ems_model->forActivation($email,$activationKey);
			
			$message = "Please click the activation link below to activate your account.\n".
						'http://localhost/192/index.php/main/activate/'.$activationKey;
			
			//$this->load->model('users');
			//$user = $this->users->findwithkey($activationKey;)
			
			$subject = 'ExQuest Activation Key';
			$this->sendMail($email,$message,$subject);
			
		}
		function sendMail($email,$message,$subject){
			$this->load->helper('email');
			$emailConfig = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'exquest2012@gmail.com',
				'smtp_pass' => 'moneyishappiness',
			);
			
			$from = array('email' => 'exquest2012@gmail.com', 'name' => 'Exquest');
			$to = array($email);
			$this->load->library('email', $emailConfig);
			$this->email->set_newline("\r\n");
			$this->email->from($from['email'], $from['name']);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);
			if (!$this->email->send()) {
			// Raise <span id="IL_AD5" class="IL_AD">error message</span>
				show_error($this->email->print_debugger());
			}else {
			// Show success notification or other things here
				echo 'Success to send email';
				
				
				
			} 
		}
		
		function activate(){
			$key = $this->uri->segment(3);
			//echo $key;
			$this->load->model('ems_model');
			$query= $this->ems_model->verify($key);
			$user = $query->row_array();
			$this->session->set_userdata($user);
			
			/*pag walang laman yung last name meaning siya yung nagregister ng email
			  at wala pang info about sa kanya*/
			if($user['lname'] == ''){
				redirect('/reg/');
			}else{ //
				echo 'Account successfully activated. Try logging in from the '.anchor('/main/', 'homepage.');
			}
			
			
		}
	}
?>