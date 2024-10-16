<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/head.php' ?>
<?php include_once '/xampp/htdocs/project_php&mysql/finexo-html/Shared/config.php' ?>
<?php
$select_customers = "SELECT * FROM `customers`";
$result_customers = mysqli_query($conn, $select_customers);

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
if (isset($_GET['edit'])) {
    $usr_id = $_GET['edit'];
    $select_edit_customer = "SELECT * FROM `customers` WHERE id = $usr_id";
    $result_edit_customer = mysqli_query($conn, $select_edit_customer);
    $edit_customer = mysqli_fetch_assoc($result_edit_customer);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $update_query = "UPDATE `customers` SET `name` = '$name' WHERE `id` = $usr_id";
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

<!-- view customers -->

<div class="container my-5">
    <div class="card">
        <h3 class="section_title card-header text-center">
            All Customers
        </h3>
        <div class="table-responsive card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result_customers as $row): ?>
                        <tr>
                            <td> <?= $row['id'] ?> </td>
                            <td> <?= $row['name'] ?> </td>
                            <td> <a href="update.php?edit=<?= $row['id'] ?>" class="btn btn-info">Edit</a> </td>
                            <td> <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger">Delete</a> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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