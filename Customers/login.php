<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/head.php' ?>
<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/config.php' ?>
<?php
$select_Country = "SELECT * FROM `country`";
$result_Country = mysqli_query($conn, $select_Country);

// send request
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // insert data
    $insert_Customer = "INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `country`) VALUES (NULL, '$name', '$email', '$phone', '$country')";
    mysqli_query($conn, $insert_Customer);
    header('Location: login.php');
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
            <h2>Login</h2>
        </div>
        <div style="background: #00204a;
    color: #fff;" class="card-body">
            <form method="post">
                <!-- name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
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
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <button type="submit" name="send" class="btn btn-primary w-50">Login</button>
                    <!-- view -->
                    <a href="index.php" class="btn btn-secondary mt-3 w-50">View Customers</a>
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