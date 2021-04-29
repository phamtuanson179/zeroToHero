<?php
$name = '';
$address = '';
$city = '';
$tel = '';
$url = '';
if (isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "business_service";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $tel = $_POST["tel"];
    $url = $_POST["url"];

    $sql = "INSERT INTO Businesses (Name, Address, City, Telephone, URL)
        VALUES ('$name','$address','$city', '$tel', '$url')";

    mysqli_query($conn, $sql);

    foreach ($_POST['category'] as $category) {
        $sql = "INSERT INTO biz_categories (BusinessID, CategoryID) 
            VALUES (LAST_INSERT_ID(),( select CategoryID from categories where Title = '$category' ))
            ";

        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);
}
?>
<!Doctype html>
<html>
    <head>
        <title>Business Registration</title>
        <style>
            h1 {
                color: blue;
            }
            .form-wrapper {
                display: flex;
                flex-direction: row;
            }
            .categories-wrapper {
                display: flex;
                flex-direction: column;
                padding-right: 50px;
            }
        </style>
    </head>
    <body>
        <h1>Business Registration</h1>
        <form method='POST' style="">
            <div class="form-wrapper">
                <div class="categories-wrapper">
<?php
if (!isset($_POST["submit"])) {
    echo "<font> Click on one or ctrl-click on mutiple categories</font>";
} else {
    echo "<font> Selected category values are highlighted</font>";
}
?>
                    <select name='category[]' size='5' multiple required>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "business_service";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT Title FROM categories";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (isset($_POST['category']) && in_array($row['Title'], $_POST['category'])) {
                                echo "<option selected>" . $row['Title'] . "</option>";
                            } else {
                                echo "<option>" . $row['Title'] . "</option>";
                            }
                        }
                    }
                    mysqli_close($conn);
                    ?>
                    </select>
                </div>
                <table>
                    <tr>
                        <td><label>Business Name:</label></td>
                        <td><input type='text' name='name' value='<?php echo $name ?>' required></td>
                    </tr>
                    <tr>
                        <td><label>Address:</label></td>
                        <td><input type='text' name='address' value='<?php echo $address ?>' required></td>
                    </tr>
                    <tr>
                        <td><label>City:</label></td>
                        <td><input type='text' name='city' value='<?php echo $city ?>' required></td>
                    </tr>
                    <tr>
                        <td><label>Telephone:</label></td>
                        <td><input type='text' name='tel' value='<?php echo $tel ?>' required></td>
                    </tr>
                    <tr>
                        <td><label>URL:</label></td>
                        <td><input type='text' name='url' value='<?php echo $url ?>' required></td>
                    </tr>
                </table>
            </div>
<?php
if (!isset($_POST['submit'])) {
    echo "<input type='submit' name='submit' value='Add Business'>";
} else {
    echo "<a href=''>Add Another Business</a>";
}
?>

        </form>
    </body>
</html>