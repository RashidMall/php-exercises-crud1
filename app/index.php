<?php 
$connection = mysqli_connect("den1.mysql5.gear.host", "colyseum5", "Vh41Uj0_7y8~", "colyseum5");
if(mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Partie 1 : Lire des données</title>
</head>
<body>
    <div class="exo">
      <h1>Exercice 1</h1>
      <h2>Afficher tous les clients.</h2>
      <p>
        <?php 
          $query = "SELECT * FROM clients";
          if($result = mysqli_query($connection, $query)){
            while($row = mysqli_fetch_assoc($result)){
              echo "Client n°" . $row['id'] . " " . $row['lastName'] . " " .$row['firstName'] . " <br/>";
            }
            mysqli_free_result($result);
          }
        ?>
      </p>
    </div>
    <div class="exo">
      <h1>Exercice 2</h1>
      <h2>Afficher tous les types de spectacles possibles.</h2>
      <p>
      <?php 
        $query = "SELECT * FROM showTypes";
        if($result = mysqli_query($connection, $query)){
          while($row = mysqli_fetch_assoc($result)){
            echo "Type: " . $row['type'] . " <br/>";
          }
          mysqli_free_result($result);
        }
      ?>
      </p>
    </div>
    <div class="exo">
      <h1>Exercice 3</h1>
      <h2>Afficher les 20 premiers clients.</h2>
      <p>
      <?php 
        $query = "SELECT * FROM clients ";
        $query .= "LIMIT 20";
        if($result = mysqli_query($connection, $query)){
          while($row = mysqli_fetch_assoc($result)){
            echo "Client n°" . $row['id'] . " " . $row['lastName'] . " " .$row['firstName'] . " <br/>";
          }
          mysqli_free_result($result);
        }
      ?>
      </p>
    </div>
    <div class="exo">
      <h1>Exercice 4</h1>
      <h2>N'afficher que les clients possédant une carte de fidélité.</h2>
      <p>
      <?php 
        $query = "SELECT * FROM clients ";
        $query .= "WHERE cardNumber IS NOT NULL";
        if($result = mysqli_query($connection, $query)){
          while($row = mysqli_fetch_assoc($result)){
            echo "Client n°" . $row['id'] . " " . $row['lastName'] . " " .$row['firstName'] . ". Card number: ". $row['cardNumber'] . " <br/>";
          }
          mysqli_free_result($result);
        }
      ?>
      </p>
    </div>
    <div class="exo">
      <h1>Exercice 5</h1>
      <h2>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Les afficher comme ceci :
          Nom : Nom du client Prénom : Prénom du client
          Trier les noms par ordre alphabétique.</h2>
      <p>
      <?php 
        $query = "SELECT * FROM clients ";
        $query .= "WHERE lastName LIKE 'M%' ";
        $query .= "ORDER BY lastName ASC";
        if($result = mysqli_query($connection, $query)){
          while($row = mysqli_fetch_assoc($result)){
            echo "Nom : " . $row['lastName'] . " Prénom : " .$row['firstName'] . " <br/>";
          }
          mysqli_free_result($result);
        }
      ?>
      </p>
    </div>
    <div class="exo">
      <h1>Exercice 6</h1>
      <h2>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.</h2>
      <p>
      <?php 
        $query = "SELECT * FROM shows ";
        $query .= "ORDER BY title ASC";
        if($result = mysqli_query($connection, $query)){
          while($row = mysqli_fetch_assoc($result)){
            echo $row['title'] . " par " . $row['performer'] . ", le " . $row['date'] . " à " .  $row['startTime'] . ".<br/>";
          }
          mysqli_free_result($result);
        }
      ?>
      </p>
    </div>
    <div class="exo">
      <h1>Exercice 7</h1>
      <h2>Afficher tous les clients comme ceci : Nom : Nom de famille du client Prénom : Prénom du client Date de naissance : Date de naissance du client Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas) Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.</h2>
      <p>
      <?php 
        $query = "SELECT * FROM clients ";
        if($result = mysqli_query($connection, $query)){
          while($row = mysqli_fetch_assoc($result)){
            echo "Nom : " . $row['lastName'] . "Prénom : " . $row['firstName'];
            echo " Date de naissance : " . $row['birthDate'];
            echo " Carte de fidélité : " . ($row['card'] == 1 ? "Oui Numéro de carte : " . $row['cardNumber'] : 'Non') . ".<br/>";
          }
          mysqli_free_result($result);
        }
      ?>
      </p>
    </div>
</body>
</html>