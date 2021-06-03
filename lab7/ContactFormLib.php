<?php 

class ContactForm {
    public $action ='ContactPage.php';
    public $method = 'POST';

    public function addLabel($label, $for) {  
        // <label for='__'>LABEL</label
        echo "<label for='$for'>$label</label>";
    }

    public function addInput($type, $id, $name, $placeholder='',
    $value='', $required=true) {
                //addInput("text", "fname", "fname", "First Name");

    echo "<input type='$type' id='$id' name='$name' placeholder='$placeholder' value='$value' ";
    echo ($required)?"required >":">";
    }

    public function addTextArea($id, $name, $placeholder='', $rows=8,
        $cols=40) {
        echo "<textarea id='$id' name='$name' placeholder='$placeholder' rows='$rows' cols='$cols'></textarea>";
    }
    
    public function displayForm() {
        echo "ContactFormTest<br>";

        echo "<form action='$this->action' method='$this->method'>";
        $this->addlabel("Name", "Name");
        $this->addInput("text","name","name", "First Name",'',true);
        echo "<br>";
        
        $this->addlabel("Email", "Email");
        $this->addInput("text","emal","email", "E-Mail",'',true);
        echo "<br>";

        $this->addlabel("Phone", "Phone #");
        $this->addInput("text","phone","phone", "555-555-5555",'',true);        
        echo "<br>";

        $this->addlabel("Message", "Message");
        $this->addTextArea("message","message");
        echo "<br>";

        $this->addInput("submit",'','','','Submit');

        echo "</form>";

    }



}

?>
