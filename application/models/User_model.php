<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function add_user($data)
	{

		/**
		 *
		 * Adds a user in the database, while also setting the session data for the user
		 * and returning it in this function.
		 */
		
		$attributes = array(
			'name'     => $data['name'],
			'alias'    => $data['alias'],
			'email'    => $data['email'],
			'password' => $data['password']
		);

		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('updated_at', 'NOW()', FALSE);

		$this->db->insert('users', $attributes);

		$query2 = $this->db
					->select('id, name, alias, email')
					->from('users')
					->where('email', $data['email'])
					->get()
					->row_array();

		$sessUsers = array(
				'id'           => $query2['id'],
				'name'         => $query2['name'],
				'alias'        => $query2['alias'],
				'email'        => $query2['email'],
				'is_logged_in' => TRUE
		);

		$this->session->set_userdata('users', $sessUsers);

		return $query2;
	}

	public function login_user($data)
	{
		/**
		 *
		 * First selects and scans in the database to see if the email matches
		 * in our database, if it does, then we check password to see if that
		 * matches, then we log them in our books page, if not, then we redirect
		 * them back with errors.
		 *
		 */
		
		$query = $this->db
					->select('id, name, alias, password, email')
					->from('users')
					->where('email', $data['email'])
					->get()
					->row_array();


		if ($query && $query['password'] == $data['password'])
		{
			$sessUsers = array(
					'id'           => $query['id'],
					'name'         => $query['name'],
					'email'        => $query['email'],
					'alias'        => $query['alias'],
					'is_logged_in' => TRUE
			);

			$this->session->set_userdata('users', $sessUsers);
			return $query;
		}
		else
		{
			return FALSE;
		}
	}

	public function get_user_by_id($id)
	{
		/**
		 *
		 * Selects users by user id.
		 *
		 */
		
		$query = $this->db
					->select('id, name, alias, email')
					->from('users')
					->where('id', $id)
					->get()
					->row_array();
		return $query;
	}

	public function count_reviews($id)
	{
		/**
		 *
		 * Selects all reviews by user id and gets the count for it.
		 *
		 */
		
		$query = $this->db
						->select('reviews.id, users.id')
						->from('reviews')
						->join('users', 'reviews.user_id = users.id')
						->where('users.id', $id)
						->count_all_results();
		return $query;
	}

	public function user_titles($id)
	{
		/**
		 *
		 * Gets all the user titles 
		 *
		 */
		
		$query = $this->db
						->select('books.title')
						->from('users')
						->join('reviews', 'users.id = reviews.user_id')
						->join('books', 'reviews.user_id = books.id')
						->where('users.id', $id)
						->get()
						->result_array();
		return $query;
	}

}