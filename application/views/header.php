<?php
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "utf-8">
	<title>Craft + Tech</title>
	<meta name="description" content="My web portfolio that records my exploration in craft and technology">
	<meta name="author" content="Amy Yuen Ying Chan">
	<meta name="viewport" content="initial-scale=1.0, width=device-width">
	<link rel="stylesheet" type="text/css" href="public/css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="public/js/mobile.js"></script>
	<?php if (strpos($_SERVER["REQUEST_URI"], "blog" ) !== false) { echo "<script src=\"public/js/blog.js\"></script>"; } ?>
	<?php if (strpos($_SERVER["REQUEST_URI"], "portfolio" ) !== false) { echo "<script src=\"public/js/portfolio.js\"></script>"; } ?>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></	script>
	<![endif]-->
</head>
<body>
	<a href="main" id="skip-main">Skip to main content</a>

	<header>
		<div id="logo">
			<h1><a href="index">Craft + Tech</a></h1>
		</div>
		<nav id='primary-menu' role="navigation" aria-label="Primary Menu">
			<a href="#" id="navicon" aria-label="Expand menu bar" onclick="toggleNav()"><i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i></a>
			<div id="main-menu">
				<div class="parallelogram"><a href="index" aria-label="About"><span>About</span></a></div>
				<div class="parallelogram"><a href="blogs" aria-label="Blog"><span>Blog</span></a></div>
				<div class="parallelogram"><a href="portfolio" aria-label="Portfolio"><span>Portfolio</span></a></div>
			</div>
		</nav>
	</header>
	<div id="container">