<?php
// Database connection
include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/config.php';

$search = "";

if (isset($_POST['search_btn'])) {
    $search = $_POST['search'];
}

$select_orders = "SELECT orders.*, customers.name AS customer_name, products.name AS product_name 
                  FROM `orders` 
                  INNER JOIN `customers` ON orders.customer_id = customers.id 
                  INNER JOIN `products` ON orders.product_id = products.id 
                  WHERE customers.name LIKE ? OR products.name LIKE ?";

$stmt = $conn->prepare($select_orders);
$searchTerm = "%$search%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);

$stmt->execute();
$result_orders = $stmt->get_result();
?>

<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/head.php' ?>
<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/config.php' ?>

<div class="container my-5">
    <h2 class="text-center">Search Orders</h2>
    <form method="POST" action="" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search for customers or products" required value="<?= htmlspecialchars($search); ?>">
            <div class="input-group-append ms-4">
                <button type="submit" name="search_btn" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result_orders->num_rows > 0): ?>
                <?php while ($order = $result_orders->fetch_assoc()): ?>
                    <tr>
                        <td><?= $order['id']; ?></td>
                        <td><?= $order['customer_name']; ?></td>
                        <td><?= $order['product_name']; ?></td>
                        <td><?= $order['amount']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No orders found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>