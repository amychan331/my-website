<?php
    /** Form.php
    *   @return associate array
    **/


class Form
{
    public $form;

    public function output() {
        $link = htmlspecialchars($_SERVER["REQUEST_URI"]); // htmlspecialchars don't play nice with heredoc
        $this->form = <<<EOT
            <form id="contact" method="post" action=$link>
                <h2>Message Me!</h2>
                <label for="name">What's your name? </label>
                <input type="text" id="name" name="name" aria-labelledby="name_error" required />
                <br>
                <label for="email">Your email address? </label>
                <input type="email" id="email" name="email" aria-labelledby="email_error" required />
                <br>
                <label for="subject">A subject line? </label>
                <input type="text" id="subject" name="subject" aria-labelledby="subject_error" required />
                <br>
                <label for="message">What is you message? </label>
                <textarea id="message" name="message" cols='30' rows='8' aria-labelledby="message_error" required></textarea>
                <br>
                <p class="spam-check" style="display:none;">Leave this empty: <input type="text" name="url" />
                </p>
                <input type="submit" name="submit" aria-labelledby="submit_error" value='Contact Me!'>
            </form>
EOT;
        return $this->form;
    }
}