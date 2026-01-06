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

    <!-- Monday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=monday" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Monday</h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>

    <!-- Tuesday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=tuesday" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Tuesday</h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>

    <!-- Wednesday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=wednesday" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Wednesday</h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>

    <!-- Thursday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=thursday" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Thursday</h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>

    <!-- Friday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=friday" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Friday</h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>

    <!-- Saturday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=saturday" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Saturday</h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>

    <!-- Sunday -->
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="day.php?day=sunday" class="text-decoration-none">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Sunday</h5>
            <span class="badge bg-primary">Edit</span>
          </div>
        </div>
      </a>
    </div>
  </div>
  <a href="admin_dashboard.php" class="btn btn-secondary d-flex justify-content-center mt-5 w-25">Back to dashboard</a>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
