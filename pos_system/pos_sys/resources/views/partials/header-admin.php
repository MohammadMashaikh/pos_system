<?php

use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<body class="admin-view">


    <nav class="navbar navbar-expand-lg" style="background-color: #dcdcdc;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">POS System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown" style="margin-left: 60rem;">
                        <a class="nav-link dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $_SESSION['image'] ?>" style="width: 50px;height: 50px; border-radius: 30px;" alt="">

                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="/user?id=<?= $_SESSION['user']['user_id'] ?>">View Profile</a></li>

                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>


    </nav>




  

    <section id="side-bar">
        <div>

            <?php
            if (Helper::check_permission(['user:read'])) :
            ?>
                <li>
                    <i class="fa-solid fa-chart-simple mb-5 mt-5"></i>
                    <a href="/dashboard">Dashboard</a>

                </li>

            <?php endif;
            if (Helper::check_permission(['transaction:create'])) :
            ?>

                <li>
                    <i class="fa-solid fa-arrow-trend-up"> </i>
                    <a href="/transactions/all">Selling</a>

                </li>

            <?php endif;
            if (Helper::check_permission(['item:read'])) :
            ?>
                <li>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a href="/items">Stock</a>

                </li>

            <?php endif;
            if (Helper::check_permission(['item:create'])) :
            ?>
                <li>
                    <i class="fa-solid fa-cart-plus"></i>
                    <a href="/items/create">Add Item</a>

                </li>

            <?php endif;
            if (Helper::check_permission(['transaction:read'])) :
            ?>
                <li>
                    <i class="fa-solid fa-chart-line"></i>
                    <a href="/transactions">Transactions</a>

                </li>

            <?php endif;
            if (Helper::check_permission(['user:read'])) :
            ?>
                <li>
                    <i class="fa-solid fa-users"></i>
                    <a href="/users">Users</a>

                </li>
            <?php endif;
            if (Helper::check_permission(['user:create'])) :
            ?>
                <li>
                    <i class="fa-solid fa-user-plus"></i>
                    <a href="/users/create">Add User</a>

                </li>

            <?php endif;
            ?>
           
        </div>
    </section>
    <div class="col-10 admin-area-content w-100">
        <div class="container my-5 w-100">
























        




        <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');


        #side-bar {
            float: left;
            width: 200px;
            height: 140%;
            background: #111827;
        }

        #side-bar li {
            list-style: none;
            padding: 15px;
            transition: 0.3 ease;
        }

        #side-bar li i {
            color: #B1A296;
            width: 30px;
            height: 20px;
            line-height: 30px;
            text-align: center;
            font-size: 14px;
            margin: 0 0 0 25px;

        }

        #side-bar li a {
            text-decoration: none;
            text-align: center;
            color: #B1A296;
            font-weight: 300;
            transition: 0.3 ease;
        }

        #side-bar li:hover {
            background: #253047;
            cursor: pointer;

        }

        #side-bar li:hover i,
        #side-bar li:hover a {
            color: #F3F4F6;
        }
    </style>