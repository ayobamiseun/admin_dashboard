<?php 
    
  $sqls = mysqli_query($con,"select id from app_visitors");
  $nums = mysqli_num_rows($sqls);

  $sqlt = mysqli_query($con,"select id from app_visitors group by fingerprint");
  $numt = mysqli_num_rows($sqlt);

  $sqlp = mysqli_query($con,"select id from posts");
  $nump = mysqli_num_rows($sqlp);

  $sqln1 = mysqli_query($con,"select id from news");
  $numn1 = mysqli_num_rows($sqln1);

?>

<div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-layout-list-thumb-alt"></i> Total Visits</div>
                                            <h2><?php echo number_format($nums); ?> </h2>
                                        </div>
                                        <canvas id="seolinechart1" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-stats-up"></i>  Total Unique visitors</div>
                                            <h2><?php echo number_format($numt); ?> </h2>
                                        </div>
                                        <canvas id="seolinechart2" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-agenda"></i> Total Posts</div>
                                            <h2><?php echo number_format($nump); ?> </h2>
                                            <!--<canvas id="seolinechart3" height="60"></canvas>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-time"></i> Total News</div>
                                            <h2><?php echo number_format($numn1); ?> </h2>
                                            <!--<canvas id="seolinechart4" height="60"></canvas>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>