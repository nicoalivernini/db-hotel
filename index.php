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
}

  //Condizione inserimento utente
  if ($_GET['id']) {
    //SQL Injections + placeholder
    $stmt = $conn->prepare("SELECT * FROM stanze WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    //Settaggio ed esecuzione
    $stmt->execute();
    //Prendo il risultato
    $result = $stmt->get_result();
    //Ciclo i risultati
    while($row = $result->fetch_assoc()) {
      ?>
      <?php  ?>
      <!-- Stampo informazioni camera selezionata -->
      <div><?= 'ID:' .$row['id'] ?></div>
      <div><?= 'Stanza N:' .$row['room_number'] ?></div>
      <div><?= 'Numero di letti:' .$row['beds'] ?></div>
      <div><?= 'Piano:' .$row['floor'] ?></div>
      <div><a href="/db-hotel/"><?= 'Torna alle stanze' ?></a></div>
      <?php
    }
  } else {

 ?>

<?php
    //Creo la query
    $sql = "SELECT room_number, floor FROM stanze";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      //Salvo i risultati in row
      $row = $result->fetch_assoc();
      //Ciclo i risultati
      while ($row) {
      ?>
      <!-- Stampo i risultati -->
        <div><a href="/db-hotel/?id=<?= $row['id'] ?>"><?= "Stanza N." .$row['room_number']; ?></a> </div>
      <?php
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
