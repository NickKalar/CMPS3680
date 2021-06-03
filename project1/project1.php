<?php
  include('head.php');
?>


<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <form name ="test" action="answer.php" method="post" >
          First Name: <input type="text" name="fname" <?php echo ($fname!="")?"value=$fname":""?>> <span class='error'><?php echo $fnameError; ?></span>
          <br>
          Last Name: <input type="text" name="lname" <?php echo ($lname!="")?"value=$lname":""?>> <span class='error'><?php echo $lnameError ?></span>
          <br>
          <hr>
          1) HTML is a programming language. <span class='error'><?php echo $quest1Error ?></span><br>
          <input type="radio" name="question1" value="True" <?php echo ($quest1=="True")?"checked":"";?>>  True<br>
          <input type="radio" name="question1" value="False" <?php echo ($quest1=="False")?"checked":"";?>> False<br>
          <hr>
          2) JavaScript is based on Java. <span class='error'><?php echo $quest2Error ?></span><br>
          <input type="radio" name="question2" value="True" <?php echo ($quest2=="True")?"checked":"";?>> True<br>
          <input type="radio" name="question2" value="False" <?php echo ($quest2=="False")?"checked":"";?>> False<br>
          <hr>
          3) C++ strings are better than C strings. <span class='error'><?php echo $quest3Error ?></span><br>
          <input type="radio" name="question3" value="True" <?php echo ($quest3=="True")?"checked":"";?>> True<br>
          <input type="radio" name="question3" value="False" <?php echo ($quest3=="False")?"checked":"";?>> False<br>
          <hr>
          4) Python is the most popular programming language as of 2018. <span class='error'><?php echo $quest4Error ?></span><br>
          <input type="radio" name="question4" value="True" <?php echo ($quest4=="True")?"checked":"";?>> True<br>
          <input type="radio" name="question4" value="False" <?php echo ($quest4=="False")?"checked":"";?>> False<br>
          <hr>
          5) StackOverflow is the only reason some people graduate. <span class='error'><?php echo $quest5Error ?></span><br>
          <input type="radio" name="question5" value="True" <?php echo ($quest5=="True")?"checked":"";?>> True<br>
          <input type="radio" name="question5" value="False" <?php echo ($quest5=="False")?"checked":"";?>> False<br>
          <hr>
          6) In what year was FORTRAN made by IBM? <span class='error'><?php echo $fortranError ?></span><br>
          <input type="checkbox" name="fortran" value="1956" <?php echo ($fortran=="1956")?"checked":"";?>> 1956<br>
          <input type="checkbox" name="fortran" value="1957" <?php echo ($fortran=="1957")?"checked":"";?>> 1957<br>
          <input type="checkbox" name="fortran" value="1958" <?php echo ($fortran=="1958")?"checked":"";?>> 1958<br>
          <input type="checkbox" name="fortran" value="1972" <?php echo ($fortran=="1972")?"checked":"";?>> 1972<br>
          <hr>
          7) As of 2014, how many devices run Java? <span class='error'><?php echo $javaError ?></span><br>
          <input type="checkbox" name="java" value="1.5 billion" <?php echo ($java=="1.5 billion")?"checked":"";?>> 1.5 billion<br>
          <input type="checkbox" name="java" value="2.7 billion" <?php echo ($java=="2.7 billion")?"checked":"";?>> 2.7 billion<br>
          <input type="checkbox" name="java" value="3 billion" <?php echo ($java=="3 billion")?"checked":"";?>> 3 billion<br>
          <input type="checkbox" name="java" value="14 trillion" <?php echo ($java=="14 trillion")?"checked":"";?>> 14 trillion<br>
          <hr>
          8) What year was Alan Turing born? <span class='error'><?php echo $turingError ?></span><br>
          <input type="checkbox" name="turing" value="1910" <?php echo ($turing=="1910")?"checked":"";?>> 1910<br>
          <input type="checkbox" name="turing" value="1911" <?php echo ($turing=="1911")?"checked":"";?>> 1911<br>
          <input type="checkbox" name="turing" value="1912" <?php echo ($turing=="1912")?"checked":"";?>> 1912<br>
          <input type="checkbox" name="turing" value="1913" <?php echo ($turing=="1913")?"checked":"";?>> 1913<br>
          <hr>
          9) Which of the following are part of the C-family programming language? (Select 2) <span class='error'><?php echo $cFamilyError ?></span><br>
          <input type="checkbox" name="cFamily[]" value="Ruby" <?php echo (in_array("Ruby", $_POST['cFamily']))?"checked":"";?> > Ruby<br>
          <input type="checkbox" name="cFamily[]" value="C#" <?php echo (in_array("C#", $_POST['cFamily']))?"checked":"";?> > C#<br>
          <input type="checkbox" name="cFamily[]" value="Perl" <?php echo (in_array("Perl", $_POST['cFamily']))?"checked":"";?> > Perl<br>
          <input type="checkbox" name="cFamily[]" value="LISP" <?php echo (in_array("LISP", $_POST['cFamily']))?"checked":"";?> > LISP<br>
          <hr>
          10) Which of the following are JavaScript libraries? (Select 3) <span class='error'><?php echo $javaScriptError ?></span><br>
          <input type="checkbox" name="javaScript[]" value="Node.js" <?php echo (in_array("Node.js", $_POST['javaScript']))?"checked":"";?> > Node.js<br>
          <input type="checkbox" name="javaScript[]" value="jQuery" <?php echo (in_array("jQuery", $_POST['javaScript']))?"checked":"";?> > jQuery<br>
          <input type="checkbox" name="javaScript[]" value="CoffeeScript" <?php echo (in_array("CoffeeScript", $_POST['javaScript']))?"checked":"";?> > CoffeeScript<br>
          <input type="checkbox" name="javaScript[]" value="AngularJS" <?php echo (in_array("AngularJS", $_POST['javaScript']))?"checked":"";?> > AngularJS<br>
          <hr>
          <input type="submit" value="Submit Test">
        </form>
      </div>
    </div>
  </div>
</body>
</html>