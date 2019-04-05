<?php
    session_start();
    
        include ('head.php');
   
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
        <div>
            <a href="library.php"><button class="button">Zurück zur Bibliothek</button></a>
        </div>
    </div>
<?php include('footer.php')?>
</body>
</html>
