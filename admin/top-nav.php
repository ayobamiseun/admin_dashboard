<?php 
    
    function time_ago( $date )
    {
        if( empty( $date ) )
        {
            return "No date provided";
        }

        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

        $lengths = array("60","60","24","7","4.35","12","10");

        $now = time();

        $unix_date = strtotime( $date );

        // check validity of date

        if( empty( $unix_date ) )
        {
            return "Bad date";
        }

        // is it future date or past date

        if( $now > $unix_date )
        {
            $difference = $now - $unix_date;
            $tense = "ago";
        }
        else
        {
            $difference = $unix_date - $now;
            $tense = "from now";
        }

        for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
        {
            $difference /= $lengths[$j];
        }

        $difference = round( $difference );

        if( $difference != 1 )
        {
            $periods[$j].= "s";
        }

        return "$difference $periods[$j] {$tense}";

    }


?>
<div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                        $sqlcm = mysqli_query($con,"select id from comments where code = '$code' AND sender = 'Admin' AND status = ''");
                                        $numcm = mysqli_num_rows($sqlcm);

                                        if($numcm > 0){
                                            echo '<span class="badge blue">'.$numcm.'</span>';
                                        }
                                        else{

                                        }
                                     ?>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    
                                    <?php

                                        if($numcm > 0){
                                            echo '<span class="notify-title">You have '.$numcm.' new notification <a href="comments">view all</a></span>';
                                        }
                                        else{
                                            echo '<span class="notify-title">You have no new notification</span>';
                                        }
                                     ?>

                                    <!--<span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>-->
                                    <div class="nofity-list">

                                        <?php 

                                            $sqlcc = mysqli_query($con,"select uid,puid,sname,sender,date,type,status from comments where code = '$code' AND sender = 'Admin' limit 20");
                                            while ($rowcc = mysqli_fetch_array($sqlcc)) {
                                                $c_sname = $rowcc['sname'];
                                                $c_date = $rowcc['date'];
                                                $c_puid = $rowcc['puid'];
                                                $c_type = $rowcc['type'];
                                                $d = time_ago($c_date);
                                                $c_status = $rowcc['status'];

                                                if($c_status == ''){
                                                    $st1 = 'nn';
                                                }
                                                else{
                                                    $st1 = '';
                                                }
                                                echo '

                                                      <a class="'.$st1.' notify-item" href="comments?uid='.$c_puid.'&type='.$c_type.'" >
                                                        <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                                        <div class="notify-text">
                                                            <p style="word-wrap: break-word !important;">'.$c_sname.' commented <br /> on your report</p>
                                                            <span>'.$d.'</span>
                                                        </div>
                                                    </a>
                                                    ';
                                            }
                                        ?>

                                        <!--<a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>-->
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                        $sqlml = mysqli_query($con,"select id from mails where code = '$code' AND sender = 'Admin' AND status = ''");
                                        $numml = mysqli_num_rows($sqlml);

                                        if($numml > 0){
                                            echo '<span class="badge">'.$numml.'</span>';
                                        }
                                        else{

                                        }
                                     ?>
                                </i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <!--<span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>-->
                                    <?php

                                        if($numml > 0){
                                            echo '<span class="notify-title">You have '.$numml.' new email<a href="mails">view all</a></span>';
                                        }
                                        else{
                                            echo '<span class="notify-title">You have no new email</span>';
                                        }
                                     ?>
                                    <div class="nofity-list">

                                        <?php 

                                            $sqlcl = mysqli_query($con,"select uid,puid,sname,sender,date,status,subject,comment from mails where code = '$code' AND sender = 'Admin' order by id desc limit 20");
                                            while ($rowcl = mysqli_fetch_array($sqlcl)) {
                                                $sub = $rowcl['subject'];
                                                $com = $rowcl['comment'];
                                                $sub = substr(strip_tags($rowcl['subject']),0,20).'..';
                                                $com = substr(strip_tags($rowcl['comment']),0,20).'..';
                                                $cl_sname = $rowcl['sname'];
                                                $cl_date = $rowcl['date'];
                                                $cl_puid = $rowcl['puid'];
                                                $c_type = $rowcl['type'];
                                                $cl_status = $rowcl['status'];
                                                $subject = $sub;

                                                $dl = time_ago($cl_date);

                                                if($cl_status == ''){
                                                    $st1 = 'nn';
                                                }
                                                else{
                                                    $st1 = '';
                                                }

                                                if(strlen($subject) < 3){
                                                    $subject = $com;
                                                }
                                                echo '

                                                     <a href="mails?uid='.$cl_puid.'" class="notify-item '.$st1.'">
                                                        <div class="notify-thumb">
                                                            <img src="assets/images/author/avatar5.png" alt="image">
                                                        </div>
                                                        <div class="notify-text">
                                                            <p>'.$cl_sname.'</p>
                                                            <span class="msg">'.$subject.'</span>
                                                            <span>'.$dl.'</span>
                                                        </div>
                                                    </a>
                                                    ';
                                            }
                                        ?>

                                        <!--<a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/avatar5.png" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>-->
                                        
                                    </div>
                                </div>
                            </li>
                            <!--<li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Admin Panel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li class="text-primary"></li>
                                <li><span></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $name; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                               <!--<a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>-->
                                <a class="dropdown-item" href="logout">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>