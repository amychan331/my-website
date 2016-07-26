<?php
include 'private/mailing.php';

class Content {
	private $form;
	private $name;
	private $email;
	private $subject;
	private $message;
	private $error = array();
	private $aside;

	public function __construct() {
		echo "<main>";
		$this->subheader();
		$this->getArticle();
		echo "</main>";
	}

	private function subheader() {
	echo <<< EOD
	<div id='subheader'>
		<h1>Contact Me</h1>
	<hr></hr>
EOD;
	}

	private function getArticle() {
		if ( $this->validation() ) {
			echo "Your submission was successful. I will reply as soon as possible.";
			$mail = new Mail($this->name, $this->email, $this->subject, $this->message);
		}

		echo $this->getForm();
		echo $this->getSocial();

		echo "</div>";
	}

	private function validation() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (empty($_POST["name"])) {
				$this->error['name'] = "Name is required.";
		 	} else {
		    	$this->name = $this->sanitize($_POST["name"]);
		  	}		

		  	if (empty($_POST["email"])) {
		    	$this->error['email'] = "Email is required so I can reply.";
		  	} else if ( !preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $_POST['email']) ) {
				$this->error['email'] = "Valid email address is required so I can reply.";
			} else {
		    	$this->email = $this->sanitize($_POST["email"]);
		  	}		

		  	if (empty($_POST["subject"])) {
		    	$this->subject = "";
		  	} else {
		    	$this->subject = $this->sanitize($_POST["subject"]);
		  	}		

		  	if (empty($_POST["message"])) {
		    	$this->message = "";
		  	} else {
		    	$this->message = $this->sanitize($_POST["message"]);
		  	}
		}
	}

	private function sanitize($input) {
	  $input = trim($input);
	  $input = stripslashes($input);
	  $input = htmlspecialchars($input);
	  return $input;
	}

	private function getForm() {
		$this->setForm();
		return $this->form;
	}

	private function setForm() {
		$this->form = "<form id='contact' method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
			$this->form .= "<h2>Message Me!</h2>";
			$this->form .= "<label for='name'>What's your name? </label><input type='text' name='name' required /><br>";
			if ( isset($this->error['name']) ) { $this->form .= "<span class='error'>* " . $this->error['name'] . "</span><br>"; };
			$this->form .= "<label for='email'>Your email address? </label><input type='email' name='email' required /><br>";
			if ( isset($this->error['email']) ) { $this->form .= "<span class='error'>* " . $this->error['email'] . "</span><br>"; };
			$this->form .= "<label for='subject'>A subject line? </label><input type='text' name='subject' required /><br>";
			$this->form .= "<label for='message'>What is you message? </label><textarea name='Message' cols='30' rows='8'></textarea><br>";
			$this->form .= "<input type='submit' name='submit' value='Contact Me!'>";
		$this->form .= "</form>";
	}

	private function getSocial() {
		$this->setSocial();
		return $this->aside;
	}

	private function setSocial() {
		$this->aside = "<aside id='social'><h2>Find me on Social Media:</h2>";
		$this->aside .= "Not really into emailing? Grab me at one of the social media sites!";
		$this->aside .= "<hr></hr>";
		$this->aside .= "<a href='https://twitter.com/CraftPlusTech'><i class='fa fa-twitter fa-1x' aria-hidden='true' title='Amy\'s Twitter Page'></i> My Twitter Page</a><br>";
		$this->aside .= "<a href='https://www.linkedin.com/in/amyyychan'><i class='fa fa-linkedin fa-1x' aria-hidden='true' title='Amy'\s LinkedIn Profile'></i> My LinkedIn Profile</a><br>";
		$this->aside .= "<a href='https://github.com/amychan331'><i class='fa fa-github fa-1x' aria-hidden='true' title='View Amy\'s Github Repos'></i> My GithuHub Repos</a><br>";
		$this->aside .= "<a href='http://www.craftplustech.com/blog/'><i class='fa fa-wordpress fa-1x' aria-hidden='true' title='View Amy\'s WordPress Post'></i> My WordPress Blog</a><br>";
		$this->aside .= "</aside>";
	}
}