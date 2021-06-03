<?php
// PageLib.php - class that builds and displays HTML pages

/************************************************/
class Page {
    // Page attributes (member variables)
    public $content;
    public $pageTitle = "No Title";
    public $headerTitle = "No Title";
    public $styles = array(
        "style.css"
    );
    public $navLinks = array(
        "Home"      => "home.php",
        "Contact"   => "contact.php",
        "Services"  => "services.php",
        "ContactPage" => "ContactPage.php"
    );

    //Page operations (member functions)
    public function __set($name, $value) {  // set (mutator)
        $this->$name = $value;
    }
    public function __get($name) {          // get (accessor)
        return($this->$name);
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
        //FOOTER/////////////
        $this->displayFooter();
        echo "\n</body>\n</html>\n";  //</body></html>
    }
    public function displayTitle() {
        echo "<title>{$this->pageTitle}</title>\n";
    }
    public function displayStyles() {
        foreach($this->styles as $style) {
            echo "<link href='{$style}' rel='stylesheet' type='text/css'>\n";
        }
    }
    public function displayHeader() { 
        $out='';
        $out.="<header>\n";
        $out.="\t<h1>{$this->headerTitle}</h1>\n";
        $out.="</header>\n";
        echo $out;
    }
    public function displayNav($buttons) {
        $out='';
        $out.="<nav>\n";
        foreach($buttons as $nav => $link) {
            $out.="<a href='{$link}'";
            if(strpos($_SERVER['PHP_SELF'], $link)!==false){
                $out.=" class='active'";
            }
            $out.=">{$nav}</a>\n";
        }
        $out.="</nav>\n";
        echo $out;
    }
    public function displayFooter() {
        $out='';
        $out.="<footer>\n";
        $out.="<p>CS 3680 &copy; PageLib.php Example</p>\n";
        $out.="</footer>\n";
        echo $out;
    }
}
/************************************************/
?>

        


