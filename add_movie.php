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
        <h2>
            ADD MOVIE
        </h2>
        <form action="add_movie.php" method="post">
            
            <div class="separator">
                <input type="text" class="styled-tbox" name="movie-title" onfocus="if(this.value == 'Movie Title') { this.value = ''; }" maxlength=100 value="Movie Title" required>
                <input type="text" class="styled-tbox" name="movie-year" value="Year" maxlength="4" type="number" onfocus="if(this.value == 'Year') { this.value = ''; }" required>
                <select class="styled-select" name="rating" required>
                <option value="G">G</option>
                <option value="PG">PG</option>
                <option value="PG-13">PG-13</option>
                <option value="R">R</option>
                <option value="NC-17">NC-17</option> 
                </select> 
                <input type="text" class="styled-tbox" name="movie-company" onfocus="if(this.value == 'Movie Company') { this.value = ''; }" maxlength=50 value="Movie Company" required>
            </div>
            
            <div class="separator">
                <ul id="genre-list">
                <li>
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Action">Action<br> 
                </li>
                <li>
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Adult">Adult<br>
                </li>
                <li>
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Adventure">Adventure<br>
                </li>
                <li>
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Animation">Animation<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Comedy">Comedy<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Crime">Crime<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Documentary">Documentary<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Drama">Drama<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Family">Family<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Fantasy">Fantasy<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Horror">Horror<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Musical">Musical<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Mystery">Mystery<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Romance">Romance<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Sci-fi">Sci-Fi<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Short">Short<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Thriller">Thriller<br>
                </li>
                <li>   
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="War">War<br>
                </li>
                <li>
                    <input type="checkbox" name="genre[]" class="styled-cbox" value="Western">Western<br>
                </li>
                </ul>
            </div>

        <div class="separator">
            <div class="center-align">
                <input class="styled-submit" id="hoverable" type="submit" value="Submit">
            </div>
        </div>
        <br /><br /><br />

    <?php
    /////////////////////////////////////////////////////
    //*************************************************//
    //************getting variables********************//
    //*************************************************//
    /////////////////////////////////////////////////////
    $title = $_POST["movie-title"];
    $year = $_POST["movie-year"];
    $rating = $_POST["rating"];
    $company = $_POST["movie-company"];
    $genreArr = $_POST["genre"];
    
    $title = ucwords($title);
    $company = ucwords($company);
    
    if($year == "" || $year == "Year")
    {
        $year = NULL; 
    }

    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    if ($title != "Movie Title" && $title != "" && $year != "Year") {
        // var_dump ($company);
        $result_movie = mysqL_query("SELECT id FROM MaxMovieID;", $db_connection);
        $row = mysql_fetch_assoc($result_movie);
        $movie_id = $row['id'] + 1;
        mysqL_query("UPDATE MaxMovieID SET id=$movie_id", $db_connection);
        // var_dump ($movie_id);
        //print "<br />";
        $query = "INSERT INTO Movie VALUES($movie_id, '$title', '$year', '$rating', '$company');";
        $result = mysql_query($query, $db_connection) or die( "Error: " . mysql_error());

        foreach($genreArr as $g)
        {
            $query = "INSERT INTO MovieGenre VALUES($movie_id, '$g');";
            $result = mysql_query($query, $db_connection) or die( "Error: " . mysql_error());
        }
        // var_dump($result);
        if ($result) {
            print '<h3 style="text-align: center">Inserted Movie</h3>';
        }
        else {
            print "something went wrong :(";
        }
    }
    else {
        print "";    
    }
        

    mysql_close($db_connection);
?>
        </form>
    </div>

</body>


</html>
