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
    </div>
</body>


</html>
