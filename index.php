<?php
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
        
        test();
        
    }
    
    function test(){
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
        
        $sql = "SELECT name FROM user WHERE name ='" . $_POST['name'] ."' and password='".  $_POST['password'] ."'" ;
        $resultado2 = mysqli_query($bd, $sql);
        
        
        $num2 = mysqli_num_rows($resultado2);
        if($num2 != 0){
            $_SESSION['userid'] = $_POST['name'];
            header("Location: /afterLogin.php");
        }
        
        else {
            echo "Email oder Passwort falsch du dummi";
        }
        
        mysqli_close($bd);
        
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
<h3> Login </h3>

Willkommen Geschichtenschreiber, lasst uns gemeinsam eine Reise in die sarmadische Fantasie antreten. <br><br>

<form action="index.php" method="post">
<span title="Su correo electrónico">Dein Name:  </span><input type="text" name="name" value="" id="name" required><br><br>
<span title="Contraseña">Dein Passwort:  </span><input type="text" name="password" value="" id="password"   required><br><br>
<input type="submit" name="someAction" value="Lasst die Reise beginnen" class="myButton"/>
</div>
</div>



</body>


</html>
