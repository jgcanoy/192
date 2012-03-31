<?php 
class Reg extends CI_Controller{
	function _construct(){
		parent::_construct();
		
		
	}
	function index(){
		$data['title'] = "ExQuest | Register";
		$data['css'] = base_url()."/css/theme.css";
		
		$this->load->view('reg_header', $data);
		$this->load->view('reg_start', $data);
		$this->load->view('footer', $data);
		
	}
	
	function step1(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<b class="error">', '</b>');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		
		$this->form_validation->set_rules('pass','Password','required|trum');
		$this->form_validation->set_rules('pass2','Confirm Password','required|trim|matches[pass]');
		$this->form_validation->set_message('required','%s is required');
		$this->form_validation->set_message('matches','Passwords do not match. Retype password.');
	
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('reg_header');
			$this->load->view('s1');
			$this->load->view('footer');
		}else{
			$this->load->model('ems_model');
			$id = $this->session->userdata('id');
			$this->ems_model->updateUser($id);
			redirect('reg/step2');
		}
		
		
	}
	function step2(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<b class="error">', '</b>');
		$this->form_validation->set_rules('cname','Company Name','required|trim');
		$this->form_validation->set_rules('cemail','Company Email','required|valid_email');
		
		$this->form_validation->set_message('required','%s is required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('reg_header');
			$this->load->view('s2');
			$this->load->view('footer');
		}else{
			$this->load->model('ems_model');
			$this->load->model('users');
			$this->ems_model->addCompany();
			
			$user = $this->session->userdata('id');
			$cid = $this->ems_model->getcid($_POST['cname']);
			$this->users->updateUserCompany($cid, $user);
			$this->session->set_userdata('cid', $cid);
			
			redirect('reg/step3');
		}
	}
	
	function step3(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<b class="error">', '</b>');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('pass','Password','required|trum');
		$this->form_validation->set_rules('pass2','Confirm Password','required|trim|matches[pass]');
		$this->form_validation->set_message('required','%s is required');
		$this->form_validation->set_message('matches','Passwords do not match. Retype password.');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('reg_header');
			$this->load->view('s3');
			$this->load->view('footer');
			echo $this->input->post('submit');
			if($this->input->post('submit') == 'Skip'){
				$this->session->sess_destroy();
				redirect('reg/regsuccess');
			}
		}else{
			$action = $this->input->post('submit');	
			if($action == 'Add More Users'){
				$this->add();
				redirect('reg/step3');
			}else if($action == 'Next'){
				$this->add();
				$this->session->sess_destroy();
				//$this->load->view('reg_header');
				//echo "<h2>Registration was successful.<h2> ".anchor('/main/','Back to Home');
				//$this->load->view('footer');
				redirect('reg/regsuccess');
			}		
		}
	}
	
	function regsuccess() {
		$this->load->view('reg_header');
		$data['message'] = "Registration Successful.";
		$this->load->view('message', $data);
		$this->load->view('footer');
	}
	
	function add(){
		//generate activation key
		$activationKey = random_string('unique');
		//add new user to user table
		$this->load->model('ems_model');
		$this->ems_model->addUser($activationKey);
		//send activation key to new user
		$this->sendActivation($activationKey);
	}
	function sendActivation($activationKey){
		$this->load->helper('string');
		$email = $_POST['email'];
		
		$message = "Please click the activation link below to activate your account.\n".
						'http://localhost/192/index.php/main/activate/'.$activationKey;
		$subject = 'ExQuest Activation Key';
		
		$this->load->model('users');
		$user = $this->users->findwithkey($activationKey);
			
		$message = $message."\n\nUsername: ".$user['email']."\nTemporary Password: ".$user['password'];
		
		$this->load->helper('email');
			$emailConfig = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'exquest2012@gmail.com',
				'smtp_pass' => 'moneyishappiness',
			);
			
		$from = array('email' => 'exquest2012@gmail.com', 'name' => 'Exquest');
		$to = $email;
		$this->load->library('email', $emailConfig);
		$this->email->set_newline("\r\n");
		$this->email->from($from['email'], $from['name']);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if (!$this->email->send()) {
		// Raise <span id="IL_AD5" class="IL_AD">error message</span>
			show_error($this->email->print_debugger());
		}	
	}
	
	function addUser(){
	$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<b class="error">', '</b>');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		//$this->form_validation->set_rules('mname','Middle Name','required|trim');
		//$this->form_validation->set_rules('contact','Contact','required|numeric');
		//$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('pass','Password','required|trum');
		$this->form_validation->set_rules('pass2','Confirm Password','required|trim|matches[pass]');
		$this->form_validation->set_message('required','%s is required');
		$this->form_validation->set_message('matches','Passwords do not match. Retype password.');
		
		if($this->form_validation->run() == FALSE){
			if($this->session->userdata('isAdmin') == 1) {
				$this->load->view('admin_header');
				$this->load->view('add');
				$this->load->view('footer');
			} else redirect('/main');
			if($this->input->post('submit') == 'Done'){
				redirect('/user/');
			}
		} else {
			$action = $this->input->post('submit');	
			if($action == 'Add More Users'){
				$this->add();
				redirect('/reg/addUser');		
			} elseif($action == 'Done'){
				$this->add();
				redirect('/reg/addsuccess');
			}
		}
	}
	
	function addsuccess() {
		$this->load->view('reg_header');
		$data['message'] = "User added successfully";
		$this->load->view('message', $data);
		$this->load->view('footer');
	}
	}


?>