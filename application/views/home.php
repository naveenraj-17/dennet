
<!DOCTYPE html>
<html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_SESSION['login'])) {
    if ($_SESSION['login'] != true) redirect(base_url('login'));
}
else redirect(base_url('login'));
$this->load->model("Model");
?>
<head>
    <meta charset="UTF-8">
    <title>Dennet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/line-awesome-font-awesome.min.css">
    <link href="<?= assets()?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/responsive.css">
</head>

<body>

<div class="wrapper">
    <?php $this->load->view('header');?>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <div class="user-profile">
                                        <div class="username-dt">
                                            <div class="usr-pic">
                                                <img src="<?= assets()?>images/profiles/<?= $user->profile_image?>"  style="max-width: 100px;max-height: 100px" alt="">
                                            </div>
                                        </div><!--username-dt end-->
                                        <div class="user-specs">
                                            <h3><?= $user->username?></h3>
                                        </div>
                                    </div><!--user-profile end-->
                                    <ul class="user-fw-status">
                                        <li>
                                            <h4>Following</h4>
                                            <span><?= $following?></span>
                                        </li>
                                        <li>
                                            <h4>Followers</h4>
                                            <span><?= $followers?></span>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('myprofile')?>" title="">View Profile</a>
                                        </li>
                                    </ul>
                                </div><!--user-data end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>New Profiles</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="suggestions-list">
                                        <?php foreach ($profiles as $row):?>
                                        <div class="suggestion-usd">
                                            <img src="<?= assets()?>images/profiles/<?= $row['profile_image']?>" alt="" style="max-width: 50px;max-height: 50px">
                                            <div class="sgt-text">
                                                <h4><?= $row['username']?></h4>
                                            </div>
                                            <span><button class="followfriend<?= $row['id']?>" onclick="followFriend(<?= $row['id']?>)"><i class="la la-plus"></i></button></span>
                                        </div>
                                        <?php endforeach;?>
                                        <div class="view-more">
                                            <a href="<?= base_url('profiles')?>" title="">View More</a>
                                        </div>
                                    </div><!--suggestions-list end-->
                                </div><!--suggestions end-->
                                <div class="tags-sec full-width">
                                    <div class="cp-sec">
                                        <img src="<?= assets()?>images/cm-logo.png" alt="" style="min-width: 20px;max-width: 60px">
                                        <p><img src="<?= assets()?>images/cp.png" alt="">Copyright 2020</p>
                                    </div>
                                </div><!--tags-sec end-->
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9 col-md-8 no-pd">
                            <div class="main-ws-sec">
                                <div class="post-topbar">
                                    <div class="user-picy">
                                        <img src="<?= assets()?>images/profiles/<?= $user->profile_image;?>" alt="" style="max-width: 50px;max-height: 50px">
                                    </div>
                                    <div class="post-st">
                                        <ul>
                                            <li><a class="post_project active" href="#" title="">Post a Project</a></li>
                                        </ul>
                                    </div><!--post-st end-->
                                </div><!--post-topbar end-->
                                <div class="posts-section">
                                    <?php foreach ($posts as $row):?>
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="<?= assets()?>images/profiles/<?= $row['profile_image']?>" style="max-height: 35px;max-width: 35px" alt="<?= $row['username']?>">
                                                <div class="usy-name">
                                                    <h3><?= $row['username']?></h3>
                                                    <span><img src="<?= assets()?>images/clock.png" alt=""><?= date("j M",strtotime($row['date']))?> <?= date("g:i a",strtotime($row['time']))?></span>
                                                </div>
                                            </div>
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                    <li><a href="#" title="">Edit Post</a></li>
                                                    <li><a href="#" title="">Unsaved</a></li>
                                                    <li><a href="#" title="">Unbid</a></li>
                                                    <li><a href="#" title="">Close</a></li>
                                                    <li><a href="#" title="">Hide</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="job_descp" style="padding: 10px">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <img src="<?= assets()?>images/posts/<?= $row['image']?>" style="max-width: 100%;max-height: 100%">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <p><?= $row['description']?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
													<?php $check = $this->Model->check_like($_SESSION['id'],$row['id']);?>
													<?php if($check):?>
                                                    <a href="#" class="post<?= $row['id']?>" onclick="likePost(<?= $row['id']?>)" style="color:red"><i class="fas fa-heart"></i> Liked</a>
													<?php else:?>
													<a href="#" class="post<?= $row['id']?>" onclick="likePost(<?= $row['id']?>)"><i class="fas fa-heart"></i> Like</a>
													<?php endif;?>
                                                    <span style="margin-left: 5px" class="postlike<?= $row['id']?>"><?= $row['likes']?></span>
                                                </li>
                                            </ul>
                                            <a href="#"><i class="fas fa-eye"></i>Views 0</a>
                                        </div>
                                    </div><!--post-bar end-->
                                    <?php endforeach;?>
                                </div><!--posts-section end-->
                            </div><!--main-ws-sec end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>




    <div class="post-popup pst-pj">
        <div class="post-project">
            <h3>Post a project</h3>
            <div class="post-project-fields">
                <form action="<?= base_url('submit-post')?>" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="dropzone" id="my-awesome-dropzone">
                            <div class="dz-message">
                                <i class="fa fa-image"></i>
                                <span>Drag & Drop To Add Post Image</span>
                            </div>
                        </div>
                    </div>
                    <div id="filesuploaddetails"></div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div><!--post-project-fields end-->
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->

</div><!--theme-layout end-->



<script type="text/javascript" src="<?= assets()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/popper.js"></script>
<script type="text/javascript" src="<?= assets()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="<?= assets()?>lib/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/scrollbar.js"></script>
<script type="text/javascript" src="<?= assets()?>js/dropzone.js"></script>
<script type="text/javascript" src="<?= assets()?>js/script.js"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    jQuery(document).ready(function() {
        $("div#my-awesome-dropzone").dropzone({
            url: "<?php echo base_url();?>submit-des-image",
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
                $('#filesuploaddetails').append('<input type="hidden" name="description_img" value="'+ responseText +'">');
            }
            else{
                alert("Image should be on size 2mb with dimensions below 1024*1024 refresh and retry again");
            }
        }
    });
    
    function followFriend(e) {
        $.post("<?= base_url('follow-friend')?>",{fid : e},function (data,status) {
           if(data === "follow"){
               $(".followfriend" + e).html("<i class=\"la la-minus\"></i>");
           }
           else if(data === "unfollow"){
               $(".followfriend" + e).html("<i class=\"la la-plus\"></i>");
           }
           else{
               alert("error occured retry again");
            }
        });
    }
	function likePost(e){
		$.post("<?= base_url('like-post')?>",{pid : e},function (data,status) {
			var like;
           if(data === "liked"){
			   $(".post" + e).css("color","red");
			   $(".post" + e).html("<i class='fas fa-heart'></i> Liked");
			   like = $(".postlike" + e).text();
			   like = (parseInt(like)+1);
			   $(".postlike" + e).text(like);
           }
           else if(data === "unliked"){
               $(".post" + e).css("color","#b2b2b2");
			   $(".post" + e).html("<i class='fas fa-heart'></i> Like");
			   like = $(".postlike" + e).text();
			   like = (parseInt(like)-1);
			   $(".postlike" + e).text(like);
           }
           else{
               alert("error occured retry again");
			   alert(data);
            }
        });
	}
</script>
</body>

</html>