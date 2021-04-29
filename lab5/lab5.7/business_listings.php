<html>
    <head>
        <title>Business Listings</title>
        <style>
            h1 {
                color: blue;
            }
            .wrapper {
                display: flex;
                flex-direction: row;    
            }
            .categories-wrapper {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                padding-right: 50px;
                width: 250px;                
            }
            th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Business Listings</h1>
        <div class="wrapper">
            <div class="categories-wrapper">

                <table name='category[]' size='5' multiple required>
                    <tr>
                        <th>Click on a category to find business listings</th>
                    </tr>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "business_service";

                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                        $url = "https://";
                    else
                        $url = "http://";

                    $url .= $_SERVER['HTTP_HOST'];

                    $current_url = explode("?", $_SERVER['REQUEST_URI']);

                    $url .= $current_url[0];

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT CategoryID,Title FROM categories";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td><a href='" . $url . '?catID=' . $row['CategoryID'] . "'>" . $row['Title'] . "</a></td></tr>";
                        }
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            </div>
            <div class="result-wrapper">
                <table>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "business_service";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $catID = '';
                    if (isset($_GET['catID'])) {
                        $catID = $_GET['catID'];
                    }

                    $sql = "SELECT * FROM Businesses,Biz_categories
                                    where Businesses.BusinessID = Biz_categories.BusinessID and Biz_categories.CategoryID = '$catID'
                                        
                                    ";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        echo "<table>";

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td>" . $row["BusinessID"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Address"] . "</td>";
                            echo "<td>" . $row["City"] . "</td>";
                            echo "<td>" . $row["Telephone"] . "</td>";
                            echo "<td>" . $row["URL"] . "</td>";
                            echo "<td>" . $row["CategoryID"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>