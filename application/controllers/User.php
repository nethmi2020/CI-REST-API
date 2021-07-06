<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function index()

	{
        $this->load->model('Main_model');
		$users= $this->Main_model->getusernames();
        $data['users']=  $users;
        $this->load->view('user_view',$data);

	}

    public function userDetails(){
     
        $postData= $this->input->post();
        $this->load->model('Main_model');
        $data=$this->Main_model->getUserDetails($postData);

        echo json_encode($data);
    }
}
