<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recettes de cuisine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once('./include/header.php') ?>
<div class="container">
    <?php if (empty($_POST['email']) || empty($_POST['message']) || empty($_FILES['image'])): ?>
        <div class="alert alert-danger" role="alert">Il faut un email, un message et une image pour soumettre le formulaire.</div>
    <?php else: ?>
        <?php if ($_FILES['image']['error'] == 0): ?>
            <?php if ($_FILES['image']['size'] <= 1000000):
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extension = $fileInfo['extension'];
                $mimetype = mime_content_type($_FILES['image']['tmp_name']);
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions) && in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))):
                    // On peut valider le fichier et le stocker définitivement
                    $filePath = 'images/' . basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], $filePath); ?>
                    <h1>Message bien reçu !</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Rappel de vos informations</h5>
                            <p class="card-text"><b>Email</b> : <?php echo htmlentities($_POST['email']); ?></p>
                            <p class="card-text"><b>Message</b> : <?php echo htmlentities($_POST['message']); ?></p>
                            <img src="<?= $filePath ?>" alt="image"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">Le fichier doit être une image</div>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">L'image ne doit pas dépasser 1mo</div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">Une erreur est survenue lors de l'import de l'image</div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php include_once('./include/footer.php') ?>
</body>
</html>