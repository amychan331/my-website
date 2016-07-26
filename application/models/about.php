<?php
class Content {
	private $article;

	public function __construct() {
		echo "<main>";
		$this->subheader();
		echo $this->getArticle();
		echo "</main>";
	}

	private function subheader() {
		echo <<< EOD
		<div id ='subheader'>
			<h1>About</h1>
			<div id='subNav'>
				<a href='#amy'> Amy</a> •
				<a href='#site'> Site</a>
			</div>
		</div>
EOD;
	}

	private function getArticle() {
		$this->setAmy();
		$this->setSite();
		return $this->article;
	}

	private function setAmy() {
$this->article .= <<< EOD
	<hr></hr>
	<article id='amy'>
		<aside class='left'>
			<img src='public/images/AmyImg' alt='Amy Yuen Ying Chan' width='200px'>
		</aside>
		<section>
			<h2 class='italic'>About Amy</h2>
			<span>
				I am a developer and designer based in North California.
				My interest in drawing and problem-solving with products that can affect social life initially took me to architecture school,
				but in the development of my web portfolio after my graduation, I found a new passion in web development.
			</span><br><span>
				For the early period of my educational and professional development, my focus had been in design.
				I created presentation boards of my work with Adobe Creative Suite programs like Photoshop and Illustrator.
				I drafted architectural plans and presentation drawings with AutoCad and SketchUp.
				I continued my hobbies in sketching, dipping into pencil and charcoal work, watercoloring, and pen drawings.
			</span><br><span>
				Upon my graduation from California Polytechnic State University of San Luis Obispo,
				I volunteered at different nonprofits.
				I created outreach materials with the design programs that I picked up in my previous college projects.
				I handled variety of projects as a print specialist during the day, while taking professional development classes at the local community college at night.
			</span><br><span>
				For the last few years, I took increasing amount of programming classes. 
				I completed the courses for the Web App Programming and Linux/Unix Administration program.
				I received certificate for the former and is waiting for the later.
				You can view some of my work at the portfolio page or read my current adventure at my blog.
				Feel free to connect me via social media - I am a long time advocate of Twitter! - or see me at one of the Meetup events I will be attending as stated at the calender below!
			</span><br>
		</section>
	</article>
EOD;
	}

	private function setSite() {
$this->article .= <<< EOD
	<hr></hr>
	<article id='site'>
		<aside id='circle' class='right'>
			<div class='icon-circle'> 
				<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
				<ul>
					<li><i class="fa fa-html5 fa-3x" aria-hidden="true"></i></li>
					<li><i class="fa fa-css3 fa-3x" aria-hidden="true"></i></li>
					<li><i class="devicon devicon-javascript-plain aria-hidden="true""></i></li>
					<li><i class="devicon devicon-jquery-plain aria-hidden="true""></i></li>
					<li class="fa-stack fa-lg">
						<i class="fa fa-square fa-stack-2x" aria-hidden="true"></i>
						<i class="fa fa-terminal fa-stack-1x fa-inverse" aria-hidden="true"></i>
					</li>
					<li><i class="fa fa-wordpress fa-3x" aria-hidden="true"></i></li>
					<li><i class="fa fa-font-awesome fa-3x" aria-hidden="true"></i></li>
					<li><i class="devicon devicon-gimp-plain aria-hidden="true""></i></li>
					<li><i class="fa fa-github fa-3x" aria-hidden="true"></i></li>
					<li><i class="devicon devicon-vim-plain" aria-hidden="true"></i></li>
					<li><i class="fa fa-book fa-3x" aria-hidden="true"></i></li>
					<li><i class="fa fa-coffee fa-3x" aria-hidden="true"></i></li>
				</ul>
			</div>
		</aside>
		<section>
			<h2 class='italic'>About the Site</h2>
			<span>
				The site is pretty much made from scratch, though I do use a looping system to extract content from my WordPress blog, which is also placed at a subdirectory link.
				Some may remember that I started my web development journey by blogging about my love of nature and my sketching works on WordPress.
			</span><br><span>
				It's been a long but interesting path.
			</span><br><span>
				The site design reflects some of its root, with its wood theme and sketchbook-like background. Programming-wise,
				this website used a variety of technologies. It is done in a LAMP stack, structured with MVC, and done with progressive enhancement in mind. 
				Here are some of the technologies behind this:
			</span><br><span>
				<h3>Front-end</h3>
				HTML5, CSS3, Javascript with jQuery and Ajax. I tried to utilize the semantic tags and header so it would be accessibility-friendly - 
				I found the book "Adaptive Web Design" very useful for ideas. The technicality I left to Google.
				Most my JS and CSS animation are actually kept to the Portfolio page. Ajax is used in the Blog page only.
				Even if JS is turn off, most of the site is still fully functional. Noscript tag is used to alert user which features are inaccessible without JS.
				There are also JS to detect if jQuery library was blocked but not JavaScript for some reason. 
			</span><br><span>
				<h3>Back-end</h3>
				PHP, version 7 included. Knowledge of PHP were particularly helpful in the Blog and Contact page. 
				In Blog, I modified WordPress's looping system so I can extract excerpt from my WordPress blog under the domain craftplustech.com/blog/.
				Search by tags is also enabled, so if you want to play with that, have fun!
				Contact uses both HTML5's 'required' feature and new input types to validate in the client-side, but PHP also validates input in the backend. 
				Web security is also an interest of mine, though my exploration of it was more extensive my EduGarden project at Github.
			</span><br><span>
				<h3>Data</h3>
				For static pages like this one and my resume, I just type straight into the HTML. 
				For my blog, I use the WordPress loop to extract excerpts and contents from my WP blog. 
				For my portfolio, I store my project description in JSON. PHP extracts both the image file and JSON file dynamically.
			</span><br><span>
				<h3>Image source</h3>
				The icons are currently from Font Awesome and Devicon, though I hope eventually change them to SVG, 
				since I know NoScript blocks web font.
			</span><br><span>
				<h3>Version Control</h3>
				Github. Thank you for keeping track of my codes during the reconstruction of my site!
			</span><br><span>
				<h3>Platform</h3>
				A combination of Vim and Sumblime Text on my much-loved Macbook Pro.
			</span><br><span>
				<h3>Organization</h3>
				Evenote and my trusty sketchbook, which now have more notes and to-do list than actual sketching...
			</span><br><span>
				<h3>Survival Tool</h3>
				Coffee. A lot and a lot of coffee.
			</span><br>
		</section>
	</article>
EOD;
	}
}
?>