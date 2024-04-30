<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/asset/style.css">
</head>
<body>
    <main>
        <header><h2>Identifiez-vous</h2></header>
        <form action="/ctrl/login/login.php" method="post">
            <!-- E-mail -->
            <div>
                <label for="code">E-mail :</label>
                <input type="text" name="mail" id="code">
            </div>
            <!-- PASSWORD -->
            <div>
                <label for="label">Mot de passe :</label>
                <input type="password" name="password" id="label">
            </div>
            <div class="submit">
                <button type="submit">Valider</button>
            </div>
        </form>
    </main>
</body>
</html>