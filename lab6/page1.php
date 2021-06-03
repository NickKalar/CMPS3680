<?php
$pageName="page1";
require_once('utils.php');
include('head.php');
include('nav.php');
?>

<h1>Hello There!</h1>
<br>
<br>
<p>Enter a number. I'll display that number in the Fibonacci Sequence.
<br>(Please keep the number low)</p><br>
<form method="post" action="page1.php">
    <input type="text" name="fibNum1"><br>
    <input type="submit" value="Do it" name="fibNum">
</form>
<br>
<br>
<p id="output"><?php echo (is_numeric($fibNum) ? "That Fibonacci Number is " : "") . $fibNum; ?></p>

</div>
</div>
<?php
include('foot.php');
?>