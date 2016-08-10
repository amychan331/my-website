<footer role='contentinfo'>
	<p class='copyright'>
		&copy; <?php echo date("Y");?> Amy Yuen Ying Chan. 
	</p>
</footer>
<script src='public/js/mobile.js'></script>
<?php
	if ( isset($portfolio) ) { // originally flag at the controller
		echo "<script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>";
		echo "<script src='public/js/gallery.js'></script>";
		// In case if user have NoScript and enable local JS but not jQuery,
		// insert an alert msg at the top of content.
		echo "<script>
		if (typeof jQuery == 'undefined') {
			var alertMsg = document.createElement('div');
			alertMsg.setAttribute('id', 'noJquery');

			var text = 'Oops! Looks like JavaScript is on, but not jQuery - please turn it on to operate the slider.';
			var textNode = document.createTextNode(text);
			alertMsg.appendChild(textNode);

			var toPrepend = document.getElementById('subheader');

			toPrepend.insertBefore(alertMsg, toPrepend.firstChild);
		}
		</script>";
	}

	if ( isset($blog) ) { // originally flag at the controller
		echo "<script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>";
		echo "<script src='public/js/blog.js'></script>";
		// In case if user have NoScript and enable local JS but not jQuery,
		// insert an alert msg at the top of content.
		echo "<script>
		if (typeof jQuery == 'undefined') {
			var alertMsg = document.createElement('div');
			alertMsg.setAttribute('id', 'noJquery');

			var text = 'Oops! Looks like JavaScript is on, but not jQuery - please turn it if you want to view my blog content here. If you don\'t want to, don\'t worry - you can always click on my WordPress link instead!';
			var textNode = document.createTextNode(text);
			alertMsg.appendChild(textNode);

			var toPrepend = document.getElementById('subheader');

			toPrepend.insertBefore(alertMsg, toPrepend.firstChild);
		}
		</script>";
	}
?>
</body>
</html>
<?php
	ob_flush();
?>