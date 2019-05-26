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

    $title="Neue Geschichte";
    include('head.php')
    ?>
    <form action="startNew.php" method="post">

        <?php
        $options = '';
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>";
            exit();
        }

        $sql = "SELECT name FROM user";
        $resultado2 = mysqli_query($bd, $sql);

        mysqli_close($bd);


        while ($row = $resultado2->fetch_array()) {
            $options .= "<span><option>" . $row['name'] . "</option></span>";
            $checkboxes .= "<label class='checkbox-inline m-2' for='" . $row['name'] . "'><input class='m-2' type='checkbox' id='" . $row['name'] . "' name='checkbox[]' value='" . $row['name'] . "'>" . $row['name'] . "</label>";
        }


        $menu = "<label></label><select class='form-control' name='filter' id='filter'>" . $options . "</select>";




        echo "<div>An der Geschichtenschreiberei teilnehmen werden: <br>";
        echo $checkboxes . "</div><br>";
        echo "Anfangen wird:";
        echo $menu;
        ?>
        <div class="p-4">
            Thema/Person der Geschichte:

        <input class="form-control" type="text" value="" id="thema" name="thema">
        <input type="submit" name="someAction" value="Neue Geschichte starten" class="m-4 btn btn-success"/>
        </div>
    </form>
</div>
</div>


</body>

</html>
