<?php
    
    include('connect.php');
    error_reporting(0);

    if(!isset($_COOKIE['SRPPUser'])){
        header('location:login?r=monthly-report');
    }
    else{
        $code = $_COOKIE['SRPPUser'];
        $sql = mysqli_query($con, "select name,email,phone,unit,rank,supervisor_email,supervisor_name from srpp_users where code = '$code'");
        $num = mysqli_num_rows($sql);
        if($num < 1){
            header('location:login?r=monthly-report');
        }
        else{

            $row = mysqli_fetch_array($sql);
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $unit = $row['unit'];
            $rank = $row['rank'];
            $supervisor_name = $row['supervisor_name'];
            $supervisor_email = $row['supervisor_email'];


            function week_of_month($date) {
                $first_of_month = new DateObject($date->format('Y/m/1'));
                $day_of_first = $first_of_month->format('N');
                $day_of_month = $date->format('j');
                return floor(($day_of_first + $day_of_month - 1) / 5) + 1;
            }

            function getWeeks($date, $rollover)
            {
                $cut = substr($date, 0, 8);
                $daylen = 86400;

                $timestamp = strtotime($date);
                $first = strtotime($cut . "00");
                $elapsed = ($timestamp - $first) / $daylen;

                $weeks = 1;

                for ($i = 1; $i <= $elapsed; $i++)
                {
                    $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
                    $daytimestamp = strtotime($dayfind);

                    $day = strtolower(date("l", $daytimestamp));

                    if($day == strtolower($rollover))  $weeks ++;
                }

                if($weeks > 4){
                    return 4;
                }
                else{
                    return $weeks;
                }
                //return $weeks;
            }



            //
            $date = gmdate("Y-m-d");

            $dd2 = gmdate("Y-m");

            $yr = gmdate("Y");
            //$yr = "2019";
            //echo "Week ".getWeeks($date, "sunday");

            //echo gmdate("Y-m-d");

            $y = gmdate('Y');
            //$y = "2019";
            $weeks = getWeeks($date, "monday");
            $week_start = new DateTime();
            $week_start->setISODate($y,$weeks);
            $st = $week_start->format('Y-m-d');

            $week_start->setISODate($y,1);
            $w1st = $week_start->format('Y-m-d');
            $w1st5 =  date('Y-m-d', strtotime('+31 days',strtotime($w1st)));



            $week_start->setISODate($y,2);
            $w2st = $week_start->format('Y-m-d');
            $w2st5 =  date('Y-m-d', strtotime('+4 days',strtotime($w2st)));
            $w22st = $week_start->format('M');
            $w22st5 =  date('M', strtotime('+4 days',strtotime($w1st)));

            $week_start->setISODate($y,3);
            $w3st = $week_start->format('Y-m-d');
            $w3st5 =  date('Y-m-d', strtotime('+4 days',strtotime($w3st)));
            $w33st = $week_start->format('M');
            $w33st5 =  date('M', strtotime('+4 days',strtotime($w1st)));


            $week_start->setISODate($y,4);
            $w4st = $week_start->format('Y-m-d');
            $w4st5 =  date('Y-m-d', strtotime('+4 days',strtotime($w4st)));
            $w44st = $week_start->format('M');
            $w44st5 =  date('M', strtotime('+4 days',strtotime($w4st)));

            $week_start->setISODate($y,5);
            $w5st = $week_start->format('Y-m-d');
            $w5st5 =  date('Y-m-d', strtotime('+4 days',strtotime($w5st)));
            $w55st = $week_start->format('M');
            $w55st5 =  date('M', strtotime('+4 days',strtotime($w5st)));

            $wk = getWeeks($date, "monday");

            $wk1 = "Week ".$wk;


             $sqlcm = mysqli_query($con,"select * from daily_report where week = '$wk1' AND date like '%$dd2%'");
             $numcm = mysqli_num_rows($sqlcm);

             
             $mont =  gmdate('F');

             $sqlw1 = mysqli_query($con,"select id from weekly_report where month = 'January' AND date like '%$yr%' and code = '$code'");
             $numw1 = mysqli_num_rows($sqlw1);

             $sqlw2 = mysqli_query($con,"select id from weekly_report where month = 'February' AND date like '%$yr%' and code = '$code'");
             $numw2 = mysqli_num_rows($sqlw2);

             $sqlw3 = mysqli_query($con,"select id from weekly_report where month = 'March' AND date like '%$yr%' AND code = '$code'");
             $numw3 = mysqli_num_rows($sqlw3);

             $sqlw4 = mysqli_query($con,"select id from weekly_report where month = 'April' AND date like '%$yr%' AND code = '$code'");
             $numw4 = mysqli_num_rows($sqlw4);

             $sqlw5 = mysqli_query($con,"select id from weekly_report where month = 'May' AND date like '%$yr%' AND code = '$code'");
             $numw5 = mysqli_num_rows($sqlw5);

             $sqlw6 = mysqli_query($con,"select id from weekly_report where month = 'June' AND date like '%$yr%' AND code = '$code'");
             $numw6 = mysqli_num_rows($sqlw6);

             $sqlw7 = mysqli_query($con,"select id from weekly_report where month = 'July' AND date like '%$yr%' AND code = '$code'");
             $numw7 = mysqli_num_rows($sqlw7);

             $sqlw8 = mysqli_query($con,"select id from weekly_report where month = 'August' AND date like '%$yr%' AND code = '$code'");
             $numw8 = mysqli_num_rows($sqlw8);

             $sqlw9 = mysqli_query($con,"select id from weekly_report where month = 'September' AND date like '%$yr%' AND code = '$code'");
             $numw9 = mysqli_num_rows($sqlw9);

             $sqlw10 = mysqli_query($con,"select id from weekly_report where month = 'October' AND date like '%$yr%' AND code = '$code'");
             $numw10 = mysqli_num_rows($sqlw10);

             $sqlw11 = mysqli_query($con,"select id from weekly_report where month = 'November' AND date like '%$yr%' AND code = '$code'");
             $numw11 = mysqli_num_rows($sqlw11);

             $sqlw12 = mysqli_query($con,"select id from weekly_report where month = 'December' AND date like '%$yr%' AND code = '$code'");
             $numw12 = mysqli_num_rows($sqlw12);




             $sqlm1 = mysqli_query($con,"select id from monthly_report where month = 'January' AND date like '%$yr%'  AND code = '$code'");
             $numm1 = mysqli_num_rows($sqlm1);

             $sqlm2 = mysqli_query($con,"select id from monthly_report where month = 'February' AND date like '%$yr%' AND code = '$code'");
             $numm2 = mysqli_num_rows($sqlm2);

             $sqlm3 = mysqli_query($con,"select id from monthly_report where month = 'March' AND date like '%$yr%' AND code = '$code'");
             $numm3 = mysqli_num_rows($sqlm3);

             $sqlm4 = mysqli_query($con,"select id from monthly_report where month = 'April' AND date like '%$yr%' AND code = '$code'");
             $numm4 = mysqli_num_rows($sqlm4);

             $sqlm5 = mysqli_query($con,"select id from monthly_report where month = 'May' AND date like '%$yr%' AND code = '$code'");
             $numm5 = mysqli_num_rows($sqlm5);

             $sqlm6 = mysqli_query($con,"select id from monthly_report where month = 'June' AND date like '%$yr%' AND code = '$code'");
             $numm6 = mysqli_num_rows($sqlm6);

             $sqlm7 = mysqli_query($con,"select id from monthly_report where month = 'July' AND date like '%$yr%' AND code = '$code'");
             $numm7 = mysqli_num_rows($sqlm7);

             $sqlm8 = mysqli_query($con,"select id from monthly_report where month = 'August' AND date like '%$yr%' AND code = '$code'");
             $numm8 = mysqli_num_rows($sqlm8);


             $sqlm9 = mysqli_query($con,"select id from monthly_report where month = 'September' AND date like '%$yr%' AND code = '$code'");
             $numm9 = mysqli_num_rows($sqlm9);

             $sqlm10 = mysqli_query($con,"select id from monthly_report where month = 'October' AND date like '%$yr%' AND code = '$code'");
             $numm10 = mysqli_num_rows($sqlm10);

             $sqlm11 = mysqli_query($con,"select id from monthly_report where month = 'November' AND date like '%$yr%' AND code = '$code'");
             $numm11 = mysqli_num_rows($sqlm11);

             $sqlm12 = mysqli_query($con,"select id from monthly_report where month = 'December' AND date like '%$yr%' AND code = '$code'");
             $numm12 = mysqli_num_rows($sqlm12);

             $tt = $numm1 + $numm2 + $numm3 + $numm4 + $numm5 + $numm6 + $numm7 + $numm8 + $numm9 + $numm10 + $numm11 + $numm12;


             $per = 100 / 12;

             $compl = $tt * $per;

             

        }
        
    }

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Monthly report | LTM & Radio SRPP</title>
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
    <!-- modernizr css -->

    

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
          <!-- Modal -->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title">Monthly Report  - <span class="cdate" style="font-size:17px; color: #36c;"></span></h3>
        
      </div>
      <div class="modal-body">
        <div class="form-bg" style="width: 100%;">
                        <div class="">
                            <form id="freport" class="form-horizontal" style="padding-bottom: 0px; max-height: 400px; overflow-y: auto; overflow-x: hidden;">
                                
                                
                                <div class="form-group help" style="">
                                    <input type="hidden" name="week" class="fdate">
                                    <input type="hidden" name="day" class="fday">
                                    <input type="hidden" name="type" value="monthly">
                                    <input type="hidden" name="month" class="fmonth">
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                                    <input type="hidden" name="code" value="<?php echo $code; ?>">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Target</label>
                                            <textarea name="task[]" class="form-control tt"></textarea>
                                            <!--<input type="text" class="form-control" id="inputPassword3" name="name" placeholder="Name">-->
                                        </div>

                                        <div class="col-md-5">
                                            <label for="">Details</label>
                                            <textarea name="description[]" class="form-control tt"></textarea>
                                            <!--<input type="text" class="form-control" id="inputPassword3" name="name" placeholder="Name">-->
                                        </div>

                                        <div class="col-md-2">
                                            <label for="">Progress</label>
                                            <select name="progress[]" class="form-control tt">
                                                <option value="Done">Done</option>
                                                <option value="Not done">Not done</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Target</label>
                                            <textarea name="task[]" class="form-control tt"></textarea>
                                            <!--<input type="text" class="form-control" id="inputPassword3" name="name" placeholder="Name">-->
                                        </div>

                                        <div class="col-md-5">
                                            <label for="">Details</label>
                                            <textarea name="description[]" class="form-control tt"></textarea>
                                            <!--<input type="text" class="form-control" id="inputPassword3" name="name" placeholder="Name">-->
                                        </div>

                                        <div class="col-md-2">
                                            <label for="">Progress</label>
                                            <select name="progress[]" class="form-control tt">
                                                <option value="Done">Done</option>
                                                <option value="Not done">Not done</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Target</label>
                                            <textarea name="task[]" class="form-control tt"></textarea>
                                            <!--<input type="text" class="form-control" id="inputPassword3" name="name" placeholder="Name">-->
                                        </div>

                                        <div class="col-md-5">
                                            <label for="">Details</label>
                                            <textarea name="description[]" class="form-control tt"></textarea>
                                            <!--<input type="text" class="form-control" id="inputPassword3" name="name" placeholder="Name">-->
                                        </div>

                                        <div class="col-md-2">
                                            <label for="">Progress</label>
                                            <select name="progress[]" class="form-control tt">
                                                <option value="Done">Done</option>
                                                <option value="Not done">Not done</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="cont"></div>
                                    
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Executive Summary (Optional)</label>
                                            <textarea name="summary" id="summary" class="form-control summary" style="width: 100%;"></textarea>
                                            <!--<input type="text" class="form-control" id="inputPassword3" name="name" placeholder="Name">-->
                                        </div>

                                    </div>
                                    
                                </div>
                                
                            
                        </div>

                        <div role="button" class="addmore btn btn-info btn-sm" style="margin-bottom: 20px;">+ Add more</div>


                        <br />
                        <span style="margin-top: 15px;">Select report to upload</span>
                        <input type="file" name="file" >

                        </form>
            </div>
      </div>
      <div class="modal-footer">

                          <div class='progress2' id="progress_div">
                            <div class='bar' id='bar1'></div>
                            <div class='percent' id='percent1'>0%</div>
                          </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary send-report">Submit</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="recoveredModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999993939399393;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel">Recovery</h3>
      </div>
      <div class="modal-body">
        <div class="rec"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary copy1" data-clipboard-text="kkskkskkn kkksksk">Copy</button>-->
      </div>
    </div>
  </div>
</div>


<div class="modal" id="modal-delete" role="dialog" aria-hidden="true" data-modal>
    <div class="modal-content">
      <div class="modal-header">
        <button role="button" class="icon-close" aria-label="close-modal" data-modal="close-modal">X</button>
        <h2 class="modal-title">Delete this report</h2>
      </div>
      <div class="modal-body">
        <p>
            
        </p>
      </div>
      <div class="modal-footer">
        
        <button role="button" class="btn-close btn" aria-label="close-modal" data-modal="close-modal">Close</button>
        <button role="button" class="send-report btn btn-primary">Delete</button>
      </div>
    </div>
  </div>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include('side-nav.php') ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include('top-nav.php'); ?>
            <!-- page title area end -->
            <div class="main-content-inner">
              <br />
                <h2>Weekly Report   <span style="font-size: 20px;">(<?php echo gmdate('M d,Y') ?>)</span></h2>

                <?php include('monthly-report-counter.php') ?>

                <div class="">
                    <!-- seo fact area start -->
                    <?php //include('stats.php'); ?>
                    <!-- seo fact area end -->
                    <!-- Social Campain area start -->
                    
                    <!-- Social Campain area end -->
                    <!-- Statistics area start --
                    <div class="col-lg-8 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">User Statistics</h4>
                                <div id="user-statistics"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Statistics area end -->
                    <!-- Advertising area start --
                    <div class="col-lg-4 mt-5">
                        <div class="card h-full">
                            <div class="card-body">
                                <h4 class="header-title">Advertising & Marketing</h4>
                                <canvas id="seolinechart8" height="233"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Advertising area end -->
                    <!-- sales area start -->
                    <br />
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Submited reports</h4>
                                <div class="content-widgets">
                        
                        
                        <div class="col-md-12 contentwidgets-grid1">
                                
                                <div class="widg-text">
                                    <!--<a class="btn btn-primary btn-small">Submit report</a>-->

                                    <div class="table-responsive">
                                       <table id="example4" class="table table-striped nomargin exporttable display">
                                          <thead>
                                            <tr>
                                              <th>SN</th>
                                              <th>Month</th>
                                              <th>Date</th>
                                              <th>View</th>
                                              <th>Download</th>
                                              <th>Comment</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                                $sqlc = mysqli_query($con,"select * from monthly_report where year like '%$y%' AND code = '$code' order by id desc");
                                                $i = 1;
                                                while($rowc = mysqli_fetch_array($sqlc)){
                                                  $monthc = $rowc['month'];
                                                  $datec = $rowc['date'];
                                                  $uidc = $rowc['uid'];
                                                  $documentc = $rowc['document'];

                                                  $doc = str_replace('http://srpp.cloveworld.org/','',$documentc);

                                                  $sqlc1 = mysqli_query($con, "select name,email,sender,sname from comments where puid = '$uidc' order by id desc limit 1");
                                                  $numc1 = mysqli_num_rows($sqlc1);
                                                  $rowc1 = mysqli_fetch_array($sqlc1);
                                                  $c_name = $rowc1['name'];
                                                  $c_email = $rowc1['email'];
                                                  $c_sender = $rowc1['sender'];
                                                  $c_sname = $rowc1['sname'];

                                                  if($c_name == $name){
                                                    $y = "You";
                                                  }
                                                  else{
                                                    $y = $c_name;
                                                  }

                                                  if($numc < 1){
                                                    $cc = '<a class="btn btn-sm btn-info">No comment</a>';
                                                  }
                                                  else{
                                                    if($c_sender == "Admin"){
                                                        if($numc > 1){
                                                            $cc = '<a class="btn btn-sm btn-danger" href="comments.php?uid='.$uidc.'&type=monthly">'.$c_sname.' replied</a>';
                                                        }
                                                        else{
                                                            $cc = '<a class="btn btn-sm btn-danger" href="comments.php?uid='.$uidc.'&type=monthly">'.$c_sname.' commented</a>';
                                                        }
                                                        
                                                      }
                                                      else{
                                                        $cc = '<a class="btn btn-sm btn-success" href="comments.php?uid='.$uidc.'&type=monthly">'.$y.' replied</a>';
                                                      }
                                                  }
                                                  
                                                  echo '<tr>';
                                                  echo '<td>'.$i.'</td>';
                                                   echo '<td>'.$monthc.'</td>';
                                                  echo '<td>'.$datec.'</td>';
                                                  echo '<td><a href="edit-report?uid='.$uidc.'&redirect=monthly-report&type=monthly&view=true" class="btn btn-primary">View</a></td>';
                                                  echo '<td><a href="down.php?file='.$doc.'" class="btn btn-success"><i class="fa fa-arrow-down"></i></a></td>';
                                                  echo '<td>'.$cc.'</td>';
                                                  echo '<td><a href="edit-report?uid='.$uidc.'&redirect=monthly-report&type=monthly" class="btn btn-success edit"><i class="fa fa-edit"></i></a> <a class="btn btn-danger delete_report" data-type="monthly" data-uid="'.$uidc.'" style="margin-right:10px;"><i class="glyphicon glyphicon-trash"></i></a></td>';
                                                  echo '</tr>';

                                                  $i++;
                                                  

                                                }

                                            ?>

                                          </tbody>

                                        </table>
                                      </div>
                                </div>
                    </div>
                        
                        <div class="clearfix"></div>
                    </div>
                            </div>
                        </div>
                    </div>

                    <br />


                      <div class="card">
                            <div class="card-body">
                                <div class="row" style="position: relative;">
                                        <div class="pull-left" style="float-left">
                                            <h3><?php 

                                                    if(empty($_REQUEST['week'])){
                                                        echo 'Select the parameters to search';
                                                    }
                                                    else{

                                                        echo $_REQUEST['month'].' reports'; 
                                                    }
                                                

                                            ?></h3>
                                        </div>

                                        <?php $y = gmdate('Y'); ?>

                                        <div class="pull-right" style="float-right;">
                                            <form action="" method="get" accept-charset="utf-8">
                                                

                                                <select name="month" required="" class="form-control3">
                                                    <option value="">Select Month</option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>


                                                <select name="year" required="" class="form-control3">
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </select>

                                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                            </form>
                                        </div>
                                        
                                </div>

                                    <div class="table-responsive">
                                       <table id="example4" class="table nomargin exporttable display">
                                          <thead>
                                            <tr>
                                              <th>SN</th>
                                              <th>Task</th>
                                              <th>Description</th>
                                              <th>Progress</th>
                                              <th>Week</th>
                                              <th>Date</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php 

                                                if(empty($_REQUEST['month'])){

                                                    $sqlw = mysqli_query($con, "select week,uid from weekly_report where month = '$mont' AND code = '$code' group by week");
                                                    while ($roww = mysqli_fetch_array($sqlw)) {
                                                        $weekk = $roww['week'];
                                                        $uidk = $roww['uid'];

                                                          echo '<tr style="background:#ccc;">';
                                                          echo '<th>'.$weekk.'</th>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '</tr>';

                                                        $sqlc = mysqli_query($con,"select * from weekly_reports where puid = '$uidk' AND code = '$code' order by id desc");
                                                        $i = 1;
                                                        while($rowc = mysqli_fetch_array($sqlc)){
                                                          $weekc = $rowc['week'];
                                                          $datec = $rowc['date'];
                                                          $uidc = $rowc['uid'];
                                                          $taskc = $rowc['task'];
                                                          $progressc = $rowc['progress'];
                                                          $descriptionc = $rowc['description'];
                                                          
                                                          echo '<tr>';
                                                          echo '<td>'.$i.'</td>';
                                                          echo '<td>'.$taskc.'</td>';
                                                          echo '<td>'.$descriptionc.'</td>';
                                                          echo '<td>'.$progressc.'</td>';
                                                          echo '<td>'.$weekc.'</td>';
                                                          echo '<td>'.$datec.'</td>';
                                                          echo '</tr>';

                                                          $i++;
                                                          

                                                        }
                                                    }

                                                }
                                                else{
                                                    $mt = $_REQUEST['month'];
                                                    $yr = $_REQUEST['year'];
                                                    $sqlw = mysqli_query($con, "select week,uid from weekly_report where month = '$mt' AND date like '%$yr%' AND code = '$code' group by week");
                                                    while ($roww = mysqli_fetch_array($sqlw)) {
                                                        $weekk = $roww['week'];
                                                        $uidk = $roww['uid'];

                                                          echo '<tr style="background:#ccc;">';
                                                          echo '<th>'.$weekk.'</th>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '<td></td>';
                                                          echo '</tr>';

                                                        $sqlc = mysqli_query($con,"select * from weekly_reports where puid = '$uidk' AND code = '$code' order by id desc");
                                                        $i = 1;
                                                        while($rowc = mysqli_fetch_array($sqlc)){
                                                          $weekc = $rowc['week'];
                                                          $datec = $rowc['date'];
                                                          $uidc = $rowc['uid'];
                                                          $taskc = $rowc['task'];
                                                          $progressc = $rowc['progress'];
                                                          $descriptionc = $rowc['description'];
                                                          
                                                          echo '<tr>';
                                                          echo '<td>'.$i.'</td>';
                                                          echo '<td>'.$taskc.'</td>';
                                                          echo '<td>'.$descriptionc.'</td>';
                                                          echo '<td>'.$progressc.'</td>';
                                                          echo '<td>'.$weekc.'</td>';
                                                          echo '<td>'.$datec.'</td>';
                                                          echo '</tr>';

                                                          $i++;
                                                          

                                                        }
                                                    }
                                                }

                                                
                                                

                                            ?>

                                          </tbody>
                                        </table>
                                      </div>
                            </div>

                      </div>
                    
                    

                    <!-- map area end -->
                    <!-- testimonial area start -->
                    
                    <!-- testimonial area end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       <?php include('footer.php'); ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start --
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script type="text/javascript" src="assets/js/store.js"></script>

     <!--clipboard-->
       
        <script src="clipboard/clipboard.min.js"></script>
      <!---->

      <script src="assets/js/jquery.toaster.js"></script>

    <script src="https://unpkg.com/lite-editor@1.6.39/js/lite-editor.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/lite-editor@1.6.39/css/lite-editor.css">

    <script type="text/javascript">
      $(document).ready(function() {

        var editor = new LiteEditor('.summary', function(){
            
        });

        editor.registerButton({
          label: '<i class="fa fa-save save"> Save</i>',
          tag: 'span',
          className: 'editsave',
          group: 'st'
        });

        $('.save').click(function(){
            var txt = $('#summary').val();

            store.set('summary',txt);

        });

        if(store.has('summary')){
            var sum = store.get('summary');
            $('.rec').html(sum);
            $('.copy1').attr('data-clipboard-text', sum);
            if(sum.length > 0){
                editor.registerButton({
                  label: '<i class="fa fa-undo recover" style="color:blue" data-toggle="modal" data-target="#recoveredModel"> Recovered</i>',
                  tag: 'span',
                  className: 'editsave',
                  group: 'st'
                });
            }
        }



        $('.recover').click(function(){
            var sum = store.get('summary');
            $('.rec').html(sum);

            $('.copy1').attr('data-clipboard-text', sum);
        });
        

        new Clipboard('.copy1');

        $('.copy1').click(function(event) {
            $.toaster({ message : 'Link copied',title : 'Direct',priority : 'info'});
               //alert('Link copied');
        });



        var data = '<div class="row">'
                                        +'<div class="col-md-5">'
                                            +'<label for="">Target</label>'
                                            +'<textarea name="task[]" class="form-control"></textarea>'
                                            
                                        +'</div>'

                                        +'<div class="col-md-5">'
                                            +'<label for="">Achievement</label>'
                                            +'<textarea name="description[]" class="form-control"></textarea>'
                                            +'<div class="remove-cont"><i class="glyphicon glyphicon-remove"></i></div>'
                                        +'</div>'
                                        +'<div class="col-md-2">'
                                            +'<label for="">Progress</label>'
                                            +'<select name="progress[]" class="form-control tt">'
                                                +'<option value="Done">Done</option>'
                                                +'<option value="Not done">Not done</option>'
                                            +'</select>'
                                        +'</div>'
                                    +'</div>';

        $('.addmore').click(function(){
            $('.cont').append(data);
            //$('.cont').remove(data);

            $('.remove-cont').click(function(){
                var parent = $(this).parent().parent();
                parent.find('textarea').attr('disabled', 'true');
                parent.remove();
                //alert(parent);
            });
        });


        function SendReport(){

            var formData = new FormData($('#freport')[0]);

            $.ajax({
                url: 'ajax_con.php',
                type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: formData,
                //async: false,
                cache: false,
                contentType: false,
                processData: false,
                xhr: function(){
                    //upload Progress
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function(event) {
                            var percent = 0;
                            var position = event.loaded || event.position;
                            var total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            $("#bar1").css("width", + percent +"%");
                            $('#percent1').text(percent +"%");
                        }, true);
                    }
                    return xhr;
                },
                enctype: 'multipart/form-data',
                mimeType:"multipart/form-data"
            })
            .done(function(data) {
                alert(data)
                //alert(data);
                if(data == 'success'){
                    $('.send-report').text('Successful');
                    store.set('summary','');
                    setTimeout(function(){
                        location.reload();
                        //$('.close').click();
                    },1000);
                    
                }
                else if(data == 'invalid'){
                    $('.send-report').text('Invalid access code');
                }
                else if(data == 'format'){
                    $('.send-report').text('Invalid file format');
                }
                else if(data == 'size'){
                    $('.send-report').text('Invalid document size');
                }
                else if(data == 'file'){
                    $('.send-report').text('Select a file to upload');
                }
                else if(data == 'upload'){
                    $('.send-report').text('Document not uploaded');
                }
                else if(data == 'already'){
                    $('.send-report').text('Report already submited');
                }
                else if(data == 'null'){
                    $('.send-report').text('Enter your access code');
                }
                else{
                    $('.send-report').text('Error');
                }
            })
            .fail(function() {
                $('.send-report').text('Network error');
            })
            .always(function() {
                console.log("complete");
            });
        }

        /*$('.send-report').click(function(){
            $(this).text('Please wait...');
            SendReport();
        });*/

        var stat = false;

        $('.send-report').click(function(){

            $('.tt').each(function(index, val) {
       
               var dd = $(this).val();
               //Materialize.toast(dd,3000);

               if(dd.length < 1){
                  $(this).css({'border-bottom':'1px solid red'});
                   $('.send-report').text('Complete the form');
                   $('.send-report').addClass('red');
                   stat = false;
               }
               else{
                 $(this).css({'border-bottom':'1px solid grey'});
                 stat = true;
                 
               }

              
            });

            if(stat == true){
               $('.send-report').removeClass('btn-danger');
                $('.send-report').addClass('btn-info');
                $('.send-report').text('Prosessing');

                $('.progress2').show();

              setTimeout(function(){
                SendReport();
              },100);
                
            }
            else{
                $('.send-report').removeClass('btn-success');
                $('.send-report').addClass('btn-warning');
                $('.send-report').text('Kindly complete the form');
            }

            
            
        });

        $('.sub_m').click(function(){
            
            var date = $(this).attr('data-month');
            //var day = $(this).attr('data-day');

            $('.fmonth').val(date);
            //$('.fday').val(day);
            $('.cdate').text(date);
        });

        $('.edit').click(function(){
            //$('#modal-edit').modelo();
        });


        function DeleteReport(type,uid){
            $.ajax({
                url: 'delete_con.php',
                type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: {type:type, uid:uid}
            })
            .done(function(data) {
                //alert(data)
                //alert(data);
                if(data == 'success'){
                    //$('.send-report').text('Successful');
                    setTimeout(function(){
                        location.reload();
                        //$('.close').click();
                    },100);
                    
                }
                else{
                    alert('Error occured. Try again later')
                    //$('.send-report').text('Error, try again later');
                }
            })
            .fail(function() {
                $('.send-report').text('Network error');
            })
            .always(function() {
                console.log("complete");
            });
        }


        $('.delete_report').click(function(event) {
            var r = confirm("Are your sure you want to delete this report ?");
            var type = $(this).attr('data-type');
            var uid = $(this).attr('data-uid');
            if(r == true){
                DeleteReport(type,uid);
                //alert(uid);
            }
            else{
                
            }
        });

      });
    </script>
</body>

</html>
