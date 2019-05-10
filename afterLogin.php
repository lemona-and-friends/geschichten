<?php
    session_start();

    $title= "Willkommen, ".$_SESSION['userid'];

    if(!isset($_SESSION['userid'])){
       exit("Du bist nicht eingeloggt, du Schelm");
       }
    
    include('head.php')
    ?>
<div style="flex-grow: 2; display: flex; flex-direction: column; justify-content: center;">
    <div class="mt-sm-2 mb-2 option-button">
        <a href="startNew.php">
            <button class="btn btn-large btn-light"><!--class="basicButton myButton2">-->
                <i class="fas fa-plus mr-1"></i>
                <span>Neue Geschichte</span>
            </button>
        </a>
    </div>
    <div class="mt-sm-2 mb-2 option-button">
        <a href="overview.php">
            <button class="btn btn-large btn-light"><!--class="basicButton myButton3">-->
                <i class="fas fa-pencil-alt mr-1"></i>
                <span>Weiterschreiben</span>
            </button>
        </a>

    </div>
    <div class="mt-sm-2 mb-2 option-button">
        <a href="library.php">
            <button class="btn btn-large btn-light"><!--class="basicButton myButton4">-->
                <i class="fas fa-glasses mr-1"></i><br class="d-none d-sm-inline">
                <span>Geschichte lesen</span>
            </button>
        </a>
    </div>
</div>
<?php include('footer.php')?>
</div>
</body>



</html>
