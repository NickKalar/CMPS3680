<?php
require('./PageLib.php');

class ServicesPage extends Page {
    //public $form = new ContactForm(); //*****
    public $services = array(
        array("Diagnostics", "https://pcpros2go.com/wp-content/uploads/2012/08/remote-repair-service-price.png"),
        array("Repair", "http://www.creative-computers.com.au/images/computer_repair1.jpg"),
        array("Build", "http://www.adrianspcrepair.com/wp-content/uploads/2014/01/computer-ok-icon1.png")
    );

    //OVERRIDDEN Page::displayPage()
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
        //$this->form->displayForm();  //*****
        $this->displayServices($this->services);
        echo $this->content;
        //FOOTER/////////////
        $this->displayFooter();
        echo "\n</body>\n</html>\n";  //</body></html>
    }

    public function displayServices($serv) {
        $out='';
        $out.="<section id='services'>\n";
        foreach($serv as $s) {
            list($service, $imgURL) = $s;
            // $service = $s[0]
            // $imgURL = $s[1]
            $out.="<div class='service'>\n";
            $out.="<h3>{$service}</h3>\n";
            $out.="<img src='{$imgURL}'>\n";
            $out.="</div>\n";
        }
        $out.="</section>\n";
        echo $out;
    }
}

$servicespage = new ServicesPage();

$servicespage->pageTitle = "PHP OOP";

$servicespage->headerTitle = "Services - OOP php Page Builder";

$servicespage->content ="<h3>Services Page Content</h3>\n";
$servicespage->content .="<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n";

$servicespage->displayPage();

?>
