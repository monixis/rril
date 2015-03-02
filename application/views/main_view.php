<!--!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title><?php echo $title; ?></title-->
		<link rel="stylesheet" type="text/css" href="./style/view.css" />
	<!--/head>
	<body>
		<div class = "container_home">
				<div id="emplist"-->
					<!--h2>Books on Leadership</h2-->
					<!--ol id="list"-->
						<table>
					<?php
					foreach ($result as $row) {
						$title = $row -> title;
						$isbn = $row -> isbn;
					    $booksurl = base_url("?c=rril&m=bookdetails&isbn=").$isbn;
						$bookcover = $row -> coverlink;
						$maristcoeff = $row -> maristcoeff;
						$author = $row -> author;
					?>
						<tr id = "list">
							<td><a href="<?php echo $booksurl; ?>"><img class="covers" src="<?php echo $bookcover; ?>" /></a></td>	
							<td><a href="<?php echo $booksurl; ?>" target="_blank"><p style="margin-left: 10px;"><?php echo $title; ?></p></a><p style="margin-left: 10px;"><?php echo $author; ?></p></td>	
						</tr>
						<tr></tr>
						<!--li class="emp"><img class="covers" src="<?php echo $bookcover; ?>" /><br/><?php echo $title; ?></li-->
					<?php
					}
					?>
					</table>	
					<!--</ol>
			     </div>
         </div>
	</body>
</html-->