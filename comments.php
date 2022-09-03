<?php
  include('connect.php');
  session_start();
  error_reporting(0);

  if(!isset($_SESSION['******'])){
    header('location:login?ref=comments');
  }
  else{
    
    $username = $_SESSION['******'];
    $sql = mysqli_query($con, "select * from admins where username = '$username'");
    $num = mysqli_num_rows($sql);

    if($num < 1){
      header('location:login?ref=comments');
    }
    else{

      $row = mysqli_fetch_array($sql);
      $name = $row['name'];
      $username = $row['username'];
      //$privilage = $row['privilage'];
    
      
    }

    
  }
  




?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Comments | Super FM 96.3</title>

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

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style type="text/css" media="screen">
        .form-inp {border:1px solid #ccc; background: transparent; 
          text-indent: 0px; border-radius: 10px; font-size: 12px; 
          padding: 0px 10px; color: #eee; margin-right: 5px; margin-left: 10px;
          height: 30px;
          color: #333;
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
                <h5><?php 

                $hour = date('H', time());

                $n = explode('',$name);

                if( $hour > 6 && $hour <= 11) {
                  echo "<b><span style=''>Good Morning</span></b> ".$name;
                }
                else if($hour > 11 && $hour <= 16) {
                  echo "<b><span style=''>Good Afternoon</span></b> ".$name;
                }
                else if($hour > 16 && $hour <= 23) {
                  echo "<b><span style=''>Good Evening</span></b> ".$name;
                }
                else {
                  echo "<b><span style=''>Welcome </span></b> ".$name;
                }
             ?>
             </h5>

                <div class="row">
                    <!-- seo fact area start -->
                    

                    <div class=" col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title text-white1 bg11">Comments <input type="text" name="dates" class="form-inp date22" style=""><div class="btn btn-xs btn-secondary btn-round filter2">Filter</div> <div class="btn btn-xs btn-success btn-round reset2">Reset</div></h4>
                                
                                 <div>
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                          <th>SN</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Country</th>
                                          <th>Comment</th>
                                          <th>date</th>
                                          <th>Action</th>
                                        </thead>
                                        <tbody class="comment-list">
                                          
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

     <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

     <script src="https://www.gstatic.com/firebasejs/7.9.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.9.2/firebase-firestore.js"></script>
    <script type="text/javascript" src="assets/js/jquery.timeago.js"></script>

    <script type="text/javascript">
    
    var firebaseConfig = {
    apiKey: "AIzaSyAA75MqiDryUEYzfhSPMmCQtnY8CQOBajk",
    authDomain: "superfm-37845.firebaseapp.com",
    databaseURL: "https://superfm-37845.firebaseio.com",
    projectId: "superfm-37845",
    storageBucket: "superfm-37845.appspot.com",
    messagingSenderId: "692479171878",
    appId: "1:692479171878:web:7791f42b80405701a2b5e7",
    measurementId: "G-K9WL8VTNKX"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


    var db = firebase.firestore();

</script>


    <script>
    $(function() {
      $('input[name="dates"]').daterangepicker({
        opens: 'right',
        //timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          //format: 'M/DD hh:mm A'
          format: 'YYYY/MM/DD'
        },
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, function(start, end, label) {
        //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
</script>

    <script type="text/javascript">
      $(document).ready(function() {


        function GetComments(){
            //db.collection("GoLiveBlog").doc("goliveblog").collection("Comments").where('uid','==',uid)
            var i = 1;
            db.collection("Comments").orderBy("date")
                    .onSnapshot(function(querySnapshot) {
                var cities = [];
                
                
                querySnapshot.forEach(function(doc) {
                    //cities.push(doc.data().name);
                    //alert(doc.id);
                    var name = doc.data().name;
                    var email = doc.data().email;
                    var date = doc.data().date;
                    var country = doc.data().country;
                    var comment = doc.data().comment;
                   
                    var usr1 =  '<tr class="clm">'
                                          +'<td><div class="'+doc.id+' edit1" data-uid="'+doc.id+'">'+i+'</div></td>'
                                          +'<td>'+name+'</td>'
                                          +'<td>'+email+'</td>'
                                          +'<td>'+country+'</td>'
                                          +'<td>'+comment+'</td>'
                                          +'<td><time class="timeago" datetime="'+date+'">'+date+'</time></td>'
                                          +'<td>'
                                          +'<div class="edit1 btn btn-xs btn-round btn-info mr-2" data-uid="'+doc.id+'">View</div>'
                                          +'<div class="delete btn btn-xs btn-round btn-danger" data-uid="'+doc.id+'"><i class="fa fa-trash"></i></div>'
                                          +'</td>';
                                        
                        +'</tr>';

                    $(usr1).prependTo('.comment-list');

                });
                $("time.timeago").timeago();
                i++;


                //console.log("Current cities in CA: ", cities.join(", "));
            });
        }

         GetComments();



            Highcharts.chart('socialads3', {
              chart: {
                  type: 'column'
              },
              title: false,
              xAxis: {
                  categories: ['1st', '2nd', '3rd', '4th', 'AVG']
              },
              colors: ['#F5CA3F', '#E5726D', '#12C599', '#5F73F2'],
              yAxis: {
                  min: 0,
                  title: true
              },
              tooltip: {
                  pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                  shared: true
              },
              plotOptions: {
                  column: {
                      stacking: 'column'
                  }
              },
              series: [{
                      name: 'Traf',
                      data: [51, 48, 64, 48, 84]
                  }, {
                      name: 'Eng',
                      data: [83, 84, 53, 81, 88]
                  }, {
                      name: '.',
                      data: [93, 84, 53, 53, 48]
                  },
                  {
                      name: '.',
                      data: [30, 40, 80, 90, 74]
                  }
              ]
          });
      });
    </script>
</body>

</html>
