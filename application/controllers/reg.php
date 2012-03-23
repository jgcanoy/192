<?php
class Reg extends CI_Controller {
	function index() {
		$this->load->view('reg_view');
	}
	function pass_enc() {
		echo "C1 = ".$_POST['c1']."<br />";
		echo "C2 = ".$_POST['c2']."<br />";
	}	
}
?>