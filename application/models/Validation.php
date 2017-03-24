<?php
    /** Validation.php
    **/


class Validation
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $error = array();

    public function __construct() {
        $this->validate();
    }

    public function getError() {
        $errorList = '';
        foreach ($this->error as $input => $msg) {
            // unqiue id so the form input could use aria-labelledby to invoke alert for screen reader.
            $errorList .= "<span id=\"" . $input . "_error\" class=\"error\" arial-role=\"alert\" >* " . $msg . "</span><br>";
        }
        return $errorList;
    }

    private function sanitize($input)
    {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
    }

    private function validate()
    {
        if (empty($_POST["name"])) {
            $this->error["name"] = "Name is required.";
        } else {
            $this->name = $this->sanitize($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $this->error["email"] = "Email is required so I can reply.";
        } else if ( !preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $_POST['email']) ) {
            $this->error["email"] = "Valid email address is required so I can reply.";
        } else {
            $this->email = $this->sanitize($_POST["email"]);
        }

        if (empty($_POST["subject"])) {
            $this->error["subject"] = "Subject is required.";
        } else {
            $this->subject = $this->sanitize($_POST["subject"]);
        }

        if (empty($_POST["message"])) {
            $this->error["message"] = "Message is required.";
        } else {
            $this->message = $this->sanitize($_POST["message"]);
        }
    }
}