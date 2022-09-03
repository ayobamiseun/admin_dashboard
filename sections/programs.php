<?php
  include('connect.php');
  session_start();
  error_reporting(0);

  if(!isset($_SESSION['SuperFM963'])){
    header('location:login?ref=programs');
  }
  else{
    
    $username = $_SESSION['SuperFM963'];
    $sql = mysqli_query($con, "select * from admins where username = '$username'");
    $num = mysqli_num_rows($sql);

    if($num < 1){
      header('location:login?ref=programs');
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
    <title>Programs | Super FM 96.3</title>
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
    <!-- modernizr css -->

   <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">-->

    <style type="text/css" media="screen">
    #upload_overlay {position:fixed; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:999939999999; display:none; overflow:auto;}
      #upload_con {position:relative; width:1200px; height:auto; padding:10px 0px; background:; margin:70px auto; 
      border-radius:5px; box-shadow:0px 0px 0px 0px #999; border:0px solid #FFF; background: url(images/bb2.jpg1) center center; background-size: cover;}

      .imageBox
      {
          position: relative;
          height: 714px;
          width: 1000px;
          border:1px solid #aaa;
          background: #fff;
          overflow: hidden;
          background-repeat: no-repeat;
          cursor:move;
      }

      .imageBox .thumbBox
      {
          position: absolute;
          top: 50%;
          left: 50%;
          width: 900px;
          height: 540px;
          margin-top: -270px;
          margin-left: -450px;
          box-sizing: border-box;
          border: 1px solid rgb(102, 102, 102);
          box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
          background: none repeat scroll 0% 0% transparent;
      }

      .imageBox .spinner
      {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          text-align: center;
          line-height: 450px;
          background: rgba(0,0,0,0.7);
      }

      .cropped img {width:100%; height:auto;}

      .hidden {display:none;}

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
            border-radius: 10px;
            box-shadow: none;
            padding: 5px 10px;
            height: 40px;
            transition: all 0.3s ease 0s;
            margin-bottom: 10px;
        }
    
        .remove-cont {position:absolute; right: 0px; width: 25px; height: 25px; border-radius: 50%; background: #333; 
    color: #fff; text-align: center; line-height: 25px; top:-20%; right: 20px; cursor: pointer;}
    </style>

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  

</head>

<body>

            <!-- Modal -->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 10000;">
  <div class="modal-dialog" role="document" style=" z-index: 10000;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add a program </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
        
      </div>
      <div class="modal-body">
          <div class="form-bg" style="width: 100%;">
                                                
            <form id="fpost" class="form-horizontal" style="padding-bottom: 0px; overflow-x: hidden;">

              <div class="form-group help" style="">
                  <input type="hidden" name="type" value="addProgram" />
                 
                  <label for=""><strong>Program day</strong></label>
                  <input name="name" class="form-control tt"/>

                  <label>show / time / oap</label>

                  <div class="row">
                    <div class="col-sm-6">
                      <input type="text" name="show[]" class="form-control tt" placeholder="Show title">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="time[]" class="form-control tt" placeholder="Day / time">
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="oap[]" class="form-control tt" placeholder="OAPs nickname">
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="details[]" class="form-control tt" placeholder="Details">
                    </div>
                  </div>
                  <hr />

                   <div class="row">
                    <div class="col-sm-6">
                      <input type="text" name=show[]" class="form-control tt" placeholder="Show title">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="time[]" class="form-control tt" placeholder="Day / time">
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="oap[]" class="form-control tt" placeholder="OAPs nickname">
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="details[]" class="form-control tt" placeholder="Details">
                    </div>
                  </div>

                  <div class="contM"></div>

                  <div style="margin:5px 0px;">
                    <div class="pull-right btn btn-xs btn-info addmoreM">+ Add more</div>
                  </div>
                            
              </div>
          </form>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary send-report btn-xs">Add</button>
      </div>
    </div>
  </div>
</div>

<!---Add more -->
        <div class="modal fade" id="modal-addmore">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add more records</h4>
              </div>
              <div class="modal-body">

                <form id="moreform">
                   
                    
                    <input type="hidden" name="type" value="addMoreProgram">

                    <input type="hidden" name="puid" class="puidE" value="">

                  <label for=""><strong class="p1">Program day</strong></label>
                  <!--<input name="name" class="form-control "/>-->

                  <label>show / time / oap</label>

                  <div class="row">
                    <div class="col-sm-6">
                      <input type="text" name="show[]" class="form-control tt1" placeholder="Show title">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="time[]" class="form-control tt1" placeholder="Day / time">
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="oap[]" class="form-control tt1" placeholder="OAPs nickname">
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="details[]" class="form-control tt1" placeholder="Details">
                    </div>
                  </div>
                  
                  
                  <div class="contA"></div>

                  <div style="margin:5px 0px;">
                    <div class="pull-right btn btn-sm btn-info addmoreA">+ Add more</div>
                  </div>
                  <div class="clearfix"></div><br />

                

                </form>
                
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left close1" data-dismiss="modal">Close</button>
                <div type="button" class="btn btn-primary addmore2">Save changes</div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <div class="form-bg" style="width: 100%;">
                        <div class="">
                            <form id="editform" class="form-horizontal" style="">
                                
                                <div class="MCEdit"></div>
                                
                                <div class="form-group help" style="">

                                     <input type="hidden" name="type" value="editShow">
                                     <input type="hidden" name="uid" id="uidE">

                                     <label>Change Order :  </label>
                                                               <select name="odr" class="form-control ttE">
                                                                <option class="orderE" value="" id="orderE">1</option>
                                                                <option value="#">#</option>
                                                                <option value="##">##</option>
                                                                <option value="#1">#1</option>
                                                                 <option value="0">0</option>                                                               
                                                                <option value="1">1</option><option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> 
                                                                <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option> <option value="32">32</option> <option value="33">33</option> <option value="34">34</option> <option value="35">35</option> <option value="36">36</option> <option value="37">37</option> <option value="38">38</option> <option value="39">39</option> <option value="40">40</option> <option value="41">41</option> <option value="42">42</option> <option value="43">43</option> <option value="44">44</option> <option value="45">45</option> <option value="46">46</option> <option value="47">47</option> <option value="48">48</option> <option value="49">49</option> <option value="50">50</option> <option value="51">51</option> <option value="52">52</option>
                                    </select>
                                    
                                     <label for=""><strong>Program name</strong></label>
                                     <input name="name" id="nameE" class="form-control ttE"/>

                                    <label for=""><strong>Show title</strong></label>
                                    <input name="show" id="showE" class="form-control ttE"/>

                                    <label for=""><strong>Day / time</strong></label>
                                    <input name="time" id="timeE" class="form-control ttE"/>

                                    <label for=""><strong>OAPs nickname</strong></label>
                                    <input name="oap" id="oapE" class="form-control ttE"/>

                                    <label for=""><strong>Details</strong></label>
                                    <input name="details" id="detailsE" class="form-control ttE"/>

                                    
                                    
                                </div>

                        </form>
                    </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-xs close1" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-xs edit"">Update</button>
      </div>
    </div>
  </div>
</div>
    

 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deleteModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Delete this show</h4>
                                    </div>
                                    <div class="modal-body">
                            
                                       <p>Are you sure you want to delete this show ?</p>
                                       <form role="form" id="delform">
                                           <input type="text" class="duid">
                                           <input type="text" class="dtype">
                                       </form>


                                    </div>

                                    <div class="modal-footer">
                                        <div class="btn btn-default close1" data-dismiss="modal">Close</div>
                                        <div class="btn btn-success Cdelete">Delete</div>
                                    </div>


                                </div>
                            </div>
                        </div>


          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deleteAllModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Delete this program</h4>
                                    </div>
                                    <div class="modal-body">
                            
                                       <p>Are you sure you want to delete this program ?</p>
                                       <form role="form" id="delform">
                                           <input type="hidden" class="duid">
                                           <input type="hidden" class="dtype">
                                       </form>


                                    </div>

                                    <div class="modal-footer">
                                        <div class="btn btn-default close1" data-dismiss="modal">Close</div>
                                        <div class="btn btn-success Cdelete">Delete</div>
                                    </div>


                                </div>
                            </div>
                        </div>

        <a href="#deleteModal" data-toggle="modal" class="del"></a>
        <a href="#deleteAllModal" data-toggle="modal" class="delAll"></a>

   <a href="#editModel" data-toggle="modal" class="edt"></a>
   <a href="#modal-addmore" data-toggle="modal" class="adm"></a>

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

                <?php //echo $date = gmdate('l, d F Y');//include('daily-report-counter.php') ?>

                <div class="">
                    <br />
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Programs <button data-toggle="modal" data-target="#modal-1" class="btn btn-primary btn-xs addn" style="margin-left: 10px;">Add new</button></h4>
                                
                            </div>
                        </div>

                        <br />

                        
                <?php 

                    $sqlp = mysqli_query($con,"select * from programs");
                    while ($rowp = mysqli_fetch_array($sqlp)) {
                        $puid = $rowp['uid'];
                        $namep = $rowp['name'];
                        echo '<div class="card">
                            <div class="card-body"><h4 class="header-title">'.$namep.'</h4>
                                            <div class="content-widgets">
                                            <div class="col-md-12 contentwidgets-grid1">
                                                  
                                                  <div class="widg-text" style="">
                                                      <!--<a class="btn btn-primary btn-small">Submit report</a>-->

                                                      <div class="table-responsive">
                                                         <table id="example4" class="table table-striped nomargin exporttable display">
                                                            <thead>
                                                              <tr>
                                                                <th>SN</th>
                                                                <th>ODR</th>
                                                                <th>Show title</th>
                                                                <th>Day / Time</th>
                                                                <th>Action</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody class="">';

                                            $sqls = mysqli_query($con,"select * from shows where puid = '$puid' order by odr asc");
                                            $i = 1;
                                            while ($rows = mysqli_fetch_array($sqls)) {
                                                   $titles = $rows['title'];
                                                   $times = $rows['time'];
                                                   $uids = $rows['uid'];
                                                   $odrs = $rows['odr'];
                                                   $details = $rows['details'];
                                                   echo '<tr>
                                                        <td>'.$i.'</td>
                                                        <td>'.$odrs.'</td>
                                                        <td>'.$titles.' - '.$details.'</td>
                                                        <td>'.$times.'</td>
                                                        <td>
                                    
                                                            <div class="btn btn-primary btn-xs edit1" data-uid="'.$uids.'" data-name="'.$namep.'">Edit</div>
                                                            <div class="btn btn-danger btn-xs delete" data-uid="'.$uids.'" style="margin-left:5px"><i class="fa fa-trash"></i></div>

                                                        </td>
                                                      </tr>';

                                                      $i++;
                                            }

                                             echo '<tr>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td><div class="btn btn-success btn-sm addition" data-name="'.$namep.'" data-puid="'.$puid.'"style="margin:0px 5px;">+ Add more records</div></td>
                                            </tr>';

                                            echo '</tbody>
                                                  </table>
                                                </div>
                                          </div>
                                      </div>
                        
                                    <div style="width: 100%; text-align: center;">
                                        <div style="margin:0px auto; width: 200px;" class="btn btn-danger btn-xs deleteall" data-deleteAll="'.$puid.'">Delete this program</div>
                                    </div>
                                </div>
                            </div>
                                
                        </div>';
                                        }
                ?>
                                                    
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
   
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/cropbox.js"></script>

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

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        var data1 = '<hr /><div class="row">'
                              +'<br /><div class="col-sm-6">'
                                +'<input type="text" name="show[]" class="form-control tt" placeholder="Show title">'
                                
                              +'</div>'

                              +'<div class="col-sm-6">'
                                +' <input type="text" name="time[]" class="form-control tt" placeholder="Day / time">'
                                
                              +'</div>'

                              +'<div class="col-sm-12">'
                                +' <input type="text" name="oap[]" class="form-control tt" placeholder="OAPs nickname">'
                                +'<div class="remove-cont"><i class="fa fa-remove"></i></div>'
                              +'</div>'
                              +'<div class="col-sm-12">'
                                +'<input type="text" name="details[]" class="form-control tt" placeholder="Details">'
                              +'</div>'
                              
                            +'</div>';

    $('.addmoreM').click(function(){
      $('.contM').append(data1);
      //$('.cont').remove(data);

      $('.remove-cont').click(function(){
        var parent = $(this).parent().parent();
        parent.find('input').attr('disabled', 'true');
        parent.remove();
        //alert(parent);
      });
    });

    
    var dataM = '<hr /><div class="row">'
                              +'<br /><div class="col-sm-6">'
                                +'<input type="text" name="show[]" class="form-control tt1" placeholder="Show title">'
                                
                              +'</div>'

                              +'<div class="col-sm-6">'
                                +' <input type="text" name="time[]" class="form-control tt1" placeholder="Day / time">'
                                
                              +'</div>'

                              +'<div class="col-sm-12">'
                                +' <input type="text" name="oap[]" class="form-control tt1" placeholder="OAPs nickname">'
                                +'<div class="remove-cont"><i class="fa fa-remove"></i></div>'
                              +'</div>'
                               +'<div class="col-sm-12">'
                                +'<input type="text" name="details[]" class="form-control tt1" placeholder="Details">'
                              +'</div>'
                              
                            +'</div>';

    $('.addmoreA').click(function(){
      $('.contA').append(dataM);
      //$('.cont').remove(data);

      $('.remove-cont').click(function(){
        var parent = $(this).parent();
        parent.find('input').attr('disabled', 'true');
        parent.remove();
        //alert(parent);
      });
    });


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
                SendPost();
              },500);
                
            }
            else{
                $('.send-report').removeClass('btn-success');
                $('.send-report').addClass('btn-warning');
                $('.send-report').text('Kindly complete the form');
            }

        });

        function SendPost(){

           var formData = new FormData($('#fpost')[0]);

            $.ajax({
                url: 'ajax_con.php',
                type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                //data: $('#fpost').serialize()
                type: 'POST',
                data: formData,
                //async: false,
                cache: false,
                contentType: false,
                //enctype: 'multipart/form-data',
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
                            //$("#bar1").css("width", + percent +"%");
                            $('.send-report').text("Processing.."+percent +"%");
                        }, true);
                    }
                    return xhr;
                },
                enctype: 'multipart/form-data',
                mimeType:"multipart/form-data"
            })
            .done(function(data) {
                //alert(data);
                if(data == 'success'){
                    $('.send-report').text('Add more');
                    $('#fpost')[0].reset();
                    $('.cropped').html('');

                    //window.location.reload();
                    
                }
                else if(data == 'error'){
                    $('.send-report').text('Error creating post');
                }
                else if(data == 'already'){
                    $('.send-report').text('Report already submited');
                }
                else if(data == 'null'){
                    $('.send-report').text('Complete the form');
                }
                else if(data == 'image'){
                    $('.send-report').text('Select a picture');
                }
                else if(data == 'image_error'){
                    $('.send-report').text('Picture not uploaded');
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


        var stat = false;

        $('.addmore2').click(function(){

            $('.tt1').each(function(index, val) {
       
               var dd = $(this).val();
               //Materialize.toast(dd,3000);

               if(dd.length < 1){
                  $(this).css({'border-bottom':'1px solid red'});
                   $('.addnew').text('Complete the form');
                   $('.addnew').addClass('red');
                   stat = false;
               }
               else{
                 $(this).css({'border-bottom':'1px solid grey'});
                 stat = true;
                 
               }

              
            });

            if(stat == true){
               $('.addmore2').removeClass('btn-danger');
                $('.addmore2').addClass('btn-info');
                $('.addmore2').text('Prosessing');
              setTimeout(function(){
                AddMoreRecord();
              },500);
                
            }
            else{
                $('.addmore2').removeClass('btn-success');
                $('.addmore2').addClass('btn-warning');
                $('.addmore2').text('Kindly complete the form');
            }

        });

        function AddMoreRecord(){
                var formData = new FormData($('#moreform')[0]);

                $.ajax({
                    url: 'ajax_con.php',
                    //type: 'POST',
                    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                    //data: $('#addform').serialize()
                    type: 'POST',
                    data: formData,
                    //async: false,
                    cache: false,
                    contentType: false,
                    //enctype: 'multipart/form-data',
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
                                //$("#bar1").css("width", + percent +"%");
                                $('.addmore2').text("Processing.."+percent +"%");
                            }, true);
                        }
                        return xhr;
                    },
                    enctype: 'multipart/form-data',
                    mimeType:"multipart/form-data"
                })
                .done(function(data) {
                    //alert(data);
                    if(data == "success"){
                        $('.addmore2').text('Added');
                        $('#moreform')[0].reset();
                        $('.close1').click();

                         //window.location.reload();
                      
                        //GetData();
                    }
                    else if(data == "error"){
                        $('.addmore2').removeClass('btn-success');
                        $('.addmore2').addClass('btn-danger');
                        $('.addmore2').text('Error adding');
                    }
                    else if(data == "image_error"){
                        $('.addmore2').removeClass('btn-success');
                        $('.addmore2').addClass('btn-danger');
                        $('.addmore2').text('Image not uploaded');
                    }
                    else if(data == "null"){
                        $('.addmore2').removeClass('btn-success');
                        $('.addmore2').addClass('btn-danger');
                        $('.addmore2').text('Please complete the form');
                    }
                    else if(data == "upload_error"){
                        $('.addmore2').removeClass('btn-success');
                        $('.addmore2').addClass('btn-danger');
                        $('.addmore2').text('Image not uploaded');
                    }
                })
                .fail(function() {
                    $('.addmore2').removeClass('btn-success');
                    $('.addmore2').addClass('btn-danger');
                    $('.addmore2').text('Network error');
                    
                })
                .always(function() {
                    console.log("complete");
                });

        }


        $('.addition').click(function(){
                  var name = $(this).attr('data-name');
                  var puid = $(this).attr('data-puid');

                  //alert(class1);

                  $('.puidE').val(puid);
                  $('.p1').val(name);

                  $('.adm').click();
                  

        });

        //var category = "<?php echo $cat; ?>";

        $('.delete').click(function(event) {
            $('.del').click();
            var uid =  $(this).attr("data-uid");


            $('.duid').val(uid);
            $('.dtype').val('delShow');
                    
         });


        $('.deleteall').click(function(event) {
            $('.delAll').click();
            var uid =  $(this).attr("data-deleteAll");

            $('.duid').val(uid);
            $('.dtype').val('delProgram')

            //alert(uid);
                    
         });

        $('.edit1').click(function(event) {
            $('.edt').click();
            var uid =  $(this).attr("data-uid");
            var name =  $(this).attr("data-name");
            $('#nameE').val(name);
            GetOne(uid);
                   //alert(uid)
                    
        });

        function GetData(){

        $('.MClist').html('<span class="fa fa-spin fa-spinner fa-3x" style="color:#36c;"></span>');
        $.getJSON('j_admins.php', function(data) {
          $('.MClist').html('');
          //alert(data.Feed.length);
          $.each(data.Feed, function(i,result){

            var newRow =               
                            
                                         '<tr class="clm" data-status="'+result.status+'" >'
                                          +'<td><div class="'+result.uid+' btn btn-info btn-xs edit1" data-uid="'+result.uid+'">'+result.sn+'</div></td>'
                                          +'<td>'+result.name+'</td>'
                                          +'<td>'+result.username+'</td>'
                                          +'<td>'+result.password+'</td>'
                                           +'<td>'
                                            +'<label class="checkbox-inline">'
                                              +'<input class="toggle1" data-uid="'+result.uid+'" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">'
                                            +'</label>'
                                          +'</td>'
                                          +'<td>'
                                              +'<div class="btn btn-primary btn-xs edit1" data-uid="'+result.uid+'" style="margin:0px 5px;">Edit</div>'
                                              +'<div class="btn btn-danger btn-xs delete" data-uid="'+result.uid+'"><i class="fa fa-trash"></i></div>'
                                            +'</td>'
                                          +'</tr>';
            
            $(newRow).appendTo('.MClist');
       
          });

          $('.clm').each(function(){
              var parent = $(this);
              var status = parent.attr('data-status');
             
              if(status == "on"){
                parent.find('input:eq(0)').prop('checked', true);
              }

              
            });

           $('.delete').click(function(event) {
               $('.del').click();
               var uid =  $(this).attr("data-uid");

               $('.duid').val(uid);
               $('.dtype').val('delBanner')
                
            });

            $('.edit1').click(function(event) {
               $('.edt').click();
               var uid =  $(this).attr("data-uid");
               GetOne(uid);
               //alert(uid)
                
            });

            $('.toggle1').change(function(){
              var uid = $(this).attr('data-uid');
              if(this.checked){
                Ajx_live(uid,"on","admin");
                //$.toaster({ message : "Enabled",priority : 'info'});
              }
              else{
                Ajx_live(uid,"off","admin");
                //$.toaster({ message : "Disabled ",priority : 'info'});
              }
            });

            $('.toggle1').bootstrapToggle();

        });

        $('.Cdelete').click(function(){
          Ajax_delete();
        });

        $('.edit').click(function(){
            //Edit();
        });
    }

    GetData();

    function Ajax_delete(){

        $('.Cdelete').removeClass('btn-danger');
        $('.Cdelete').addClass('btn-info');
        $('.Cdelete').text('Prosessing');

        var uid = $('.duid').val();
        var type = $('.dtype').val();

        $.ajax({
            url: 'ajx_delete.php',
            type: 'POST',
            //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {uid:uid, type:type}
        })
        .done(function(data) {
            //alert(data);
            if(data == "success"){
                GetData();
                $('.Cdelete').removeClass('btn-danger');
                $('.Cdelete').addClass('btn-succes');
                $('.Cdelete').text('Deleted');
                $('.close1').click();
                window.location.reload();
            }
            else if(data == "error"){
                 $('.Cdelete').removeClass('btn-success');
                 $('.Cdelete').addClass('btn-danger');
                 $('.Cdelete').text('Error');
            }
        })
        .fail(function() {
                $('.Cdelete').removeClass('btn-success');
                $('.Cdelete').addClass('btn-danger');
                $('.Cdelete').text('Network error');
        })
        .always(function() {
            console.log("complete");
        });
        
    }

    function Ajx_live(uid,status,type){
      $.ajax({
        url: 'ajx_live.php',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {uid: uid, status:status, type:type},
      })
      .done(function(data) {
        if(data == "success"){
          $.toaster({ message : "Successful",priority : 'success'});
        }
        else if(data == "null"){
          $.toaster({ message : "Disabled ",priority : 'error'});
        }
        else{
          $.toaster({ message : "Error trya gain later ",priority : 'error'});
        }
      })
      .fail(function() {
        $.toaster({ message : "Network error ",priority : 'info'});
      })
      .always(function() {
        console.log("complete");
      });
      
    }


    function Ajx_oder(uid, type,order){
      $.ajax({
        url: 'ajx_order.php',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {uid: uid, type:type, odr:order},
      })
      .done(function(data) {
        if(data == "success"){
          $.toaster({ message : "Successful",priority : 'success'});
        }
        else if(data == "null"){
          $.toaster({ message : "Null ",priority : 'error'});
        }
        else{
          $.toaster({ message : "Error trya gain later ",priority : 'error'});
        }
      })
      .fail(function() {
        $.toaster({ message : "Network error ",priority : 'info'});
      })
      .always(function() {
        console.log("complete");
      });
      
    }

      $('.edit').click(function(event) {

         $('.ttE').each(function(index, val) {
       
               var dd = $(this).val();
               //Materialize.toast(dd,3000);

               if(dd.length < 1){
                  $(this).css({'border-bottom':'1px solid red'});
                   $('.edit').text('Complete the form');
                   $('.edit').addClass('red');
                   stat = false;
               }
               else{
                 $(this).css({'border-bottom':'1px solid grey'});
                 stat = true;
                 
               }

              
            });

            if(stat == true){
                $('.edit').removeClass('btn-danger');
                $('.edit').addClass('btn-info');
                $('.edit').text('Prosessing');
                setTimeout(function(){
                  Edit()
                },100);
            }
            else{
                $('.edit').removeClass('btn-success');
                $('.edit').addClass('btn-warning');
                $('.edit').text('Kindly complete the form');
            }
    });
          


    function GetOne(uid){

        $('.MCEdit').html('<span class="fa fa-spin fa-spinner fa-3x" style="color:blue;"></span>');
        $.getJSON('j_shows.php',{uid:uid}, function(data) {
          $('.MCEdit').html('');
          //alert(data.Feed.length);
          $.each(data.Feed, function(i,result){
            
            $('#uidE').val(result.uid);
            $('#showE').val(result.title);
            $('#timeE').val(result.time);
            $('#oapE').val(result.oap);
            $('.orderE').val(result.odr);
            $('.orderE').text(result.odr);
            $('#detailsE').val(result.details);

            //alert(result.details);

          });
           
        });
    }

   // alert('dd');

    $('.clkth1').click(function(){
            $('.selth1').click();
          });

          $('.clkart1').click(function(){
            $('.selart1').click();
          });

    $('#selart1').on('change', function(){
          
             var options =
              {
                  thumbBox: '.thumbBox',
                  spinner: '.spinner',
                  imgSrc: 'avatar.png'
              }
             cropper = $('.imageBox').cropbox(options);

             $('#upload_overlay').fadeIn()
              var reader = new FileReader();
              reader.onload = function(e) {
                  options.imgSrc = e.target.result;
                  cropper = $('.imageBox').cropbox(options);
              }
              reader.readAsDataURL(this.files[0]);
              this.files = [];
              //alert('d')
    });


    function Edit(){

                var formData = new FormData($('#editform')[0]);

            $.ajax({
                url: 'edit_con.php',
                //type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                //data: $('#editform').serialize()
                type: 'POST',
                data: formData,
                //async: false,
                cache: false,
                contentType: false,
                //enctype: 'multipart/form-data',
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
                            //$("#bar1").css("width", + percent +"%");
                            $('.edit').text("Processing.."+percent +"%");
                        }, true);
                    }
                    return xhr;
                },
                enctype: 'multipart/form-data',
                mimeType:"multipart/form-data"
            })
            .done(function(data) {
               // alert(data);
                if(data == "success"){
                    $('.edit').text('Update');
                    $('#editform')[0].reset();
                    $('.close1').click();
                    $('.cropped').html('');
                    $('.ac').val('');
                    //window.location.reload();
                }
                else if(data == "error"){
                    $('.edit').removeClass('btn-success');
                    $('.edit').addClass('btn-danger');
                    $('.edit').text('Error adding');
                }
                else if(data == "image"){
                    $('.edit').removeClass('btn-success');
                    $('.edit').addClass('btn-danger');
                    $('.edit').text('Select image');
                }
                else if(data == "image_error"){
                    $('.edit').removeClass('btn-success');
                    $('.edit').addClass('btn-danger');
                    $('.edit').text('Image upload failed');
                }
                else if(data == "null"){
                    $('.edit').removeClass('btn-success');
                    $('.edit').addClass('btn-danger');
                    $('.edit').text('Please complete the form');
                }
            })
            .fail(function() {
                $('.edit').removeClass('btn-success');
                $('.edit').addClass('btn-danger');
                $('.edit').text('Network error');
            })
            .always(function() {
                console.log("complete");
            });
        }

      });
    </script>
</body>

</html>
