<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Book_model');

	}

	public function index()
	{	
		/**
		 *
		 * Index gets model information from Book_model for
		 * 5 recent reviews and all titles
		 */
		
		$data['reviews'] = $this->Book_model->get_5_recent_reviews();
		$data['titles']  = $this->Book_model->get_all_titles();
		$this->load->view('index', $data);
	}

	public function user($id)
	{
		/**
		 *
		 * Retreives user data, the count of reviews a person has, 
		 * and the user reviews on a specific book
		 */
		
		$data['users']   = $this->User_model->get_user_by_id($id);
		$data['count']   = $this->User_model->count_reviews($id);
		$data['titles']  = $this->User_model->user_titles($id);

		$this->load->view('user', $data);
	}

	public function register()
	{
		/**
		 *
		 * When user registers, and the validation is passed. They will be redirected to the books page!
		 * Or if they fail, they will get errors and get redirected back to the register page.
		 */
		
		if($this->form_validation->run('register'))
		{
			$this->User_model->add_user($this->input->post());
			redirect('books');
		}
		else
		{
			$this->session->set_flashdata('register_errors', validation_errors());
			redirect('/');
		}
	}

	public function login()
	{
		/**
		 *
		 * When user logs in, and passes the validation, they will get redirected to books page, 
		 * Or if they fail, they will get errors and get redirected back to the login page.
		 */
		
		if($this->form_validation->run('login'))
		{
			if($data['users'] = $this->User_model->login_user($this->input->post())){
				redirect('books');
			}
			else
			{
				$this->session->set_flashdata('login_errors', 'User creditials do not match our system');
				redirect('/');
			}
		}
		else
		{
			$this->session->set_flashdata('login_errors', validation_errors());
			redirect('/');
		}
	}

	public function logout()
	{
		/**
		 *
		 * Logging out will erase all session data, and redirect them back to the
		 * Index page.
		 */
		
		$this->session->sess_destroy();
		redirect('/');
	}

}