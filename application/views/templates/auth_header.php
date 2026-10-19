<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?> - Aset BPPKAD
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/app.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/pages/auth.css">

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
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/app.css">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>images/favicon/Trunojoyo.ico" />

    <style>
        body {
            background-color: #dadee4
        }

        .btn-edit-ismail {
            background-color: #FF6922;
            color: #ffff
        }

        .btn-edit-ismail:hover {
            background-color: #c04107;
            color: #ffff
        }

        .showPass {
            color: #595959;
        }

        .showPass:hover {
            color: #ff6922;
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
            border-radius: 4px
        }

        /* UIverse Input */
        .content {
            max-width: 100%;
            padding: 25px 15px;
            background: #dde1e7;
            border-radius: 10px;
            box-shadow: 7px -7px 8px #cbcfd5,
                -7px 7px 8px #ffffff82;
        }

        .content .text {
            font-size: 33px;
            font-weight: 600;
            margin-bottom: 35px;
            color: #595959;
        }

        .field {
            height: 50px;
            width: 100%;
            display: flex;
            position: relative;
            margin-bottom: 23px;
        }

        .field:nth-child(2) {
            margin-top: 20px;
        }

        .field .input {
            height: 100%;
            width: 100%;
            padding-left: 45px;
            outline: none;
            border: none;
            font-size: 18px;
            background: #dde1e7;
            color: #595959;
            border-radius: 25px;
            box-shadow: inset 2px 2px 5px #BABECC,
                inset -5px -5px 10px #ffffff73;
        }

        .field .input:focus {
            box-shadow: inset 1px 1px 2px #BABECC,
                inset -1px -1px 2px #ffffff73;
        }

        .field .span {
            position: absolute;
            color: #25396f;
            line-height: 60px;
            padding-left: 15px;
        }

        .field .span-right {
            position: absolute;
            right: 15px;
            color: #595959;
            line-height: 55px;
        }

        .message {
            position: absolute;
            left: 20px;
            bottom: 0px;
            color: #dc3545;
            line-height: 5px;
        }

        .field .label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 45px;
            pointer-events: none;
            color: #666666;
        }

        .field .input:valid~label {
            opacity: 0;
        }

        .forgot-pass {
            text-align: left;
            margin: 10px 0 10px 5px;
        }

        .forgot-pass a {
            font-size: 16px;
            color: #666666;
            text-decoration: none;
        }

        .forgot-pass:hover a {
            text-decoration: underline;
        }

        .button {
            margin: 15px 0;
            width: 50%;
            height: 50px;
            font-size: 22px;
            line-height: 50px;
            font-weight: bold;
            background: #dde1e7;
            border-radius: 25px;
            border: none;
            outline: none;
            cursor: pointer;
            color: #25396f;
            box-shadow: 2px 2px 5px #BABECC,
                -5px -5px 10px #ffffff73;
        }

        .button:focus {
            color: #3498db;
            box-shadow: inset 2px 2px 5px #BABECC,
                inset -5px -5px 10px #ffffff73;
        }

        .button:hover {
            color: #ffffff;
            background: #435ebe;
            text-shadow: 4px 4px 2px rgba(0, 0, 0, 0.6);
            box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
            -webkit-box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
            -moz-box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
            border-right: 3px inset #ffffff;
            border-bottom: 3px inset #ffffff;
        }

        .hubungi-develop {
            margin: 10px 0;
            color: #595959;
            font-size: 16px;
        }

        .hubungi-develop a {
            color: #435ebe;
            text-decoration: none;
        }

        .hubungi-develop a:hover {
            text-decoration: underline;
        }

        /* /UIverse Input */
    </style>
</head>

<body>
    <div id="auth">

        <div class="row h-100">