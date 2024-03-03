<?php

require_once('db.php');
require_once '../vendor/autoload.php';
use Ramsey\Uuid\Uuid;


$id = Uuid::uuid4()->toString();

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
                $destination = 'https://localhost/jspdf/uploads/' . $image['name'];
                move_uploaded_file($tempFilePath, $destination);

                // Preparar e executar a consulta SQL
                $sql = $pdo->prepare("INSERT INTO jspdf (id, name, email, description, image)
                 VALUES (:id, :name, :email, :description, :image)");
                $sql->bindValue(':id', $id);
                $sql->bindValue(':name', $name);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':description', $description);
                $sql->bindValue(':image', $destination);
                $sql->execute();
                
                session_start(); 
                $_SESSION['msg'] = 'Formulário salvo com sucesso!';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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
