<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="E-Commerce yang memfasilitasi mahasiswa untuk dapat memenuhi kebutuhan dasar yang men-direct akses transaksi di fitur jual beli" />
    <!-- theme-color defines the top bar color (blue in my case)-->
    <meta name="theme-color" content="#414f57" />
    <!-- Add to home screen for Safari on iOS-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="apple-mobile-web-app-title" content="E-Commerce yang memfasilitasi mahasiswa untuk dapat memenuhi kebutuhan dasar yang men-direct akses transaksi di fitur jual beli" />
    <link rel="apple-touch-icon" href="assets/img/icons/ar23logo128.png" />
    <!-- Add to home screen for Windows-->
    <meta name="msapplication-TileImage" content="assets/img/icons/ar23logo128.png" />
    <meta name="msapplication-TileColor" content="#000000" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#2196f3" />
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/styles/bootstrap-4.1.2/bootstrap.min.css">
    <link rel="manifest" href="<?php echo base_url() ?>manifest.json">
    <style>
        .logo .d-flex img {
            max-width: 65%;
            position: relative;
            left: 20px
        }

        .header_searchnav {
            display: flex
        }

        @media screen and (max-width:1920px) {
            .header_searchnav {
                display: none;
            }
        }

        @media screen and (max-width:414px) {
            .logo .d-flex img {
                max-width: 100%;
                position: relative;
                left: 0px
            }

            .header_search {
                display: flex
            }
        }
    </style>
</head>

<body>
    <!-- Menu -->
    <div class="menu">
        <!-- Navigation -->
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <div class="header_search header_searchnav">
                <form method="get" action="<?= base_url() . "customer/home/list" ?>" id="header_search_form">
                    <input type="hidden" name="type" value="nama_produk">
                    <input type="text" name="search" id="search" class="search_input" placeholder="Search Item" required="required">
                    <button type="submit" class="header_search_button"><img src="<?php echo base_url() ?>asset/images/search.png" alt="search"></button>
                </form>
            </div>
        </div>
        <div class="menu_nav">
            <h1>Kategori Produk</h1>
            <ul>
                <?php
                foreach ($category as $c) :
                ?>
                    <li><a href="<?= base_url() . "?type=nama_kategori&search=" . $c['nama_kategori'] ?>"><?= $c['nama_kategori'] ?></a></li>
                <?php
                endforeach;
                ?>
                <li><a href="<?= base_url() ?>">All product</a></li>
            </ul>
        </div>
        <div class="menu_nav">
            <h1>Merchant</h1>
            <ul>
                <?php
                foreach ($merchant as $m) :
                ?>
                    <li><a href="<?= base_url("") . "?type=nama_merchant&&search=" . $m['nama_merchant'] ?>"><?= $m['nama_merchant'] ?></a></li>
                <?php
                endforeach;
                ?>
                <li><a href="<?= base_url() ?>">All product</a></li>
            </ul>
        </div>
    </div>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <div class="header_overlay"></div>
            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                <div class="logo">
                    <a href="<?= base_url() ?>">
                        <div class="d-flex flex-row align-items-center justify-content-start">
                            <div><img src="<?php echo base_url() ?>3.png" alt="logo"></div>
                            <div>Buy-Yo!</div>
                        </div>
                    </a>
                </div>
                <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                    <!-- Search -->
                    <div class="header_search">
                        <form method="get" action="<?= base_url() . "/customer/home/list" ?>" id="header_search_form">
                            <input type="hidden" name="type" value="nama_produk">
                            <input type="text" name="search" id="search" class="search_input" placeholder="Search Item" required="required">
                            <button type="submit" class="header_search_button"><img src="<?php echo base_url() ?>asset/images/search.png" alt="search"></button>
                        </form>
                    </div>
                    <!-- User -->
                    <div class="user dropdown">
                        <a href="#" data-toggle="dropdown">
                            <div><img src="<?php echo base_url() ?>asset/images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div>
                        </a>
                        <div class="dropdown-menu drop">
                            <p class="dropdown-item">Hello, <?= $user ?></p>
                            <div class="dropdown-divider"></div>
                            <?php if ($this->session->userdata('token')) { ?>
                                <a href="<?= base_url("customer/auth/logout") ?>" class="dropdown-item" onclick=deleteCookie()>Logout</a>
                                <a href="<?= base_url("merch/home") ?>" class="dropdown-item">My Product</a>
                                <a href="<?= base_url("admin/tryout_univ") ?>" class="dropdown-item">My Transaction</a>
                                <a href="<?= base_url("customer/tryout/paymentStatus") ?>" class="dropdown-item">My Tryout</a>
                            <?php } else { ?>
                                <a href="<?= base_url("customer/auth/login") ?>" class="dropdown-item">Login</a>
                                <a href="<?= base_url("customer/auth/register") ?>" class="dropdown-item">Register</a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Cart -->
                    <div class="user dropdown"><a href="<?= base_url("customer/home/check_chart") ?>">
                            <div class="imghover"><img class="svg" src="<?php echo base_url() ?>asset/images/cart.svg" alt="images">
                                <div id="result" style="background-color:#FFB43D;"><?php echo $jml ?></div>
                            </div>
                        </a></div>
                </div>
            </div>
        </header>
        <!-- </div> -->