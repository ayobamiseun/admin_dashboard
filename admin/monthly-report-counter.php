<style>
i span {font-size:16px !important;} 
i .day {margin-top:20px !important;}
.sub_m {position:absolute; right:20px;}
</style>
<div class="widgets-grids">

						<div class="col-md-12 widget-grid" style="margin-bottom: 10px;">
							<div class="widget1">

								<div class="progress-top">
									<h4>Compliance <span>(<?php echo number_format($compl); ?>/100)</span> </h4>
									<div class="progress" style="margin-bottom: 5px;">
									   <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" role="progressbar" aria-valuenow="<?php echo $compl; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $compl; ?>%">
									
									  </div>
									</div>
								</div>
								
								<div class="clearfix"></div>
							</div>
						</div>


						<div class="col-md-3 widget-gri">
							<div class="widget2">
								<div class="widget-left1">
								
								<i class="day "><span>JAN</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="January" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm1)?>/1</h4>
									<p><?php echo  number_format($numw1)?>/5</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								
							</div>
						</div>
						<div class="col-md-3 widget-gri">
							<div class="widget3">
								<div class="widget-left1">
								
								<i class="day "><span>FEB</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="February" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm2)?>/1</h4>
									<p><?php echo  number_format($numw2)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								
							</div>
						</div>
						<div class="col-md-3 widget-gri">
							<div class="widget4">
								<div class="widget-left1">
								
								<i class="day "><span>MAR</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="March" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm3)?>/1</h4>
									<p><?php echo  number_format($numw3)?>/4</p>
								</div>
								<div class="clearfix"></div>
								
							</div>
						</div>
						<div class="col-md-3 widget-gri">
							<div class="widget2">
								<div class="widget-left1">
								
								<i class="day "><span>APR</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="April" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm4)?>/1</h4>
									<p><?php echo  number_format($numw4)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								
							</div>
						</div>
						<!--<div class="col-md-3 widget-gri">
							<div class="widget2">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>MAY</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="May" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm5)?>/1</h4>
									<p><?php echo  number_format($numw5)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								<!--<h6><?php echo $w55st . ' - '. $w55st5 ?></h6>
								<h5><?php echo $w5st .' - '.$w5st5 ?></h5>--
							</div>
						</div>

						<div class="col-md-3 widget-gri">
							<div class="widget3">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>JUNE</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="June" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm6)?>/1</h4>
									<p><?php echo  number_format($numw6)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								<!--<h6><?php echo $w55st . ' - '. $w55st5 ?></h6>
								<h5><?php echo $w5st .' - '.$w5st5 ?></h5>--
							</div>
						</div>

						<div class="col-md-3 widget-gri">
							<div class="widget4">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>JULY</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="July" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm7)?>/1</h4>
									<p><?php echo  number_format($numw7)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								<!--<h6><?php echo $w55st . ' - '. $w55st5 ?></h6>
								<h5><?php echo $w5st .' - '.$w5st5 ?></h5>--
							</div>
						</div>

						<div class="col-md-3 widget-gri">
							<div class="widget5">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>AUGUST</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="August" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm8)?>/1</h4>
									<p><?php echo  number_format($numw8)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								<!--<h6><?php echo $w55st . ' - '. $w55st5 ?></h6>
								<h5><?php echo $w5st .' - '.$w5st5 ?></h5>--
							</div>
						</div>-->

						<!--<div class="col-md-3 widget-gri">
							<div class="widget2">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>SEP</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="September" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm9)?>/1</h4>
									<p><?php echo  number_format($numw9)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								
							</div>
						</div>

						<div class="col-md-3 widget-gri">
							<div class="widget3">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>OCT</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="October" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm10)?>/1</h4>
									<p><?php echo  number_format($numw10)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								<!--<h6><?php echo $w55st . ' - '. $w55st5 ?></h6>
								<h5><?php echo $w5st .' - '.$w5st5 ?></h5>--
							</div>
						</div>

						<div class="col-md-3 widget-gri">
							<div class="widget4">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>NOV</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="November" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm11)?>/1</h4>
									<p><?php echo  number_format($numw11)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								<!--<h6><?php echo $w55st . ' - '. $w55st5 ?></h6>
								<h5><?php echo $w5st .' - '.$w5st5 ?></h5>--
							</div>
						</div>

						<div class="col-md-3 widget-gri">
							<div class="widget5">
								<div class="widget-left1">
								<!--<i class="glyphicon glyphicon-certificate " aria-hidden="true"></i>--
								<i class="day "><span>DEC</span></i>
								</div>
								<a data-date="<?php echo $date; ?>" data-month="December" data-toggle="modal" data-target="#modal-1" class="btn btn-sm sub_m" style="color:#fff;">[ Submit ]</a>
								<div class="widget-right1">
									<h4><?php echo  number_format($numm12)?>/1</h4>
									<p><?php echo  number_format($numw12)?>/4</p>
								</div>
								<div class="clearfix"></div>
								<div class="border"></div>
								<!--<h6><?php echo $w55st . ' - '. $w55st5 ?></h6>
								<h5><?php echo $w5st .' - '.$w5st5 ?></h5>--
							</div>
						</div>-->

						<div class="clearfix"></div>
					</div>