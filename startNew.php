<?php
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
        $teilnehmende;
        foreach ($_POST['checkbox'] as $teilnehmer){
            $teilnehmende.=",".$teilnehmer;
            
        }
       
        
        $sql = "INSERT INTO geschichten(about, nextPerson, teilnehmer) VALUES ('" . $_POST['thema'] ."','". $_POST['filter'] ."','".$teilnehmende."')";
        $resultado2 = mysqli_query($bd, $sql);
        
        if($resultado2 != 0){
            if($_POST['filter'] == $_SESSION['userid']){
            
            header("Location: /write.php?id=". mysqli_insert_id($bd));
                
            }
            else{
                header("Location: /overview.php");
            }
        }
        
        
        
        mysqli_close($bd);
        
    }
    
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="base.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<title> Geschichtenseite  </title>
</head>

<body>
<div class="flexContainer">
<div>
<form action="startNew.php" method="post">
Anfangen wird:
<?php
    $options='';
    $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
    if (mysqli_connect_errno()) {
        echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
    }
    
    $sql = "SELECT name FROM user";
    $resultado2 = mysqli_query($bd, $sql);
  
    
    while($row = $resultado2->fetch_array()){
        $options .="<span><option>" . $row['name'] . "</option></span>";
        $checkboxes .="<span><input type='checkbox' id='".$row['name'] ."' name='checkbox[]' value='".$row['name'] ."'><label for='".$row['name'] ."'>".$row['name'] ."</label></span><br>";
    }
    
    $menu="<p><label></label></p><select name='filter' id='filter'>" . $options . "</select>";
    

    
    echo $menu ."</div><br><br>";
    echo "<div>An der Geschichtenschreiberei teilnehmen werden: <br>";
    echo $checkboxes. "</div><br>";
    ?>
<div>Thema/Person der Geschichte: <br> <input type="text" value="" id="thema" name="thema">
<br>
<br>
<input type="submit" name="someAction" value="Neue Geschichte starten" class="myButton"/>
</form>
</div>
</div>


</body>

</html>
