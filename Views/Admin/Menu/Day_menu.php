<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Day Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php require_once __DIR__ . "/../../partials/header.php" ?>

<?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger d-flex justify-content-center"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<?php if(!empty($_SESSION['delete_success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['delete_success']; ?></div>
    <?php unset($_SESSION['delete_success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['delete_error'])): ?>
    <div class="alert alert-danger d-flex justify-content-center"><?= $_SESSION['delete_error']; ?></div>
    <?php unset($_SESSION['delete_error']); ?>
<?php endif; ?>

<body class="bg-light">

<div class="container py-5">

  <!-- Header -->
  <div class="row mb-4">
    <div class="col">
      <h2 class="fw-bold">Menu for <?= ucfirst($day['day']) ?></h2>
      <p class="text-muted">Add or remove meals for this day</p>
    </div>
  </div>

  <div class="row g-4">

    <!-- LEFT: Meal catalog -->
    <div class="col-lg-6">

      <div class="card shadow-sm">
        <div class="card-header fw-semibold">
          Meal catalog
        </div>

        <div class="card-body">

          <!-- CATEGORY -->
           <?php foreach($categories as $category): ?>
          <h6 class="text-primary mb-2"><?=$category['name']?></h6>
          

            
            <ul class="list-group mb-4">
                <?php foreach($products as $product): ?>
                <?php if($product['category_id'] === $category['id']): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $product['name'] ?>
                

                <form method="POST" action="menu_add.php" class="mb-0">
                <input type="hidden" name="menu_id" value="<?= $day['id'] ?>">
                <input type="hidden" name="day" value="<?= $day['day'] ?>">
                <input type="hidden" name="meal_id" value="<?=$product['id']?>">
                <button class="btn btn-primary">Add</button>
                </form>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>     
          </ul>

        </div>
      </div>

    </div>

    <!-- RIGHT: Menu for day -->
    <div class="col-lg-6">

      <div class="card shadow-sm">
        <div class="card-header fw-semibold">
          Menu for this day
        </div>

        <div class="card-body">

          <!-- CATEGORY -->
          <?php foreach($categories as $category): ?>
          <h6 class="text-primary mb-2"><?=$category['name']?></h6>
          

            
            <ul class="list-group mb-4">
                <?php foreach($menu_day as $menu): ?>
                <?php if($menu['category_id'] == $category['id']): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $menu['meal_name'] ?>

                <form method="POST" action="delete_menu.php" class="mb-0">
                <input type="hidden" name="menu_id" value="<?= $menu['menu_id'] ?>">
                <input type="hidden" name="day" value="<?= $menu['day'] ?>">
                <input type="hidden" name="meal_id" value="<?=$menu['meal_id']?>">
                <button class="btn btn-danger">Remove</button>
                </form>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>  <!-- just for check, need to change this, because it needs to read data from another table -->

        </div>
      </div>

    </div>

  </div>

  <!-- Back -->
  <div class="row mt-4">
    <div class="col">
      <a href="menu.php" class="btn btn-secondary">
        ← Back to week
      </a>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

