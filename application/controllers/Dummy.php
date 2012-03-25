<?php
	class Dummy extends CI_Controller{
		function index(){
			$year = date('Y');
			$curr = '2012';
			if($year == $curr){
				echo 'Yay!';
			}
			$this->load->helper('date');
			$format = 'DATE_RFC822';
			$datestring = "Year: %Y Month: %m Day: %d";
			$date = time();;
			echo standard_date($format,$date);
			$this->load->model('request');
			$cid = 1;
			$leaders= $this->request->getTeamLeaders($cid);
			foreach ($leaders->result() as $row){
				$leader_list[$row->id] = $row->fname." ".$row->lname;
			}
			
		}
	}
?>