<?php 

require_once __DIR__ . "/../config/dbconfig.php";

// Connexion à la base de données

$db = new PDO("mysql:host=".DB_HOSTNAME .";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("SET CHARACTER SET utf8");

// Récupération des données

$query = "SELECT * FROM contacts";
$stmt = $db->prepare($query);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/css/dash.css?<?php echo time(); ?>">
    <title>Tableau de bord</title>
</head>
<body>
    <header>
        <h1>Tableau de bord</h1>
    </header>
    <main>

    <?php
    
    if (!empty($messages)) {

        echo "<table>";
        echo "<tr><th>Nom</th><th>Email</th><th>sujet</th><th>Message</th></tr>";
        
        foreach ($messages as $message) {
            echo "<tr>";
            echo "<td>". $message['name']. "</td>";
            echo "<td>". $message['email']. "</td>";
            echo "<td>". $message['subject']. "</td>";
            echo "<td>". $message['message']. "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "Aucun message reçu.";
    }

    
    ?>

    </main>
    
</body>
</html>