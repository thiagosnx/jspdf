<?php
require_once('actions/db.php');
$id = filter_input(INPUT_GET ,'id');

if($id){
    $sql = $pdo->prepare('SELECT * FROM jspdf WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();

    $form = $sql->fetch(PDO::FETCH_ASSOC);
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
    <?php if($form)?>
        <div class="form-item">
            <p class="label">Nome:</p>
            <p id="name" class="value"><?= $form['name'] ?></p>
            <p id="email" class="value"><?= $form['email'] ?></p>
            <p id="description" class="value"><?= $form['description'] ?></p>
            <img src="<?= $form['image'] ?>" alt="">
        </div>
        <a href="/jspdf/dashboard.php">voltar</a>
        <br>
        <a href="/jspdf/index.php">novo</a>
        <br>
    </div>
    <button type="button" onclick="generatePDF()">Gerar PDF</button>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="script.js"></script>
</body>
</html>