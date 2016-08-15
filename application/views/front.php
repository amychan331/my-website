<?php
    $template = "front";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "utf-8">
	<title>Craft + Tech</title>
	<meta name="description" content="Record my exploration in craft and technology">
	<meta name="author" content="Amy Yuen Ying Chan">
	<link rel="stylesheet" type="text/css" href="public/css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="public/css/<?php echo $template ?>.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></	script>
	<![endif]-->
</head>
<body>
	<a href="#indexNav" id="skip-main">Skip to navigation</a>
	<div id="indexContent">
		<div id='indexArticle'>
			<header role="banner">
				<div id="logo"><a href="index.html">Craft + Tech</a></div>
			</header>
		<?php
			$content = new Content();
			echo "<hr>";
			echo "<div id='indexNav'>";
				require_once('application/views/menu.php'); 
			echo "</div>";
			echo "<hr>";
		?>
			<div id="social-media">
				<a href="https://twitter.com/CraftPlusTech" aria-label="View Amy's Twitter Page"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
				<a href="https://www.linkedin.com/in/amyyychan" aria-label="View Amy's LinkedIn Profile"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
				<a href="https://github.com/amychan331" aria-label="View Amy's Github Repos"><i class="fa fa-github-square fa-2x" aria-hidden="true"></i></a>
			</div>	
		</div>	
	</div>
	<?php require_once('application/views/footer.php'); ?>