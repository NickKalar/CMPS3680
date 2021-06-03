<?php
require('./PageLib.php');
//require('./ContactFormLib.php');

//create a class called ContactPage that extends Page



//$contactpage = new ContactPage();
$contactpage = new Page();

$contactpage->pageTitle = "PHP OOP";
$contactpage->headerTitle = "Contact - OOP php Page Builder";

$contactpage->content ="<h3>Contact Page Content</h3>\n";
$contactpage->content .="<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n";

$contactpage->displayPage();

//
//addInput("text", "name", "name");
//"<input type='text' name='name', id='name'">
//addInput("text", "email", "email", "Enter email", "");
//addInput("text", "phone", "phone", "Enter phone", "", false);


?>
