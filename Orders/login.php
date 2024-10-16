<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/head.php' ?>
<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/config.php' ?>
<?php
$select = "SELECT * FROM customers";
$result = mysqli_query($conn, $select);

$select_product = "SELECT * FROM `products`";
$result_product = mysqli_query($conn, $select_product);

$amount = null;
if (isset($_POST['send'])) {
    $amount =  $_POST['amount'];
    $product =  $_POST['product'];
    $Customer_id =  $_POST['Customer_id'];
    $Date = date('Y-m-d H:i:s');

    $insert_data = "INSERT INTO orders VALUES (NULL, $amount, $Customer_id, $product, '$Date')";
    try {
        mysqli_query($conn, $insert_data);
    } catch (Exception $e) {
        echo 'Error inserting data: ' . $e->getMessage();
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

<!-- form login -->

<div class="container my-5">
    <div class="card">
        <div style="background: #00204a;
    color: #fff;
    text-align: center;" class="card-header">
            <h2>Create order</h2>
        </div>
        <div style="background: #00204a;
    color: #fff;" class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="name">Orders Amount</label>
                    <input type="text" class="form-control" value="<?= $amount ?>" id="amount" name="amount" required>
                </div>
                <div class="mb-3">
                    <label for="country">Customer ID</label>
                    <select name="Customer_id" id="Customer_id" class="form-control">
                        <option disabled selected>-- Select customer --</option>
                        <?php foreach ($result as $items): ?>
                            <option value="<?php echo $items['id']; ?>"><?php echo $items['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email">Product ID</label>
                    <select name="product" id="product_id" class="form-control">
                        <option disabled selected>-- Select Product --</option>
                        <?php foreach ($result_product as $item): ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                    <button type="submit" name="send" class="btn btn-primary w-50 mb-2">Submit</button>
                    <a class="btn btn-secondary w-50" href="index.php">View Orders</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- info section -->

<section class="info_section layout_padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 info_col">
                <div class="info_contact">
                    <h4>
                        Address
                    </h4>
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Location
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call +20 01158582398 
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                            abdallayasser091@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
                <div class="info_social">
                    <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="www.linkedin.com/in/abdalla-yasser-787416295">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info_col">
                <div class="info_detail">
                    <h4>
                        Info
                    </h4>
                    <p>
                        necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 mx-auto info_col">
                <div class="info_link_box">
                    <h4>
                        Links
                    </h4>
                    <div class="info_links">
                        <a class="active" href="index.php">
                            Home
                        </a>
                        <a class="" href="about.php">
                            About
                        </a>
                        <a class="" href="service.php">
                            Services
                        </a>
                        <a class="" href="why.php">
                            Why Us
                        </a>
                        <a class="" href="team.php">
                            Team
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info_col ">
                <h4>
                    Subscribe
                </h4>
                <form action="#">
                    <input type="text" placeholder="Enter email" />
                    <button type="submit">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- end info section -->

<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/footer.php' ?>

<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/script.php' ?>