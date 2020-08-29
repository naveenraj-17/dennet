
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dennet - A Student Social Network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/line-awesome-font-awesome.min.css">
    <link href="<?= assets()?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/responsive.css">
</head>


<body class="sign-in" oncontextmenu="return false;">

<?php if(isset($error)){?>
    <div class="alert alert-danger alert-dismissible">
        <p><span>Error!</span> <?php echo $error;?></p>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
<?php }if(isset($success)){?>
    <div class="alert alert-success alert-dismissible">
        <p><span>Success!</span> <?php echo $success;?></p>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
<?php }if(isset($warning)){?>
    <div class="alert alert-warning alert-dismissible">
        <p><span>Warning!</span> <?php echo $warning;?></p>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
<?php }?>

<div class="wrapper">

    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo">
                                <img src="<?= assets()?>images/cm-logo.png" alt="">
                                <p>Workwise,  is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                            </div><!--cm-logo end-->
                            <img src="<?= assets()?>images/cm-main-img.png" alt="">
                        </div><!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <ul class="sign-control">
                                <li data-tab="tab-1" class="current"><a href="#" title="">log in</a></li>
                                <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                            </ul>
                            <div class="sign_in_sec current" id="tab-1">

                                <h3>log in</h3>
                                <form action="<?= base_url('login')?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="text" name="username" placeholder="Username *" required>
                                                <i class="la la-user"></i>
                                            </div><!--sn-field end-->
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" name="password" placeholder="Password *" required>
                                                <i class="la la-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="checky-sec">
                                                <div class="fgt-sec">
                                                    <input type="checkbox" name="cc" id="c1">
                                                    <label for="c1">
                                                        <span></span>
                                                    </label>
                                                    <small>Remember me</small>
                                                </div><!--fgt-sec end-->
                                                <a href="#" title="">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" value="submit">log in</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!--sign_in_sec end-->
                            <div class="sign_in_sec" id="tab-2">
                                <div class="dff-tab current" id="tab-3">
                                    <form action="<?= base_url('signin')?>" method="post" id="registerform">
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd" style="margin-bottom: 20px">
                                                <div class="dropzone" id="my-awesome-dropzone">
                                                    <div class="dz-message">
                                                        <i class="fa fa-image"></i>
                                                        <span>Drag & Drop To Add Profile Image</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="filesuploaddetails"></div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" id="username" name="username" placeholder="Full Name *" required>
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="email" placeholder="Email *" required>
                                                    <i class="la la-mail-forward"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="password" id="password1" placeholder="Password *" required>
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="repeat-password" id="password2" placeholder="Repeat Password *" required>
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Get Started</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--dff-tab end-->
                            </div>
                        </div><!--login-sec end-->
                    </div>
                </div>
            </div><!--signin-pop end-->
        </div><!--signin-popup end-->
        <div class="footy-sec">
            <div class="container">
                <ul>
                    <li><a href="help-center.html" title="">Help Center</a></li>
                    <li><a href="about.html" title="">About</a></li>
                    <li><a href="#" title="">Privacy Policy</a></li>
                    <li><a href="#" title="">Community Guidelines</a></li>
                    <li><a href="#" title="">Cookies Policy</a></li>
                    <li><a href="#" title="">Career</a></li>
                    <li><a href="forum.html" title="">Forum</a></li>
                    <li><a href="#" title="">Language</a></li>
                    <li><a href="#" title="">Copyright Policy</a></li>
                </ul>
                <p><img src="<?= assets()?>images/copy-icon.png" alt="">Copyright 2020</p>
            </div>
        </div><!--footy-sec end-->
    </div><!--sign-in-page end-->


</div><!--theme-layout end-->

<script type="text/javascript" src="<?= assets()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/popper.js"></script>
<script type="text/javascript" src="<?= assets()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= assets()?>lib/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/dropzone.js"></script>
<script type="text/javascript" src="<?= assets()?>js/script.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $('#registerform').validate({
        rules: {
            password1: {
                minlength: 5
            },
            password2: {
                minlength: 5,
                equalTo: "#password1"
            }
        }
    });
    $("#username").focusout(function () {
        $.post('<?php echo base_url();?>check_username',{name:$("#username").val()},function (data,success) {
            if(data === "present"){
                alert("Username already exist retry again");
                $("#username2").css({"background-color": "#ff6459"});
                $("#username2").attr("placeholder", "Username already exist try again");
                $("#register_submit").prop('disabled', true);
            }else {
                $("#username2").css("background-color","white");
                $("#username2").attr("placeholder", "");
                $("#register_submit").prop('disabled', false);
            }
        });
    });
</script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    jQuery(document).ready(function() {
        $("div#my-awesome-dropzone").dropzone({
            url: "<?php echo base_url();?>submit-image",
            acceptedFiles: "image/*",
            addRemoveLinks: false,
            init: function() {
                this.on("success", function (file, responseText) {
                    after_submit(file, responseText);
                })
            }
        });
        function after_submit(file, responseText) {
            if(responseText !== "not uploaded"){
                $('#filesuploaddetails').append('<input type="hidden" name="profile_img" value="'+ responseText +'">');
            }
            else{
                alert("Image should be on size 2mb with dimensions below 1024*1024 refresh and retry again");
            }
        }
    });
</script>
</body>

<!-- Mirrored from gambolthemes.net/workwise-new/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Mar 2020 08:07:27 GMT -->
</html>