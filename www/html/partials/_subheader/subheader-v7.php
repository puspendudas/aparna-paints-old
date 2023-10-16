
<!--begin::Subheader-->
	<div class="subheader py-5 gutter-b subheader-solid" id="kt_subheader" style="background-color: #663259; background-position: right bottom; background-size: auto 100%; background-repeat: no-repeat; background-image: url(assets/media/svg/patterns/taieri.svg)">
		<div class="container-fluid d-flex flex-column">
			<div class="row">
				<div class="col-lg-6 col-xxl-2">
					<a href="?page=add-invoice&receipt_type=sell" class="btn btn-success btn-block btn-pill">
						<i class="la la-plus-circle icon-2x text-white"></i> 
						<span class="h5">Add Sale</span>
					</a>
				</div>
				<br>
				<div class="col-lg-6 col-xxl-2">
					<a href="?page=add-order" class="btn btn-primary btn-block btn-pill">
						<i class="la la-plus-circle icon-2x text-white"></i> 
						<span class="h5">Add Purchase</span>
					</a>
				</div>
				<div class="col-lg-6 col-xxl-2">
					<a href="?page=add-invoice&receipt_type=payment" class="btn btn-warning btn-block btn-pill">
						<i class="la la-plus-circle icon-2x text-white"></i> 
						<span class="h5">Add Payment</span>
					</a>
				</div>
				<div class="col-lg-6 col-xxl-2">
					<a href="?page=add-invoice&receipt_type=return" class="btn btn-danger btn-block btn-pill">
						<i class="la la-plus-circle icon-2x text-white"></i> 
						<span class="h5">Add Return</span>
					</a>
				</div>
				<?php 
					if($hide == "false"){
						echo("<div class='col-lg-6 col-xxl-1' style='margin-top: 7px;'>
						<span class='switch switch-icon'>
							<label>
								<input type='checkbox' name='select' onclick='blr()'/>
								<span></span>
							</label>
						</span>
					</div>");
					}
				?>
			</div>
		</div>
	</div>
<!--end::Subheader-->

						

						<!--end::Modal-->