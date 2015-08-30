<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public function add_user_book($data)
	{
		/**
		 *
		 * This adds the book and review to the database, we first insert it
		 * then we grab the book id that we had just inputted, and we also
		 * add the review that they had filled out in the form then return
		 * the book id for later use.
		 *
		 */
		
		$attributesBook = array(
			'author_name' => $data['author_name'],
			'title'       => $data['title']
		);


		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('updated_at', 'NOW()', FALSE);

		$this->db->insert('books', $attributesBook);

		//Gets id from what was inserted earlier.
		$bookId = $this->db->insert_id();


		$attributesReview = array(
			'review'   => $data['review'],
			'user_id'  => $data['id'],
			'books_id' => $bookId,
			'rating'   => $data['rating']
		);

		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('updated_at', 'NOW()', FALSE);

		$this->db->insert('reviews', $attributesReview);

		return $bookId;

	}

	public function get_book_by_id($id)
	{
		/**
		 *
		 * Retrieves book by id, then returns the array of what we retreived
		 * in the database
		 *
		 */
		
		$this->db
				->select('books.id, books.author_name, books.title')
				->from('books')
				->where('books.id', $id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_reviews_by_bookid($id)
	{
		/**
		 *
		 * Retrieves all reviews by book id, and make the order descending.
		 * Then we get the array returned.
		 *
		 */
		
		$this->db
				->select('reviews.created_at, reviews.review, reviews.books_id, reviews.user_id, reviews.rating, users.name, books.id')
				->from('reviews')
				->join('books', 'reviews.books_id = books.id')
				->join('users', 'reviews.user_id = users.id')
				->where('reviews.books_id', $id)
				->order_by("reviews.created_at", "desc");

		$query = $this->db->get();

		return $query->result_array();
	}

	public function add_review_to_book_id($data)
	{
		/**
		 *
		 * Adds review to a book id.
		 *
		 */
		
		$attributes = array(
			'review'   => $data['review'],
			'rating'   => $data['rating'],
			'books_id' => $data['bookid'],
			'user_id'  => $data['user_id']
		);

		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('updated_at', 'NOW()', FALSE);

		$this->db->insert('reviews', $attributes);
	}

	public function get_5_recent_reviews()
	{
		/**
		 *
		 * Gets 5 recent reviews to display on the books page in descending
		 * order.
		 *
		 */
		
		$this->db
				->select('reviews.created_at, reviews.review, reviews.books_id, reviews.user_id, reviews.rating, users.name, books.title, books.id, reviews.user_id')
				->from('reviews')
				->join('users', 'reviews.user_id = users.id')
				->join('books', 'reviews.books_id = books.id')
				->order_by("reviews.created_at", "desc")
				->limit(5);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function get_all_titles()
	{
		/**
		 *
		 * Gets all titles and group them up since some of them might be
		 * the same. Then we return an array.
		 *
		 */
		
		$this->db
				->select('books.title, books.id')
				->from('books')
				->group_by('books.title');

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function get_all_authors()
	{
		/**
		 *
		 * Gets all authors then we group them up since there might be the same one.
		 * Then we return the array.
		 */
		
		$this->db
				->select('books.author_name')
				->from('books')
				->group_by('books.author_name');

		$query = $this->db->get()->result_array();
		return $query;
	}


}










