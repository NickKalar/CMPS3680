<?php 
require_once('./PageLib.php');
require_once('./ContactFormLib.php');

class ContactPage extends Page {

    public $form; // = new ContactForm(); // ContactFormLib.php

    public function __construct() { // default constructor
        $this->form = new ContactForm();
    }

    public function displayPage() {
		echo "<html>\n<head>\n";    //<html><head>
        //HEAD///////////////
        $this->displayTitle();
        $this->displayStyles();
        echo "</head>\n<body>\n";   //</head><body>
        //HEADER/////////////
        $this->displayHeader();
        $this->displayNav($this->navLinks);
        //CONTENT////////////
        echo $this->content;

        if(isset($_POST) && !empty($_POST)) {
            // PROCESS the form  via $_POST

            // validate
            echo "Thank you ". htmlspecialchars(strip_tags(trim($_POST['name']))) . "<br>You're email is: " . htmlspecialchars(strip_tags(trim($_POST['email']))) . "<br>The Phone number you entered is: " . htmlspecialchars(strip_tags(trim($_POST['phone']))) . "<br>You're message is:\n\n" . htmlspecialchars(strip_tags(trim($_POST['message'])));

        }else { // DISPLAY FORM
            $this->form->displayForm(); // ContactFormLib.php
        }
        //echo "<pre>"; var_dump($_POST); echo "</pre>";


        //FOOTER/////////////
        $this->displayFooter();
        echo "\n</body>\n</html>\n";  //</body></html>
    }   
}



$contactform = new ContactPage();
$contactform->displayPage();
        


