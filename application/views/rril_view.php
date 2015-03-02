
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
		<link rel="stylesheet" href="http://library.marist.edu/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="http://library.marist.edu/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("a[rel^='prettyPhoto']").prettyPhoto({
					slideshow : false,
					allow_resize : true, /* Resize the photos bigger than viewport. true/false */
					autoplay : false, /* Automatically start videos: True/False */
					deeplinking : false, /* Allow prettyPhoto to update the url to enable deeplinking. */
					overlay_gallery : false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
					keyboard_shortcuts : false,
					theme: "facebook"
				});
			});
		</script>
		<script type="text/javascript">	
		
			$(document).ready(function() {
			
				$('#refine, #mainlist').hover(function() {
					$(this).css('overflow-y', 'auto');
				}, function() {
					$(this).css('overflow-y', 'hidden');
				});
				search();
				//$('#mainlist').load('<?php echo base_url("?c=rril&m=getbooksbycategory&qry=cid%20in%20(1,2,3,4,5,6,7,8,9,10,11,12)%20ORDER%20BY%20books.title%20ASC%20LIMIT%2025"); ?>');
				
			});
		</script>
		
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

			<div class="empdetails">
				<!--div style="width: 12px; float:left;"><img src="./icons/beta.gif" /></div-->			
				<div id="rtwoptions" style="margin-bottom: 5px;">
					<h1 style="color: #b31b1b; text-align: center;">Books on Leadership</h1>
					<!--div id="options"><a href="http://libguides.marist.edu/RoadtotheWorkplace" title="Road to the Workplace: Research Tools" target="_blank"><img class="mainoptions" src="./icons/libguides.png" /></a><a href="http://library.marist.edu/forms/ask.php" title="Ask-a-Librarian" target="_blank"><img class="mainoptions" src="./icons/contact.png" /></a><a href="<?php echo base_url("?c=rtw&m=disclaimer?iframe=true&width=47%&height=55%"); ?>" target="_blank" rel="prettyphoto[iframes]"><img class="mainoptions" src="./icons/disclaimer.png" /></a></div-->
				</div>
				
				<div id="breadcrumbs">
					<p id="results"></p><div class="options">Grouped by: <select><option value="1">Title</option><option value="2">Author</option><option value="3">Marist Coeffcient</option></select></div>
						<!--a href="">Title</a><a href="" style="margin-left: 15px;">Author</a><a href="" style="margin-left: 15px;">Marist Coefficient</a-->
				</div>
				
				<div id="refine">
					
				<p style="font-size: 17px; color:#b31b1b; margin-top: 0px;">Categories</p>	
				<input class="category" type="radio" name="category" value="0" checked/>All</br>
				<input class="s-category" type="radio" name="category" value="1" />Business</br>
				<input class="ss-category" type="radio" name="category" value="2" />Biographies</br>
				<input class="ss-category" type="radio" name="category" value="3" />Failure</br>
				<input class="ss-category" type="radio" name="category" value="4" />Success</br>
				<input class="s-category" type="radio" name="category" value="5" />Politics</br>
				<input class="ss-category" type="radio" name="category" value="6" />Biographies</br>
				<input class="ss-category" type="radio" name="category" value="7" />Executive</br>
				<input class="sss-category" type="radio" name="category" value="8" />Leadership by Crisis</br>		
				<input class="s-category" type="radio" name="category" value="9" />Legislative</br>
				<!--input class="s-category" type="radio" name="category" value="10" />Judicial</br-->
				<input class="s-category" type="radio" name="category" value="11" />International Leadership</br>
				<input class="s-category" type="radio" name="category" value="12" />General</br>
				</div>
				
				
				<div id="mainlist">
					 
				</div>
				<!--div id="search"><a class="btn" id="c" style="float:left">Clear</a></div-->
			</div>

			<div class="bottom">
				<p class = "foot">
					Marist College, 3399 North Road, Poughkeepsie, NY 12601; 845-575-3000
					<br />
					&#169; Copyright 2007-2014 Marist College. All Rights Reserved.

					<a href="http://www.marist.edu/disclaimers.html" target="_blank" >Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy</a> 
				</p>

			</div>
			<script type="text/javascript">
				var ctype = 0;
				var gtype = 1;
				
				$("input").click(function(){
					ctype = $(this).val();
					gtype = $("select").val();
					search();
				
				});
				
				$("select").change(function(){
					gtype = $(this).val();
					
					search();
					//alert(ctype);
					//alert(gtype);
				});
							
								
				function search(){
					//url = "<!--?php echo base_url("?c=rril&m=getbooksbycategory"); ?>" + "&qry=cid%20in%20(1,2,3,4,5,6,7,8,9,10,11,12)%20ORDER%20BY%20books.title%20ASC";
					var $url = "<?php echo base_url("?c=rril&m=getbooksbycategory"); ?>";
					var $qry = " ";
				
				if (ctype == 0){
					$qry = "&qry=cid%20in%20(1,2,3,4,5,6,7,8,9,10,11,12)";
				} else if (ctype == 1){
					$qry = "&qry=cid%20in%20(1,2,3,4)";
				} else if (ctype == 5){
					$qry = "&qry=cid%20in%20(5,6,7,8,9,10,11)";
				} else if (ctype == 7){
					$qry = "&qry=cid%20in%20(7,8)";
				} else{
					$qry = "&qry=cid%20in%20(" + ctype + ")";
				}	
				
				if (gtype == 1){
					$qry = $qry + "%20ORDER%20BY%20books.title%20ASC";
				} else if (gtype == 2){
					$qry = $qry + "%20ORDER%20BY%20books.author%20ASC";
				} else if (gtype == 3){
					$qry = $qry + "%20ORDER%20BY%20scores.maristcoeff%20DESC";
				}
				
				$url = $url + $qry;
								
				var librarytips = ["Marist Library subscribes to more than 200 databases that you can use for your research.", "Marist Library holds about 195,000 print books.", "Through Marist Library you can get access to 131,000 e-books and 75,000 e-Journals.", "Students may reserve one of the Library's fifteen Collaborative Rooms", "Stop by or make an appointment with our Librarians for a research consulation.", "Fox Hunt searches relevant scholarly and academic resources provided by the Libray."];
							
				tips = Math.floor((6) * Math.random());
				
				$("#mainlist").empty();
				$("#mainlist").html('<div id="searching" style="margin-top: 155px; text-align: center;"><img src="./icons/loading.gif" /><br/><p style="text-align: center;">'+ librarytips[tips] +'</p></div>');	
				
				setTimeout (function(){
				
				
					$('#mainlist').load($url);
					//breadcrumb();
				}, 1500);
		
				}
			
				
				
			</script>
			
			
	</body>
</html>
