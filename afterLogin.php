<?php
    session_start();
    if(!isset($_SESSION['userid'])){
       exit("Du bist nicht eingeloggt, du Schelm");
       }
    
    include('head.php')
    ?>



    <div>
        <h1> Willkommen,
            <?php
            echo $_SESSION['userid'];
            ?>!
        </h1>
    </div>
    <div>
        <a href="startNew.php" class="basicButton myButton2">Neue Geschichte schreiben</a>
    </div>
    <div>
        <a href="overview.php" class="basicButton myButton3">Weiterschreiben</a>
    </div>
    <div>
        <a href="library.php" class="basicButton myButton4">Geschichten lesen</a>
    </div>
<?php include('footer.php')?>
</div>
</body>



</html>
