<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction'])) {

    test();

}

/**
 *
 */
function test()
{
    $bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
    if (mysqli_connect_errno()) {
        echo "Error: " . mysqli_connect_error() . ". <br>";
        exit();
    }

    $sql = "SELECT name FROM user WHERE name ='" . $_POST['name'] . "' and password='" . $_POST['password'] . "'";
    $resultado2 = mysqli_query($bd, $sql);


    $num2 = mysqli_num_rows($resultado2);
    if ($num2 != 0) {
        $_SESSION['userid'] = $_POST['name'];
        header("Location: /afterLogin.php");
    } else {
        echo "Email oder Passwort falsch du dummi";
    }

    mysqli_close($bd);

}
    include('head.php')
?>


<div class="flexContainer">
    <div>
        <h1> Login </h1>
    </div>
    <div>
        <h4>Willkommen Geschichtenschreiber, lass uns gemeinsam eine Reise in die sarmadische Fantasie antreten. </h4>
        <form action="index.php" method="post">
            <fieldset>
                <input type="text" name="name" value="" id="name" placeholder="Dein Name" required>
            </fieldset>
            <fieldset>
                <input type="password" name="password" value="" id="password" placeholder="Dein Passwort" required>
            </fieldset>
            <input type="submit" name="someAction" value="Lass die Reise beginnen" class="button"/>
        </form>
    </div>
</div>
</body>
</div>

</html>
