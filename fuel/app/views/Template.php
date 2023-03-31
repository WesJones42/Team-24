<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"></meta>
    <meta name="author" content="T24"></meta>
    <meta name="keywords" content="HTML5, Homepage"></meta>
    <meta name="description" content="Fuel Template"></meta>
    <style type="text/css"></style>

    
    <?php echo Asset::css($css) ?>
    <title> <?php echo $title ?>  </title>
</head>
<body>
<nav>
        <ul>
            <li> <div id="logo">
                <?php echo Asset::img("Logo.png"); ?>
            </div></li>
            <li><a href="Home.php">Home</a></li>
            <li><a href="Bio.php">About Us</a></li>
            <li><a href="generate.php">Mosaic</a></li>
        </ul>
    </nav>

    <!--
    <div id="logo">
       <?php echo Asset::img("Logo.png"); ?>
    </div>
    -->

    <header>
       <h1> <?php echo $header; ?>  </h1>
    </header>

    <?php echo $content; ?> 
    
    <footer>
         <p>CS312 Spring 2023 | Freaky Four | Group 24 </p>
    </footer>
</body>