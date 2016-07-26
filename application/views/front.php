<?php
    $template = "front";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "utf-8">
	<title>Craft + Tech</title>
	<meta home="description" content="Record my exploration in craft and technology">
	<meta home="author" content="Amy Yuen Ying Chan">
	<link rel="stylesheet" type="text/css" href="public/css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="public/css/<?php echo $template ?>.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></	script>
	<![endif]-->
</head>
<body>
	<div id="indexContent">
		<div id='indexArticle'>
			<header>
				<div id="banner"><a href="index.html">Craft + Tech</a></div>
			</header>
		<?php
			$content = new Content();
			echo "<hr></hr>";
			echo "<div id='indexNav'>";
				require_once('application/views/menu.php'); 
			echo "</div>";
			echo "<hr></hr>";
		?>
			<div id="social-media">
				<a href="https://twitter.com/CraftPlusTech"><i class="fa fa-twitter-square fa-2x" aria-hidden="true" title="View Amy's Twitter Page"></i></a>
				<a href="https://www.linkedin.com/in/amyyychan"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true" title="View Amy's LinkedIn Profile"></i></a>
				<a href="https://github.com/amychan331"><i class="fa fa-github-square fa-2x" aria-hidden="true" title="View Amy's Github Repos"></i></a>
			</div>	
		</div>	
	</div>
	<?php require_once('application/views/footer.php'); ?>