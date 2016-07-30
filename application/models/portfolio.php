<?php
class Content {
	private $projectsDir;
	private $projectsList;
	private $textDir;
	private $projectsNav = array();
	private $portfolio;
	private $article;
	private $slider;
	private $circle;
	private $description;

	public function __construct() {
		// Set variable
		$this->projectsDir = "public/images";
		$this->textDir = "db/projectDesc";
		$projectsDir = $this->projectsDir; // In order to get this variable when the anonymous function call it with use()
		$this->projectsList = array_slice( array_filter( scandir($projectsDir), function($dir) use ($projectsDir) { return is_dir("$projectsDir/$dir"); } ), 2); // array_slice removes the "." and ".." that scandir returns

		echo "<main id='content'>";
		
		// Using the list of projects, set up the subnav and article contents
		foreach($this->projectsList as $project) {
			// Seperate out the $project string, first 3 character for order, rest the actual project name.
			$order = substr($project, 0, 3);
			$project = substr($project, 3);
			$this->projectsNav[] = "<a href='#$project'>$project</a>";
			$this->portfolio .= $this->getArticle($order, $project);
		}

		//The last row, where smaller code snippets without screenshots are display
		$this->portfolio .= "<hr></hr>";
		$this->portfolio .= $this->iconCicle("snippets"); 
		$this->portfolio .= $this->getDesc("snippets");
		$this->projectsNav[] = "<a href='#snippets'>snippets</a>";

		// Outpet the subheader and article contents.
		$this->subheader();
		echo $this->portfolio;
		echo "</main>";
	}

	private function subheader() {
		echo "<noscript>
    			<p>Efforts were made so this site remain functional without JavaScript... except for this - it IS a portfolio for a web developer, after all.</p>
    			<p>JS from my site is required for the Github icon to spin when clicked, and jQuery is required to operate the image slider.</p>
			</noscript>";
		echo "<div id='subheader'>";
			echo "<h1>Portfolio</h1>";
			echo "<div id='subNav'>" . implode(' • ', $this->projectsNav) . "</div>";
		echo "</div>";
	}

	private function getArticle($order, $project) {
		$this->setArticle($order, $project);
		return $this->article;
	}

	private function setArticle($order, $project) {
		$this->article = "<hr></hr>";
		$this->article .= "<article>";
			$this->article .= $this->getGallery($order, $project);
			$this->article .= $this->getDesc($project);
		$this->article .= "</article>";
	}

	private function getDesc($project) {
		$projFile = file_get_contents("$this->textDir/$project.json");
		$json = json_decode($projFile, true);
		$this->setDesc($json);
		return $this->description;
	}

	private function setDesc($json) {
		$this->description = "<aside>";
			$this->description .= "<div class='bevel top'></div>";
			$this->description .= "<div class='description'>";
				$this->description .= "<h2>" . $json['title'] . "</h2><br />";
				$this->description .= "<span>" . $json['desc'] . "</span>";
					$this->description .= "<span class ='link italic'>View code for " . $json['title'] . " at Github >> </span>";
				$this->description .= "<a class='icon' href='" . $json['github'] . "' aria-label='Project's Github'>";
					$this->description .= "<i class='fa fa-github-alt fa-2x' aria-hidden='true'></i>";
				$this->description .= "</a></p>";
			$this->description .= "</div>";
			$this->description .= "<div class='bevel bottom'></div>";
		$this->description .= "</aside>";
	}

	private function getGallery($order, $project) {
		// Loops through the img file for the directories and set the HTML to display it.
		$project = $order . $project;
		$projDir = "$this->projectsDir/$project";
		$imgList = array_filter( array_slice( scandir($projDir), 2), function($file) use ($projDir) { return is_file("$projDir/$file"); } );
		$this->setGallery($project, $imgList);
		return $this->slider;
	}

	private function setGallery($project, $imgList) {
		// HTML for the galleries
		$this->slider = "<div id='" . $project . "' class='gallery' role='listbox' aria-label='" . $project . " carousel'>";
	    	// Left control
			$this->slider .= <<< EOD
			<div class="carousel-control">
				<a href="#$project" class="prev" role="button" title="previous"'>
					<i class="fa fa-chevron-circle-left fa-3x" aria-hidden="true"></i>
				</a>
			</div>
EOD;
	    	// Main image box
	   		$this->slider .= "<div class='slides'>";
	   			$this->slider .= "<ul>";
		    		foreach ($imgList as $img) {
		    			$this->slider .= "
		    			<li role='option'><div class='slide-img'><a href='" . "$this->projectsDir/$project/$img" . "'>
		    				<img src='" . "$this->projectsDir/$project/$img" . "' alt='" . substr( $img, 0, (strrpos($img, '.')) ) . "'>
		    			</a></div></li>";
		    		}
			    $this->slider .= "</ul>";
		    $this->slider .= "</div>";

		    // Right control
			$this->slider .= <<< EOD
		    <div class="carousel-control">
				<a href="#$project" class="next" role="button" title="next">
					<i class="fa fa-chevron-circle-right fa-3x" aria-hidden="true" tabindex="-1"></i>
				</a>
			</div>
		</div>
EOD;
	}

	private function iconCicle($identifier) {
		$this->circle = "<div class='gallery' role='img' aria-label='Circle of icons indicating what language the project used'><div id='$identifier' ";
		$this->circle .= <<< EOD
		 class='circle'>
			<div class='icon-circle'> 
				<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
				<ul>
					<li class="fa-stack fa-lg" role='img' aria-label='terminal for bash scripting'>
						<i class="fa fa-square fa-stack-2x" aria-hidden="true"></i>
						<i class="fa fa-terminal fa-stack-1x fa-inverse" aria-hidden="true"></i>
					</li>
					<li><i class="devicon devicon-python-plain aria-hidden="true" title="python"></i></li>
					<li><i class="fa fa-wordpress fa-3x" aria-hidden="true" title="wordpress"></i></li>
					<li><i class="devicon devicon-php-plain aria-hidden="true" title="php"></i></li>
				</ul>
			</div>
		</div></div>
EOD;
		return $this->circle;
	}
}
?>
