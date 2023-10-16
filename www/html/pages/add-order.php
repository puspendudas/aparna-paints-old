<?php
include("lib/config.php");
?>
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Mixed Widget 14-->
            <div class="card card-custom card-stretch">

                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <div class="col-lg-6 col-xxl-5">
                     <h1>Purchase Order</h1>
                    </div>

                    
                </div>

                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" disabled class="form-control" id="order_party_name" placeholder="Enter Name"/>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            
                        <div class="form-group">
						<label>Phone Number<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="order_party_phone_number" placeholder="Search for..." autofocus="on" />
                                <div class="input-group-append">
                                    <button class="btn btn-success" id="order_phone_number_search" type="button">Go</button>
                                </div>
                            </div>
					    </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Order Date<span class="text-danger">*</span></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" name="order_invoice_date" id="kt_datepicker_1" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date("m/d/Y"); ?>" placeholder="Select Date"/>
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
                                <label>Order Number</label>
                                <input type="text" disabled id="order_id" class="form-control"  placeholder=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-checkable mt-10">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">#</th>
                                        <th style="width: 40%;">ITEM</th>
                                        <th style="width: 10%;">HSN CODE</th>
                                        <th style="width: 10%;">QTY</th>
                                        <th style="width: 10%;">UNIT</th>
                                    </tr>
                                </thead>

                                <tbody id="order_new_product"></tbody>

                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th colspan="1"><button type="button" class="btn btn-sm btn-outline-primary order_add_row">ADD ROW</button></th>
                                        <th class="h4">Total</th>
                                        <th class="h4" id="order_total_quantity" style="text-align: right;"></th>
                                        <th></th>
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
                    <input type="text" class="form-control no_view" id="order_total_quantity_input" value="0"/>
                    <input type="text" class="form-control no_view" id="order_party_id_input" value=""/>
                    <div class="row">
                        <div class="col-lg-3">
                            <button  type="button" id="order_submit" class="btn btn-primary" style="margin-top: 1.85rem;">Next &nbsp;<i class="ki ki-long-arrow-next icon-nm"></i></button>
                        </div>
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
