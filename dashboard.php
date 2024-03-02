<?php 
require_once('actions/db.php');

$forms = [];

$sql = $pdo->query("SELECT * FROM jspdf");

if($sql->rowCount() > 0){
    $forms = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    
</head>
<body>
    <div class="forms">
    <?php foreach($forms as $form):?>
        <div class="form-item">
            <p class="label">Nome:</p>
            <p class="value"><?= $form['name'] ?></p>
            <a href="getbyid.php?id=<?= $form['id'] ?>">View</a>
        </div>
    <?php endforeach ?>
    </div>
</body>
</html>