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
			} else{ //
				echo 'Account successfully activated. Try logging in from the '.anchor('/main/', 'homepage.');
				$this->session->sess_destroy();
			}
		}
		
	function request(){
			$fname = $this->session->userdata('fname');
			$lname = $this->session->userdata('lname');
			$cid = $this->session->userdata('cid');
			$data['name'] = $fname.' '.$lname;
			/*pass following data to request form*/
			$data['leaders'] = $this->getLeaders($cid);
			$data['appoffs'] = $this->getAppOffs($cid);
			$data['cid'] = $cid;
			$data['id'] = $this->session->userdata('id');
			$data['refnum'] = $this->getRefNum($cid);
			$data['date'] = array('name'=>'date','id'=>'date');
			$data['types'] = array(
                  'Cash Advance'  => 'Cash Advance',
                  'Reimbursement'=> 'Reimbursement',
                );
		//$data['particulars'][] = array('name'=>'particulars','id' =>'particulars');
		//$data['quantity'] = array('name'=>'quantity','id'=>'quantity');
		//$data['price'] = array('name'=>'price','id'=>'price');
		$this->load->helper('date');		//$this->load->helper('form');
		
		/*set rules for request form validation*/
		//$this->form_validation->set_rules('particulars','Particulars','required');
		//$this->form_validation->set_rules('quantity','Quantity','required');
		//$this->form_validation->set_rules('price','Price','required');
		
		/*if ($this->form_validation->run() == FALSE){
			$this->load->view('request_form',$data);
		}else{
			$this->Ems_model->add_request();
			echo 'Request submitted';
		}	*/
			$this->load->view('create',$data);
		}
		
		/* generate reference number */
		function getRefNum($cid){
			//$cid = $this->session->userdata('cid');
			$year = date('Y');
			$this->load->model('request');
			$num = $this->request->get_numrequest($year,$cid);
			$refnum = str_pad($num,5,"0",STR_PAD_LEFT);
			return $year.$refnum;
		}
	
		function getLeaders($cid){
			//$cid = $this->session->userdata('cid');
			$this->load->model('request');
			$leaders = $this->request->getTeamLeaders($cid);
			if ($leaders->num_rows() > 0){
				foreach ($leaders->result() as $row){
					$leader_list[$row->id] = $row->fname." ".$row->lname;
				}
			}
			return $leader_list;	
		}
		
		function getAppOffs($cid){
			//$cid = $this->session->userdata('cid');
			$this->load->model('request');
			$officers = $this->request->getAppOffs($cid);
			if ($officers->num_rows() > 0){
				foreach ($officers->result() as $row){
				$officer_list[$row->id] = $row->fname." ".$row->lname;
			}
		}
		return $officer_list;
		}
		
		/*Submit request form. Insert to db and send mail to team leader*/
		function submit(){
		//$cid = $this->session->userdata('cid');
		$this->load->model('request');
		$leader = $this->request->add_Request();
		//send mail to team leader
		$email = $leader->email;
		$subject = 'ExQuest: New Pending Request';
		$message = "You have a new pending request waiting for approval.\n".
					"Please log-in to your ExQuest account to process the request.\n\n". 
					"Thank you.\n-ExQuest Team";
					
		$this->sendMail($email,$message,$subject);
		//display success message
		echo 'Request submitted';
		
		}
	}
?>