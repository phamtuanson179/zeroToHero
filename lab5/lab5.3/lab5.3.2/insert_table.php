<html>
<body>
    <?php
    $items = $_POST["itemdescription"];
    $weight = $_POST["weight"];
    $cost = $_POST["cost"];
    $num = $_POST["number"];

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'mydatabase';
    $table_name = 'products';
    $connect = mysqli_connect($server, $user, $pass, $mydb);

    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    } else {
        $SQLcmd = "INSERT INTO $table_name VALUES (NULL, '$items', $weight, $cost, $num)";
    }

    mysqli_select_db($connect, $mydb);
    if (mysqli_query($connect, $SQLcmd)) {
        print '<font size = "4" color = "blue">Insert Table ';
        print "<i>$table_name</i> in database <i?> $mydb</i><br></font>";
        print "<br>The Query is $SQLcmd";
    } else {
        echo "Error: " . $SQLcmd . "<br>" . mysqli_error($connect) . "<br>";
        die("Insert Table Failed SQLcmd = $SQLcmd");
    }
    mysqli_close($connect);
    ?>
</body>
