<?php
session_start();

$bd = mysqli_connect("localhost", "geschichten_User", "geschichten", "geschichten_User");
if (mysqli_connect_errno()) {
    echo "Error: " . mysqli_connect_error() . ". <br>";
    exit();
}


$sql = "SELECT * FROM geschichten WHERE id =" . $_GET['id'];
$resultado2 = mysqli_query($bd, $sql);
$row = $resultado2->fetch_array();

$title = "Leseansicht";
include('head.php');


echo "<div class='card m-3'><div class='card-header'><h4>" . $row['about'] . "</h4></div><div class='card-body'>";
echo "<article style='text-align:left'>" . $row['Pt1'] . "<br>" . $row['Pt2'] . "<br>" . $row['Pt3'] . "<br>" . $row['Pt4'] . "<br>" . $row['Pt5'] . "<br>" . $row['Pt6'] . "<br>" . $row['Pt7'] . "<br>" . $row['Pt8'] .
    "<br></article></div>";


mysqli_close($bd);


?>
</div>
</body>
</html>
