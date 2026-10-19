<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?> - Aset BPPKAD
    </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- /Font awesome -->

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>lib/animate/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>lib/owlcarousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/toastify/toastify.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/app.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/loader.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/app-dark.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/button.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/newbutton.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/drophover.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/coffee.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>images/favicon/Trunojoyo.ico" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bike.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatable-tfoot/') ?>jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatable-tfoot/') ?>jquery.dataTables.2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatable-tfoot/') ?>buttons.dataTables.min.css">

    <script src="<?= base_url('assets/'); ?>js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>


    <style>
        .thead-ismail {
            background-color: #89b5f8b4;
        }

        .bg-light-warning-ismail {
            background-color: #fcf57e;
            color: #3f3c00
        }

        .bg-edit-ismail {
            background-color: #FF6922;
            color: #ffff
        }

        .btn-edit-ismail {
            background-color: #FF6922;
            color: #ffff
        }

        .btn-edit-ismail:hover {
            background-color: #c04107;
            color: #ffff
        }

        .bg-light-success-ismail {
            background-color: #95fdc7;
            color: #00391c
        }

        .bg-rent {
            background-color: #00B98E !important
        }

        .bg-rent:hover {
            background-color: #047e61 !important
        }

        .showPass:hover {
            color: #dc3545;
        }

        .showPass {
            color: #00B98E;
        }

        .input-group-text-Is {
            display: flex;
            align-items: center;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #ffff;
            text-align: center;
            white-space: nowrap;
            background-color: #ffff;
            /* border: 1px solid #ffff; */
            border-radius: 4px
        }

        /* Angular Button to top */
        #scrollTop {
            display: block;
            visibility: visible;
            opacity: 1;
            transition: visibility 0s, opacity 0.5s ease-in;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #ff692283;
            border-radius: 20%;
            z-index: 1;
        }

        #scrollTop:hover {
            transform: scale(0.9);
            display: block;
            visibility: visible;
            opacity: 1;
            transition: visibility 0s, opacity 0.5s ease-in;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #c0410783;
            border-radius: 20%;
            z-index: 1;
        }

        .top_button {
            text-decoration: none;
            cursor: pointer;
            padding: 20px;
            color: #ffffff;
        }

        .top_button:hover {
            text-decoration: none;
            cursor: pointer;
            padding: 20px;
            color: #ffffff;
        }


        /* /Angular Button to top */
    </style>
</head>

<body id="paling_atas">
    <?= $this->session->flashdata('message'); ?>

    <div id="scrollTop" class="d-block">
        <a href="javascript:void(0);" class="top_button" onClick="window.scrollTo(0,0)">
            <i class="fa fa-fw fa-lg fa-arrow-up"></i>
        </a>
    </div>
    <script>
        const scrollTop = document.getElementById('scrollTop')
        // When the page is loaded, hide the button
        window.onload = () => {
            scrollTop.style.visibility = "hidden";
            scrollTop.style.opacity = 0;
        }

        // if the page is scrolled more than 100px, show the button, otherwise hide
        window.onscroll = () => {
            if (window.scrollY > 100) {
                scrollTop.style.visibility = "visible";
                scrollTop.style.opacity = 1;
            } else {
                scrollTop.style.visibility = "hidden";
                scrollTop.style.opacity = 0;
            }
        }
    </script>

    <div id="app">
        <div id="main">