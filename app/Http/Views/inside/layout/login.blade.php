<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ] -->


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/assets/inside/css/bootstrap.min.css" rel="stylesheet">


    <!--Font Awesome [ OPTIONAL ]-->
    <link href="/assets/inside/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--login.css-->
    <link href="/assets/inside/css/login.css" rel="stylesheet">

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
<div id="container" class="cls-container">

    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay" class="bg-img img-balloon" style="background-image: none;"></div>


    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        @yield('content')
    </div>
    <!--===================================================-->

</div>
<!--===================================================-->
<!-- END OF CONTAINER -->



<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="/assets/inside/js/jquery-2.1.1.min.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="/assets/inside/js/bootstrap.min.js"></script>


<!--Fast Click [ OPTIONAL ]-->
<script src="/assets/inside/plugins/fast-click/fastclick.min.js"></script>



</body>
</html>