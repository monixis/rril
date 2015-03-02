<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="http://library.marist.edu/images/jac.png" />
		<link rel="stylesheet" type="text/css" href="./style/main.css" />
		<link rel="stylesheet" type="text/css" href="./style/menuStyle.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="http://library.marist.edu/js/libraryMenu.js" type="text/javascript" charset="utf-8"></script>
	</head>
<body>
<div id="headerContainer">
			<a href="<?php echo base_url(); ?>" target="_self"> <div id="header"></div> </a>
		</div>
		<div id="menu">
			<div id="menuItems">

			</div>

		</div>

		<div class = "container_home">

			<div class="rrilbooks">
				<div id="rankingoptions" style="margin-bottom: 5px;">
					<!--h1 class="head" style="text-align: left;"><?php echo $heading; ?></h1-->
					<!--a href="<?php echo base_url("?c=rril&m=ranking&id=2");?>" target="_self" class="options">Citation</a><a href="<?php echo base_url("?c=rril&m=ranking&id=3");?>" target="_self" class="options">Reviews</a><a href="<?php echo base_url("?c=rril&m=ranking&id=1");?>" target="_self" class="options">Sales</a-->
					<a href="<?php echo base_url();?>" target="_self" class="options" style="float:left; margin-top: 25px;">Books on Leadership</a>	
						
				</div>
	
				<!--div id="bookslist"-->

					<?php foreach($result as $row){
					$imgtitle = $row -> title;
					$imgisbn = $row -> isbn;
					$imgurl = $row -> coverlink;
					$imgsubtitle = $row -> subtitle;
					$imgauthor = $row -> author;
					$imgpublishername = $row -> publishername;
					$imgpublishedyear = $row -> publishedyear;
					$imgjaclink	= "http://marist.summon.serialssolutions.com/search?s.cmd=addFacetValueFilters(ContentType,Book+%2F+eBook)&s.light=t&s.q=" . $imgtitle;
					$imgmaristcoeff = $row -> maristcoeff;
					$imgsalesmc = $row -> sales;
					$imgsalesmc = $imgsalesmc . "/10";
					$imgcitationmc = $row -> citation;
					$imgcitationmc = $imgcitationmc . "/10";
					//$imgreviewmc = $row -> reviews; 
					//$imgreviewmc = $imgreviewmc . "/10";
					
					?>				
					<img class="displaybookdetails" src="<?php echo $imgurl;}?>" />
				
					<div id="bookdetails">
						<h2><?php echo $imgtitle; ?></h2>
						<p><?php echo $imgsubtitle; ?></p>
						<p class="viewdetails"><strong>ISBN: </strong><?php echo $imgisbn; ?></p>
						<p class="viewdetails"><strong>Author: </strong><?php echo $imgauthor; ?></p>
						<p class="viewdetails"><strong>Publisher: </strong><?php echo $imgpublishername; ?></p>
						<p class="viewdetails"><strong>Year Published: </strong><?php echo $imgpublishedyear; ?></p>
						<p class="viewdetails"><strong>Marist Library Link: </strong><a href="<?php echo $imgjaclink; ?>" target="_blank" class="j"><?php echo $imgjaclink; ?></a></p>
						<p class="viewdetails"><strong>Overall MC: </strong><?php echo $imgmaristcoeff; ?></p>
						<p class="viewdetails" style="margin-left: 25px;"><strong>Popular Score: </strong><?php echo $imgsalesmc; ?></p>
						<p class="viewdetails" style="margin-left: 25px;"><strong>Scholarly Score: </strong><?php echo $imgcitationmc; ?></p>
					</div>
				

				<!--/div-->

			</div>
			
		

			<div class="bottom">
				<p class = "foot">
					Marist College, 3399 North Road, Poughkeepsie, NY 12601; 845-575-3000
					<br />
					&#169; Copyright 2007-2014 Marist College. All Rights Reserved.

					<a href="http://www.marist.edu/disclaimers.html" target="_blank" >Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy</a> 
				</p>

			</div>
</body>
</html>

