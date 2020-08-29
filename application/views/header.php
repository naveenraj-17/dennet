
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

<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="<?= base_url()?>" title=""><img src="<?= assets()?>images/logo.png" alt=""></a>
            </div><!--logo end-->
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div><!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="<?= base_url()?>" title="">
                            <span><img src="<?= assets()?>images/icon1.png" alt=""></span>
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('profiles')?>" title="">
                            <span><img src="<?= assets()?>images/icon4.png" alt=""></span>
                            Profiles
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('following')?>" title="">
                            <span><img src="<?= assets()?>images/icon3.png" alt=""></span>
                            Following
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('followers')?>" title="">
                            <span><img src="<?= assets()?>images/icon5.png" alt=""></span>
                            Followers
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('logout')?>" title="">
                            <span><i class="fa fa-sign-out"></i></span>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav><!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div><!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <img src="<?= assets()?>images/profiles/<?= $_SESSION['profile_image']?>"  style="max-width: 40px;max-height: 30px" alt="">
                    <a href="<?= base_url('myprofile')?>"><?= substr($_SESSION['username'],0,4)."..."?></a>
                </div><!--user-account-settingss end-->
            </div>
        </div><!--header-data end-->
    </div>
</header><!--header end-->