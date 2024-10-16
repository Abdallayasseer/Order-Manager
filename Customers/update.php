<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/head.php' ?>
<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/config.php' ?>
<?php
$select_customers = "SELECT * FROM `customers`";
$result_customers = mysqli_query($conn, $select_customers);

$select_Country = "SELECT * FROM `country`";
$result_Country = mysqli_query($conn, $select_Country);
?>
<!-- Delete -->
<?php
if (isset($_GET['delete'])) {
    $usr_id = $_GET['delete'];
    $delete_quary = "DELETE FROM `customers` WHERE id = $usr_id";
    mysqli_query($conn, $delete_quary);
    header('location: index.php');
}
?>

<!-- edit -->
<?php
$name = null;
$country = null;
$email = null;
$phone = null;
if (isset($_GET['edit'])) {
    $usr_id = $_GET['edit'];
    $select_edit_customer = "SELECT * FROM `customers` WHERE id = $usr_id";
    $result_edit_customer = mysqli_query($conn, $select_edit_customer);
    $edit_customer = mysqli_fetch_assoc($result_edit_customer);

    $name = $edit_customer['name'];
    $country = $edit_customer['country'];
    $email = $edit_customer['email'];
    $phone = $edit_customer['phone'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $update_query = "UPDATE `customers` SET `name` = '$name', `email` = '$email', `country` = '$country', `phone` = '$phone' WHERE `id` = $usr_id";
        mysqli_query($conn, $update_query);
        header('location: index.php');
    }
}
?>

<div class="hero_area">

    <div class="hero_bg_box">
        <div class="bg_img_box">
            <img src="images/hero-bg.png" alt="">
        </div>
    </div>

    <?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/nav.php' ?>

</div>
<!-- form Update -->

<div class="container my-5">
    <div class="card">
        <div style="background: #00204a;
    color: #fff;
    text-align: center;" class="card-header">
            <h1>Update</h1>
        </div>
        <div style="background: #00204a;
    color: #fff;" class="card-body">
            <form method="post">
                <!-- name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?= $name ?>" class="form-control" id="name" name="name" required>
                </div>
                <!-- country -->
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" name="country" required>
                        <option disabled selected>-- Select Country --</option>
                        <?php foreach ($result_Country as $country_name): ?>
                            <option value="<?= $country_name['country']; ?>"><?= $country_name['country']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" value="<?= $email ?>" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="tel" class="form-control" value="<?= $phone ?>" id="phone" name="phone" required>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <button type="submit" name="update" class="btn btn-primary w-50">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- view customers -->

<div class="container my-5">
    <div class="card">
        <h3 class="section_title card-header text-center text-primary">
            Update Customers
        </h3>
        <div class="table-responsive card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result_customers as $row): ?>
                        <tr>
                            <td> <?= $row['id'] ?> </td>
                            <td> <?= $row['name'] ?> </td>
                            <td> <?= $row['country'] ?> </td>
                            <td> <?= $row['email'] ?> </td>
                            <td> <?= $row['phone'] ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/footer.php' ?>

<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/script.php' ?>