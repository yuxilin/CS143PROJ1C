<html>

<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>The Movie Database</title>
</head>

<body>
    <h1 id="header">BETTER THAN IMDB</h1>
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
                <li><a href="comments.php">IN YOUR OPINION...</a></li>
            </ul>            
            <form action="search.php" method="post">
                <input class="styled-tbox" type="text" name="search_value" value="Search" onfocus="if(this.value == 'Search') { this.value = ''; }"> <br />
                <input type="submit" value="Search">
            </form>
        </div>
    <div id="maincontent">
         <?php

            $db_connection = mysql_connect('localhost', 'cs143', '');
            mysql_select_db('CS143', $db_connection);

            if(isset($_GET['aid'])) {
                $aid = $_GET['aid'];
                $dynamic_actor_query = mysql_query("SELECT * FROM Actor WHERE id=$aid", $db_connection);
                $a_row = mysql_fetch_assoc($dynamic_actor_query);
            }
            else{
                $default_actor_query = mysql_query("SELECT * FROM Actor WHERE id=12278", $db_connection);
                $a_row = mysql_fetch_assoc($default_actor_query);
            }
            
            echo "-- Actor Info -- <br />";
            echo "Name: " . $a_row['first'] . ' ' . $a_row['last'] . "<br />";
            echo "Sex: " . $a_row['sex'] . "<br />";
            echo "Date of Birth: " . $a_row['dob'] . "<br />";

            if (is_null($a_row['dod'])) {
                echo "Date of Death: Still Alive";
            }
            else {
                echo "Date of Death: " . $a_row['dod'] . "<br />";
            }

            echo "<br /><br /><br />";
            echo "-- Movies -- <br />";
            $default_movies_query = mysql_query("SELECT mid, role FROM MovieActor WHERE aid = 12278");
            while ($m_row = mysql_fetch_array($default_movies_query, $db_connection)) {
                $default_movies_result = mysql_query("SELECT * FROM Movie WHERE id='$m_row[0]'") or die("Error: " . mysql_error());
                $row = mysql_fetch_assoc ($default_movies_result);
                $m_row[1] = trim($m_row[1]);
                echo '"' . $m_row[1] . '"' . " in " . $row['title'] . "<br />";
            }


            mysql_close($db_connection);
        ?>
    </div>
</body>


</html>
