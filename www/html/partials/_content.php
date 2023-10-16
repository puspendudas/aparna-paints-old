<?php
include("lib/config.php");

$fetch_sale_details = $con->query("SELECT * FROM `total_sales`")->fetch_array(MYSQLI_BOTH);

$total_sale_amount = round((float)$fetch_sale_details['total_bill_amount'],2);
$total_received_amount = round((float)$fetch_sale_details['total_received_amount'],2);
$total_balance_amount = round($total_sale_amount - $total_received_amount, 2);

$search_purchase_details = $con->query("SELECT * FROM `party`");
$total_purchase_amount=0;
while($fetch_purchase_details=$search_purchase_details->fetch_array(MYSQLI_BOTH))
	$total_purchase_amount+=(float)$fetch_purchase_details['party_total_bill_amount'];
$total_purchase_amount= round($total_purchase_amount,2);

$search_expense_details = $con->query("SELECT * FROM `expense`");
$total_expense_amount=0;
while($fetch_expense_details=$search_expense_details->fetch_array(MYSQLI_BOTH))
	$total_expense_amount+=(float)$fetch_expense_details['expense_amount'];
$total_expense_amount= round($total_expense_amount,2);

$search_stock_value = $con->query("SELECT s.stock_purchase_price AS stock_purchase_price, s.stock_total_quantity AS stock_total_quantity, c.conversion_rate AS conversion_rate FROM `stock` s INNER JOIN `conversion` c ON s.conversion_id = c.conversion_id");
$total_stock_value = 0;
while($fetch_stock_value = $search_stock_value->fetch_array(MYSQLI_BOTH))
{
	$this_item_stock_value =((float)$fetch_stock_value['stock_purchase_price']/(float)$fetch_stock_value['conversion_rate'])*(float)$fetch_stock_value['stock_total_quantity'];
	$total_stock_value+=$this_item_stock_value;
}
$total_stock_value=round($total_stock_value,2);
?>

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">

	<!--begin::Container-->
	<div class="container-fluid">

		<!--begin::Dashboard-->

		<!--begin::Row-->
		<div class="row">
			<div class="col-lg-6 col-xxl-3">


				<!--begin::Stats Widget 12-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b">

					<!--begin::Body-->
					<div class="card-body p-0" id="blr1">
						<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
							<span class="symbol symbol-50 symbol-light-primary mr-2">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-xl svg-icon-primary">
										<i class="la la-rupee icon-2x text-primary"></i>
									</span>
								</span>
							</span>
							<div class="d-flex flex-column text-right">
								<span class="text-dark-75 font-weight-bolder font-size-h3">Sale</span>
							</div>
						</div>
							<div class="d-flex flex-column text-center">
								<span class="align-items-center justify-content-between text-black font-size-h3"><i class="la la-rupee icon-lg text-black"></i><?php echo $total_sale_amount; ?>/-</span>
							</div>
						<div style="height: 70px"></div>
					</div>

					<!--end::Body-->
				</div>

				<!--end::Stats Widget 12-->

			</div>
			<div class="col-lg-6 col-xxl-3">

				<!--begin::Stats Widget 12-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b" >

					<!--begin::Body-->
					<div class="card-body p-0" id="blr2">
						<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
							<span class="symbol symbol-50 symbol-light-warning mr-2">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-xl svg-icon-warning">
										<i class="la la-rupee icon-2x text-warning"></i>
									</span>
								</span>
							</span>
							<div class="d-flex flex-column text-right">
								<span class="text-dark-75 font-weight-bolder font-size-h3">To Receive:</span>
							</div>
						</div>
							<div class="d-flex flex-column text-center">
								<span class="align-items-center justify-content-between text-warning font-size-h3"><i class="la la-rupee icon-lg text-warning"></i> <?php echo $total_balance_amount; ?>/-</span>
							</div>
						<div  style="height: 70px"></div>
					</div>

					<!--end::Body-->
				</div>

				<!--end::Stats Widget 12-->
			</div>
		</div>

		<!--end::Row-->

		<!--begin::Row-->
		
		<div class="row">
			<div class="col-lg-6 col-xxl-3">

				<!--begin::Stats Widget 12-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b">

					<!--begin::Body-->
					<div class="card-body p-0"  id="blr3">
						<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
							<span class="symbol symbol-50 symbol-light-success mr-2">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-xl svg-icon-primary">
										<i class="la la-store-alt icon-2x text-danger"></i>
									</span>
								</span>
							</span>
							<div class="d-flex flex-column text-right">
								<span class="text-dark-75 font-weight-bolder font-size-h3">Purchase</span>
							</div>
						</div>
							<div class="d-flex flex-column text-center">
								<span class="align-items-center justify-content-between text-danger font-size-h3"><i class="la la-rupee icon-lg text-danger"></i> <?php echo $total_purchase_amount; ?>/-</span>
							</div>
						<div style="height: 70px"></div>
					</div>

					<!--end::Body-->
				</div>

				<!--end::Stats Widget 12-->
				
			</div>

			<div class="col-lg-6 col-xxl-3">

				<!--begin::Stats Widget 12-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b">

					<!--begin::Body-->
					<div class="card-body p-0" id="blr4">
						<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
							<span class="symbol symbol-50 symbol-light-danger mr-2">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-xl svg-icon-danger">
										<i class="la la-rupee icon-2x text-danger"></i>
									</span>
								</span>
							</span>
							<div class="d-flex flex-column text-right">
								<span class="text-dark-75 font-weight-bolder font-size-h3">Expenses:</span>
							</div>
						</div>
						<div class="d-flex flex-column text-center">
							<span class="align-items-center justify-content-between text-danger font-size-h3"><i class="la la-rupee icon-lg text-danger"></i> <?php echo $total_expense_amount; ?>/-</span>
						</div>
						<div  style="height: 70px"></div>
					</div>

					<!--end::Body-->
				</div>

				<!--end::Stats Widget 12-->
			</div>

			<div class="col-lg-6 col-xxl-3">

				<!--begin::Stats Widget 12-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b" >

					<!--begin::Body-->
					<div class="card-body p-0" id="blr5">
						<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
							<span class="symbol symbol-50 symbol-light-success mr-2">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-xl svg-icon-success">
									<i class="la la-archive icon-2x text-success"></i>
									</span>
								</span>
							</span>
							<div class="d-flex flex-column text-right">
								<span class="text-dark-75 font-weight-bolder font-size-h3">Stock Value</span>
							</div>
						</div>
						<div class="d-flex flex-column text-center">
							<span class="align-items-center justify-content-between text-success font-size-h3"><i class="la la-rupee icon-lg text-success"></i> <?php echo $total_stock_value; ?>/-</span>
						</div>
						<div  style="height: 70px"></div>
					</div>

					<!--end::Body-->
				</div>

				<!--end::Stats Widget 12-->
			</div>

		</div>

		<!--end::Row-->

		<div class="row">
		
			<div class="col-lg-6 col-xxl-3">

				<!--begin::Stats Widget 12-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b">

					<!--begin::Body-->
					<div class="card-body p-0" id="blr6">
						<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
							<span class="symbol symbol-50 symbol-light-success mr-2">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-xl svg-icon-success">
										<i class="la la-rupee icon-2x text-success"></i>
									</span>
								</span>
							</span>
							<div class="d-flex flex-column text-right">
								<span class="text-dark-75 font-weight-bolder font-size-h3">Cash In Hand</span>
							</div>
						</div>
						<div class="d-flex flex-column text-center">
							<span class="align-items-center justify-content-between text-success font-size-h3"><i class="la la-rupee icon-lg text-success"></i> <?php echo $total_received_amount; ?>/-</span>
						</div>
						<div  style="height: 70px"></div>
					</div>

					<!--end::Body-->
				</div>

				<!--end::Stats Widget 12-->
			</div>
		</div>

		<!--end::Dashboard-->

	</div>

	<!--end::Container-->
</div>

<!--end::Entry-->