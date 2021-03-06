<html>

<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>The Movie Database</title>
</head>

<body>
    <h1 id="header">Flickfo</h1>
	<div id="divider"></div>
	<div id="nav-sidebar">
        <h2>MAP</h2>
            <ul id="nav-options">
                <li><a href="homepage.php">HOME</a></li>
                <li><a href="people.php">PEOPLE DIRECTORY</a></li>
                <li><a href="movie.php">MOVIE DIRECTORY</a></li>
                <li><a href="add_actor_movie.php">ACTORS+MOVIES</a></li>
                <li><a href="add_director_movie.php">DIRECTORS+MOVIES</a></li>
                <li><a href="add_person.php">ADD PEOPLE</a></li>
                <li><a href="add_movie.php">ADD MOVIE</a></li>
            </ul>
            <form action="search.php" method="post">
                <input class="styled-tbox" type="text" name="search_value" value="Search" onfocus="if(this.value == 'Search') { this.value = ''; }"> <br />
                <input type="submit" value="Search">
            </form>
        </div>
        
	<div id="maincontent">
        
        <h2 style="text-align: center;">
        ADD ACTOR/DIRECTOR
        </h2>
                <br />        <br /> 
        <form action="add_person.php" method="post">

            <div class="separator">
                <input class="styled-tbox" type="text" name="fname" onfocus="if(this.value == 'First Name') { this.value = ''; }"  value="First Name" required>
                <input class="styled-tbox" type="text" name="lname" onfocus="if(this.value == 'Last Name') { this.value = ''; }"  value="Last Name" required>
                Date of Birth: <select class="styled-select" name="month_of_birth" onchange="return wait_for_load(this, event, function() { editor_date_month_change(this, 'birthday_day','birthday_year'); });" required>
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
                <select class="styled-select" name="day_of_birth" required>
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
                <input class="styled-tbox" type="text" name="year_of_birth" value="Year" maxlength="4" type="number" onfocus="if(this.value == 'Year') { this.value = ''; }" required>
                <!-- </select> -->
            </div>

            <div class="separator">
                <select class="styled-select" name="profession">
                    <option value="actor">Actor</option>
                    <option value="director">Director</option>
                </select>             
                <select class="styled-select" name="sex">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
                Date of Death: <select class="styled-select" name="month_of_death" onchange="return wait_for_load(this, event, function() { editor_date_month_change(this, 'birthday_day','birthday_year'); });">
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
                <select class="styled-select" name="day_of_death">
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
                <input class="styled-tbox" type="text" name="year_of_death" value="Year" maxlength="4" type="number" onfocus="if(this.value == 'Year') { this.value = ''; }">
            <!-- </select> <br /> -->
            </div>
            
        <br /><br />
        <div class="separator">
            <div class="center-align">
            <input class="styled-submit" type="submit" value="Submit">
            </div>
        </div>
        <br /><br /><br />
<?php
    /////////////////////////////////////////////////////
    //*************************************************//
    //************getting variables********************//
    //*************************************************//
    /////////////////////////////////////////////////////
    $profession = $_POST["profession"];
    $sex = $_POST["sex"];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];


    $month_of_birth = $_POST["month_of_birth"];
    $day_of_birth = $_POST["day_of_birth"];
    $year_of_birth = $_POST["year_of_birth"];

    $dob = $year_of_birth."-".$month_of_birth."-".$day_of_birth;

    $month_of_death= $_POST["month_of_death"];
    $day_of_death = $_POST["day_of_death"];
    $year_of_death = $_POST["year_of_death"];
    if($month_of_death == "na" || $day_of_death == "na" || $year_of_death == "" || $year_of_death == "Year")
    {
        $dod = NULL; //'NULL' WILL ENTER AS 0000-00-00
    }
    else
    {
        $dod = $year_of_death."-".$month_of_death."-".$day_of_death; //NEED TO FIX DOD IF NULL && ERROR CHECK DOB<DOD
    }


    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $result_person = mysqL_query("SELECT id FROM MaxPersonID;", $db_connection);
    $row = mysql_fetch_assoc($result_person);



    if($profession == "director")
    {   
        if (!is_numeric($year_of_birth)) {
            print '<h3 style="text-align: center">Please Enter a Valid Year of Birth</h3>';
            return;
        }
        $person_id = $row['id'] + 1;
        if($dod == NULL)
        {   
            $query = "INSERT INTO Director (id, last, first, dob) VALUES($person_id, '$last_name', '$first_name', '$dob');";
            $result = mysql_query($query, $db_connection) or die( "Error: " . mysql_error());
        }
        else
        {
            $query = "INSERT INTO Director VALUES($person_id, '$last_name', '$first_name', '$dob', '$dod');";
            $result = mysql_query($query, $db_connection) or die( "Error: " . mysql_error());   
        }

        if ($result) {
            print '<h3 style="text-align: center">Inserted Director</h3>';
            mysqL_query("UPDATE MaxPersonID SET id=$person_id", $db_connection);
        }
        else {
            print '<h3 style="text-align: center">Something Went Wrong! :(</h3>';
        }
    }
    else if($profession == "actor")
    {
        if (!is_numeric($year_of_birth)) {
            print '<h3 style="text-align: center">Please Enter a Valid Year of Birth</h3>';
            return;
        }
        $person_id = $row['id'] + 1;
        if($dod == NULL)
        {
            $query = "INSERT INTO Actor (id, last, first, sex, dob) VALUES($person_id, '$last_name', '$first_name', '$sex', '$dob');";
            $result = mysql_query($query, $db_connection) or die( "Error: " . mysql_error());

        }
        else
        { 
            $query = "INSERT INTO Actor VALUES($person_id, '$last_name', '$first_name', '$sex', '$dob', '$dod');";
            $result = mysql_query($query, $db_connection) or die( "Error: " . mysql_error()); 
        }  
        // var_dump($result);  
        if ($result) {
            print '<h3 style="text-align: center">Inserted Actor</h3>';
            mysqL_query("UPDATE MaxPersonID SET id=$person_id", $db_connection);
        }
        else {
            print '<h3 style="text-align: center">Something Went Wrong! :(</h3>';
        }

    }
    else
    {
        print "";
    }



    mysql_close($db_connection);
?>

        </div>
        </form>
    </div>
</body>


</html>
