<?php
    session_start();

    $title = "Geschichten-Übersicht";


    include ('head.php');

        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>"; exit();
        }

        $sql = "SELECT * FROM geschichten WHERE fertig =1" ;
        $resultado2 = mysqli_query($bd, $sql);
    if($resultado2->num_rows === 0){
        echo "<div>Noch keine fertigen Geschichten vorhanden.</div>";
        echo "<div><a class='btn btn-secondary' href=". $_SERVER['PHP_SELF']. ">Aktualisieren</a></div>";
    }
    else{
        echo "<p>Wähle eine der fertigen Geschichte zum Lesen aus:</p>";

        echo "<div class='d-flex flex-wrap w-md-50'>";

        while($row = $resultado2->fetch_array())
        {
            echo "<a class='card m-2 p-2 libraryItem' href='/read.php?id=" . $row['id'] . "'><div class='p-3'><article>" . $row['about'] . "</article></div></a>";
        }
        echo "</div>";
    }
        mysqli_close($bd);



    ?>
</div>
</body>

</html>
