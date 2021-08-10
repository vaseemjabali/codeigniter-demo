<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
		$this->load->model('User_model');
		$data['users'] = $this->User_model->get_all();
        $this->load->view('users', $data);
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
