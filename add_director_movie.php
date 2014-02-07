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
                <li><a href="search.php">SEARCH</a></li>
                <li><a href="people.php">PEOPLE DIRECTORY</a></li>
                <li><a href="movie.php">MOVIE DIRECTORY</a></li>
                <li><a href="add_actor_movie.php">ACTORS+MOVIES</a></li>
                <li><a href="add_director_movie.php">DIRECTORS+MOVIES</a></li>
                <li><a href="add_person.php">ADD PEOPLE</a></li>
                <li><a href="add_movie.php">ADD MOVIE</a></li>
                <li><a href="comments.php">IN YOUR OPINION...</a></li>
            </ul>
        </div>
        
	<div id="maincontent">
        <h2>
            ADD DIRECTOR MOVIE RELATION
        </h2>


        <form action="add_director_movie.php" method="post">
            <?php

                $db_connection = mysql_connect('localhost', 'cs143', '');
                mysql_select_db('CS143', $db_connection);
                $result = mysql_query("SELECT * FROM Movie ORDER BY title ASC", $db_connection);

                echo "Select Movie: ";
                echo "<select name='movie' class='styled-select'>";
                // echo "<option value='na'>Select Movie</option>";
                while ($row = mysql_fetch_array($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['title'] . ' '. '(' . $row['year'] . ')' . "</option>";
                }
                echo "</select>";
                echo "<br />";

               $result = mysql_query("SELECT * FROM Director ORDER BY first ASC", $db_connection);

                echo "Select Director: ";
                echo "<select name='director' class='styled-select'>";
                // echo "<option value='na'>Select Director</option>";
                while ($row = mysql_fetch_array($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['first'] . ' ' . $row['last'] . ' ' . '('. $row['dob'] . ')' . "</option>";
                }
                echo "</select>";
                echo "<br />";
            ?>

                <div class="separator">
                <div class="center-align">
                    <input class="styled-submit" type="submit" value="Submit">
                </div>
            <br /><br /><br />
        </form>
        <?php
            $mid = $_POST["movie"];
            $did = $_POST["director"];
            // var_dump($mid);
            // print "<br />";
            // var_dump($did);

            if ($mid==NULL && $did==NULL) {
                print "";
            }
            else
            {
                $result=mysql_query("INSERT INTO MovieDirector VALUES($mid, $did);", $db_connection);
                if ($result) {
                    print "<h2>Inserted Movie-Director Relation</h2>";
                }
                else {
                    print "Something Went Wrong! :(";
                }
            }
            mysql_close($db_connection);
        ?>
    <div/>
</body>

</html>