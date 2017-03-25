<?php

include_once("incl/functions.php"); 

?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $pagetitle ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Poiret+One|Raleway:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/travstyle.css" type="text/css">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="pasttrips.php">Past Trips</a>
            <a class="navbar-brand" href="future.php">Future Trips</a>
            <a class="navbar-brand" href="favorites.php">Favorites</a>
            <a class="navbar-brand" href="editlist.php">Manage Trips</a>
        </div>
    </div>
    </nav>

    <div class="title jumbotron">
        <div class="container">
            <a href="index.php"><h1>My Travelogue</h1></a>
<!--each page should have unique h2 in header-->
            <h2><?php echo $subtitle ?></h2>
<!-- button for vacation picker-->
            <p><a class="btn btn-primary btn-lg" 
                href="single.php?id=<?php echo get_random()?>" 
                role="button">Vacation Selector &raquo;
            </a></p>
        </div>
    </div>