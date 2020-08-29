<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dennet - <?= $_SESSION['username']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/line-awesome-font-awesome.min.css">
    <link href="<?= assets()?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= assets()?>css/responsive.css">
</head>


<body>


<div class="wrapper">
    <?php $this->load->view("header")?>


    <section class="cover-sec">
        <img src="<?= assets()?>images/resources/cover-img.jpg" alt="">
    </section>


    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img src="<?= assets()?>images/profiles/<?= $_SESSION['profile_image']?>"  style="max-width: 150px;max-height: 150px" alt="">
                                        <div class="add-dp" id="OpenImgUpload">
                                            <input type="file" id="file">
                                            <label for="file"><i class="fas fa-camera"></i></label>
                                        </div>
                                    </div><!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-status">
                                            <li>
                                                <span>Following</span>
                                                <b><?= $following?></b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b><?= $followers?></b>
                                            </li>
                                        </ul>
                                    </div><!--user_pro_status end-->
                                </div><!--user_profile end-->
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
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div><!--suggestions-list end-->
                                </div><!--suggestions end-->
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-8">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec rewivew">
                                    <h3><?= $_SESSION['username']?></h3>
                                    <div class="tab-feed st2 settingjb">
                                        <ul>
                                            <li data-tab="feed-dd" class="active">
                                                <a href="#" title="">
                                                    <img src="<?= assets()?>images/ic1.png" alt="">
                                                    <span>Feed</span>
                                                </a>
                                            </li>
                                            <li data-tab="info-dd">
                                                <a href="#" title="">
                                                    <img src="<?= assets()?>images/ic2.png" alt="">
                                                    <span>Info</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div><!--user-tab-sec end-->

                                <div class="product-feed-tab current" id="feed-dd">
                                    <div class="posts-section">
                                        <?php foreach ($myposts as $row):?>
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
                                                            <a href="#"><i class="fas fa-heart"></i> Like</a>

                                                            <span style="margin-left: 5px"><?= $row['likes']?></span>
                                                        </li>
                                                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 0</a></li>
                                                    </ul>
                                                    <a href="#"><i class="fas fa-eye"></i>Views 0</a>
                                                </div>
                                            </div><!--post-bar end-->
                                        <?php endforeach;?>
                                        <!--process-comm end-->
                                    </div><!--posts-section end-->
                                </div><!--product-feed-tab end-->
                                <?php if ($user_details):?>
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                        <p><?= $user_details->overview?></p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a></h3>
                                        <h4><?= $user_details->edu_degree;?></h4>
                                        <span><?= date("Y",strtotime($user_details->edu_start))?> - <?= date("Y",strtotime($user_details->edu_end))?></span>
                                        <p><?= $user_details->edu_description?></p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a></h3>
                                        <h4><?= $user_details->country?></h4>
                                        <p><?= $user_details->city?></p>
                                    </div><!--user-profile-ov end-->
                                </div><!--product-feed-tab end-->
                                <?php else:?>
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                        <p> </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a></h3>
                                        <h4> </h4>
                                        <span>  -  </span>
                                        <p> </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a></h3>
                                        <h4> </h4>
                                        <p> </p>
                                    </div><!--user-profile-ov end-->
                                </div>
                                <?php endif;?><!--product-feed-tab end-->
                            </div><!--main-ws-sec end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>


    <div class="overview-box" id="overview-box">
        <div class="overview-edit">
            <h3>Overview</h3>
            <span>5000 character left</span>
            <form action="<?= base_url('add_overview')?>" method="post">
                <textarea name="overview" required></textarea>
                <button type="submit" class="save">Save</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div><!--overview-edit end-->
    </div><!--overview-box end-->

    <div class="overview-box" id="education-box">
        <div class="overview-edit">
            <h3>Education</h3>
            <form action="<?= base_url('add_education')?>" method="post">
                <div class="datepicky">
                    <div class="row">
                        <div class="col-lg-6 no-left-pd">
                            <div class="datefm">
                                <input type="text" name="from" placeholder="From" class="datepicker" required>
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-6 no-righ-pd">
                            <div class="datefm">
                                <input type="text" name="to" placeholder="To" class="datepicker" required>
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" name="degree" placeholder="Degree" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <button type="submit" class="save">Save</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div><!--overview-edit end-->
    </div><!--overview-box end-->

    <div class="overview-box" id="location-box">
        <div class="overview-edit">
            <h3>Location</h3>
            <form action="<?= base_url('add_location')?>" method="post">
                <div class="datefm">
                    <select name="country" required>
                        <option value="India">India</option>
                    </select>
                    <i class="fa fa-globe"></i>
                </div>
                <div class="datefm">
                    <input name="city" placeholder="Enter City" required>
                    <i class="fa fa-map-marker"></i>
                </div>
                <button type="submit" class="save">Save</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div><!--overview-edit end-->
    </div><!--overview-box end-->

</div><!--theme-layout end-->



<script type="text/javascript" src="<?= assets()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/popper.js"></script>
<script type="text/javascript" src="<?= assets()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/flatpickr.min.js"></script>
<script type="text/javascript" src="<?= assets()?>lib/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/script.js"></script>
</body>

<!-- Mirrored from gambolthemes.net/workwise-new/my-profile-feed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Mar 2020 08:07:11 GMT -->
</html>