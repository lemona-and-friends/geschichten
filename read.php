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

$title = "Leseansicht: <br class='d-sm-none'/><span class='storytitle'>" . $row['about'] . "</span>";
include('head.php');


echo "<div class='flexContainer'>";
echo "<div class='card'><div class='card-body'>";
echo "<article style='text-align:left'>" . $row['Pt1'] . "<br>" . $row['Pt2'] . "<br>" . $row['Pt3'] . "<br>" . $row['Pt4'] . "<br>" . $row['Pt5'] . "<br>" . $row['Pt6'] . "<br>" . $row['Pt7'] . "<br>" . $row['Pt8'] .
    "<br></article></div></div>";


mysqli_close($bd);


?>

</div>
<?php
$footerOptions = [
    "library.php" => "zurück",
];
include('footer.php');

?>
</body>
</html>
