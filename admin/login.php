<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css " rel="stylesheet">
    <style>
        /* Custom variables */
        :root {
            --font-primary: 'Lato', Arial, sans-serif;
            --primary: #fbceb5;
            --black: #000;
            --white: #fff;
        }

        body {
            font-family: var(--font-primary);
            font-size: 16px;
            line-height: 1.8;
            font-weight: normal;
            color: lighten(var(--black), 50%);
            position: relative;
            z-index: 0;
            padding: 0;
        }

        body:after {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            background: var(--black);
            opacity: 0.3;
            z-index: -1;
        }

        a {
            transition: 0.3s all ease;
            color: var(--primary);
        }

        a:hover,
        a:focus {
            text-decoration: none !important;
            outline: none !important;
            box-shadow: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5 {
            line-height: 1.5;
            font-weight: 400;
            font-family: var(--font-primary);
            color: var(--black);
        }

        .bg-primary {
            background: var(--primary) !important;
        }

        .ftco-section {
            padding: 7em 0;
        }

        .ftco-no-pt {
            padding-top: 0;
        }

        .ftco-no-pb {
            padding-bottom: 0;
        }

        /* Heading Section */
        .heading-section {
            font-size: 28px;
            color: var(--white);
        }

        /* Cover Background */
        .img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .login-wrap {
            position: relative;
            color: rgba(255, 255, 255, 0.9);
        }

        .login-wrap h3 {
            font-weight: 300;
            color: var(--white);
        }

        .login-wrap .social {
            width: 100%;
        }

        .login-wrap .social a {
            width: 100%;
            display: block;
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: var(--black);
            background: var(--white);
        }

        .login-wrap .social a:hover {
            background: var(--black);
            color: var(--white);
            border-color: var(--black);
        }

        .form-group {
            position: relative;
        }

        .field-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.9);
        }

        /* Form Control */
        .form-control {
            background: transparent;
            border: none;
            height: 50px;
            color: rgba(255, 255, 255, 1) !important;
            border: 1px solid transparent;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 40px;
            padding-left: 20px;
            padding-right: 20px;
            transition: 0.3s all;
        }

        .form-control::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .form-control::-moz-placeholder {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .form-control:-moz-placeholder {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .form-control:hover,
        .form-control:focus {
            background: transparent;
            outline: none;
            box-shadow: none;
            border-color: rgba(255, 255, 255, 0.4);
        }

        .form-control:focus {
            border-color: rgba(255, 255, 255, 0.4);
        }

        textarea.form-control {
            height: inherit !important;
        }

        /* Checkbox Style */
        .checkbox-wrap {
            display: block;
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            user-select: none;
        }

        .checkbox-wrap input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
        }

        .checkmark:after {
            content: "\f0c8";
            font-family: "FontAwesome";
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 20px;
            margin-top: -4px;
            transition: 0.3s all;
        }

        .checkbox-wrap input:checked~.checkmark:after {
            display: block;
            content: "\f14a";
            font-family: "FontAwesome";
            color: rgba(0, 0, 0, 0.2);
        }

        .checkbox-primary {
            color: var(--primary);
        }

        /* Button */
        .btn {
            cursor: pointer;
            border-radius: 40px;
            box-shadow: none !important;
            font-size: 15px;
            text-transform: uppercase;
        }

        .btn:hover,
        .btn:active,
        .btn:focus {
            outline: none;
        }

        .btn.btn-primary {
            background: var(--primary) !important;
            border: 1px solid var(--primary) !important;
            color: var(--black) !important;
        }

        .btn.btn-primary:hover {
            border: 1px solid var(--primary);
            background: transparent;
            color: var(--primary);
        }

        .btn.btn-outline-primary {
            border: 1px solid var(--primary);
            background: transparent;
            color: var(--primary);
        }

        .btn.btn-outline-primary:hover {
            border: 1px solid transparent;
            background: var(--primary);
            color: var(--white);
        }


        input[type="checkbox"] {
            /* Add if not using autoprefixer */
            -webkit-appearance: none;
            /* Remove most all native input styles */
            appearance: none;
            /* For iOS < 15 */
            background-color: var(--form-background);
            /* Not removed via appearance */
            margin: 0;

            font: inherit;
            color: currentColor;
            width: 1.15em;
            height: 1.15em;
            border: 0.15em solid currentColor;
            border-radius: 0.15em;
            transform: translateY(-0.075em);

            display: grid;
            place-content: center;
        }

        input[type="checkbox"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
            transform: scale(0);
            transform-origin: bottom left;
            transition: 120ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-color);
            /* Windows High Contrast Mode */
            background-color: CanvasText;
        }

        input[type="checkbox"]:checked::before {
            transform: scale(1);
        }

        input[type="checkbox"]:focus {
            outline: max(2px, 0.15em) solid currentColor;
            outline-offset: max(2px, 0.15em);
        }

        input[type="checkbox"]:disabled {
            --form-control-color: var(--form-control-disabled);

            color: var(--form-control-disabled);
            cursor: not-allowed;
        }

        .login-wrap {
            width: 350px;
            margin: auto;
        }

        .c-wrap {
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            user-select: none;
        }

        .aa {
            user-select: none;
        }
    </style>
</head>


<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg); height:100vh; overflow:hidden;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Admin Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Please Login To Access Admin Panel</h3>
                        <form action="actions/login-action.php" method="post" class="signin-form" id="sigin-form">
                            <div class="form-group" style="margin-bottom:20px;">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group" style="margin-bottom:20px;">
                                <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group" style="margin-bottom:20px;">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="aa">
                                        <input type="checkbox" name="remember_me" checked />
                                        <p style="margin: 0px; position: absolute; top: -3px; left: 25px;">Remembered Me</p>
                                    </label>
                                </div>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#" style="color: #fff">Forgot Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="plugins/jquery/jquery.min.js"></script>

    <script>
        (function($) {

            "use strict";

            var fullHeight = function() {

                $('.js-fullheight').css('height', $(window).height());
                $(window).resize(function() {
                    $('.js-fullheight').css('height', $(window).height());
                });

            };
            fullHeight();

            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $('#password');
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

        })(jQuery);

        $('#sigin-form').on('submit', function(e) {
            if ($('#username').val() == '') {
                e.preventDefault();
                $('#username').css('border', '1px solid red');
                $('#password').css('border', '');
            } else if ($('#password').val() == '') {
                e.preventDefault();
                $('#username').css('border', '');
                $('#password').css('border', '1px solid red');
            } else {
                // $('#sigin-form').submit();
                return true;
            }
        });
    </script>

    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<script>
        Swal.fire({
            title: "Success",
            text: "' . $_SESSION['success_message'] . '",
            icon: "success",
        });
    </script>';
        unset($_SESSION['success_message']);
    }
    ?>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<script>
        Swal.fire({
            title: "Something Went Wrong",
            text: "' . $_SESSION['error_message'] . '",
            icon: "error",
        });
    </script>';
        unset($_SESSION['error_message']);
    }
    ?>

</body>

</html>