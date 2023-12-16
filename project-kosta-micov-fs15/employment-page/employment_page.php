<?php
$con = mysqli_connect("localhost", "root", "", "employment-database");
$sql = "SELECT * FROM `category`";
$all_categories = mysqli_query($con, $sql);
if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $id = mysqli_real_escape_string($con, $_POST['Category']);
    $sql_insert =
        "INSERT INTO `employment_form`(`first_name`, `category_id`, `email`, `company`, `phone`)
            VALUES ('$first_name','$id','$email', '$company', '$phone')";

    if (mysqli_query($con, $sql_insert)) {
        echo '<script>alert("Успешно ја пополнивте формата");';
        echo 'window.location.href = "insert.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../employment-page/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- NAV-BAR -->
    <nav>
        <div class="sidebar">
            <ul class="hamburger-menu">
                <li onclick=hideSidebar()><a href="#"><i class="fa-solid fa-xmark text-white fa-2xl"></i></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="py-3"><a class="fw-bold text-decoration-none py-3" href="#">Академија за маркетинг</a></li>
                <li class="py-3"><a class="fw-bold text-decoration-none" href="#">Академија за програмирање</a></li>
                <li class="py-3"><a class="fw-bold text-decoration-none" href="#">Академија за data science</a></li>
                <li class="py-3"><a class="fw-bold text-decoration-none" href="/contact.php">Академија за дизајн</a></li>
            </ul>
            <ul class="button-2">
                <li><a class="btn btn-2 bg-danger text-white fw-bold m-1 " href="/employment-page/dropdown.php" target="_blank">Вработи наш студент</a></li>
            </ul>
        </div>
        <div class="ul">
            <div class="logo">
                <a href="../index.html" class="text-decoration-none text-dark">
                    <img src="../images/Logo.png" alt="logo">
                    <h2 class="fw-bold">BRAINSTER</h2>
                </a>
            </div>
            <ul class="navbar-center p-0 m-0">
                <li class="hideOnMobile">
                    <a class="fw-bold" href="https://brainster.co/marketing/" target="_blank">Академија за маркетинг</a>
                </li>
                <li class="hideOnMobile">
                    <a class="fw-bold" href="https://brainster.co/full-stack/" target="_blank">Академија за
                        програмирање</a>
                </li>
                <li class="hideOnMobile">
                    <a class="fw-bold" href="https://brainster.co/data-science/" target="_blank">Академија за data
                        science</a>
                </li>
                <li class="hideOnMobile">
                    <a class="fw-bold" href="https://brainster.co/graphic-design/" target="_blank">Академија за
                        дизајн</a>
                </li>
            </ul>
            <ul class="button m-0 p-0">
                <li><a class="btn bg-danger text-white fw-bold m-1 hideOnMobile btn-red" href="./employment-page/dropdown.php">Вработи наш студент</a></li>
            </ul>
            <div class="m-0 button-2">
                <div class="menu-button mx-3" onclick=showSidebar()><a href="#"><i class="fa-solid fa-bars fa-2xl bg-white"></i></a></div>
            </div>
        </div>
    </nav>
    <section class="employment-form  py-4 container-fluid">
        <h1 class="fw-bold text-center py-5">Вработи студенти</h1>
        <form method="POST">
            <div class=" d-flex justify-content-center row">
                <div class="col-md-6 col-lg-4">
                    <label class="d-flex fw-bold py-1">Име и презиме</label>
                    <input class="form-control" type="text" name="first_name" required style="height: 50px;" placeholder="Вашето име и презиме"><br>
                </div>
                <div class="col-md-6 col-lg-4">
                    <label class="d-flex fw-bold py-1">Име на компанија</label>
                    <input class="form-control" type="text" name="company" required style="height: 50px;" placeholder="Име на вашата компанија"><br>
                </div>
            </div>
            <div class="d-flex justify-content-center row">
                <div class="col-md-6 col-lg-4">
                    <label class="d-flex fw-bold py-1">Контакт имејл</label>
                    <input class="form-control" type="email" name="email" required style="height: 50px;" placeholder="Контакт имејл на вашата компанија"><br>
                </div>
                <div class="col-md-6 col-lg-4">
                    <label class="d-flex fw-bold py-1">Контакт телефон</label>
                    <input class="form-control" type="tel" name="phone" required style="height: 50px;" placeholder="Контакт телефон на вашата компанија"><br>
                </div>
            </div>
            <div class="d-flex justify-content-center row">
                <div class="col-md-6 col-lg-4">
                    <label class="d-flex fw-bold py-1">Тип на студенти</label>
                    <select class="form-control" style="height: 50px;" name="Category">
                        <option class="hidden">Изберете тип на студент</option>
                        <?php
                        while ($category = mysqli_fetch_array(
                            $all_categories,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <option class="dropdown" value="<?php echo $category["Category_ID"];
                                                            ?>">
                                <?php echo $category["Category_Name"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="col-md-6 col-lg-4">
                    <input type="submit" class="btn bg-danger text-white fw-bold send-button " value="Испрати" name="submit">
                </div>
            </div>
        </form>
    </section>
    <div class="container-fluid madeby">
        <div class="row bg-dark text-white py-2">
            <div class="col text-center">
                <p class="mb-0">
                    Изработено од <a href="#" class="text-white fw-bold text-decoration-none">Коста Мицов</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="../js/navbar.js"></script>
</body>

</html>