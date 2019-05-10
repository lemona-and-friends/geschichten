<?php
    session_start();

    $title = "Geschichten-Übersicht";


    include ('head.php');

        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }
    echo "<div class='flexContainer' style='flex-grow:2'>";

        $sql = "SELECT * FROM geschichten WHERE fertig =1" ;
        $resultado2 = mysqli_query($bd, $sql);
    if($resultado2->num_rows === 0){
        echo "<div>Noch keine fertigen Geschichten vorhanden.</div>";
        echo "<div><a class='basicButton myButton' href=". $_SERVER['PHP_SELF']. ">Aktualisieren</a></div>";
    }
    else{
        echo "<span class='large'>Wähle eine Geschichte zum Lesen aus:</span>";

        echo "<div class='d-flex flex-wrap justify-content-center'>";

        while($row = $resultado2->fetch_array())
        {
            echo "<a class='storytile card col-lg-4 col-sm-3 m-2 p-2' href='/read.php?id=" . $row['id'] . "'><div><article><p class='title'>" . $row['about'] . "</p></article></div></a>";
        }
        echo "</div>";
    }
        mysqli_close($bd);
        ?>
</div>
<?php
    include('footer.php');

?>
</div>
</body>

</html>
