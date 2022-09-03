<?php
    include('connect.php');
    error_reporting(0);

    if(!isset($_COOKIE['SRPPUser'])){
        //header('location:login?r=daily-report');
    }
    else{

        $code = $_COOKIE['SRPPUser'];
        $sql = mysqli_query($con, "select name,email,phone,unit,rank,supervisor_email,supervisor_name from srpp_users where code = '$code'");
        $num = mysqli_num_rows($sql);
        if($num < 1){
            header('location:login?r=daily-report');
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

        }
        
    }
    




?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog Post | GoLive Blog</title>
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="froala/css/froala_editor.css">
  <link rel="stylesheet" href="froala/css/froala_style.css">
  <link rel="stylesheet" href="froala/css/plugins/code_view.css">
  <link rel="stylesheet" href="froala/css/plugins/colors.css">
  <link rel="stylesheet" href="froala/css/plugins/emoticons.css">
  <link rel="stylesheet" href="froala/css/plugins/image_manager.css">
  <link rel="stylesheet" href="froala/css/plugins/image.css">
  <link rel="stylesheet" href="froala/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="froala/css/plugins/table.css">
  <link rel="stylesheet" href="froala/css/plugins/char_counter.css">
  <link rel="stylesheet" href="froala/css/plugins/video.css">
  <link rel="stylesheet" href="froala/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="froala/css/plugins/file.css">
  <link rel="stylesheet" href="froala/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <style type="text/css" media="screen">
    div#editor {
      margin: auto;
      text-align: left;
    }

    .class1 {
      border-radius: 10%;
      border: 2px solid #efefef;
    }

    .class2 {
      opacity: 0.5;
    }
    .form-control{
            background: #f0f0f0;
            border: none;
            border-radius: 20px;
            box-shadow: none;
            padding: 5px 10px;
            height: 40px;
            transition: all 0.3s ease 0s;
            margin-bottom: 10px;
        }
    .remove-cont {position:absolute; right: 0px; width: 25px; height: 25px; border-radius: 50%; background: #333; 
        color: #fff; text-align: center; line-height: 25px; top:10%; right: 10px;}
    </style>

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
            <!-- Modal -->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
  <div class="modal-dialog" role="document" style="min-width: auto !important; max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add post </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
        
      </div>
      <div class="modal-body">
       
            </div>
      </div>
      <div class="modal-footer">

                          <!--<div class='progress2' id="progress_div">
                            <div class='bar' id='bar1'></div>
                            <div class='percent' id='percent1'>0%</div>
                          </div>-->
        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary send-report btn-xs">Submit</button>
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

                <?php //include('daily-report-counter.php') ?>

                <div class="">
                    <br />
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Blog Posts <span></span>   <button data-toggle="modal" data-target="#modal-1" class="btn btn-primary btn-xs sub_m" style="margin-left: 10px;">Add new</button></h4>
                                <div class="content-widgets">



                                   <div class="form-bg" style="width: 100%;">
                                    <div class="">
                                        <form id="freport" class="form-horizontal" style="padding-bottom: 0px; overflow-x: hidden;">
                                            
                                            
                                            <div class="form-group help" style="">
                                                <input type="hidden" name="type" value="addPost" />

                                                <label for=""><strong>Blog title</strong></label>
                                                <input name="title" class="form-control tt"/>

                                                <label for=""><strong>Blog category</strong></label>
                                                <select name="category" class="form-control tt">
                                                  <option value="">Select category</option>
                                                </select>

                                                <label for=""><strong>GoLive App</strong></label>
                                                <select name="golive" class="form-control tt">
                                                  <option value="No">No</option>
                                                  <option value="Yes">Yes</option>
                                                </select>

                                                <label for=""><strong>Tags (Separate tags with comma)</strong></label>
                                                <input name="tags" class="form-control tt"/>

                                                <label for=""><strong>Post</strong></label>
                                                 <div id="editor">
                                                  <div id='edit' style="margin-top: 0px;">
                                                   
                                                  </div>
                                                </div>
                                                
                                            </div>
                                            
                                        
                                    </div>
                                   

                                </form>
                        
                        
                        <div class="col-md-12 contentwidgets-grid1">
                                
                                <div class="widg-text">
                                    <!--<a class="btn btn-primary btn-small">Submit report</a>-->

                                    <div class="table-responsive">
                                       <table id="example4" class="table table-striped nomargin exporttable display">
                                          <thead>
                                            <tr>
                                              <th>SN</th>
                                              <th>Name</th>
                                              <th>Items</th>
                                              <th>View</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                                $sqlc = mysqli_query($con,"select * from daily_report where week = '$wk1' AND date BETWEEN '$st' AND '$st5' AND code = '$code' order by id desc");
                                                $i = 1;
                                                while($rowc = mysqli_fetch_array($sqlc)){
                                                  $dayc = $rowc['day'];
                                                  $datec = $rowc['date'];
                                                  $uidc = $rowc['uid'];

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

                                                  if($numc1 < 1){
                                                    $cc = '<a class="btn btn-sm btn-info">No comment</a>';
                                                  }
                                                  else{
                                                    if($c_sender == "Admin"){
                                                        if($numc > 1){
                                                            $cc = '<a class="btn btn-sm btn-danger" href="comments.php?uid='.$uidc.'&type=daily">'.$c_sname.' replied</a>';
                                                        }
                                                        else{
                                                            $cc = '<a class="btn btn-sm btn-danger" href="comments.php?uid='.$uidc.'&type=daily">'.$c_sname.' commented</a>';
                                                        }
                                                        
                                                      }
                                                      else{
                                                        $cc = '<a class="btn btn-sm btn-success" href="comments.php?uid='.$uidc.'&type=daily">'.$y.' replied</a>';
                                                      }
                                                  }
                                                  
                                                  echo '<tr>';
                                                  echo '<td>'.$i.'</td>';
                                                  echo '<td>'.$dayc.'</td>';
                                                  echo '<td>'.$datec.'</td>';
                                                  echo '<td><a href="edit-report?uid='.$uidc.'&redirect=daily-report&type=daily&view=true" class="btn btn-primary">View</a></td>';
                                                  echo '<td>'.$cc.'</td>';
                                                  echo '<td><a href="edit-report?uid='.$uidc.'&redirect=daily-report&type=daily" class="btn btn-success edit"><i class="fa fa-edit"></i></a> <a class="btn btn-danger delete_report" data-type="daily" data-uid="'.$uidc.'" style="margin-right:10px;"><i class="glyphicon glyphicon-trash"></i></a></td>';
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

    <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="froala/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/video.min.js"></script>

  <script>
    (function () {
      FroalaEditor.DefineIcon('imageInfo', { NAME: 'info', SVG_KEY: 'help' })
      FroalaEditor.RegisterCommand('imageInfo', {
        title: 'Info',
        focus: false,
        undo: false,
        refreshAfterCallback: false,
        callback: function () {
          var $img = this.image.get()
          alert($img.attr('src'))
        }
      })

      new FroalaEditor("#edit", {
        imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove']
      })

      $('#editor').editable("setHTML", "<p>My custom paragraph.</p>", false);

    })()
  </script>

    <script type="text/javascript">
      $(document).ready(function() {

        var editor = new LiteEditor('.summary');

        editor.registerButton({
          label: '<i class="fa fa-save save"> Save</i>',
          tag: 'span',
          className: 'editsave',
          group: 'st'
        });



        $('.save').click(function(){
            var txt = $('#summary').val();

            store.set('summaryd',txt);

        });

        

        if(store.has('summaryd')){
            var sum = store.get('summaryd');
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
            var sum = store.get('summaryd');
            $('.rec').html(sum);

            //$('.copy1').attr('data-clipboard-text', sum);
        });

        var data = '<div class="row">'
                                        +'<div class="col-md-4">'
                                            +'<label for="">Target</label>'
                                            +'<textarea name="task[]" class="form-control"></textarea>'
                                            
                                        +'</div>'

                                        +'<div class="col-md-5">'
                                            +'<label for="">Achievement</label>'
                                            +'<textarea name="description[]" class="form-control"></textarea>'
                                            +'<div class="remove-cont"><i class="glyphicon glyphicon-remove"></i></div>'
                                        +'</div>'

                                        +'<div class="col-md-3">'
                                            +'<label for="">Remark</label>'
                                            +'<textarea name="remark[]" class="form-control tt"></textarea>'
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
            $.ajax({
                url: 'ajax_con.php',
                type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: $('#freport').serialize()
            })
            .done(function(data) {
                //alert(data)
                //alert(data);
                if(data == 'success'){
                    $('.send-report').text('Successful');
                    setTimeout(function(){
                        location.reload();
                        //$('.close').click();
                    },100);
                    
                }
                else if(data == 'invalid'){
                    $('.send-report').text('Invalid access code');
                }
                else if(data == 'already'){
                    $('.send-report').text('Report already submited');
                }
                else if(data == 'null'){
                    $('.send-report').text('Enter your access code');
                }
                else{
                    $('.send-report').text('Error, try again later');
                }
            })
            .fail(function() {
                $('.send-report').text('Network error');
            })
            .always(function() {
                console.log("complete");
            });
        }


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

              setTimeout(function(){
                SendReport();
              },500);
                
            }
            else{
                $('.send-report').removeClass('btn-success');
                $('.send-report').addClass('btn-warning');
                $('.send-report').text('Kindly complete the form');
            }

            
            
        });

        $('.sub_m').click(function(){
            
            var date = $(this).attr('data-date');
            var day = $(this).attr('data-day');

            $('.fdate').val(date);
            $('.fday').val(day);
            $('.cdate').text(date);


        });


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
