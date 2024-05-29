<main>
    <section>
        <h2>Avatar de <?= $user['id'] ?></h2>
        <p><img style="border-radius: 8%;" src="data:image/png;base64,<?= base64_encode($user['avatar']) ?>" /></p>
    </section>
</main>
