<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulário para PDF</title>
</head>
<body>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form id="myForm" action="php/create.php" method="POST" enctype="multipart/form-data">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        
        <label for="description">Mensagem:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>


        <label for="image">Imagem:</label>
        <input type="file" id="image" name="image" onchange="convertImage()">
        
        <button type="submit">Save</button>
        <button type="button" onclick="generatePDF()">Gerar PDF</button>
    </form>
    <div id="show-image">
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="script.js"></script>
</body>
</html>