<?php
include "database_credentials.php";

if(isset($_GET["nh3"]) && isset($_GET["co"]) && isset($_GET["no2"]) && isset($_GET["c3h8"]) && isset($_GET["c4h10"]) && isset($_GET["ch4"]) && isset($_GET["h2"]) && isset($_GET["c2h5oh"]) && isset($_GET["battery_voltage"]) && isset($_GET["soil_moisture"]) && isset($_GET["soil_temperature"]) && isset($_GET["air_moisture"]) && isset($_GET["air_temperature"]) && isset($_GET["node_id"])){
    $nh3 = $_GET["nh3"];
    $co = $_GET["co"];
    $no2 = $_GET["no2"];
    $c3h8 = $_GET["c3h8"];
    $c4h10 = $_GET["c4h10"];
    $ch4 = $_GET["ch4"];
    $h2 = $_GET["h2"];
    $c2h5oh = $_GET["c2h5oh"];
    $battery_voltage = $_GET["battery_voltage"];
    $soil_moisture = $_GET["soil_moisture"];
    $soil_temperature = $_GET["soil_temperature"];
    $air_moisture = $_GET["air_moisture"];
    $air_temperature = $_GET["air_temperature"];
    $node_id = $_GET["node_id"];

$sql = sprintf("INSERT INTO Reading (nh3, co, no2, c3h8, c4h10, ch4, h2, c2h5oh, battery_voltage, soil_moisture,
                                        soil_temperature, air_moisture, air_temperature, node_id)
                VALUES (%f, %f, %f, %f, %f, %f, %f, %f, %f, %f, %f, %f, %f, %d)", $nh3, $co, $no2, $c3h8, $c4h10, $ch4, $h2,
                $c2h5oh, $battery_voltage, $soil_moisture, $soil_temperature, $air_moisture, $air_temperature, $node_id);

$conn=mysqli_connect($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["database"]);
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "<script>
    "."Error:" . $sql . "<br>" . mysqli_error($conn)."<br>"."
    </script>";
} else
    echo "Data successfully inserted!";

}
else
    echo "The values do not exist.";
?>
