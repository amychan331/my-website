<?php
class Content {
	private $projectsDir;
	private $projectsList;
	private $textDir;
	private $projectsNav = array();
	private $portfolio;
	private $article;
	private $slider;
	private $description;

	public function __construct() {
		// Set variable
		$this->projectsDir = "public/images";
		$this->textDir = "db/projectDesc";
		$projectsDir = $this->projectsDir; // In order to get this variable when the anonymous function call it with use()
		$this->projectsList = array_slice( array_filter( scandir($projectsDir), function($dir) use ($projectsDir) { return is_dir("$projectsDir/$dir"); } ), 2); // array_slice removes the "." and ".." that scandir returns

		// Get carousel-stylet galleries
		echo "<div id = content>";
		echo "<h1 class='center'>Welcome to my portfolio</h1>";
		foreach($this->projectsList as $project) {
			$this->projectsNav[] = "<a href='#$project'>$project</a>";
			$this->portfolio .= $this->getArticle($project);
		}
		echo "<div id='subNav'>" . implode(' • ', $this->projectsNav) . "</div>";
		echo $this->portfolio;
		echo "</div>";
	}

	private function getArticle($project) {
		$this->setArticle($project);
		return $this->article;
	}

	private function setArticle($project) {
		$this->article = "<hr></hr>";
		$this->article .= "<article>";
			$this->article .= $this->getGallery($project);
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
				$this->description .= "<span class ='link italic'>View code for " . $json['title'] . " at Github:  </span>";
				$this->description .= "<a class='github' href='" . $json['github'] . "'>";
					$this->description .= "<i class='fa fa-github-alt fa-2x' aria-hidden='true'></i>";
				$this->description .= "</a></p>";
			$this->description .= "</div>";
			$this->description .= "<div class='bevel bottom'></div>";
		$this->description .= "</aside>";
	}

	private function getGallery($project) {
		// Loops through the img file for the directories and set the HTML to display it.
		$projDir = "$this->projectsDir/$project";
		$imgList = array_filter( array_slice( scandir($projDir), 2), function($file) use ($projDir) { return is_file("$projDir/$file"); } );
		$this->setGallery($project, $imgList);
		return $this->slider;
	}

	private function setGallery($project, $imgList) {
		// HTML for the galleries
		$this->slider = "<div id='" . $project . "' class='gallery'>";
	    	// Left & right controls
			$this->slider .= <<< EOD
			<div class="carousel-control">
				<a class= "prev" href="#$project" role="button">
					<i class="fa fa-chevron-circle-left fa-3x" aria-hidden="true"></i>
				</a>
				<a class="next" href="#$project" role="button">
					<i class="fa fa-chevron-circle-right fa-3x" aria-hidden="true"></i>
				</a>
			</div>
EOD;
	    	// Main image box
	   		$this->slider .= "<div class='slides'>";
	   			$this->slider .= "<ul>";
		    		foreach ($imgList as $img) {
		    			$this->slider .= "
		    			<li><div class='slide-img'><a href='" . "$this->projectsDir/$project/$img" . "'>
		    				<img src='" . "$this->projectsDir/$project/$img" . "' alt='" . substr( $img, 0, (strrpos($img, '.')) ) . "'>
		    			</a></div></li>";
		    		}
			    $this->slider .= "</ul>";
		    $this->slider .= "</div>";
		$this->slider .= "</div>";
	}
}
?>
