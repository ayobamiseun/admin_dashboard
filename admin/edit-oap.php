<?php
    include('connect.php');
    session_start();
    error_reporting(0);

    if(!isset($_SESSION['SuperFM963'])){
      header('location:login?ref=oaps');
    }
    else{
      
      $username = $_SESSION['SuperFM963'];
      $sql = mysqli_query($con, "select * from admins where username = '$username'");
      $num = mysqli_num_rows($sql);

      if($num < 1){
        header('location:login?ref=oaps');
      }
      else{

        $row = mysqli_fetch_array($sql);
        $name = $row['name'];
        $username = $row['username'];
        //$privilage = $row['privilage'];
      
        $sqle = mysqli_query($con,"select * from oaps where uid = '$_REQUEST[uid]'");
        $rowe = mysqli_fetch_array($sqle);
        $name = $rowe['name'];
        $details = $rowe['details'];
        $nick = $rowe['nick'];
        $show = $rowe['shows'];
        $odr = $rowe['odr'];
        //$category = $rowe['category'];
        //$golive = $rowe['goliveapp'];
        $thumb = $rowe['picture'];
        //$tag = $rowe['tag'];
        $uid = $rowe['uid'];
      }

      
    }

  

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OAPS | Super FM 96.3</title>
    <?php include('meta.php') ?>
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

    <!--<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />-->

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
    #upload_overlay {position:fixed; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:999939999999; display:none; overflow:auto;}
      #upload_con {position:relative; width:800px; height:auto; padding:10px 0px; background:; margin:70px auto; 
      border-radius:5px; box-shadow:0px 0px 0px 0px #999; border:0px solid #FFF; background: url(images/bb2.jpg1) center center; background-size: cover;}

      .imageBox
      {
          position: relative;
          height: 600px;
          width: 500px;
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
          width: 400px;
          height: 500px;
          margin-top: -250px;
          margin-left: -200px;
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
          line-height: 312.5px;
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
        color: #fff; text-align: center; line-height: 25px; top:10%; right: 10px;}
    </style>

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  

</head>

<body>

   

<div id="upload_overlay" style="display:none;">
<div id="upload_con">
  <div id="up_close" class="btn btn-danger btn-rounded" style="position:absolute; top:-50px; right:0px; ">close</div>
    
  <div></div>
  
    <!--
    <div style="width:auto; max-width:400px; height:auto;"><img class="cropimage" alt="" src="" style="width:100%; height:auto;"/></div>
    <br /><p>
    <div class="button button-block button-3d-primary button-rounded" id="crop" style="display:none;">Done</div>
    </p>
    -->
    <div class="container">
    <div class="imageBox">
        <div class="thumbBox"></div>
        <div class="spinner" style="display: none">Loading...</div>
    </div>
    <div class="action">
      <div class="ac_out" style="display:none;"></div>
      
        
        <form id="fart" name="fart" method="post" action="profile_art_con.php">
          <div id="art_out"></div>
          <input type="file" style="visibility:hidden;" class="filez" id="artfile" name="artfile" />
            <input type="hidden" name="type" value="art" />
            <input type="hidden" name="email" value="<?php echo $email; ?>" />
        </form>
        
        <div id="confirmButton"></div>
        <img class="confirmImg" src="" style="display:none;" />
        <!--<input type="button" id="btnCrop" value="Crop" style="float: right">
        <input type="button" id="btnZoomIn" value="+" style="float: right; right:">
        <input type="button" id="btnZoomOut" value="-" style="float: right">-->
        <div style="display:table; height:auto; width:100%;">
          <div style="float:left;">
              <div class="btn btn-primary" id="btnCrop">Crop</div>
                <div class="btn btn-success" id="crop_close" style="">Done</div>
            </div>
            
            <div style=" margin-left:50px;">
              
              <div class="btn btn-info" id="btnZoomIn" style="margin-right: 5px; margin-left: 10px;">+</div>
                <div class="btn btn-info" id="btnZoomOut">-</div>
            </div>
        </div>
    </div>
    <div class="cropped" style="margin:5px auto; position:relative; margin-top:10px; width:100px; height:100px;">

    </div>
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

                <?php //echo $date = gmdate('l, d F Y');//include('daily-report-counter.php') ?>

                <div class="">
                    <br />
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Edit Blog Posts <span></span> </h4>
                                <div class="content-widgets">

                                  <form id="fupload">
                                     <input type="hidden" name="file" class="fupload" />
                                 </form>
                        
                        
                        <div class="col-md-12 contentwidgets-grid1">
                                
                                <div class="widg-text" style="">
                                    <!--<a class="btn btn-primary btn-small">Submit report</a>-->

                                     <div class="form-bg" style="width: 100%;">
                                                <div class="">
                                                    <form id="fpost" class="form-horizontal" style="padding-bottom: 0px; overflow-x: hidden;">
                                                        
                                                        
                                                        <div class="form-group help" style="">
                                                            <input type="hidden" name="type" value="editOAP" />
                                                            <input type="hidden" name="uid" value="<?php echo $uid; ?>" />
                                                            <input type="file" class="selart" id="selart" style="display:none;">

                                                            <input type="hidden" name="art" id="imgart1" class="ac">

                                                            <input type="hidden" name="uid" value="<?php echo $uid; ?>">

                                                            <label for=""><strong>Full name</strong></label>
                                                            <input name="name" value="<?php echo $name; ?>" class="form-control tt"/>

                                                           
                                                  
                                                            <div class="link" style="display: none1;">
                                                               <label for=""><strong>Nickname</strong></label>
                                                              <input name="nick" value="<?php echo $nick; ?>" class="form-control tt"/>
                                                            </div>

                                                            <div class="link" style="display: none1;">
                                                               <label for=""><strong>Show title</strong></label>
                                                              <input name="shows" value="<?php echo $show; ?>" class="form-control tt"/>
                                                            </div>

                                                            <label>Change Order :  </label>
                                                               <select name="odr" class="form-control tt">
                                                                <option class="orderE" value="<?php echo $odr; ?>" id="orderE"><?php echo $odr; ?></option>
                                                                <option value="#">#</option>
                                                                <option value="##">##</option>
                                                                <option value="#1">#1</option>
                                                                 <option value="0">0</option>                                                               
                                                                <option value="1">1</option><option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> 
                                                                <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option> <option value="32">32</option> <option value="33">33</option> <option value="34">34</option> <option value="35">35</option> <option value="36">36</option> <option value="37">37</option> <option value="38">38</option> <option value="39">39</option> <option value="40">40</option> <option value="41">41</option> <option value="42">42</option> <option value="43">43</option> <option value="44">44</option> <option value="45">45</option> <option value="46">46</option> <option value="47">47</option> <option value="48">48</option> <option value="49">49</option> <option value="50">50</option> <option value="51">51</option> <option value="52">52</option>
                                                            </select>

                                                            <br />
                                                            <label for="">Upload Profile picture</label>
                                                            <div class="row" style="margin-bottom: 20px;">
                                                              <div class="col-md-4"><div class="btn btn-info btn-xs clkart" id="">Change picture</div></div>
                                                              <div class="col-md-8"><!--<img src="" id="imgart" style="max-width:100px">-->
                                                                <div class="cropped" style="position:relative; margin-top:0px;">
                                                                  <img src="<?php echo $thumb ?>" style="max-width:100px">
                                                                </div>
                                                              </div>
                                                            </div>

                                                            <input type="hidden" name="details" value="" class="edit_text" />

                                                            <div class="progress pro1" style="height: 30px; display:none;">
                                                              <div class="progress-bar pro-count progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>


                                                            <label for=""><strong>Post</strong></label>
                                                             <div id="editor" style="">
                                                              <div id='edit' style="margin-top: 0px; ">
                                                                <?php echo $details; ?>
                                                              </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    
                                                </div>
                                               

                                                </form>

                                                <div class="modal-footer" style="border-top: 0px;">
        
                                                  <button role="button" class="btn-close btn" aria-label="close-modal" data-modal="close-modal">Close</button>
                                                  <div role="button" class="send-report btn btn-primary sub btn-xs send-post">Update</div>
                                                </div>
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


  
<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/js/froala_editor.pkgd.min.js"></script>-->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script>

    var editor = "";
    var editorInstance;

    (function () {
      editorInstance = new FroalaEditor('#edit', {
        events: {
          'image.beforeUpload': function (files) {
            editor = this
                
            $('.pro1').show();

            if (files.length) {
              var reader = new FileReader()
              reader.onload = function (e) {
                var result = e.target.result

                $('.fupload').val(result);

                /*var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'uploads.php');
                xhr.onload = function() {

                }*/

                var formData = new FormData($('#fupload')[0]);

                $.ajax({
                    url: 'image_uploads.php',
                    type: 'POST',
                    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                    //data: $('#fpost').serialize()
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

                                $('.pro-count').text(percent +"%");
                                $('.pro-count').css({'width':percent +'%'});
                                $('.pro-count').attr('aria-valuenow',percent);
                                //update progressbar
                                //$("#bar1").css("width", + percent +"%");
                                //$('.send-report').text("Processing.."+percent +"%");
                            }, true);
                        }
                        return xhr;
                    },
                    enctype: 'multipart/form-data',
                    mimeType:"multipart/form-data"
                })
                .done(function(data) {
                  //alert(data);
                  $('.pro1').hide();
                  editor.image.insert(data, null, null, editor.image.get())
                    
                })
                .fail(function() {
                    $('.send-report').text('Network error');
                })
                .always(function() {
                    console.log("complete");
                });

                //alert(result)
                //editor.image.insert("https://cloveworld.org/mobile/admin/news/art/5df9146154e0fg3hx085u2yk41576604769.jpg", null, null, editor.image.get())
              }
              reader.readAsDataURL(files[0])
            }
            return false
          }
        }
      })
    })()

    /*var editor = "";

    (function () {
      FroalaEditor.DefineIcon('imageInfo', { NAME: 'info', SVG_KEY: 'help' })
      

      editor = new FroalaEditor("#edit", {
        imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove']
      })

      editor.clean.html('<p dummy="test">foo</p><p>bar</p>');
      //$('#editor').editable("setHTML", "<p>My custom paragraph.</p>", false);

    })()*/


    /*var editor = new FroalaEditor('#edit', {}, function () {
      // Call the method inside the initialized event.
      editor.editInPopup.update();

      //editor.codeView.get();
      //editor.codeView.toggle();
      //editor.core.getXHR('http://google.com', 'GET');
      //alert(data);

      //editor.embedly.add('http://video.example.com/video/pFhkluiEW');
      if(editor.core.isEmpty()){
        //alert('Empty');
      }
      else{
        //alert('Filled');
      }

      //alert(editor.html.get());

    })*/

    

  </script>

    <script type="text/javascript">
      $(document).ready(function() {

          $('.clkart').click(function(){
            $('.selart').click();
          });

          $('#type2').change(function(){
            var val = $(this).val();
            if(val == "Text"){
              $('.link').hide();
            }
            else{
              $('.link').show();
            }
          });


       $('#selart').on('change', function(){
          
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

        $('#btnCrop').on('click', function(){
              var img = cropper.getDataURL();
              $('.cropped').html('<img src="'+img+'" style="width:100px;">');
              $('.capture').attr('src', img);
              $('.ac').val('');
              var crop = $('.ac').val(img);
              if(crop.length == 0)
              {
                $('#send_crop').fadeOut()
              }
              else{
                $('#crop_close').fadeIn()
              }
                })
                $('#btnZoomIn').on('click', function(){
                    cropper.zoomIn();
                })
                $('#btnZoomOut').on('click', function(){
                    cropper.zoomOut();
                })

                $('#up_close').click(function(){
              $('#upload_overlay').fadeOut();
              //$('.cropped').html('');
              $('#send_crop').fadeOut();
          });

            $('#crop_close').click(function(){
              $('#upload_overlay').fadeOut();
              //$('.cropped').html('');
              $('#send_crop').fadeOut();
            });



        var stat = false;

        $('.send-post').click(function(){

          $('.edit_text').val(editorInstance.html.get());

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
                url: 'edit_con.php',
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
                    $('.send-report').text('Updated successfully');
                    //$('#fpost')[0].reset();
                    window.location.href = 'oaps';
                    //GetData();
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

      });
    </script>
</body>

</html>
