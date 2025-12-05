<?php

include 'db.php';

function getAllVisitors(){
    $conn = Connect();

    $query = 'SELECT * FROM visitors';
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}

function findVisitors($find){
    $conn = Connect();

    $query = "SELECT * FROM visitors WHERE first_name OR last_name LIKE '%$find%'";
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}