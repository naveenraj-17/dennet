<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dennet - Profiles</title>
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


<body oncontextmenu="return false;">


<div class="wrapper">



    <?php $this->load->view("header");?>



    <section class="companies-info">
        <div class="container">
            <div class="companies-list">
                <div class="row">
                    <?php foreach ($profiles as $row):?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <img src="<?= assets()?>images/profiles/<?= $row['profile_image']?>" alt="">
                                <h3><?= $row['username']?></h3>
                                <?php $r = $this->Model->is_following($_SESSION['id'],$row['id']);?>
                                <ul>
                                    <?php if($r):?>
                                    <li><a title="" href="#" class="follow followfriend<?= $row['id']?>" onclick="followFriend(<?= $row['id']?>)" style="background-color: red">Unfollow</a></li>
                                    <?php else:?>
                                    <li><a title="" href="#" class="follow followfriend<?= $row['id']?>" onclick="followFriend(<?= $row['id']?>)" style="background-color: Green">Follow</a></li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <a href="<?= base_url().'profile/'.$row['username']?>" title="" class="view-more-pro">View Profile</a>
                        </div><!--company_profile_info end-->
                    </div>
                    <?php endforeach;?>
                </div>
            </div><!--companies-list end-->
    </section><!--companies-info end-->

</div><!--theme-layout end-->



<script type="text/javascript" src="<?= assets()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/popper.js"></script>
<script type="text/javascript" src="<?= assets()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/flatpickr.min.js"></script>
<script type="text/javascript" src="<?= assets()?>lib/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= assets()?>js/script.js"></script>
<script>
    function followFriend(e) {
        $.post("<?= base_url('follow-friend')?>",{fid : e},function (data,status) {
            if(data === "follow"){
                $(".followfriend" + e).css("background-color","red");
                $(".followfriend" + e).html("Unfollow");
            }
            else if(data === "unfollow"){
                $(".followfriend" + e).css("background-color","green");
                $(".followfriend" + e).html("Follow");
            }
            else{
                alert("error occured retry again");
            }
        });
    }
</script>
</body>

</html>