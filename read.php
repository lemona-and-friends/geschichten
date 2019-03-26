<?php
    session_start();
    
    
   
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
    
    echo "<div class='flexContainer'>";
        
        $sql = "SELECT * FROM geschichten WHERE id =". $_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
$row = $resultado2->fetch_array();
echo "<div><h2>".$row['about']."</h2></div>";
    echo "<div style='text-align: left'>" .$row['Pt1']. "<br>" . $row['Pt2']. "<br>" . $row['Pt3']. "<br>" . $row['Pt4']. "<br>" . $row['Pt5']. "<br>" . $row['Pt6']. "<br>" . $row['Pt7']. "<br>" . $row['Pt8']. "<br></div>";
    
        
   
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
    <a class="myButton" href="library.php">Zurück zur Bibliothek</a>
    </div>

</body>


</html>
