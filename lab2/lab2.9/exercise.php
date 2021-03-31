<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Receiving Input</title>
  </head>
  <body>
    <?php
      $name = $_POST["name"];
      $class = $_POST["class"];
      $university = $_POST["university"];
      $hb1 = $_POST["hb1"];
      $hb2 = $_POST["hb2"];
      $hb3 = $_POST["hb3"];
      $hb4 = $_POST["hb4"];
      $hb5 = $_POST["hb5"];

      echo ("<br>Hello, $name");
      echo ("<br>You are studying at $class, $university");
      echo ("<br>Your hobbies is");
      echo ("<br>&nbsp&nbsp&nbsp    1. $hb1");
      echo ("<br>&nbsp&nbsp&nbsp     2. $hb2");
      echo ("<br>&nbsp&nbsp&nbsp     3. $hb3");
      echo ("<br>&nbsp&nbsp&nbsp     4. $hb4");
      echo ("<br>&nbsp&nbsp&nbsp     5. $hb5");

     ?>
  </body>
</html>
