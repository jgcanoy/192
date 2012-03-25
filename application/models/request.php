<?php
class Request extends CI_Model{
	function _construct(){
		parent::_construct();
	}
	
	function get_userinfo($id){
		$query = $this->db->get_where('users',array('id'=>$id));
		$row = $query->row();
		return $row;
	}
	//search for requests starting with the given year and return number of rows
	function get_numrequest($year,$cid){
		$query = $this->db->query("SELECT * from request WHERE refnum LIKE '$year%' AND cid=$cid");
		return $query->num_rows();
	}
	
	function getTeamLeaders($cid){
	    //$this->db->select('id'); 
		//$this->db->from('users');
		//$this->db->where('isLeader','1');
		$query = $this->db->query("SELECT * from users WHERE isLeader = 1 AND cid = $cid");
		return $query;
		
		/*if ($query->num_rows() > 0){
			foreach ($query->result() as $row){
				echo $row->fname.' '.$row->lname;
				echo $row->id;
				echo "<br />";
				
			}
		} */
		
	}
	
	function getAppOffs($cid){
		$query = $this->db->query("SELECT * from users WHERE isOfficer = 1 AND cid = $cid");
		return $query;
		
	}
	
	function add_Request(){
		$refnum = $this->input->post('refnum');
		$userid = $this->input->post('id');
		$cid = $this->input->post('cid');
		$teamid = $this->input->post('leader');
		$appid = $this->input->post('appoff');
		$type = $this->input->post('type');
		$date = date("Y-m-d");
		$status = 'Pending';
	
		$rdata = array('refnum'=>$refnum,
			'userid'=>$userid, 
			'teamid'=>$teamid,
			'appid'=>$appid,'type'=>$type,'status'=>$status,'date'=>$date,
			'cid'=>$cid);
		
		$this->db->insert('request',$rdata);
		
		/*iterate array of particulars,quantity and price and insert to db*/
		for($i=0;$i<count($_POST['particulars']);$i++){
			$pdata = array('refnum'=>$refnum,
					'particulars'=>$_POST['particulars'][$i],
					'quantity'=>$_POST['quantity'][$i],
					'price'=>$_POST['price'][$i]
					);
			$this->db->insert('particulars',$pdata);
		}
		
		$query = $this->db->query("SELECT email from users WHERE id=$teamid AND cid = $cid");
		return $query->row();
		
	}
	
	function fromTo($status,$date1,$date2){
		/*$query = $this->db->query("SELECT refnum, particulars, quantity, price from 
			particulars WHERE refnum IN
			(SELECT refnum FROM request WHERE status = '$status' AND 
			(date BETWEEN '$date1' AND '$date2'))");
		  return $query;*/
		if($status == 'All') {
			$query = $this->db->query("SELECT particulars.*,date,lname,fname,status
				 FROM particulars,request,users
				 WHERE (date BETWEEN '$date1' AND '$date2')
				 AND particulars.refnum = request.refnum AND request.userid = users.id");
		} else {
			$query = $this->db->query("SELECT particulars.*,date,lname,fname
					 FROM particulars,request,users
					 WHERE status='$status' AND (date BETWEEN '$date1' AND '$date2')
					 AND particulars.refnum = request.refnum AND request.userid = users.id");
		}
		return $query;
			/*$sum = 0;
		foreach ($query->result_array() as $row){
			$total = $row['price']*$row['quantity'];
			$sum = $sum+$total;
			echo $row['refnum'].' '.$row['particulars'].' '.$row['quantity'].' '.$row['price'].' '.$total.'<br/>';	
		}
		echo $sum;*/
	}
	
	function getSum(){
		
	}
}
?>