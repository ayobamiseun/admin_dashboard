<?php 

    $r = $_REQUEST['ref'];

   // echo $_SESSION['SuperFM963'];
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login : Super FM 96.3</title>
    <?php include('meta.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style type="text/css" media="screen">
        .submit-btn-area .sub {
            width: 100%;
            height: 50px;
            border: none;
            background: #fff;
            color: #585b5f;
            border-radius: 40px;
            text-transform: uppercase;
            letter-spacing: 0;
            font-weight: 600;
            font-size: 12px;
            box-shadow: 0 0 22px rgba(0, 0, 0, 0.07);
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            line-height: 50px;
            cursor: pointer;
        }

        .submit-btn-area .sub:hover {
            background: #2c71da;
            color: #ffffff;
        }

        .submit-btn-area .sub i {
            margin-left: 15px;
            -webkit-transition: margin-left 0.3s ease 0s;
            transition: margin-left 0.3s ease 0s;
        }

        .submit-btn-area .sub:hover i {
            margin-left: 20px;
        }

        .login-bg {
            background: url(bg_1.jpg) center/cover no-repeat;
            position: relative;
            z-index: 1;
        }
    </style>
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form id="flogin">
                    <input type="hidden" name="type" value="login">
                    <div class="login-form-head">
                        <h4>Super FM 96.3 Admin Login</h4>
                        <p>Login with your valid usename and password</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" style="height: 50px;" class="form-control"">
                            <!--<i class="ti-email"></i>-->
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" style="height: 50px;" class="form-control">
                            <!--<i class="ti-lock"></i>-->
                        </div>
                        <div class="row mb-4 rmber-area">
                            <!--<div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>-->
                        </div>
                        <div class="submit-btn-area">
                            <div id="form_submit" class="sub login">Login <i class="ti-arrow-right"></i></div>
                            <!--<div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Log in with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Log in with <i class="fa fa-google"></i></a>
                                </div>
                            </div>-->
                        </div>
                        <!--<div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        var r = '<?php echo $r; ?>';
        function Login(){
            $.ajax({
                url: 'login_con.php',
                type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: $('#flogin').serialize()
            })
            .done(function(data) {
                //alert(data);
                if(data == 'success'){
                    $('.login').text('Successful');
                    setTimeout(function(){
                        if(r.length < 1){
                            location.href = 'https://superfm963.com/apps/admin';
                        }
                        else{
                            location.href = r;
                        }
                        
                    },0);
                }
                else if(data == 'null'){
                    $('.login').text('Enter your details');
                }
                else if(data == 'error'){
                    $('.login').text('Error, try again later');
                }
                else if(data == 'invalid'){
                    $('.login').text('Invalid username or password');
                    
                }
                else if(data == 'invalid'){
                    $('.login').text('Access denied');
                }
                else{
                    $('.login').text('Error, try again later');
                }
            })
            .fail(function() {
                $('.login').text('Network error');
            })
            .always(function() {
                console.log("complete");
            });
        }

        $('.login').click(function(){
            $(this).text('Please wait...');
            Login();
        })

    });
</script> 
</body>

</html>