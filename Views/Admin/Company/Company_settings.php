<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Company Settings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once __DIR__ . "\..\..\Partials\Header.php" ?>

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

<div class="container mt-5">
  <h2>Company Settings</h2>

  <ul class="nav nav-tabs" id="companySettingsTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="add-company-tab" data-bs-toggle="tab" data-bs-target="#add-company" type="button" role="tab">Add Company</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="list-companies-tab" data-bs-toggle="tab" data-bs-target="#list-companies" type="button" role="tab">All Companies</button>
    </li>
    
  </ul>

  <div class="tab-content mt-3">

    <!-- Add Company -->
    <div class="tab-pane fade show active" id="add-company" role="tabpanel">
        
      <form action="/Orderly/public/admin/company_settings.php" method="POST">
        <input type="hidden" name="add_company" value="1">

        <div class="mb-3">
          <label class="form-label">Company Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Notes</label>
          <input type="text" name="notes" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Add Company</button>
      </form>
    </div>

    <!-- All Companies -->
    <div class="tab-pane fade" id="list-companies" role="tabpanel">
      <h5>All Companies</h5>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Notes</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($companies as $company): ?>
          <tr>
            <td><?=$company['id']?></td>
            <td><?=$company['name']?></td>
            <td><?=$company['address']?></td>
            <td><?=$company['notes']?></td>

            <td>
              <form action="edit_company_decider.php" method="POST" >
                <input type="hidden" name='id' value="<?=$company['id']?>">
                <button class='btn btn-primary' >Edit</button>
              </form>
            </td>

            <td>
              <form action="delete_company.php" method="POST" onsubmit="return confirm('Are you sure!?')">
                <input type="hidden" name='id' value="<?=$company['id']?>">
                <button class='btn btn-danger' >Delete</button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
          
        </tbody>
      </table>
    </div>
  </div>
  <a href="admin_dashboard.php" class="btn btn-secondary mt-5">Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
