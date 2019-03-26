<?php
    session_start();
    if(!isset($_SESSION['userid'])){
       exit("Du bist nicht eingeloggt du schelm");
       }
    
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="base.css">



    <title>Geschichten </title>
</head>

<body>
    <div class="flexContainer">
    <div>
    <h3> Willkommen
        <?php
    echo $_SESSION['userid'];
    ?>
    </h3>
    </div>
<div>

    <a href="startNew.php" class="myButton2">Neue Geschichte schreiben</a>
    </div>
<div>
    <a href="overview.php" class="myButton3">Weiterschreiben</a>
    </div>
<div>
    <a href="library.php" class="myButton4">Geschichten lesen</a>
</div>
</div>




</body>


</html>
