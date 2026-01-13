<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weekly Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php require_once __DIR__ . "/../../partials/header.php" ?>

<body class="bg-light">

<div class="container py-5">

  <!-- Page title -->
  <div class="row mb-4">
    <div class="col">
      <h2 class="fw-bold">Weekly Menu</h2>
      <p class="text-muted">Click a day to manage meals</p>
    </div>
  </div>

  <!-- Days cards -->
  <div class="row g-4">

    <?php foreach($days as $day_name): ?>
    <!-- Monday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=<?=$day_name['day']?>" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title"><?=ucfirst($day_name['day'])?></h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
</div>
  <a href="admin_dashboard.php" class="btn btn-secondary d-flex justify-content-center mt-5 w-25">Back to dashboard</a>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
