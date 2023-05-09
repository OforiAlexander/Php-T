<?php require ("Partials/head.php") ?>
<?php require ("Partials/nav.php") ?>
<?php require ("Partials/banner.php") ?>


  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>Hello <?= $_SESSION['user']['email'] ?? 'Guests' ?>. Welcome to the home page</h1>
    </div>
  </main>
  <?php require ("Partials/footer.php") ?>