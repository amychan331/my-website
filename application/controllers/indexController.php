<?php
include_once '../private/mailing.php';

class IndexController extends Controller
{
    public function __construct() {
        // parent::__construct($model);
        $this->form();
    }

    private function form() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['url'] == '') {
                // A set "url" key in POST indicates a spambot. If empty, proceed to mailing
                $validationModel = new Validation();
                // Validates if input is correctly formatted.
                if (empty($validationModel->error)) {
                    try {
                        new Mail($validationModel->name, $validationModel->email, $validationModel->subject, $validationModel->message);
                        echo "<p class=\"success\">Your submission was successful. I will reply as soon as possible.</p>";
                    } catch (Exception $e) {
                        // Indicates error in submission.
                        echo "<p class=\"error\">There is a problem with the mail submission. Please try again.</p>";
                        echo "<p class=\"error\">Error description: " . $e->getMessage();
                    }
                } else {
                    echo $validationModel->getError();
                }
            } else if (isset($_POST['url'])) {
                // The "url" key is set, indicating a spambot.
                echo "<p class=\"success\">Thank you for your submission.</p>";
            }
        } //end if($_SERVER...
    }//end form()
}