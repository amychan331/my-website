<?php

class Portfolio extends Model
{
	private $projectsList;
	public $projects = array();

    public function __construct() {
        parent::__construct();

		// Using the list of projects, set up the subnav and article contents
		$this->projectsList = array_slice(
			array_filter(
				scandir("public/images"), function($item) {
					return is_dir("public/images/$item");
				}
			)
		, 2); // array_slice removes the "." and ".." that scandir returns

		$this->getData();
    }

    private function getData() {
    	foreach($this->projectsList as $proj) {
			// Seperate out the $project string, with first 3 char as list order & rest as project name.
			$order = substr($proj, 0, 2);
			$proj = substr($proj, 3);
			$this->projects[$order]["Name"] = $proj;
  			$this->setGallery($order, $proj);
  			$this->setDesc($order, $proj);
    	}
    }

	private function setGallery($order, $proj) {
		$imgList = array_filter(
			array_slice(
				scandir("public/images/$order-$proj"), 2), function($item) use ($order, $proj) {
					return is_file("public/images/$order-$proj/$item");
				}
			);
		$this->projects[$order]["Images"] = $imgList;
	}

	private function setDesc($order, $proj) {
		$file = json_decode( file_get_contents("db/projectDesc/$proj.json"), true);
		$this->projects[$order]["Desc"] = $file["desc"];
		$this->projects[$order]["Github"] = $file["github"];
	}
}

