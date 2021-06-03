<?php

//Nicholas Kalar
//Lab2

error_reporting(E_ALL);
ini_set('display_errors', 1);

$TITLE = 'PHP Lab';
$CSS = 'style.css';
$DEVELOPER_MODE = 1;
$LOGFILE = 'error.log';
$fname = 'Nick';

echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";

echo "  <head>\n";
echo "    <title>".$TITLE."</title>\n";
echo "    <link rel=\"stylesheet\" href=\"".$CSS."\">\n";
echo "  </head>\n";

echo "  <body>\n";
echo "    <h1>Welcome to ".$fname."'s Lab 2.</h1>\n";
if ($fname != '') {
    error_log("fname variable has been set to ".$fname."\n", 3, $LOGFILE);
} else {
    error_log("fname variable was not set.", 3, $LOGFILE);
}

echo "    <table>\n";

for ($i = 0; $i < 11; $i++) {
  echo "      <tr>\n";
  for ($j = 0; $j < 11; $j++) {
    if ($i == 0 && $j == 0) {
      echo "        <th>*</th>\n";
    } else if ($i == 0 && $j > 0) {
        echo "        <th>" . $j . "</th>\n";
    } else if ($i > 0 && $j == 0) {
        echo "        <th>" . $i . "</th>\n";
    } else if ($i > 0 && $j > 0) {
        echo "        <td>" . ($i * $j) . "</td>\n";
    }
  }
  echo "      </tr>\n";
}

echo "    </table>\n";

$var1 = 1;
$var2 = 2;

echo $var1." + ".$var2." is ".($var1+$var2). " (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2). " (".gettype($var1.$var2).")<br><br>";

$var1 = 1;
$var2 = 2.0;

echo $var1." + ".$var2." is ".($var1+$var2). " (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2). " (".gettype($var1.$var2).")<br><br>";

$var1 = '1.0 word';
$var2 = 2;

echo $var1." + ".$var2." is ".($var1+$var2). " (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2). " (".gettype($var1.$var2).")<br><br>";

$var1 = 'word';
$var2 = 2.0;

echo $var1." + ".$var2." is ".($var1+$var2). " (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2). " (".gettype($var1.$var2).")<br><br>";

echo <<<EOT
Basically, PHP is trying to figure out what the heck I'm doing with these variables. It's doing it's best.
When PHP takes in a string, it looks at the beginning of the string for a number. If it finds one,
it assumes you meant for the variable to be an integer. PHP also resolves adding a double and an int
by making the answer a double. It has to pick one. Finally, if you add a word with no leading number,
and a double, it just assumes you wanted to add zero to that double. It's a good language, give it some slack.
EOT;

echo "  </body>\n";
echo "</html>";
?>
