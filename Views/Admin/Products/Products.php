<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>



<body class="bg-light">

<?php require_once __DIR__ . "/../../partials/header.php"; ?>

<?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger d-flex justify-content-center"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="container py-5">

  <!-- PAGE HEADER -->
  <div class="d-flex justify-content-left gap-3 align-items-center mb-4">
    <h2 class="fw-bold">Products</h2>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
      + Add Product
    </button>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
      + Add Category
    </button>
  </div>

  <!-- FILTER BY CATEGORY -->
  <div class="card mb-4">
    <div class="card-body">
      <form class="row g-3 align-items-center" method='GET' action='/orderly/public/admin/products.php'>
        <div class="col-md-4">
          <label class="form-label">Filter by category</label>
          <select class="form-select" name='category_id'>
            <?php foreach($categories as $category): ?>
            <option  value="<?=$category['id']?>"><?=$category['name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-md-4 d-flex align-items-end">
          <button type='submit' class="btn btn-secondary w-100">Apply</button>
        </div>
      </form>
    </div>
  </div>

  <!-- PRODUCTS TABLE -->
  <div class="card">
    <div class="card-body">
      <table class="table table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category_id</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
          <tr>
            <td><?=$product['id']?></td>
            <td><?=$product['name']?></td>
            <td><?=$product['description']?></td>
            <td><?=$product['category_id']?></td> <!-- add category name, not category id -->
            <td class="text-end">
              <button class="btn btn-sm btn-warning">Edit</button>
              <button class="btn btn-sm btn-danger">Delete</button> 
            </td>
          </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- ================= ADD PRODUCT MODAL ================= -->
<div class="modal fade" id="addProductModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Add New Product</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="add_product.php" method="POST">
        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Product name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter product name">
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Product description"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name='category_id'>
            <?php foreach($categories as $category): ?>
            <option value="<?=$category['id']?>"><?=$category['name'] ?></option>
            <?php endforeach ?>
            </select>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Save Product</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- ================= ADD CATEGORY MODAL ================= -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Add New Category</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="add_category.php" method=POST>
        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Category name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter category name">
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" type="text" name="description" rows="3" placeholder="Category description"></textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Save Category</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
