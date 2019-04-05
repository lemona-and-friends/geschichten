<?php
    session_start();
    $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
    if (mysqli_connect_errno()) {
        echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction1']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt1 ='". $_POST['pt1'].  " ". $_POST['letzterTeil'] . "', letzterTeil = '". $_POST['letzterTeil']."'  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction2']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt2 ='". $_POST['pt2'].  " ". $_POST['letzterTeil'] . "', letzterTeil = '". $_POST['letzterTeil']."'  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction3']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt3 ='". $_POST['pt3'].  " ". $_POST['letzterTeil'] . "', letzterTeil = '". $_POST['letzterTeil']."'  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction4']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt4 ='". $_POST['pt4'].  " ". $_POST['letzterTeil'] . "', letzterTeil = '". $_POST['letzterTeil']."'  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction5']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt5 ='". $_POST['pt5'].  " ". $_POST['letzterTeil'] . "', letzterTeil = '". $_POST['letzterTeil']."'  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction6']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt6 ='". $_POST['pt6'].  " ". $_POST['letzterTeil'] . "', letzterTeil = '". $_POST['letzterTeil']."'  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction7']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt7 ='". $_POST['pt7'].  " ". $_POST['letzterTeil'] . "', letzterTeil = '". $_POST['letzterTeil']."'  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction8']))
    {
        $sql = "UPDATE geschichten SET nextPerson='" . $_POST['filter'] ."', Pt8 ='". $_POST['pt8']. "', fertig = 1  where id=".$_GET['id'];
        $resultado2 = mysqli_query($bd, $sql);
        mysqli_close($bd);
        header("Location: /overview.php");
    }
    
    
    
    
   
    
        
        $sql = "SELECT * FROM geschichten WHERE id ='" . $_GET['id'] ."'" ;
        $resultado2 = mysqli_query($bd, $sql);
    $row = $resultado2->fetch_array();
    ?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="base.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<title>Geschichten </title>
</head>

<body>

<?php
    
    echo "<div class='flexContainer'>";
    echo "<div><h1>".$row['about']."</h1></div>";
    
    if($row['Pt1'] == null){
        echo "Beginne die Geschichte";
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt1'></textarea>";
        echo "<div id='letzterTeil'>Letzter Teil für die nächste Person: <br><textarea name='letzterTeil'></textarea></div>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        
        while($row2 = $result->fetch_array()){
            $options .="<option>" . $row2['name'] . "</option>";
            
        }
        
        $menu="<select name='filter' id='filter'>" . $options . "</select>";
        
        
        
        echo "<br> An " . $menu;
        
        echo "<input type='submit' name='someAction1' value='Weiterreichen' class='myButton'/>";
    } else if ($row['Pt2'] == null){
        echo "<div id='fertigerPart'>Teil 1 ✅<br><br>";
        echo "..." .$row['letzterTeil']. "</div>";
        $result = mysqli_query($bd, $sql);
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt2'></textarea>";
        echo "<div id='letzterTeil'>Letzter Teil für die nächste Person: <br><textarea name='letzterTeil' ></textarea> </div>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        while($row2 = $result->fetch_array()){
            $options .="<option>" . $row2['name'] . "</option>";
            
        }
        $menu="<select name='filter' id='filter'>" . $options . "</select>";
        echo "<br> An " . $menu;
        
        echo "<input type='submit' name='someAction2' value='Weiterreichen' class='myButton'/>";
    }
    else if ($row['Pt3'] == null){
        echo "<div id='fertigerPart'>Teil 1 ✅</div>";
        echo "<div id='fertigerPart'>Teil 2 ✅<br><br>";
        echo "..." .$row['letzterTeil']. "</div>";
        $result = mysqli_query($bd, $sql);
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt3'></textarea>";
        echo "<div id='letzterTeil'>Letzter Teil für die nächste Person: <br><textarea name='letzterTeil' ></textarea> </div>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        while($row2 = $result->fetch_array()){
            $options .="<option>" . $row2['name'] . "</option>";
            
        }
        $menu="<select name='filter' id='filter'>" . $options . "</select>";
        echo "<br> An " . $menu;
        
        echo "<input type='submit' name='someAction3' value='Weiterreichen' class='myButton'/>";
    }
    else if ($row['Pt4'] == null){
        echo "<div id='fertigerPart'>Teil 1 ✅</div>";
        echo "<div id='fertigerPart'>Teil 2 ✅</div>";
        echo "<div id='fertigerPart'>Teil 3 ✅<br><br>";
        echo "..." .$row['letzterTeil']. "</div>";
        $result = mysqli_query($bd, $sql);
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt4'></textarea>";
        echo "<div id='letzterTeil'>Letzter Teil für die nächste Person: <br><textarea name='letzterTeil' ></textarea> </div>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        while($row2 = $result->fetch_array()){
            $options .="<option>" . $row2['name'] . "</option>";
            
        }
        $menu="<select name='filter' id='filter'>" . $options . "</select>";
        echo "<br> An " . $menu;
        
        echo "<input type='submit' name='someAction4' value='Weiterreichen' class='myButton'/>";
    }
    else if ($row['Pt5'] == null){
        echo "<div id='fertigerPart'>Teil 1 ✅</div>";
        echo "<div id='fertigerPart'>Teil 2 ✅</div>";
        echo "<div id='fertigerPart'>Teil 3 ✅</div>";
        echo "<div id='fertigerPart'>Teil 4 ✅<br><br>";
        echo "..." .$row['letzterTeil']. "</div>";
        $result = mysqli_query($bd, $sql);
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt5'></textarea>";
        echo "<div id='letzterTeil'>Letzter Teil für die nächste Person: <br><textarea name='letzterTeil' ></textarea> </div>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        while($row2 = $result->fetch_array()){
            $options .="<option>" . $row2['name'] . "</option>";
            
        }
        $menu="<select name='filter' id='filter'>" . $options . "</select>";
        echo "<br> An " . $menu;
        
        echo "<input type='submit' name='someAction5' value='Weiterreichen' class='myButton'/>";
    }
    else if ($row['Pt6'] == null){
        echo "<div id='fertigerPart'>Teil 1 ✅</div>";
        echo "<div id='fertigerPart'>Teil 2 ✅</div>";
        echo "<div id='fertigerPart'>Teil 3 ✅</div>";
        echo "<div id='fertigerPart'>Teil 4 ✅</div>";
        echo "<div id='fertigerPart'>Teil 5 ✅<br><br>";
        echo "..." .$row['letzterTeil']. "</div>";
        $result = mysqli_query($bd, $sql);
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt6'></textarea>";
        echo "<div id='letzterTeil'>Letzter Teil für die nächste Person: <br><textarea name='letzterTeil' ></textarea> </div>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        while($row2 = $result->fetch_array()){
            $options .="<option>" . $row2['name'] . "</option>";
            
        }
        $menu="<select name='filter' id='filter'>" . $options . "</select>";
        echo "<br> An " . $menu;
        
        echo "<input type='submit' name='someAction6' value='Weiterreichen' class='myButton'/>";
    }
    else if ($row['Pt7'] == null){
        echo "<div id='fertigerPart'>Teil 1 ✅</div>";
        echo "<div id='fertigerPart'>Teil 2 ✅</div>";
        echo "<div id='fertigerPart'>Teil 3 ✅</div>";
        echo "<div id='fertigerPart'>Teil 4 ✅</div>";
        echo "<div id='fertigerPart'>Teil 5 ✅</div>";
        echo "<div id='fertigerPart'>Teil 6 ✅<br><br>";
        echo "..." .$row['letzterTeil']. "</div>";
        $result = mysqli_query($bd, $sql);
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt7'></textarea>";
        echo "<div id='letzterTeil'>Letzter Teil für die nächste Person: <br><textarea name='letzterTeil' ></textarea> </div>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        while($row2 = $result->fetch_array()){
            $options .="<option>" . $row2['name'] . "</option>";
            
        }
        $menu="<select name='filter' id='filter'>" . $options . "</select>";
        echo "<br> An " . $menu;
        
        echo "<input type='submit' name='someAction7' value='Weiterreichen' class='myButton'/>";
    }
    else if ($row['Pt8'] == null){
        echo "<div id='fertigerPart'>Teil 1 ✅</div>";
        echo "<div id='fertigerPart'>Teil 2 ✅</div>";
        echo "<div id='fertigerPart'>Teil 3 ✅</div>";
        echo "<div id='fertigerPart'>Teil 4 ✅</div>";
        echo "<div id='fertigerPart'>Teil 5 ✅</div>";
        echo "<div id='fertigerPart'>Teil 6 ✅</div>";
        echo "<div id='fertigerPart'>Teil 7 ✅<br><br>";
        echo "..." .$row['letzterTeil']. "</div>";
        $result = mysqli_query($bd, $sql);
        echo "<br><form action='write.php?id=".$_GET['id']."' method='post'><textarea name='pt8'></textarea>";
        $options='';
        
        $sql = "SELECT name FROM user";
        $result = mysqli_query($bd, $sql);
        
        
        echo "<input type='submit' name='someAction8' value='Fertig stellen' class='myButton'/>";
    }
    
    echo "</div>";
    
    
    mysqli_close($bd);
    

    ?>



</body>


</html>
