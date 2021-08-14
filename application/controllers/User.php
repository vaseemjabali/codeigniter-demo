<?php

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller
{

    public function index()
    {
		$this->load->model('User_model');
		$data['users'] = $this->User_model->get_all();
        $this->load->view('users', $data);
    }

    public function users_get($id = null)
    {
		$this->load->model('User_model');
        $response = new stdClass();
        if(!empty($id)){
            $data = $this->User_model->get_by_id($id);
        }
        else{
            $data = $this->User_model->get_all();
        }
        $response->status = true;
        $response->message = 'Records Found';
        $response->data = $data;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function add()
    {
        $this->load->view('add_user');
    }

	public function create()
    {
		$this->load->model('User_model');
		$post_data = $this->input->post();
		$this->User_model->create($post_data);
        redirect('User');
    }
}
