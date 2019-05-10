<?php
    session_start();

        $title="Überblick";
        include('head.php');
   
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
    echo "<div class='flexContainer' style='min-width: 500px'>";
        $sql = "SELECT * FROM geschichten WHERE nextPerson ='" . $_SESSION['userid'] ."'" ;
        $resultado2 = mysqli_query($bd, $sql);
    if($resultado2->num_rows === 0){
        echo "<div>Die anderen sind wohl zu langsam. Gedulde dich noch ein wenig.</div>";
        echo "<a href=". $_SERVER['PHP_SELF']. " class= 'basicButton myButton'>Aktualisieren</a>";
    }
    else{
        
    echo "<div style='width: 100%'><table id='stories'><tr><th>Geschichte</th><th>Aktionen</th></tr>";
   
    while($row = $resultado2->fetch_array())
    {
        echo "<tr><td>". $row['about'] . "</td><td><a href='/write.php?id=".$row['id']."'><button class='button'> Weiterschreiben</button></a></td></tr>";
      
    }
    echo "</table></div>";
    }
        mysqli_close($bd);

    ?>

    <div>
        <a href="afterLogin.php"><button class="button">Weitere Optionen</button></a>
    </div>
</div>
<?php include('footer.php')?>
</div>
</body>
</html>
