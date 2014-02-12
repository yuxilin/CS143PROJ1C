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

            if(isset($_GET['id'])) {
                $mid = $_GET['id'];
                $dynamic_movie_query = mysql_query("SELECT * FROM Movie WHERE id=$mid", $db_connection);
                $m_row = mysql_fetch_assoc($dynamic_movie_query);

                $did = mysql_query("SELECT did FROM MovieDirector WHERE mid=$mid", $db_connection);
                $did = mysql_fetch_assoc($did);
                $did = $did['did'];

                if($did == NULL)
                {
                    $d_row['first'] = '';
                    $d_row['last'] = '';   
                }
                else{
                    $dynamic_movie_query = mysql_query("SELECT * FROM Director WHERE id=$did", $db_connection);
                    $d_row = mysql_fetch_assoc($dynamic_movie_query);
                }   
                $default_actors_query = mysql_query("SELECT aid, role FROM MovieActor WHERE mid =$mid");
                
            }
            else{
                $default_movie_query = mysql_query("SELECT * FROM Movie WHERE id=2978", $db_connection);
                $m_row = mysql_fetch_assoc($default_movie_query);

                $default_movie_query = mysql_query("SELECT * FROM Director WHERE id=12391");
                $d_row = mysql_fetch_assoc($default_movie_query);

                $default_actors_query = mysql_query("SELECT aid, role FROM MovieActor WHERE mid = 2978");

            }    

            echo "-- Movie Info -- <br />";
            echo "Title: " . $m_row['title'] . ' ' . '(' . $m_row['year'] . ')' . "<br />";
            echo "Producer: " . $m_row['company'] . "<br />";
            echo "MPAA Rating: " . $m_row['rating'] . "<br />";
            echo "Director: " . $d_row['first'] . ' ' . $d_row['last'] . "<br />";

            echo "<br /><br /><br />";
            echo "-- Actors -- <br />";
            while ($a_row = mysql_fetch_array($default_actors_query, $db_connection)) {
                $default_actors_result = mysql_query("SELECT * FROM Actor WHERE id='$a_row[0]'") or die("Error: " . mysql_error());
                $row = mysql_fetch_assoc ($default_actors_result);
                $a_row[1] = trim($a_row[1]);
                echo "<a href= 'people.php?id=" . urlencode( $row['id'] ) . "'>" . $row['first']. " ". $row['last']."</a>" . ' as "' . $a_row[1] . '"<br />' ;
            }

            

            mysql_close($db_connection);
        ?>
    </div>
</body>


</html>
