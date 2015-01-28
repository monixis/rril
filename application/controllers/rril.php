<?php
class rril extends CI_Controller {
	public function index() {
		$this -> load -> model('rril_model');
		$data['result'] = $this -> rril_model -> getfeaturedbooks();
		$data['title'] = "Raymond A. Rich Institute for Leadership Development";
		$this -> load -> view('rril_view', $data);
	}

	public function ranking() {
		$this -> load -> model('rril_model');
		//$optionid = $this -> input -> get('id');
		$cid = $this -> input -> get('cid');

		$data['result'] = $this -> rril_model -> getbooks($cid);
		$data['title'] = "RRIL-Books on Leadership";
		$data['heading'] = "RRIL-Books on Leadership";
	/*	if ($optionid == 1) {
			$data['heading'] = "Books on Leadership ranked by Sales";
		} elseif ($optionid == 2) {

			$data['heading'] = "Books on Leadership ranked by Citation";
		} elseif ($optionid == 3) {
			$data['heading'] = "Books on Leadership ranked by Review";

		}*/
		$this -> load -> view('books_view', $data);
	}


	public function bookdetails() {
		$this -> load -> model('rril_model');
		$isbn = $this -> input -> get('isbn');	
		$data['title'] = "RRIL-Books on Leadership";
		$data['result'] = $this -> rril_model -> getbookdetails($isbn);				
		$this -> load -> view('bookdetails', $data);
	}
	
	
	public function getfeaturedbooks(){
		$this -> load -> model('rril_model');
		$data['result'] = $this -> rril_model -> getfeaturedbooks();
		$this -> load -> view('main_view', $data);	
	}	
	
	public function getbooksbycategory(){
		$this -> load -> model('rril_model');
		$qry = $this -> input -> get('qry');	
		$data['title'] = "RRIL-Books on Leadership";
		$data['result'] = $this -> rril_model -> getbooksbycategory($qry);
		$this -> load -> view('main_view', $data);	
	}	
	
}
?>