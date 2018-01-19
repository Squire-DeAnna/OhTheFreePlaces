<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="/templates/css/stylesheet.css" media="screen">
   
    
    <title>Oh The Free Places You'll Go</title>
    <meta name="description" content="Template for other pages">
</head>
<body>
	<header>
            <div class="heading">
                <a href="index.php?action=home" style='text-decoration: none;'><h1>OH THE FREE <br>
                        PLACES YOU'LL GO!</h1></a>
                
                <nav>
                    <ul>
                        <li><a href="#">Cities</a></li>
                        <li>-</li>
                        <li><a href="#">About Us</a></li>
                        <li>-</li>
                        <?php
                                if (isset($_SESSION['loggedin'])){
                                    echo "<li><a href='accounts/index.php?action=profile'>Account</a></li>";
                                    echo "<li>-</li>";
                                    echo "<li><a href='accounts/index.php?action=logout'>Log Out</a></li>";
                                } else {
                                    echo "<li><a href='accounts/index.php?action=login'>Login</a></li>";
                                }
                               ?>
                    </ul>
                    
                    <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
                            <div class="dropdown-content">
                              <a>Cities</a>
                              <a>About Us</a>
                              <?php
                                if (isset($_SESSION['loggedin'])){
                                    echo "<a href='accounts/index.php?action=profile'>Account</a>";
                                    echo "<a href='accounts/index.php?action=log_out'>Log Out</a>";
                                } else {
                                    echo "<a href='accounts/index.php?action=login'>Login</a>";
                                }
                               ?>
                          </div>
                  </div>
                </nav>
            </div>
	</header>
    <main>