<?php

    if(is_null($footerOptions)){
        $footerOptions = [
            "afterLogin.php" => "zurück",
        ];
    }

/**
 * Created by PhpStorm.
 * User: leonakuse
 * Date: 2019-03-26
 * Time: 21:31
 */?>
<div id="footer">
    <?php
    foreach ($footerOptions as $i => $value) {
        echo "<div><a href='".$i."'>". $value . "</a></div>";
    }
    ?>
</div>
