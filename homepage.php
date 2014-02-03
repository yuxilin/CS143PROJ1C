<html>

<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>The Movie Database</title>
</head>

<body>
    <h1 id="header">better than imdb</h1>
	<div id="divider"></div>
	<div id="nav-sidebar">MAP
            <ul id="nav-options">
                <li><a href="">SEARCH</a></li>
                <li><a href="">PEOPLE DIRECTORY</a></li>
                <li><a href="">MOVIE DIRECTORY</a></li>
                <li><a href="">ACTORS+MOVIES</a></li>
                <li><a href="">DIRECTORS+MOVIES</a></li>
                <li><a href="">ADD SOMEONE IMPORTANT</a></li>
                <li><a href="">ADD MOVIE</a></li>
                <li><a href="">IN YOUR OPINION...</a></li>

            </ul>
        </div>
	<div id="maincontent">ADD ACTOR/DIRECTOR<br />
        
        <form action="homepage.php" method="post">

            <select name="profession">
              <option value="actor">Actor</option>
              <option value="director">Director</option>
            </select> <br />

            <input type="text" name="fname" onfocus="if(this.value == 'First Name') { this.value = ''; }"  value="First Name" required>
            <input type="text" name="lname" onfocus="if(this.value == 'Last Name') { this.value = ''; }"  value="Last Name" required><br>

            Date of Birth: <select name="month_of_birth" onchange="return wait_for_load(this, event, function() { editor_date_month_change(this, 'birthday_day','birthday_year'); });" required>
                    <option value="na">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

                <select name="day_of_birth" required>
                    <option value="na">Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <input type="text" name="year_of_birth" value="Year" maxlength="4" type="number" required>
            </select> <br />
        Date of Death: <select name="month_of_death" onchange="return wait_for_load(this, event, function() { editor_date_month_change(this, 'birthday_day','birthday_year'); });">
                    <option value="na">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

                <select name="day_of_death">
                    <option value="na">Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>

                <input type="text" name="year_of_death" value="Year" maxlength="4" type="number">
            </select> <br />
        <input type="submit" value="Submit">
        </form>
    </div>
<?php
    $profession = $_POST["profession"];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];

    $month_of_birth = $_POST["mbirth"];
    $day_of_birth = $_POST["dbirth"];
    $year_of_birth = $_POST["ybirth"];
    $dob = $year_of_birth."-".$month_of_birth."-".$day_of_birth;

    $month_of_death= $_POST["mdeath"];
    $day_of_death = $_POST["ddeath"];
    $year_of_death = $_POST["ydeath"];
    if($month_of_death == "na" || $day_of_death == "na" || $year_of_death == "" || $year_of_death == "Year")
    {
        $dod = NULL;
    }
    else
    {
        $dod = $year_of_death."-".$month_of_death."-".$day_of_death;
    }


    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $person_id = mysqL_query("SELECT id FROM MaxPersonID") + 1;
    print $person_id;

    if($profession == "Director")
    {
        $query = "INSERT INTO Director VALUES($person_id, $last_name, $first_name, $dob, $dod)";
        print "<h1>Inserted Director</h1>";
    }
    else if($profession == "Actor")
    {
        $query = "INSERT INTO Actor VALUES($person_id, $last_name, $first_name, $dob, $dod)";
        print "<h1>Inserted Director Actor</h1>";
    }
    else
    {
        print "<h1>Something Went Wrong!</h1>";
    }

    mysqL_query("UPDATE MaxPersonID SET id=$person_id");

    mysql_close($db_connection);
?>
</body>


</html>
