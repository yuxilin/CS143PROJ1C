<html>

<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>The Movie Database</title>
</head>

<body>
    <h1 id="header">BETTER THAN IMDB</h1>
	<div id="divider"></div>
	<div id="nav-sidebar">MAP
            <ul id="nav-options">
                <li><a href="homepage.php">HOME</a></li>
                <li><a href="">SEARCH</a></li>
                <li><a href="">PEOPLE DIRECTORY</a></li>
                <li><a href="">MOVIE DIRECTORY</a></li>
                <li><a href="add_actor_movie.php">ACTORS+MOVIES</a></li>
                <li><a href="">DIRECTORS+MOVIES</a></li>
                <li><a href="add_person.php">ADD PEOPLE</a></li>
                <li><a href="add_movie.php">ADD MOVIE</a></li>
                <li><a href="">IN YOUR OPINION...</a></li>
            </ul>
        </div>
        
	<div id="maincontent">
        <h2>
            ADD ACTOR MOVIE RELATION
        </h2>


        <form action="add_actor_movie.php" method="post">
            <?php

                $db_connection = mysql_connect('localhost', 'cs143', '');
                mysql_select_db('CS143', $db_connection);
                $result = mysql_query("SELECT title FROM Movie ORDER BY title ASC", $db_connection);

                echo "Select Movie: ";
                echo "<select name='movie' class='styled-select'>";
                while ($row = mysql_fetch_array($result)) {
                    echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
                }
                echo "</select>";
                echo "<br />";

                
                $result = mysql_query("SELECT CONCAT(first, ' ', last) AS name FROM Actor ORDER BY name ASC", $db_connection);

                echo "Select Actor: ";
                echo "<select name='actor' class='styled-select'>";
                while ($row = mysql_fetch_array($result)) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                echo "</select>";
                echo "<br />";
            ?>
            <input type="text" class="styled-tbox" name="role" onfocus="if(this.value == 'Movie Title') { this.value = ''; }" maxlength=100 value="Role" required>
            <br /><br />
                <div class="separator">
                <div class="center-align">
                    <input class="styled-submit" type="submit" value="Submit">
                </div>
            <br /><br /><br />
        </form>
        <?php
            $movie_name = $_POST["movie"];
            $actor_name = $_POST["actor"];
            $role = $_POST["role"];
            $mid = mysql_query("SELECT id FROM Movie WHERE title='$movie_name';", $db_connection);
            $aid = mysql_query("SELECT id FROM Actor WHERE CONCAT(first,' ',last) = '$actor_name';", $db_connection);
            mysql_query("INSERT INTO MovieActor VALUES($mid, $aid, '$role');", $db_connection);
            mysql_close($db_connection);
        ?>
    <div/>
</body>

</html>