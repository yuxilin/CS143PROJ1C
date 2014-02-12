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
                <?php
                    $search_input = $_POST['search_value'];
                    $search_input = trim($search_input);
                    $search_arr = explode(' ', $search_input);
                    
                    for($i = 0; $i < count($search_arr); $i++)
                    {
                        $search_arr[$i] = trim($search_arr[$i]);
                    }

                    $db_connection = mysql_connect('localhost', 'cs143', '');
                    mysql_select_db('CS143', $db_connection);

                    $query_actor = mysql_query("SELECT CONCAT(first, ' ', last) AS name, dob, id FROM Actor WHERE CONCAT(first, ' ', last) LIKE '%$search_input%';", $db_connection);
                    $query_movie = mysql_query("SELECT * FROM Movie WHERE title LIKE '%$search_input%' ;", $db_connection);
                ?>
            </form>
        </div>
    <div id="maincontent">
        <?php

            if ($search_input != '') {
                echo "<br />";
                echo "You Searched ['$search_input'] From Actor Database: ";
                while ($row = mysql_fetch_array($query_actor)) {
                    echo "<div>";
                        echo "Actor: " . "<a href= 'people.php?id=" . urlencode( $row['id'] ) . "'>" . $row['name']. ' ' . '(' . $row['dob'] . ')' . "</a>" . "<br />";
                        //echo "Actor: " . $row['name'] . ' '. '(' . $row['dob'] . ')';
                    echo "</div>";
                }
                echo "<br />";

                echo "You Searched ['$search_input'] From Movie Database: ";
                while ($row = mysql_fetch_array($query_movie)) {
                    echo "<div>";
                        echo "Movie: " . "<a href= 'movie.php?id=" . urlencode( $row['id'] ) . "'>" . $row['title']. ' '. '(' . $row['year'] . ')' ."</a>" . "<br />";
                        //echo "Movie: " . $row['title'] . ' ' . '(' . $row['year'] . ')';
                    echo "</div>";
                }
                echo "<br />";
            }


            mysql_close($db_connection);
        ?>
    </div>
</body>


</html>
