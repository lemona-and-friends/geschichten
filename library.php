<?php
    session_start();
    
    
   
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
    echo "<div class='flexContainer'>";
        
        $sql = "SELECT * FROM geschichten WHERE fertig =1" ;
        $resultado2 = mysqli_query($bd, $sql);
    if($resultado2->num_rows === 0){
        echo "<div>Noch keine fertigen Geschichten vorhanden.</div>";
        echo "<div><a class='myButton' href=". $_SERVER['PHP_SELF']. ">Aktualisieren</a></div>";
    }
    else{
        
    echo "<div><table><tr><th>Geschichte</th><th>Aktionen</th></tr>";
   
    while($row = $resultado2->fetch_array())
    {
        echo "<tr><td>". $row['about'] . "</td><td> <a class='myButton' href='/read.php?id=".$row['id']."'> Lesen </a></td></tr>";
      
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
    <a class= "myButton" href="afterLogin.php">Zurück zur Übersicht</a>
    </div>
</body>


</html>
