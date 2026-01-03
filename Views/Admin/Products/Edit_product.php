<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php require_once __DIR__ . "/../../partials/header.php" ?>

 <?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<body class="bg-light">


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Product</h5>
                </div>

                <div class="card-body">
                    <form action="update_product.php" method="POST">
                        <input type="hidden" name="id" value="<?=$product['id']?>">
                        

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text"  name="name" class="form-control" value="<?=$product['name']?>">
                        </div>

                        <!-- description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" value="<?=$product['description']?>">
                        </div>


                       <!-- Category -->
                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select">
                                <?php foreach($categories as $category): ?>
                                <option value="<?=$category['id']?>" <?= $category['id'] == $product['category_id'] ? 'selected' : '' ?> ><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between">
                            <a href="products.php" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                Save Changes
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>
