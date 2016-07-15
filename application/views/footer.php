<footer>
	<p class='copyright'>
		&copy <?php echo date("Y");?> Amy Yuen Ying Chan. 
	</p>
</footer>
</body>
<?php
	if ( isset($portfolio) ) {
		echo "<script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>";
		echo "<script src='public/js/gallery.js'></script>";
	}
?>
</html>
<?php
	ob_flush();
?>