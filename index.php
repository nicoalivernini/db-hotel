<?php
  //Dichiaro il database
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "db_hotel";

  //Effettuo il collegamento
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Controllo la connessione
  if ($conn && $conn->connect_error) {
    echo "Connection failed:" . $conn->connect_error;
  }
 ?>
