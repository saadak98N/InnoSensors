<?php
include "database_credentials.php";

$db=mysqli_connect($servername, $username, $password);
$db_check="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
$result = mysqli_query($db, $db_check);

if(mysqli_num_rows($result)==0){
    echo "No database Found<br>";
    createDatabase($servername, $username, $password);
    createTables($servername, $username, $password,$database);
}else{
    echo "Database found\n";
}

createTables($servername, $username, $password,$database);

function query($query, $conn){
    $result = mysqli_query($conn, $query);
    if($result){
        return true;
    }
    else{
            echo "Error:" . $query . "<br>" . mysqli_error($conn)."<br>";
            return false;
    }
}

function createDatabase($servername, $username, $password){
    $db=mysqli_connect($servername, $username, $password);
    if(!$db){
		die("Connection Error: ".mysqli_connect_error());
	}
    $query="create database crohmi_portal";
    if(query($query,$db)){
        echo "Database Created! <br>";
    }
}

function createTables($servername, $username, $password, $database){
    $db=mysqli_connect($servername, $username, $password, $database);
    if(!$db) {
		die("Connection Error: ".mysqli_connect_error());
    }

    $query='CREATE TABLE Reading
            (
                id               INT AUTO_INCREMENT PRIMARY KEY,
                timestamp        TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                nh3              DOUBLE,
                co               DOUBLE,
                no2              DOUBLE,
                c3h8             DOUBLE,
                c4h10            DOUBLE,
                ch4              DOUBLE,
                h2               DOUBLE,
                c2h5oh           DOUBLE,
                battery_voltage  DOUBLE,
                soil_moisture    DOUBLE,
                soil_temperature DOUBLE,
                air_temperature  DOUBLE,
                air_moisture     DOUBLE,
                node_id          INT
            );';

    if(query($query,$db)){
        echo "TABLE Reading Created! <br>";
    }
}
?>

