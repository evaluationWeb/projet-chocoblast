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
    <main class="container">
        <?php include "components/components_navbar.php";?>
        <section>
            <h1>Se connecter</h1>
            <form action="" method="post">
                <input type="email" name="email" placeholder="Saisir votre email" required>
                <input type="password" name="password" placeholder="Saisir votre mot de passe"required>
                <input type="submit" value="Se connecter" name="submit">
            </form>
            <p><?= $data["message"] ??""?></p>
        </section>
    </main>
    <?php include "components/components_footer.php";?>
</body>

</html>