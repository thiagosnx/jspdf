<?php

require_once('db.php');

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$description = filter_input(INPUT_POST, 'description');

try {
    if ($name && $email && $description) {
        if (isset($_FILES['image'])) {
            $image = $_FILES['image'];

            // Verifica se não houve erro no upload
            if ($image['error'] === UPLOAD_ERR_OK) {
                // Caminho temporário do arquivo
                $tempFilePath = $image['tmp_name'];

                // Move o arquivo para o destino desejado
                $destination = '../uploads/' . $image['name'];
                move_uploaded_file($tempFilePath, $destination);

                // Preparar e executar a consulta SQL
                $sql = $pdo->prepare("INSERT INTO jspdf (name, email, description, image) VALUES (:name, :email, :description, :image)");
                $sql->bindValue(':name', $name);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':description', $description);
                $sql->bindValue(':image', $destination);
                $sql->execute();

                header('Location: ../index.php');
                exit;
            } else {
                echo "Erro no upload da imagem.";
            }
        } else {
            echo "Nenhuma imagem enviada.";
        }
    } else {
        echo "Faltam informações necessárias.";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
