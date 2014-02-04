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
                <li><a href="homepage.php">HOME</a></li>
                <li><a href="">SEARCH</a></li>
                <li><a href="">PEOPLE DIRECTORY</a></li>
                <li><a href="">MOVIE DIRECTORY</a></li>
                <li><a href="">ACTORS+MOVIES</a></li>
                <li><a href="">DIRECTORS+MOVIES</a></li>
                <li><a href="add_person.php">ADD PEOPLE</a></li>
                <li><a href="add_movie.php">ADD MOVIE</a></li>
                <li><a href="">IN YOUR OPINION...</a></li>
            </ul>
        </div>
        
	<div id="maincontent">ADD MOVIE<br />
        
        <form action="add_movie.php" method="post">

            <input type="text" name="movie-title" onfocus="if(this.value == 'Movie Title') { this.value = ''; }" maxlength=100 value="Movie Title" required>
            <input type="text" name="movie-year" value="Year" maxlength="4" type="number" onfocus="if(this.value == 'Year') { this.value = ''; }" required>

            <select name="rating" required>
                <option value="G">G</option>
                <option value="PG">PG</option>
                <option value="PG-13">PG-13</option>
                <option value="R">R</option>
                <option value="NC-17">NC-17</option>
            </select> 
            
            <input type="text" name="movie-company" onfocus="if(this.value == 'Movie Company') { this.value = ''; }" maxlength=50 value="Movie Company" required>


        <input type="submit" value="Submit">
        </form>
    </div>
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
    
    $title = ucwords($title);
    $company = ucwords($company);
    
    if($year == "" || $year == "Year")
    {
        $year = NULL; //'NULL' WILL ENTER AS 0000-00-00
    }


    $db_connection = mysql_connect("localhost", "cs143", "");
    mysql_select_db("CS143", $db_connection);

    $result_movie = mysqL_query("SELECT id FROM MaxMovieID;", $db_connection);
    $row = mysql_fetch_assoc($result_movie);
    
    $movie_id = $row['id'] + 1;
    mysqL_query("UPDATE MaxMovieID SET id=$movie_id", $db_connection);
    var_dump ($movie_id);
    print "<br />";
    $query = "INSERT INTO Movie VALUES($movie_id, '$title', '$year', '$rating', '$company');";
    $result = mysql_query($query, $db_connection) or die( "Error: " . mysql_error());
    print "<h1>Inserted Movie</h1>";


    mysql_close($db_connection);
?>
</body>


</html>