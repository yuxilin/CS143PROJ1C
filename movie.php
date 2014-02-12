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

        <?php
            echo "<form action='movie.php?id=" . $mid . "' method='post'>" ;
        ?>
                <div class="separator">
                    <br /><br />
                    Insert Your Review: 
                </div>
                <div class="separator">
                    <input class="styled-tbox" type="text" name="reviewer" value="Your Name" onfocus="if(this.value == 'Your Name') { this.value = ''; }"> 
                <input type="range" min="1" max="5" value="1" step="1" name="rating" list="rating"> 
                    <datalist id="rating">
                      <option value="1">
                      <option value="2">
                      <option value="3">
                      <option value="4">
                      <option value="5">
                    </datalist>
                </div>
                <div class="separator">
                    <textarea name="comments" maxlength="500" rows="4" cols="50"></textarea>
                </div>                
                <div class="separator">
                    <input type="submit" class="styled-submit" name="comment-submit" value="Submit Review">
                </div>
        </form>
        <?php
            $db_connection = mysql_connect('localhost', 'cs143', '');
            mysql_select_db('CS143', $db_connection);

            $comment_input = $_POST['comments'];
            $comment_input = trim($comment_input);

            $reviewer = $_POST['reviewer'];
            $reviewer = trim($reviewer);

            $rating = $_POST['rating'];

            $time  = time();
            if ($reviewer != "Your Name" && $reviewer != "") {
                $insert_comment_query = mysql_query("INSERT INTO Review (name, mid, rating, comment) VALUES('$reviewer', $mid, $rating, '$comment_input');", $db_connection) or die( "Error: " . mysql_error());
                if($insert_comment_query)
                {
                    echo "Comment Saved! <br />";
                }
                else
                {
                    echo "You dun goofed! <br />";
                }
            }
            mysql_close($db_connection);
        ?>

        <div class="separator">
            -- Reviews --
        </div>
        <div class="left-aligned">
        <?php 
            $db_connection = mysql_connect('localhost', 'cs143', '');
            mysql_select_db('CS143', $db_connection);

            $display_comment_query = mysql_query("SELECT * FROM Review WHERE mid=$mid;", $db_connection);
            if ($display_comment_query) {
                while ($display=mysql_fetch_assoc($display_comment_query)) {
                    echo "Reviewer: " . $display['name'] . "<br />";
                    echo "Time of Review: " . $display['time'] . " ";
                    echo "Rating: " . $display['rating']. "<br />";
                    echo "Comment: " . $display['comment'] . "<br /><br />";
                }            
            }
            mysql_close($db_connection);
        ?>
    </div>
    </div>
</body>


</html>
