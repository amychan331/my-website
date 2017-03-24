<?php
// Handle tag requests
class BlogsController extends Controller
{
    public function __construct() {
        $this->config();
    }

    private function config() {
        define('WP_USE_THEMES', false);
        require_once('blog/wp-blog-header.php');
    }
}