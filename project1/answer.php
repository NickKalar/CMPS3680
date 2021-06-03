<?php

    if(file_exists("answer.txt")){
        $answerKey = file("answer.txt");
    }

    if(fopen('answer.txt')){
        fclose('answer.txt');
    }

    function dehack($var) {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
      
        return $var;
    }

    if(isset($_POST['fname']) && !empty($_POST['fname'])){
        $fname = dehack($_POST['fname']);
    } else {
        $error = $error . "<tr class='table-danger'><td>First Name Required</td></tr>";
        $fnameError = "*";
    }

    if(isset($_POST['lname']) && !empty($_POST['lname'])){
        $lname = dehack($_POST['lname']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Last Name Required</td></tr>";
        $lnameError = "*";
    }

    if(isset($_POST['question1']) && !empty($_POST['question1'])){
        $quest1 = dehack($_POST['question1']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #1</td></tr>";
        $quest1Error = "*";
    }

    if(isset($_POST['question2']) && !empty($_POST['question2'])){
        $quest2 = dehack($_POST['question2']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #2</td></tr>";
        $quest2Error = "*";
    }

    if(isset($_POST['question3']) && !empty($_POST['question3'])){
        $quest3 = dehack($_POST['question3']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #3</td></tr>";
        $quest3Error = "*";
    }

    if(isset($_POST['question4']) && !empty($_POST['question4'])){
        $quest4 = dehack($_POST['question4']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #4</td></tr>";
        $quest4Error = "*";
    }

    if(isset($_POST['question5']) && !empty($_POST['question5'])){
        $quest5 = dehack($_POST['question5']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #5</td></tr>";
        $quest5Error = "*";
    }

    if(isset($_POST['fortran']) && !empty($_POST['fortran'])){
        $fortran = dehack($_POST['fortran']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #6</td></tr>";
        $fortranError = "*";
    }

    if(isset($_POST['java']) && !empty($_POST['java'])){
        $java = dehack($_POST['java']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #7</td></tr>";
        $javaError = "*";
    }

    if(isset($_POST['turing']) && !empty($_POST['turing'])){
        $turing = dehack($_POST['turing']);
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #8</td></tr>";
        $turingError = "*";
    }

    if(isset($_POST['cFamily']) && !empty($_POST['cFamily'])){
        $cFamily = $_POST['cFamily'];
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #9</td></tr>";
        $cFamilyError = "*";
    }

    if(isset($_POST['javaScript']) && !empty($_POST['javaScript'])){
        $javaScript = $_POST['javaScript'];
    } else {
        $error = $error . "<tr class='table-danger'><td>Please answer question #10</td></tr>";
        $javaScriptError = "*";
    }

    if($error != "") {
        $error = '<div class="container"><div class="row justify-content-center"><div class="col-6"><table class="table">' . $error;
        $error .= "</table></div></div></div>";
        include('head.php');
        echo $error;
        include('project1.php');
    } else {
        $score = 0;

        if($quest1 === dehack($answerKey[0])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 1 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 1, you answered ' . $quest1 . " but the correct answer was " . $answerKey[0] . "</td></tr>";
        }

        if($quest2 === dehack($answerKey[1])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 2 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 2, you answered ' . $quest2 . " but the correct answer was " . $answerKey[1] . "</td></tr>";
        }

        if($quest3 === dehack($answerKey[2])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 3 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 3, you answered ' . $quest3 . " but the correct answer was " . $answerKey[2] . "</td></tr>";
        }

        if($quest4 === dehack($answerKey[3])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 4 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 4, you answered ' . $quest4 . " but the correct answer was " . $answerKey[3] . "</td></tr>";
        }

        if($quest5 === dehack($answerKey[4])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 5 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 5, you answered ' . $quest5 . " but the correct answer was " . $answerKey[4] . "</td></tr>";
        }

        if($fortran === dehack($answerKey[5])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 6 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 6, you answered ' . $fortran . " but the correct answer was " . $answerKey[5] . "</td></tr>";
        }

        if($java === dehack($answerKey[6])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 7 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 7, you answered ' . $java . " but the correct answer was " . $answerKey[6] . "</td></tr>";
        }

        if($turing === dehack($answerKey[7])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 8 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 8, you answered ' . $turing . " but the correct answer was " . $answerKey[7] . "</td></tr>";
        }

        if($cFamily[0] === dehack($answerKey[8]) && $cFamily[1] === dehack($answerKey[9])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 9 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 9, you answered ';
            foreach($cFamily as $fam){
                $output .= dehack($fam) . " ";
            } 
            $output .= " but the correct answer was " . $answerKey[8] . " and " . $answerKey[9] . "</td></tr>";
        }
        if($javaScript[0] === dehack($answerKey[10]) && $javaScript[1] === dehack($answerKey[11]) && $javaScript[2] === dehack($answerKey[12])){
            $score += 1;
            $output .= '<tr class="table-success"><td>Question 10 is correct.</td></tr>';
        } else {
            $output .= '<tr class="table-danger"><td>For Question 10, you answered ';
            foreach($javaScript as $Scr){
                $output .= dehack($Scr) . " ";
            } 
            $output .= " but the correct answer was " . dehack($answerKey[10]) . ", " . $answerKey[11]. " and " . $answerKey[12] . "</td></tr>";
        }

        $output .= '</table></div></div></div>';

        $output = '<div class="container"><div class="row justify-content-center"><div class="col-6"><table class="table"><thead><tr><th>' . $fname . " " . $lname . ", your score is " . $score . "/10</th></tr></thead>" . $output;
        if($output != "") {
            include('head.php');
            echo $output;
        }
    }
?>