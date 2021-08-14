<?php

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    // HTTP Verb GET to list all the users
    public function users_get()
    {
        $data = $this->User_model->get_all();

        $this->response(array(
            'status' => !empty($data) ? true : false,
            'message' => !empty($data) ? 'Records Found' : 'No records',
            'data' => $data,
        ),!empty($data) ? REST_Controller::HTTP_OK : REST_Controller::HTTP_NOT_FOUND);
    }

    // HTTP Verb POST to create an user
    public function users_post()
    {
        $post_data = $this->input->post();
		$this->User_model->create($post_data);
        $data = $this->User_model->get_all();

        $this->response(array(
            'status' => !empty($data) ? true : false,
            'message' => !empty($data) ? 'User Added Successfully' : 'Some Error Occured',
            'data' => $data,
        ), REST_Controller::HTTP_CREATED);
    }

    // HTTP Verb PUT to update an user info
    public function users_put($id)
    {
        $post_data = $this->put();
        $this->User_model->update($post_data, $id);
        $data = $this->User_model->get_all();
        $this->response(array(
            'status' => !empty($data) ? true : false,
            'message' => !empty($data) ? 'User Updated Successfully' : 'Some Error Occured',
            'data' => $data,
        ), REST_Controller::HTTP_CREATED);
    }

    // HTTP Verb DeLETE to remove an user
	public function users_delete()
    {
        $this->load->view('add_user');
    }
}
