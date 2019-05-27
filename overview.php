<?php
    session_start();

        $title="Überblick";
        include('head.php');
   
        $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
        if (mysqli_connect_errno()) {
            echo "Error: " . mysqli_connect_error() . ". <br>";
            exit();
        }

        $sql = "SELECT * FROM geschichten WHERE nextPerson ='" . $_SESSION['userid'] ."'" ;


        $resultado2 = mysqli_query($bd, $sql);
    if($resultado2->num_rows === 0){
        echo "<div>Die anderen sind wohl zu langsam. Gedulde dich noch ein wenig.</div>";
        echo "<a href=". $_SERVER['PHP_SELF']. " class= 'basicButton myButton'>Aktualisieren</a>";
    }
    else{
        
        echo "<div class='w-100 p-2'><p class='text-left'>Stories, die du weiterschreiben kannst:</p></div><div id='storyCarousel' class='carousel slide p-2' data-ride='carousel'>";
        echo "<ol class='carousel-indicators'>";

        $index = 0;
        while ($index <= $resultado2->num_rows) {
            if($index == 0) {
                echo "<li data-target='#storyCarousel' data-slide-to='" . $index . "' class='active'></li>";
            }else{
                echo "<li data-target='#storyCarousel' data-slide-to='" . $index . "'></li>";
            }
            $index++;
        }

        echo"</ol>";
        echo"<div class='carousel-inner p-3'>";

        $index2 = 0;
        while($row2 = $resultado2->fetch_array()){
            if($index2 == 0){
                echo "<div class='carousel-item active flex flex-column' id='".$row2['id']."'><div class='p-4'><h4>". $row2['about'] . "</h4></div></div>";
            }else{
                echo "<div class='carousel-item flex flex-column' id='".$row2['id']."'><div class='p-4'><h4>". $row2['about'] . "</h4></div></div>";
            }
            $index2++;
        }
        echo "</div>";

        echo <<<controls
            <a class="carousel-control-prev" href="#storyCarousel" data-slide="prev">
                <span class="fas fa-chevron-left text-success"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#storyCarousel" data-slide="next">
                <span class="fas fa-chevron-right text-success"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
controls;
    }

    echo "<div class='p-2 mt-2 mb-2'>
            <a href='afterLogin.php'><button class='btn btn-secondary'>Zurück</button></a>
            <button id='write' class='btn btn-success'> Weiterschreiben</button>
        </div>";

    $query2 = "SELECT * FROM geschichten WHERE Teilnehmer Like '%" . $_SESSION['userid'] ."%' AND NOT nextPerson = ''"  ;
    $allStories = mysqli_query($bd, $query2);

    if($allStories->num_rows > 0){
        echo "<div class='mt-3 mb-1 pt-4 p-2 align-self-stretch text-left' style='border-top: 1px solid white'>";
        echo "<p>Stories, auf die du wartest:</p>";
        echo "<div class='d-flex flex-wrap'>";

        while($story = $allStories->fetch_array()){
            echo "<div class='p-2 mt-2 mb-2 waitingFor'><b>".$story['about']."</b><br/><span class='font-italic'>warten auf ".$story['nextPerson']."...</span></div>";
        }

        echo "</div></div>";
    }

    mysqli_close($bd);

    ?>


</div>
<script>
    window.onload = () => {
        document.querySelector('button#write').onclick = () => {
            location.href = `/write.php?id=${document.querySelectorAll('.carousel-item.active')[0].id}`;
        }
    }
</script>
</body>
</html>
