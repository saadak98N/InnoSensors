<?php
include "database_credentials.php";

$sql = "SELECT * FROM Reading WHERE node_id = 1 AND air_moisture > 0 AND air_temperature > 0 AND
 soil_moisture > 0 AND soil_temperature > 0 AND soil_moisture <= 100 AND soil_temperature <= 50";

if (isset($_GET["from"]) && $_GET["from"] != "") {
    $sql = "". $sql ." AND timestamp >= \"". $_GET["from"] ."\"";
}
if (isset($_GET["to"]) && $_GET["to"] != "") {
    $sql = "". $sql ." AND timestamp <= \"". $_GET["to"] ."\"";
}

$sql = "". $sql ." ORDER BY timestamp DESC;";
$conn=mysqli_connect($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["database"]);
$result = mysqli_query($conn, $sql);

if(!$result){
    echo "<script>
    "."Error:" . $sql . "<br>" . mysqli_error($conn)."<br>"."
    </script>";
}


while($row = mysqli_fetch_assoc($result))
    {
        $date = new DateTime($row['timestamp'], new DateTimeZone('UTC'));
        $date->setTimezone(new DateTimeZone('Etc/GMT-5'));

        echo '<tr>
                <td> '.$date->format('Y-m-d H:i:s').' </td>
                <td> '.$row['nh3'].' </td>
                <td>'. $row['co'].' </td>
                <td>'. $row['no2'].' </td>
                <td>'. $row['c3h8'].' </td>
                <td>'. $row['c4h10'].' </td>
                <td>'. $row['ch4'].' </td>
                <td>'. $row['h2'].' </td>
                <td>'. $row['c2h5oh'].' </td>
                <td>'. $row['node_id'].' </td>
              </tr>';
    }
?>
