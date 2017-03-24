<?php

class Index extends Model
{
    public function __construct() {
        $this->text = "<main>";
        $this->about();
        $this->socialMedia();
        $this->text .= "</main>";
    }

    private function about() {
        $this->text .= <<<EOT
            <h1>Amy Yuen Ying Chan</h1>
            <p>
            <h2>Full-stack web developer based in North California</h2>
            </p><p>
            During the beginning of my educational and professional development, my focus had been in design. My interest in drawing and problem-solving with led me to study architecture at California Polytechnic State University of San Luis Obispo. I was then introduce to web development in the process of creating a portfolio site for my architecture work.
            </p>
            Feel free to connect me via social media or contact me with the form at the right.
        </p>
        <br>
EOT;
    }

    private function socialMedia() {
        $this->text .= <<<EOT
            <div id='social-media'>
                <a href='https://twitter.com/CraftPlusTech' aria-label='Twitter Page of Amy'>
                    <i class='fa fa-twitter fa-3x' aria-hidden='true'></i>
                </a>
                <a href='https://www.linkedin.com/in/amyyychan' aria-label='LinkedIn Profile of Amy'>
                    <i class='fa fa-linkedin fa-3x' aria-hidden='true'></i>
                </a>
                <a href='https://github.com/amychan331' aria-label='View Github Repos of Amy'>
                    <i class='fa fa-github fa-3x' aria-hidden='true'></i>
                </a>
                <a href='http://www.craftplustech.com/blog/' aria-label='View WordPress Post of Amy'>
                    <i class='fa fa-wordpress fa-3x' aria-hidden='true'></i>
                </a>
            </div>
EOT;
    }
}