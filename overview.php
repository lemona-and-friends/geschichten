<?php
    session_start();
    
    
   
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
    echo "<div class='flexContainer'>";
        $sql = "SELECT * FROM geschichten WHERE nextPerson ='" . $_SESSION['userid'] ."'" ;
        $resultado2 = mysqli_query($bd, $sql);
    if($resultado2->num_rows === 0){
        echo "<div>Die anderen sind wohl zu langsam. Gedulde dich noch ein wenig.</div>";
        echo "<a href=". $_SERVER['PHP_SELF']. " class= 'myButton'>Aktualisieren</a>";
    }
    else{
        
    echo "<div><table><tr><th>Geschichte</th><th>Aktionen</th></tr>";
   
    while($row = $resultado2->fetch_array())
    {
        echo "<tr><td>". $row['about'] . "</td><td> <a class='myButton' href='/write.php?id=".$row['id']."'> Weiterschreiben </a></td></tr>";
      
    }
    echo "</table></div>";
    }
        mysqli_close($bd);
        
    
    
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="base.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<title>Geschichten </title>
</head>

<body>
<br>
<br>
<a href="afterLogin.php" class="myButton">Andere Optionen</a>
</div>

</body>


</html>
