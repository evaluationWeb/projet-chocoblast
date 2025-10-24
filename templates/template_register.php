<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <?php include "components/components_navbar.php";?>
    <main class="container">
    <div>
        <form action="" method="post">
            <h1>Ajouter un compte</h1>
            <input type="text" name="firstname" id="" placeholder="saisir votre prénom">
            <input type="text" name="lastname" id="" placeholder="saisir votre nom">
            <input type="text" name="pseudo" id="" placeholder="choisir un pseudo">
            <input type="email" name="email" id="" placeholder="saisir votre email">
            <input type="password" name="password" id="" placeholder="saisir votre mot de passe">
            <input type="password" name="verif_password" id="" placeholder="confirmer votre mot de passe">
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p><?= $data["message"] ?? "" ?></p>
    </div>
</main>
<?php include "components/components_footer.php";?>
</body>

</html>