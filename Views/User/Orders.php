<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Category & My Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php require_once __DIR__ . "/../../views/partials/header.php"; ?>

<body class="bg-light">
<div class="container-fluid py-4">
    <div class="row">

        <!-- LEFT SIDE - CATEGORY SELECT -->
        <div class="col-lg-4 mb-4">
            <h3 class="mb-4">Choose Category</h3>
            <p>Select breakfast for the morning shift, lunch for the mid-shift, and dinner for the afternoon shift.</p>
            <form method="GET" action="orders_by_category.php">
                <div class="mb-3">
                    <label class="form-label fw-bold">Select category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Choose category --</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Show Menu</button>
            </form>
        </div>

        <!-- RIGHT SIDE - MY ORDERS -->
        <div class="col-lg-8">
            <h3 class="mb-4">My Orders</h3>

            <?php if(!empty($my_orders)): ?>
                <?php foreach($my_orders as $day => $orders): ?>
                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white fw-bold"><?= ucfirst($day) ?></div>
                        <div class="card-body p-0">
                            <table class="table mb-0">
                                <tbody>
                                    <?php foreach($orders as $order): ?>
                                        <tr>
                                            <td><?= $order['meal_name'] ?></td>
                                            <td class="text-end">
                                                <span class="badge bg-success">Ordered</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info">No orders yet.</div>
            <?php endif; ?>
        </div>

       

    </div>
</div>
</body>
</html>