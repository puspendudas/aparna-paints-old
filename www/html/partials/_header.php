<!--begin::Header-->
	<div id="kt_header" class="header header-fixed">

		<!--begin::Container-->
		<div class="container-fluid d-flex align-items-stretch justify-content-between">
			

			<!--begin::Header Menu Wrapper-->
			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

				<!--begin::Header Menu-->
				<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
					<ul class="menu-nav">
						<li class="menu-item  menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active">
							<span class="h2 text-white"><?php echo $heading; ?></span>
						</li>
					</ul>
						
					</ul>
					
				</div>

				<!--end::Header Menu-->
			</div>
			

			<!--end::Header Menu Wrapper-->

			<!--begin::Topbar-->
			<div class="topbar">

				<!--begin::User-->
				<div class="dropdown">

					<!--begin::Toggle-->
					<div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
						<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
							<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
							<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">FinTrack</span>
							<span class="symbol symbol-35 symbol-light-success">
								<span class="symbol-label font-size-h5 font-weight-bold">FT</span>
							</span>
						</div>
					</div>

					<!--end::Toggle-->

					<!--begin::Dropdown-->
					<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">

						<?php user(); ?>
					</div>

					<!--end::Dropdown-->
				</div>

				<!--end::User-->
			</div>

			<!--end::Topbar-->
		</div>

		<!--end::Container-->
	</div>
<!--end::Header-->