<?php
session_start();
include "./Model/uploadimage.php";
spl_autoload_register('myModelClassLoader');
function myModelClassLoader($className)
{
    $path = 'Model/';
    include $path . $className . '.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!--duong link logo facbook  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- link đăng nhập -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- end link đăng nhập -->
    <link rel="stylesheet" type="text/css" href="Content/CSS/Tour.css" />
    <script src="https://kit.fontawesome.com/d9628f1ab2.js" crossorigin="anonymous"></script>
    <title>MIOTO</title>
    <link rel="icon" type="image/x-icon" href="./Content/hinhanh/logo1.png">
    <style>
        body {
            overflow-x: hidden;
            margin-left: 30px;
            margin-right: 10px;
            font-size: 20px;
            color: gray;
        }

        .fixedbutton {
            position: fixed;
            bottom: 30px;
            right: 30px;
        }

        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        /*reset css*/
        div,
        label {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 20px;
        }

        h1 {
            font-size: 1.5em;
            margin: 10px;
        }

        /****** Style Star Rating Widget *****/
        #rating {
            border: none;
            float: left;
        }

        #rating>input {
            display: none;
        }

        /*ẩn input radio - vì chúng ta đã có label là GUI*/
        #rating>label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        /*1 ngôi sao*/
        #rating>.half:before {
            content: "\f089";
            position: absolute;
        }

        /*0.5 ngôi sao*/
        #rating>label {
            color: #ddd;
            float: right;
        }

        /*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
        /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
        #rating>input:checked~label,
        #rating:not(:checked)>label:hover,
        #rating:not(:checked)>label:hover~label {
            color: #FFD700;
        }

        /* Hover vào các sao phía trước ngôi sao đã chọn*/
        #rating>input:checked+label:hover,
        #rating>input:checked~label:hover,
        #rating>label:hover~input:checked~label,
        #rating>input:checked~label:hover~label {
            color: #FFED85;
        }
    </style>
</head>

<body>
    <!-- header -->

    <?php
    include "./View/headder.php";

    ?>

    </div>
    </div>

    <!-- hien thi noi dung đây -->

    <div>
        <div class="row">
            <?php
            $ctrl = "home";
            if (isset($_GET['action'])) {
                $ctrl = $_GET['action'];
            }
            $an = "";
            if (isset($_GET['phu'])) {
                $an = $_GET['phu'];
                echo (" <div class='col-lg-8'>");
                include "./Controller/" . $ctrl . ".php";
                echo ("</div>");
                echo ("<div class='col-lg-4'");
                include './View/' . $an . '.php';
                echo ("</div>");
            } else {
                include "./Controller/" . $ctrl . ".php";
            }
            ?>

        </div>
    </div>

    <!-- hiên thị footer -->
    <!-- header -->
    <?php
    if ($an == "") {
        include_once "./View/footer.php";
    }
    ?>

    <a class="fixedbutton" href="index.php">
        <div class="roundedFixedBtn"><i class="fa fa-home fa-3x"></i></div>
    </a>

</body>

</html>