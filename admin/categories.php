<?php
  include('connect.php');
  session_start();
  error_reporting(0);

  if(!isset($_SESSION['GoLiveBlogUser'])){
    header('location:login?ref=categories');
  }
  else{
    
    $username = $_SESSION['GoLiveBlogUser'];
    $sql = mysqli_query($con, "select * from bloggers where username = '$username'");
    $num = mysqli_num_rows($sql);

    if($num < 1){
      header('location:login?ref=categories');
    }
    else{

      $row = mysqli_fetch_array($sql);
      $name = $row['name'];
      $username = $row['username'];
      $privilage = $row['privilage'];
    
      
    }

    
  }

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Categories | GoLive Blog</title>
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

    <style type="text/css" media="screen">
    .form-control{
            background: #f0f0f0;
            border: none;
            border-radius: 20px;
            box-shadow: none;
            padding: 5px 10px;
            height: 40px;
            transition: all 0.3s ease 0s;
        }
    .remove-cont {position:absolute; right: 0px; width: 25px; height: 25px; border-radius: 50%; background: #333; 
        color: #fff; text-align: center; line-height: 25px; top:10%; right: 10px;}
    </style>

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
            <!-- Modal -->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add Category </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
        
      </div>
      <div class="modal-body">
        <div class="form-bg" style="width: 100%;">
                        <div class="">
                            <form id="addform" class="form-horizontal" style="padding-bottom: 0px; max-height: 400px; overflow-y: auto; overflow-x: hidden;">
                                
                                
                                <div class="form-group help" style="">
                                    <input type="hidden" name="type" value="addCat">

                                    <label for="">Category name</label>
                                    <input name="name" class="form-control tt"/><br />

                                    <label for="">Details</label>
                                    <textarea name="details" class="form-control"></textarea>
                                    
                                </div>

                        </form>
                    </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary send-report btn-xs add">Add</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999993939399393;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel">Recovery</h3>
      </div>
      <div class="modal-body">
        <div class="form-bg" style="width: 100%;">
                        <div class="">
                            <form id="editform" class="form-horizontal" style="padding-bottom: 0px; max-height: 400px; overflow-y: auto; overflow-x: hidden;">
                                
                                
                                <div class="form-group help" style="">
                                    <input type="hidden" name="type" value="addCat">

                                    <label for="">Category name</label>
                                    <input name="name" class="form-control name2 ttE"/><br />

                                    <label for="">Details</label>
                                    <textarea name="details" class="form-control details2"></textarea>
                                    
                                </div>

                        </form>
                    </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit"">Copy</button>
      </div>
    </div>
  </div>
</div>
    


   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deleteModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Delete this category</h4>
                                    </div>
                                    <div class="modal-body">
                            
                                       <p>Are you sure you want to delete this category ?</p>
                                       <form role="form"id="delform">
                                           <input type="hidden" class="duid">
                                           <input type="hidden" class="dtype">
                                       </form>


                                    </div>

                                    <div class="modal-footer">
                                        <div class="btn btn-default" data-dismiss="modal">Close</div>
                                        <div class="btn btn-success Cdelete">Delete</div>
                                    </div>


                                </div>
                            </div>
                        </div>

   <a href="#deleteModal" data-toggle="modal" class="del"></a>

   <a href="#editModel" data-toggle="modal" class="edt"></a>

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
                                <h4 class="header-title">Categories   <button data-toggle="modal" data-target="#modal-1" class="btn btn-primary btn-xs sub_m" style="margin-left: 10px;">Add new</button></h4>
                                <div class="content-widgets">
                        
                        
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
                                              <th>Banners</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody class="MClist">
                                            
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

        var stat = false;

        $('.add').click(function(){

            $('.tt').each(function(index, val) {
       
               var dd = $(this).val();
               //Materialize.toast(dd,3000);

               if(dd.length < 1){
                  $(this).css({'border-bottom':'1px solid red'});
                   $('.add').text('Complete the form');
                   $('.add').addClass('red');
                   stat = false;
               }
               else{
                 $(this).css({'border-bottom':'1px solid grey'});
                 stat = true;
                 
               }

              
            });

            if(stat == true){
               $('.add').removeClass('btn-danger');
                $('.add').addClass('btn-info');
                $('.add').text('Prosessing');
              setTimeout(function(){
                Add();
              },500);
                
            }
            else{
                $('.add').removeClass('btn-success');
                $('.add').addClass('btn-warning');
                $('.add').text('Kindly complete the form');
            }

            
            
        });




        function Add(){
                
                var formData = new FormData($('#addform')[0]);

            $.ajax({
                url: 'ajax_con.php',
                //type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                //data: $('#addform').serialize()
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false
            })
            .done(function(data) {
                //alert(data);
                if(data == "success"){
                    $('.add').text('Add more');
                    $('#addform')[0].reset();
                    $('.close1').click();
                    $('.cropped').html('');
                    $('.ac').val('');
                    GetData();
                }
                else if(data == "error"){
                    $('.add').removeClass('btn-success');
                    $('.add').addClass('btn-danger');
                    $('.add').text('Error adding');
                }
                else if(data == "image_error"){
                    $('.add').removeClass('btn-success');
                    $('.add').addClass('btn-danger');
                    $('.add').text('Image not uploaded');
                }
                else if(data == "null"){
                    $('.add').removeClass('btn-success');
                    $('.add').addClass('btn-danger');
                    $('.add').text('Please complete the form');
                }
                else if(data == "upload_error"){
                    $('.add').removeClass('btn-success');
                    $('.add').addClass('btn-danger');
                    $('.add').text('Image not uploaded');
                }
            })
            .fail(function() {
                $('.add').removeClass('btn-success');
                $('.add').addClass('btn-danger');
                $('.add').text('Network error');
                
            })
            .always(function() {
                console.log("complete");
            });
        }

        function GetData(){

        $('.MClist').html('<span class="fa fa-spin fa-spinner fa-3x" style="color:#fff;"></span>');
        $.getJSON('j_cat.php', function(data) {
          $('.MClist').html('');
         //alert(data.Feed.length);
          $.each(data.Feed, function(i,result){

            

            var newRow =
                            
                                         '<tr class="clm">'
                                          +'<td><div class="'+result.uid+' btn btn-info btn-xs edit1">'+result.sn+'</div></td>'
                                          +'<td>'+result.name+'</td>'
                                          +'<td><a href="post.php?cat='+result.name+'" class="btn btn-primary btn-xs">'+result.items+'</button></a>'
                                          +'<td><a href="category-banner.php?cat='+result.name+'" class="btn btn-info btn-xs">'+result.banner+'</a></td>'
                                        +'<td>'
                                            +'<div class="btn btn-primary btn-sm edit1" data-uid="'+result.uid+'" style="margin:0px 5px;">Edit</div>'
                                            +'<div class="btn btn-danger btn-sm delete" data-uid="'+result.uid+'"><i class="fa fa-trash"></i></div>'
                                          +'</td>'
                                        +'</tr>';
            
            $(newRow).appendTo('.MClist');
       
          });

           $('.delete').click(function(event) {
               $('.del').click();
               var uid =  $(this).attr("data-uid");

               $('.duid').val(uid);
               $('.dtype').val('delCat')
                
            });

            $('.edit1').click(function(event) {
               $('.edt').click();
               var uid =  $(this).attr("data-uid");
               GetOne(uid);
               //alert(uid)
                
            });

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
                Supervisor();
                $('.Cdelete').removeClass('btn-danger');
                $('.Cdelete').addClass('btn-succes');
                $('.Cdelete').text('Deleted');
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
        $.getJSON('j_cat.php',{uid:uid}, function(data) {
          $('.MCEdit').html('');
          alert(data.Feed.length);
          $.each(data.Feed, function(i,result){
            
            $('#name2').val(result.name);
            $('#uidE').val(result.uid);
            $('#details2').val(music.details);
        

          });
           
        });
    }

   // alert('dd');


    function Edit(){

                var formData = new FormData($('#editform')[0]);

            $.ajax({
                url: 'edit_ajx.php',
                //type: 'POST',
                //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                //data: $('#editform').serialize()
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false
            })
            .done(function(data) {
               // alert(data);
                if(data == "success"){
                    $('.edit').text('Succeesful');
                    $('#editform')[0].reset();
                    $('.close1').click();
                    $('.cropped').html('');
                    $('.ac').val('');
                    Supervisor();
                }
                else if(data == "error"){
                    $('.edit').removeClass('btn-success');
                    $('.edit').addClass('btn-danger');
                    $('.edit').text('Error adding');
                }
                else if(data == "image"){
                    $('.edit').removeClass('btn-success');
                    $('.edit').addClass('btn-danger');
                    $('.edit').text('Image not uploaded');
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
