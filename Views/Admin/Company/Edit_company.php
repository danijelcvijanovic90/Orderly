<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Company</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >

</head>
<body>

<!-- ===== HEADER ===== -->
<?php require_once __DIR__ . "/../../partials/header.php"; ?>

<?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- ===== MAIN CONTENT ===== -->
<main class="container mt-5 mb-5">

  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Edit Company</h5>
        </div>

        <div class="card-body">
          <form action="edit_company.php" method="POST">

            <!-- Company ID -->
            <input type="hidden" name="id" value="<?= $company['id'] ?>">

            <!-- Company Name -->
            <div class="mb-3">
              <label for="company_name" class="form-label">Company Name</label>
              <input
                type="text"
                class="form-control"
                id="company_name"
                name="name"
                value="<?= htmlspecialchars($company['name']) ?>"
                required
              >
            </div>

            <!-- Company Address -->
            <div class="mb-3">
              <label for="company_address" class="form-label">Company Address</label>
              <input
                type="text"
                class="form-control"
                id="company_address"
                name="address"
                value="<?= htmlspecialchars($company['address']) ?>"
              >
            </div>

            <!-- Notes -->
            <div class="mb-3">
              <label for="company_notes" class="form-label">Notes</label>
              <textarea
                class="form-control"
                id="company_notes"
                name="notes"
                rows="4"
              ><?= htmlspecialchars($company['notes']) ?></textarea>
            </div>

            <!-- Actions -->
            <div class="d-flex justify-content-between">
              <a href="view_all_companies.php" class="btn btn-secondary">
                Cancel
              </a>

              <button
                type="submit"
                class="btn btn-success"
                onclick="return confirm('Are you sure you want to update this company?')"
              >
                Save Changes
              </button>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>

</main>



<!-- Bootstrap JS -->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
