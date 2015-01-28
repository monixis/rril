<?php
class rril_model extends CI_Model {

	function __construct() {
		// Call the Model constructor
		parent::__construct();
		// $this->load->database();
	}

	function getdata() {
		$this -> db -> select('isbn');
		$query = $this -> db -> get('books');
		return $query -> result();
	}
	
	function getbooks($cid) {

		if ($cid == 0) {
			$sql = "SELECT DISTINCT books.isbn, books.title, books.author, books.publishername, books.publishedyear, scores.maristcoeff as 'weightedaverage' FROM scores INNER JOIN books ON scores.isbn = books.isbn ORDER BY scores.maristcoeff DESC LIMIT 200";
			$results = $this -> db -> query($sql);
		} else {
			$sql = "SELECT DISTINCT books.isbn, books.title, books.author, books.publishername, books.publishedyear, scores.maristcoeff as 'weightedaverage' FROM scores INNER JOIN books ON scores.isbn = books.isbn WHERE books.category = ? ORDER BY scores.maristcoeff DESC LIMIT 200";
			$results = $this -> db -> query($sql, array($cid));
		}

		return $results -> result();
	}

	function getbookdetails($isbn) {
		$sql = "SELECT books.isbn, books.title, books.subtitle, books.author, books.publishername, books.publishedyear, scores.maristcoeff, scores.sales, scores.citation FROM books INNER JOIN scores ON books.isbn = scores.isbn WHERE books.isbn= ?";
		$results = $this -> db -> query($sql, array($isbn));
		return $results -> result();
	}

	function getfeaturedbooks() {
		$sql = "SELECT DISTINCT books.isbn, books.title, scores.maristcoeff, books.coverlink, books.author FROM books INNER JOIN scores ON books.isbn = scores.isbn ORDER BY scores.maristcoeff DESC LIMIT 50";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	function getbooksbycategory($qry){
		$sql = "SELECT DISTINCT books.isbn, books.title, scores.maristcoeff, books.coverlink, books.author FROM books INNER JOIN scores ON books.isbn = scores.isbn INNER JOIN bookcategory on books.isbn = bookcategory.isbn WHERE ";
		$sql = $sql . $qry;
		$results = $this -> db -> query($sql);
		return $results -> result();
	}

}
?>