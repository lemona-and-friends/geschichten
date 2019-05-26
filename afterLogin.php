<?php
    session_start();

    $title= "Willkommen, ".$_SESSION['userid'];

    if(!isset($_SESSION['userid'])){
       exit("Du bist nicht eingeloggt, du Schelm");
       }
    
    include('head.php')
    ?>

    <div class="mt-2 mb-2">
        <a href="startNew.php">
            <button class="btn btn-success btn-lg btn-block p-4 p-sm-2">
                <i class="fas fa-plus mr-1"></i>
                <span>Neue Geschichte</span>
            </button>
        </a>
    </div>
    <div class="mt-2 mb-2">
        <a href="overview.php">
            <button class="btn btn-success btn-lg btn-block p-4 p-sm-2">
                <i class="fas fa-pencil-alt mr-1"></i>
                <span>Weiterschreiben</span>
            </button>
        </a>

    </div>
    <div class="mt-2 mb-2">
        <a href="library.php">
            <button class="btn btn-success btn-lg btn-block p-4 p-sm-2">
                <i class="fas fa-glasses mr-1"></i><br class="d-none d-sm-inline">
                <span>Geschichte lesen</span>
            </button>
        </a>
    </div>
</div>
</body>



</html>
