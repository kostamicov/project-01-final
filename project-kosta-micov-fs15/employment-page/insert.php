<?php
require_once("connection.php");
$query = " select * from employment_form ";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>View Records</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <td class="fw-bold fst-italic"> Име и Презиме </td>
                            <td class="fw-bold fst-italic"> Име на компанија </td>
                            <td class="fw-bold fst-italic"> Контакт имејл </td>
                            <td class="fw-bold fst-italic"> Контакт телефон </td>
                            <td class="fw-bold fst-italic"> Тип на студенти </td>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $first_name = $row['first_name'];
                            $company = $row['company'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $category_id = $row['category_id'];
                        ?>
                            <tr>
                                <td><?php echo $first_name ?></td>
                                <td><?php echo $company ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $phone ?></td>
                                <td><?php echo $category_id ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <a href="../index.html" class="btn bg-danger text-white fw-bold my-3 col-12">Почетна страна</a>
    </div>
</body>

</html>