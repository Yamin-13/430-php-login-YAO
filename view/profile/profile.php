<main>
    <section>
        <h2>Avatar de <?= $_SESSION['user']['email'] ?></h2>
        <p><img style="border-radius: 8%;" src="/upload/<?= $_SESSION['user']['avatar_filename'] ?>" /></p>
    </section>
</main>
