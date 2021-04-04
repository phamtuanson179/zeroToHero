<html>
    <head>
        <title>
            Date and Time Processing
        </title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
        <table>
            <tr>
                Enter your name and select date and time for the appointment
            </tr>
            <tr>
                <td>
                    Your Name:
                </td>
                <td>
                    <input type="text" size ="10" maxlength="15" name ="name"><!-- comment -->
                    
                </td>
                
            </tr>
            <tr>
                <td>
                    Date:
                </td> 
                <td>
                    <select name ="day" id="day1" >
                        <option id="op1">1</option>
                        <option id="">2</option>
                        <option id="">3</option> 
                        <option id="">4</option>
                        <option id="">5</option>
                        <option id="">6</option>
                        <option id="">7</option>
                        <option id="">8</option> 
                        <option id="">9</option>
                        <option id="">10</option>
                        <option id="">11</option>
                        <option id="">12</option> 
                        <option id="">13</option>
                        <option id="">14</option><!-- comment -->
                        <option id="">15</option>
                        <option id="">16</option>
                        <option id="">17</option> 
                        <option id="">18</option>
                        <option id="">19</option>
                        <option id="">20</option>
                        <option id="">21</option>
                        <option id="">22</option> 
                        <option id="">23</option>
                        <option id="">24</option>
                        <option id="">25</option>
                        <option id="">26</option>
                        <option id="">27</option> 
                        <option id="">28</option>
                        <option id="op29" style="display: block">29</option>
                        <option id="op30" style="display: block">30</option>
                        <option id="op31" style="display: block">31</option>
                        //<?php
//                        if (array_key_exists("month", $_GET)){
//                            $month = $_GET["month"];
//                        }
//                        else{
//                            $month = 1;
//                        }
//                        if (array_key_exists("month", $_GET)){
//                            $year = $_GET["year"];
//                        }
//                        else{
//                            $year = 1975;
//                        }
//                        if ($month == 2){
//                            if ($year % 4 == 0){
//                                for ($i = 1; $i < 29; $i++){
//                                    print("<option>$i</option>");
//                                }
//                            }
//                            else{
//                                for ($i = 1; $i < 29; $i++){
//                                    print("<option>$i</option>");
//                                }
//                            }
//                        }
//                        elseif ($month %  2 == 0) {
//                            if ($month <= 7){
//                                for ($i = 1; $i < 30; $i++){
//                                    print("<option>$i</option>");
//                                }
//                            }
//                            else{
//                                for ($i = 1; $i < 31; $i++){
//                                    print("<option>$i</option>");
//                                }
//                            }
//                        }
//                        else{
//                            if ($month <= 7){
//                                for ($i = 1; $i < 31; $i++){
//                                    print("<option>$i</option>");
//                                }
//                            }
//                            else{
//                                for ($i = 1; $i < 30; $i++){
//                                    print("<option>$i</option>");
//                                }
//                            }
//                        }                   
//                        ?>
                    </select>
                    <select id="month1" name ="month" onchange="changeDate()">
                        <?php
                        for ($i = 1; $i <= 12; $i++){
                                    print("<option>$i</option>");
                                }
                        ?>
                    </select>
                    <select id ="year1" name ="year" onchange="changeDate()">
                        <?php
                        for ($i = 1975; $i < 2030; $i++){
                                    print("<option>$i</option>");
                                }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Time:
                </td>
                <td>
                    <select name="hours">
                        <?php
                        for ($i = 0; $i <= 23; $i++){
                                    print("<option>$i</option>");
                                }
                        ?>
                    </select>
                    <select name="minutes">
                        <?php
                        for ($i = 0; $i <= 59; $i++){
                                    print("<option>$i</option>");
                                }
                        ?>
                    </select>
                    <select name="secs">
                        <?php
                        for ($i = 0; $i <= 59; $i++){
                                    print("<option>$i</option>");
                                }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right" ><input type="submit" value="Submit"></td>
                <td align="left" ><input type="reset" value="Reset"></td>
            </tr>
            <tr>
                <?php
                if (array_key_exists("name", $_GET)){
                    $name = $_GET["name"];
                    print("<td>Hi $name!</td>");
                }
                ?>
            </tr>
            </table>
        </form>
            <?php
               if (array_key_exists("day", $_GET)){

                $day = $_GET["day"];
                $month = $_GET["month"];
                $year = $_GET["year"];
                $hour = $_GET["hours"];
                $minute = $_GET["minutes"];
                $sec = $_GET["secs"];
                if ($hour >= 12){
                    $hour_in_12 = $hour - 12;
                    $PM_or_AM = "PM";
                }
                else{
                    $hour_in_12 = $hour;
                    $PM_or_AM = "AM";
                }
                if ($month == 2){
                    if ($year % 100 ==0){
                        if ($year % 400 ==0){
                            $numDayOfMon = 29;
                        }
                        else{
                            $numDayOfMon = 28;
                        }
                    }
                    else if ($year % 4 == 0){
                        $numDayOfMon = 29;
                    }
                    else{
                        $numDayOfMon = 28;
                    }
                }
                elseif ($month %  2 == 0) {
                    if ($month <= 7){
                        $numDayOfMon = 30;
                    }
                    else{
                        $numDayOfMon = 31;
                    }
                }
                else{
                    if ($month <= 7){
                        $numDayOfMon = 31;
                    }
                    else{
                        $numDayOfMon = 30;
                    }
                }
                print("<p>You have choose to have an  appointment on $hour:$minute:$sec, $day/$month/$year</p>");
                print("<p>More Information</p>");
                print("<p>In 12 hours, the time and date is $hour_in_12:$minute:$sec $PM_or_AM, $day/$month/$year</p>");
                print("<p>This month has $numDayOfMon days!</p>");
               }
            ?>
        
        <script>
            function changeDate(){
                
                var z = document.getElementById("month1");
                var x = z.options[z.selectedIndex].text;
                var u = document.getElementById("year1");
                var y = u.options[u.selectedIndex].text;
                
                if (x == 2){
                    if (y % 100 == 0){
                        if (y % 400 == 0){
                            document.getElementById("op29").style.display = "block";
                            document.getElementById("op30").style.display = "none";
                            document.getElementById("op31").style.display = "none";
                        }
                        else{
                            document.getElementById("op29").style.display = "none";
                            document.getElementById("op30").style.display = "none";
                            document.getElementById("op31").style.display = "none";
                        }
                    }
                    else if (y%4 == 0){
                        document.getElementById("op29").style.display = "block";
                        document.getElementById("op30").style.display = "none";
                        document.getElementById("op31").style.display = "none";
                    }
                    else {
                        document.getElementById("op29").style.display = "none";
                        document.getElementById("op30").style.display = "none";
                        document.getElementById("op31").style.display = "none";
                    }
                    
                }
                else if (x % 2 == 0){
                    if ( x < 8){
                        document.getElementById("op29").style.display = "block";
                        document.getElementById("op30").style.display = "block";
                        document.getElementById("op31").style.display = "none";
                    }
                    else{
                        document.getElementById("op29").style.display = "block";
                        document.getElementById("op30").style.display = "block";
                        document.getElementById("op31").style.display = "block";
                    }
                }
                else{
                    if ( x >= 8){
                        document.getElementById("op29").style.display = "block";
                        document.getElementById("op30").style.display = "block";
                        document.getElementById("op31").style.display = "none";
                    }
                    else{
                        document.getElementById("op29").style.display = "block";
                        document.getElementById("op30").style.display = "block";
                        document.getElementById("op31").style.display = "block";
                    }
                }
            }
        </script>
    </body>
</html>

