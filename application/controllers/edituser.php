<?php 

class Edituser extends CI_Controller {

	public function index(){
		echo "Hello";
		//$this->home(); // to load the home page from the view page
	}
	/*public function hello(){
	} // in order to run this create locahost/edituser/index.php/edituser/hello
	*/
	public function home(){ //view
		$data['title']="Welcome";
		$this->load->view("view_home",$data);
	}

	function getValues(){ //model
		$this->load->model("get_db");
		$data['results']=$this->get_db->getAll();
		$this->load->view("edituser_view",$data);
	}
	
	function insertValues(){ //model
		$this->load->model("get_db");
		$newRow= array(
			"id" =>  "11",
			"email" => "tester@yahoo.com");
	$this->get_db->insert1($newRow);
	echo "it has been added";
	//$data['results']=$this->get_db->getAll();
	//$this->load->view("view_db",$data);
	}
	function updateValues(){
	$this->load->model("get_db");
	$newRow= array(
		
		"email" => "aqlibunao@yahoo.com"
		);
	
	/*$newRow= array(
		array("id"->"3",
		"email" => "aqlibunao@yahoo.com"),
			array("id"->"4",
		"email" => "hannahhannah@yahoo.com"),
		);	gagana pag update2 ginamit*/
	$this->get_db->update1($newRow);
	echo "it has been updated";
	}
	/*function deleteValues(){
	$this->load->model("get_db");
	$oldRow= array(
		"email" => "tester@yahoo.com"
		);
	$this->get_db->delete1($oldRow);
	echo "it has been deleted";
	}*/
	function delete_checkbox(){
		$this->load->model("get_db");
		//$confirm = $this->load->conf();
		//if($confirm=true){
        $dat=$this->input->post('forms');
        for($i=0; $i<sizeof($dat);$i++){
			echo"ID number:"; 
			echo $dat[$i];
			echo" has been deleted!";
            $this->get_db->delete_check($dat[$i]);
            }
			//}
	
        }
	
	function edit_checkbox(){
		$this->load->model("get_db");
        $dat=$this->input->post('edit');
        for($i=0; $i<sizeof($dat);$i++){
			echo"ID number:"; 
			echo $dat[$i];
			echo" has been updated!";
            $this->get_db->edit_check($dat[$i]);
            }
			//}
	
        }	



	}
	