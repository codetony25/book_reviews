<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		$this->load->library('form_validation');
		$this->load->model('Book_model');

	}

	public function index()
	{
		/**
		 *
		 * The index of books, will load the all the 5 recent reviews, and get all
		 * the titles in a section of the website for viewing.
		 */
		
		$data['reviews'] = $this->Book_model->get_5_recent_reviews();
		$data['titles']  = $this->Book_model->get_all_titles();
		$this->load->view('book', $data);
	}

	public function add()
	{
		/**
		 *
		 * When user, clicks on "Add a new author and book", we will preload them
		 * the authors that already exist in our database in the select tags
		 * Then we load the add view.
		 */
		
		$data['authors'] = $this->Book_model->get_all_authors();
		$this->load->view('add', $data);
	}

	public function show($id)
	{
		/**
		 *
		 * When user clicks on another username that exist on our site, we will first
		 * retreive all data for reviews by book id, and all books that the user had 
		 * wrote reviews for, then we transfer them to the authorbook view page.
		 *
		 */
		
		$booksById['reviews'] = $this->Book_model->get_reviews_by_bookid($id);
		$booksById['books']   = $this->Book_model->get_book_by_id($id);
		$this->load->view('authorbook', $booksById);
	}

	public function add_book_and_review()
	{
		/**
		 *
		 * When the user is adding a book to our database, we will go ahead and run the
		 * validation check then if it passes, we take them to the books page
		 * If it fails, then we take them back to the add page
		 *
		 */
		
		if ($this->form_validation->run('books'))
		{
			$data = $this->Book_model->add_user_book($this->input->post());
			redirect('books/' . $data);
		}
		else
		{
			$this->session->set_flashdata('book_errors', validation_errors());
			redirect('books/add');
		}
	}

	public function add_review_to_book()
	{
		/**
		 *
		 * When the user wants to add only a review for a single book, we would first
		 * run validations then we will add the review for that particular book id.
		 * if it fails, then redirect them back to the same page.
		 * 
		 */
		
		
		if ($this->form_validation->run('reviews'))
		{
			$data = $this->Book_model->add_review_to_book_id($this->input->post());
			redirect('books/' . $this->input->post('bookid'));
		}
		else
		{
			$this->session->set_flashdata('review_errors', validation_errors());
			redirect('books/' . $this->input->post('bookid'));
		}
	}

}