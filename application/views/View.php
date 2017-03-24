<?php
class View {

	private $controller;
    private $model;
    public $slider;

    public function __construct(Controller $controller, Model $model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        if ($this->controller instanceof IndexController) {
            echo $this->model;
            echo "<aside id=\"contact\">";
                $form = new Form();
                echo $form->output();
            echo "</aside>";
        }
        if ($this->model instanceof Portfolio) {
            // Start with the gallery at right
            echo "<main id=\"portfolio\">";
            foreach ($this->model->projects as $order => $project) {
                $projName = $project["Name"];
                $noSpaceName = preg_replace("/\s+/", "", $projName); // project name without space. Use for html tags.
                $description = $project["Desc"];
                $externalLink = $project["Github"];

                // Div for project begins
                echo "<article id='$projName'>"; // Article encloses both gallery slider and description
                echo "<div id=$noSpaceName class=\"gallery\" role=\"listbox\" aria-label='$projName'>"; // Div that encloses gallery slider

                // Left control
                echo <<< LEFT
                    <div class="carousel-control">
                        <a href=#$noSpaceName class="prev" role="button" aria-label="previous">
                            <i class="fa fa-chevron-circle-left fa-3x" aria-hidden="true"></i>
                        </a>
                    </div>
LEFT;
                     // Main image box
                    echo "<div class=\"slides\"><ul aria-live=\"polite\">";
                    foreach ($project["Images"] as $img) {
                        $alt = substr( $img, 0, (strrpos($img, '.')) );
                        echo <<< IMG
                        <li role="option">
                            <div class="slide-img">
                                <a href="public/images/$order-$projName/$img" role="region" aria-label=$img>
                                <img src="public/images/$order-$projName/$img" alt=$alt>
                                </a>
                            </div>
                        </li>
IMG;
                    } // End foreach
                    echo "</ul></div>";

                // Right control
                echo <<< RIGHT
                    <div class="carousel-control">
                        <a href="#$noSpaceName" class="next" role="button" aria-label="next">
                            <i class="fa fa-chevron-circle-right fa-3x" aria-hidden="true" tabindex="-1"></i>
                        </a>
                    </div>
RIGHT;
// End html for right control

                echo "</div>"; // Ends the gallery slider div

            // Aside begain
             echo <<< DESC
                <aside id=$noSpaceName>
                    <p>
                        $description
                        <span class ="link italic">View code for '$projName' at Github >> </span>
                        <a class="icon" href=$externalLink aria-label="Github repo of project">
                            <i class="fa fa-github-alt" aria-hidden="true"></i>
                        </a>
                    </p>
                </aside>
DESC;

                echo "</article><hr>";
            } // End foreach loop
            echo "</main>"; // End main
        }
    }
}