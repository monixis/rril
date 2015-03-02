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
			$sql = "SELECT DISTINCT isbn.isbn, books.title, books.author, books.publishername, books.coverlink, books.publishedyear, scores.maristcoeff as 'weightedaverage' FROM scores INNER JOIN isbn ON scores.iid = isbn.iid INNER JOIN booksISBN ON isbn.iid = booksISBN.iid INNER JOIN books ON booksISBN.bid = books.bid ORDER BY scores.maristcoeff DESC LIMIT 200";
			$results = $this -> db -> query($sql);
		} else {
			$sql = "SELECT DISTINCT isbn.isbn, books.title, books.author, books.publishername, books.coverlink, books.publishedyear, scores.maristcoeff as 'weightedaverage' FROM scores INNER JOIN isbn ON scores.iid = isbn.iid INNER JOIN booksISBN ON isbn.iid = booksISBN.iid INNER JOIN books ON booksISBN.bid = books.bid INNER JOIN booksCategory ON books.bid = booksCategory.bid INNER JOIN categories ON booksCategory.cid = categories.cid WHERE books.category = ? ORDER BY scores.maristcoeff DESC LIMIT 200";
			$results = $this -> db -> query($sql, array($cid));
		}

		return $results -> result();
	}

	function getbookdetails($isbn) {
		$sql = "SELECT isbn.isbn, books.title, books.subtitle, books.author, books.coverlink, books.publishername, books.publishedyear, scores.maristcoeff, scores.sales, scores.citation FROM books INNER JOIN booksISBN ON books.bid = booksISBN.bid INNER JOIN isbn ON booksISBN.iid = isbn.iid INNER JOIN scores ON isbn.iid = scores.iid WHERE isbn.isbn = ?";
		$results = $this -> db -> query($sql, array($isbn));
		return $results -> result();
	}

	function getfeaturedbooks() {
		$sql = "SELECT DISTINCT isbn.isbn, books.title, scores.maristcoeff, books.coverlink, books.author FROM books INNER JOIN booksISBN ON books.bid = booksISBN.bid INNER JOIN isbn ON booksISBN.iid = isbn.iid INNER JOIN scores ON isbn.iid = scores.iid ORDER BY scores.maristcoeff DESC LIMIT 50";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	function getbooksbycategory($qry){
		$sql = "SELECT DISTINCT isbn.isbn, books.title, scores.maristcoeff, books.coverlink, books.author FROM books INNER JOIN booksISBN ON books.bid = booksISBN.bid INNER JOIN isbn ON booksISBN.iid = isbn.iid INNER JOIN scores ON isbn.iid = scores.iid INNER JOIN booksCategories on books.bid = booksCategories.bid WHERE ";
		$sql = $sql . $qry;
		$results = $this -> db -> query($sql);
		return $results -> result();
	}

}
?>