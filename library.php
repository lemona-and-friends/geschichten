<?php
    session_start();
    
    include ('head.php');
   
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
    echo "<div class='flexContainer'>";
        
        $sql = "SELECT * FROM geschichten WHERE fertig =1" ;
        $resultado2 = mysqli_query($bd, $sql);
    if($resultado2->num_rows === 0){
        echo "<div>Noch keine fertigen Geschichten vorhanden.</div>";
        echo "<div><a class='basicButton myButton' href=". $_SERVER['PHP_SELF']. ">Aktualisieren</a></div>";
    }
    else{
        
    echo "<div style='width:100%'><table class='listing'><tr><th>Geschichte</th><th>Aktionen</th></tr>";
   
    while($row = $resultado2->fetch_array())
    {
        echo "<tr><td>". $row['about'] . "</td><td> <a href='/read.php?id=".$row['id']."'><button class='button'> Lesen </button></a></td></tr>";
      
    }
    echo "</table></div>";
    }
        mysqli_close($bd);
        
    
    
    ?>



<div><a href="afterLogin.php"><button class= "button"> Zurück zur Übersicht</button></a></div>

</div><!--flexContainer-->
<?php include('footer.php')?>
</div><!--main flexContainer-->
</body>

</html>
