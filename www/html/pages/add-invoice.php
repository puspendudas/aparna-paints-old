<?php
include("lib/config.php");

$receipt_type = $_GET['receipt_type'];
?>

<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Mixed Widget 14-->
            <div class="card card-custom card-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5" id="invoice_page_top_switch">
                    <span class="col-lg-6 col-xxl-1">
                        <span class="switch switch-icon">
                            <span class="h3" style="margin-top: 7px;"> Cash </span>
                            <label>
                                <input id="credit" type="checkbox" onclick="credit()" name="select"/>
                                <span></span>
                            </label>
                            <span class="h3" style="margin-top: 7px;"> Credit</span>
                        </span>
                    </span>                    
                </div>

                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" disabled class="form-control" id="bill_customer_name" placeholder="Enter Name"/>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            
                        <div class="form-group">
						<label>Phone Number<span class="text-danger">*</span></label>
						<div class="input-group">
							<input type="tel" class="form-control" maxlength="10" id="bill_customer_phone_number" autofocus="on" autocomplete="off" placeholder="Search for..."/>
							<div class="input-group-append">
								<button class="btn btn-success" id="bill_phone_number_search" type="button">Go</button>
							</div>
						</div>
                        <div style="text-align:center;" id="check_mobile_alert"></div>
					    </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Invoice Date<span class="text-danger">*</span></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" name="bill_invoice_date" id="kt_datepicker_1" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date("m/d/Y"); ?>" placeholder="Select Date"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Invoice Number</label>
                                <input type="text" disabled id="bill_id" class="form-control"  placeholder=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-checkable mt-10" id="invoice_page_item_list">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="width: 3%;">#</th>
                                        <th colspan="4" rowspan="2" style="width: 20%;">ITEM</th>
                                        <th colspan="1" rowspan="2" style="width: 6%;">COLOR CODE</th>
                                        <th colspan="1" rowspan="2" style="width: 6%;">HSN CODE</th>
                                        <th colspan="1" rowspan="2" style="width: 6%;">ITEM CODE</th>
                                        <th rowspan="2" style="width: 7%;">QTY</th>
                                        <th rowspan="2" style="width: 7%;">UNIT</th>
                                        <th rowspan="2" style="width: 7%;">PRICE / UNIT</th>
                                        <th colspan="2" style="width: 12%;">DISCOUNT</th>
                                        <th colspan="2" style="width: 17%;">TAX</th>
                                        <th rowspan="2" style="width: 9%;">AMOUNT</th>
                                    </tr>
                                    <tr>
                                        <th>%</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>

                                <tbody id="bill_new_product"></tbody>

                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th colspan="5"><button type="button" class="btn btn-sm btn-outline-primary add_row">ADD ROW</button></th>
                                        <th class="h4">Total</th>
                                        <th colspan="2" class="h4" id="bill_total_quantity" style="text-align: right;"></th>
                                        <th colspan="2"></th>
                                        <th colspan="2"></th>
                                        <th colspan="2"></th>
                                        <th style="text-align: right;" class="h4" id="bill_total_price"></th>
                                    </tr>
                                </tfoot>

                            </table>
                            <!--end: Datatable-->
                        </div>
                    </div>
                </div>

                <!--end::Body-->

                <!-- Begin::Footer -->
                <div class="card-footer">
                    <!-- <a href="?page=" type="button" class="btn btn-light-primary font-weight-bold mr-2">Save</a> -->
                    <input type="text" class="form-control no_view" id="bill_total_quantity_input" value="0"/>
                    <input type="text" class="form-control no_view" id="bill_total_price_input" value="0"/>
                    <input type="text" class="form-control no_view" id="bill_customer_id_input" value=""/>
                    <div class="row">
                        <div class="col-lg-3">
                            <button  type="button" id="bill_submit" class="btn btn-primary" style="margin-top: 1.85rem;">Next &nbsp;<i class="ki ki-long-arrow-next icon-nm"></i></button>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                            <label>Mode</label>
                                <select class="form-control selectpicker" id="bill_payment_mode">
                                    <option value="cash" selected>Cash</option>
                                    <option value="card">Card</option>
                                    <option value="online">GPay/PhonePay/Paytm</option>
                                    <option value="imps">NEFT/IMPS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="no_view" id="credit_received_label">Received</label>
                                <input type="text" class="form-control no_view" id="credit_received_amount" onkeyup="received_amount_change(value);" placeholder="Amount"/>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="no_view" id="credit_balance_label">Balance</label>
                                <input type="text" class="form-control no_view" id="credit_balance_amount" disabled placeholder="Amount"/>
                            </div>
                        </div>
                        <input type="text" class="form-control no_view" id="receipt_type" value=<?php echo $receipt_type ?> disabled/>
                    </div>
                </div>
                 <!-- End::Footer -->
            </div>

            <!--end::Mixed Widget 14-->

            
        </div>
    </div>

    <!--end::Row-->
</div>
<script src="assets/js/pages/crud/forms/widgets/bootstrap-select.js"></script>
<script src="assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
