<?php


// Vérifie si l'utilisateur est authentifié
$isLoggedIn = isset($_SESSION['user']);
?>


<header>
    <nav>
        <h1>Fleur de Dahlia</h1>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="/ctrl/login/welcome.php">Welcome</a></li>
            <li><a href="#">Nos Produits</a></li>
            <li><a href="/ctrl/login/secret.php">Nos Secrets</a></li>
        </ul>
 
        <?php if ($isLoggedIn): ?>
            <a href="/ctrl/login/logout.php" id="profileIconLogout" class="profile-icon"><img src="/asset/img/flowerYelow-removebg-preview.png" alt=""></a>
            <?php else: ?>
                <a href="" id="profileIcon" class="profile-icon"><img src="/asset/img/loginFlower.png" alt=""></a>
        <?php endif; ?>

    </nav>
</header>
<script src="/asset/script/hiddenForm.js"></script>

