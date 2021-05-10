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
    echo "Connessione fallita per:" . $conn->connect_error;
  } else {
    $sql = "SELECT room_number, floor FROM stanze";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      //Salvo i risultati in row
      $row = $result->fetch_assoc();
      //Ciclo i risultati
      while ($row) {
        //Stampo i risultati
        echo "Stanza N." .$row['room_number']. "piano:" .$row['floor'];
        $row = $result->fetch_assoc();
      }

    } else if ($result) {
      echo "0 risultati";
    } else {
      echo "Errore nella query";
    }
    //Chiudo la connessione
    $conn->close();
  }
 ?>
