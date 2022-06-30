<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recettes de cuisine</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    >
</head>
<body>
<?php include_once('./include/header.php') ?>
<div class="container">
    <h1>Contactez-nous</h1>

    <form enctype="multipart/form-data" action="submit_contact.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" value="<?php echo $_SESSION['loggedUser']['email'] ?? '' ?>">
            <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
        </div>
        <div class="mb-3">
            <input type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php include_once('./include/footer.php') ?>
</body>
</html>