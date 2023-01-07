<?php

// db connection
$db['user'] = 'root';
$db['pass'] = '';
$db['db'] = 'movienight';
$db['host'] = '127.0.0.1';
$db['port'] = '3306';

function dbConnect(){
    global $db;

    // connect to DB
    $mysqli = new mysqli($db['host'], $db['user'] ,$db['pass'], $db['db']);
    $mysqli->set_charset("utf8mb4");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    return $mysqli;
}

function getFilme(){
    $mysqli = dbConnect();
    // GET ALL FILME
    $sql = "SELECT * FROM atfilm order by nume_film asc";
    $result = $mysqli->query($sql);

    $arrFilme = [];  // =================== holds the result
    $cnt=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $arrFilme[$cnt]['id_film'] = $row['id_film'];
            $arrFilme[$cnt]['nume_film'] = $row['nume_film'];
            $cnt++;
        }
    } else {
        // there are no results
    }

    $mysqli->close();
    return $arrFilme;
}

function getFilmLangById($id=0){
    $mysqli = dbConnect();
    // GET ALL FILME
    $sql = "SELECT * FROM atlimba WHERE id_film = $id order by limba asc";
    $result = $mysqli->query($sql);

    $arrLimba = [];  // =================== holds the result
    $cnt=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $arrLimba[$cnt]['limba'] = $row['limba'];
            $cnt++;
        }
    } else {
        // there are no results
    }

    $mysqli->close();
    return $arrLimba;
}

function getFilmOraById($id=0){
    $mysqli = dbConnect();
    // GET ALL FILME
    $sql = "SELECT * FROM atora WHERE id_film = $id order by ora asc";
    $result = $mysqli->query($sql);

    $arrOra = [];  // =================== holds the result
    $cnt=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $arrOra[$cnt]['ora'] = $row['ora'];
            $cnt++;
        }
    } else {
        // there are no results
    }

    $mysqli->close();
    return $arrOra;
}

?>

