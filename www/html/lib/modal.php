<!-- Base Modal-->
<div class="modal fade" id="party" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Base Modal-->

<!-- Add Customer Details Modal -->
<div class="modal fade" id="addCustomerDetailsModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form class="customer" autocomplete="off" id="add_customer"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal Body -->
                    <div class="row">
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control customer_name" name="customer_name"  placeholder="Enter Name"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>Phone Number<span class="text-danger">*</span></label>
                                <input type='tel' class="form-control customer_mobile_number"  id="kt_maxlength_1" name="customer_mobile_number" maxlength="10"  placeholder="Phone Number"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control customer_email" name="customer_email" placeholder="Enter Email"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>GST Number</label>
                                <input type="text" class="form-control customer_gst" name="customer_gst" id="kt_maxlength_1" placeholder="GST Number" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Address<span class="text-danger">*</span></label>
                                <textarea class="form-control customer_address" id="kt_autosize_1" name="customer_address" rows="4" ></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Opening Blance</label>
                                <input type="text" class="form-control customer_openning_balance" id="kt_maxlength_1" name="customer_openning_balance" maxlength="10"  placeholder="Opening Blance" type="text"/>
                            </div>
                            <div class="radio-inline">
                                <label class="radio radio-danger">
                                    <input type="radio" value="PAY" id="r1" name="customer_balance_status" checked="checked"/>
                                    <span></span>
                                    To Pay
                                </label>
                                <label class="radio radio-success">
                                    <input type="radio" value="RECEIVE" id="r2" name="customer_balance_status" />
                                    <span></span>
                                    To Receive
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>As Of Date<span class="text-danger">*</span></label>
                                <div class="input-group date" >
                                    <input type="text" class="form-control customer_creation_date"  value="<?php date_default_timezone_set('Asia/Kolkata'); echo date("m/d/Y"); ?>" name="customer_creation_date" id="kt_datepicker_3"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Body -->
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control customer_id" value="" name="customer_id"/>
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary font-weight-bold" id="insert_customer" value="SAVE"/>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Customer Details Modal -->


<!-- Add Party Details Modal -->
<div class="modal fade" id="addPartyDetailsModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form class="party" autocomplete="off" id="add_party"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Party</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal Body -->
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control party_name" name="party_name" placeholder="Enter Name"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Phone Number<span class="text-danger">*</span></label>
                                <input type='text' class="form-control party_phone_number" id="kt_maxlength_1" name="party_phone_number" maxlength="10"  placeholder="Phone Number" type="text"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type='text' class="form-control party_email" id="kt_maxlength_1" name="party_email" maxlength="10"  placeholder="Enter Email" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>GST Type</label>
                                <input type='text' class="form-control party_gst_type" id="kt_maxlength_1" name="party_gst_type" placeholder="GST Number" type="text"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>GST value</label>
                                <input type='text' class="form-control party_gst_value" id="kt_maxlength_1" name="party_gst_value" placeholder="GST value" type="text"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>State</label>
                                <input type='text' class="form-control party_state" id="kt_maxlength_1" name="party_state" maxlength="10"  placeholder="State" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control party_address" id="kt_autosize_1" name="party_address" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Opening Blance</label>
                                <input type='text' class="form-control party_openning_balance" id="kt_maxlength_1" name="party_openning_balance" maxlength="10"  placeholder="Opening Blance" type="text"/>
                            </div>
                            <div class="radio-inline">
                                <label class="radio radio-danger">
                                    <input type="radio" name="radios8" id="p1" checked="checked"/>
                                    <span></span>
                                    To Pay
                                </label>
                                <label class="radio radio-success">
                                    <input type="radio" name="radios8" id="p2"/>
                                    <span></span>
                                    To Receive
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>As Of Date</label>
                                <div class="input-group date" >
                                    <input type="text" class="form-control party_creation_date" name="party_creation_date" readonly  value="<?php date_default_timezone_set('Asia/Kolkata'); echo date("m/d/Y"); ?>" id="kt_datepicker_3"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Body -->
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control party_id" value="" name="party_id"/>
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary font-weight-bold" id="insert_party" value="SAVE"/>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add party Details Modal -->

<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form class="item" autocomplete="off" id="add_item">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Item Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal Body -->
                    <div class="row">
                        <div class="col-lg-6 col-xxl-5">
                            <div class="form-group">
                                <label>Item Name<span class="text-danger">*</span></label>
                                <input type="text"  class="form-control stock_pname" name="stock_pname" placeholder="Enter Name"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-1">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="checkbox-inline" style="margin-top: 7px;">
                                    <label class="checkbox checkbox-lg">
                                        <input type="checkbox" class="stock_print_in_bill" name="stock_print_in_bill"  checked="checked"/>
                                        <span></span>
                                        Print
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xxl-3">
                            <div class="form-group">
                                <label>HSN/SAC<span class="text-danger">*</span></label>
                                <input type='text'  class="form-control stock_hsn_sac" name="stock_hsn_sac" id="kt_maxlength_1" maxlength="10"  placeholder="HSN/SAC Number" type="text"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xxl-3">
                            <div class="form-group">
                                <label>Set Unit<span class="text-danger">*</span></label>
                                <button type="button" class="btn btn-primary btn-block conversion_id" name="conversion_id" onclick="callModal('editItemUnit')">Select Unit</button>
                                <input type="hidden"  name="conversion_id_value" value="" id="conversion_id_value" class="form-control conversion_id_value"/>
                                <div style="text-align:center;font-weight: bold;" id="show_units_and_conversion_rate"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-xxl-3">
                            <div class="form-group">
                                <label>Item Code<span class="text-danger">*</span></label>
                                <input type='text'  class="form-control stock_item_code" name="stock_item_code" id="kt_maxlength_1" maxlength="10"  placeholder="Item Code"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xxl-3">
                            <div class="form-group">
                                <label>Category<span class="text-danger">*</span></label>
                                <div class="form-group row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select  class="form-control selectpicker category_id" name="category_id" data-size="5" data-live-search="true">
                                    <option disabled value="" selected>select</option>
                                        <?php

                                        if($search_category= $con->query("SELECT * FROM `category`"))
                                        {
                                            while($fetch_category = $search_category->fetch_array(MYSQLI_BOTH))
                                            {
                                               echo"<option value='$fetch_category[category_id]'>$fetch_category[category_name]</option>";
                                            }
                                        }
                                        
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xxl-3">
                        <label>Tax Rate<span class="text-danger">*</span></label>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select  class="form-control selectpicker stock_tax_rate" name="stock_tax_rate">
                                        <option selected value="GST 18">GST @18%</option>
                                        <option value="IGST 18">IGST @18%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xxl-3">
                            <div class="form-group">
                                <label>Select Date<span class="text-danger">*</span></label>
                                <div class="input-group date" >
                                    <input type="text"  class="form-control stock_creation_date" name="stock_creation_date" readonly value="<?php date_default_timezone_set('Asia/Kolkata'); echo date("m/d/Y"); ?>" id="kt_datepicker_3"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Sale Price<span class="text-danger">*</span></label>
                                <input type="text"  class="form-control stock_sell_price" name="stock_sell_price" placeholder="Sale Price"/>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xxl-2">
                            <label>Tax Type<span class="text-danger">*</span></label>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select  class="form-control selectpicker stock_stax_status" name="stock_stax_status">
                                        <option selected value="With Tax">With Tax</option>
                                        <option value="Without Tax">Without Tax</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Purchase Price<span class="text-danger">*</span></label>
                                <input type='text'  class="form-control stock_purchase_price" name="stock_purchase_price" id="kt_maxlength_1" maxlength="10"  placeholder="Purchase Price" type="text"/>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xxl-2">
                            <label>Tax Type<span class="text-danger">*</span></label>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select  class="form-control selectpicker stock_ptax_status" name="stock_ptax_status">
                                        <option selected value="With Tax">With Tax</option>
                                        <option value="Without Tax">Without Tax</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-lg-2 col-xxl-2">
                            <div class="form-group">
                                <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url(assets/media/users/blank.png)">
                                    <div class="image-input-wrapper"></div>

                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="profile_avatar_remove"/>
                                    </label>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-5 col-xxl-5">
                            <div class="form-group">
                                <label>Min Stock QTY</label>
                                <input type='text' class="form-control stock_min_stock" name="stock_min_stock" id="kt_maxlength_1" maxlength="10"  placeholder="Min Stock QTY" type="text"/>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xxl-5">
                            <div class="form-group">
                                <label>Openning Stock</label>
                                <input type='text' class="form-control openning_stock" name="openning_stock" id="kt_maxlength_1" maxlength="10"  placeholder="Openning Stock" type="text"/>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Body -->
                </div>
                <div class="modal-footer">
                <input type="hidden" class="form-control stock_pid" value="" name="stock_pid"/>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary font-weight-bold" id="insert_item" value="SAVE"/>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Item Modal -->

<!-- Add Item Adjustment Modal -->
<div class="modal fade" id="adjustItemModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form class="item_adjustment" autocomplete="off" id="adjust_item">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Item Adjustment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal Body -->
                    <div class="row">
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>Item Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control adjustment_item_name" name="adjustment_item_name" disabled="disabled" placeholder="Enter Name"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                            <label>Adjust Type</label>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select class="form-control selectpicker adjustment_item_type" onchange="adjust_item_disable_purchase_price(value);" name="adjustment_item_type">
                                        <option value="ADD" selected>Add Stock</option>
                                        <option value="REDUCE">Reduce Stock</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>Quantity<span class="text-danger">*</span></label>
                                <input type='text' class="form-control adjustment_item_quantity" name="adjustment_item_quantity" placeholder="Quantity" type="text"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>At Price</label>
                                <input type="text" class="form-control adjust_item_purchase_price" name="adjust_item_purchase_price" placeholder="Atprice"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>Adjustment Date</label>
                                <div class="input-group date" >
                                    <input type="text" class="form-control adjustment_item_date" name="adjustment_item_date" readonly value="05/20/2017" id="kt_datepicker_3"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-6">
                            <div class="form-group">
                                <label>Details</label>
                                <input type='text' class="form-control adjustment_item_details" name="adjustment_item_details" placeholder="Details"/>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Body -->
                </div>
                <div class="modal-footer">
                    <input type='hidden' class="form-control adjustment_item_id" value="" name="adjustment_item_id"/>
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Item Adjustment Modal -->

<!-- Add Unit Modal -->
<div class="modal fade" id="addUnitModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">
            <form class="unit" autocomplete="off" id="add_unit"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-xxl-8">
                        <label>Unit Name<span class="text-danger">*</span></label>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="text" class="form-control unit_full_name" name="unit_full_name" placeholder="Enter Unit Name" autofocus="on" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                                <label>Short Name<span class="text-danger">*</span></label>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" class="form-control unit_short_name" name="unit_short_name" placeholder="Enter Short Name"/>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="modal-footer">
                    <input  type="hidden" class="form-control unit_id" value="" name="unit_id"/>
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <input  type="submit" class="btn btn-primary font-weight-bold" id="insert_unit" value="SAVE"/>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Unit Modal -->

<!-- Item Conversion Modal-->
<div class="modal fade" id="editItemUnit" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Conversion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-xxl-6">
                    <label>Base Unit</label>
                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <select class="form-control selectpicker" id="b-unit" onchange="mc();">
                                <option value="" selected>NONE</option>
                                        <?php

                                        if($search_unit= $con->query("SELECT * FROM `unit`"))
                                        {
                                            while($fetch_unit = $search_unit->fetch_array(MYSQLI_BOTH))
                                            {
                                               echo"<option value='$fetch_unit[unit_id]'>".$fetch_unit['unit_full_name']." (".$fetch_unit['unit_short_name'].") </option>";
                                            }
                                        }
                                        
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xxl-6">
                        <div class="form-group">
                        <label>Secondary Unit</label>
                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <select class="form-control selectpicker" id="s-unit"  onchange="mc();">
                                <option value="" selected>NONE</option>
                                        <?php

                                        if($search_unit= $con->query("SELECT * FROM `unit`"))
                                        {
                                            while($fetch_unit = $search_unit->fetch_array(MYSQLI_BOTH))
                                            {
                                               echo"<option value='$fetch_unit[unit_id]'>".$fetch_unit['unit_full_name']." (".$fetch_unit['unit_short_name'].") </option>";
                                            }
                                        }
                                        
                                        ?>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <form id="seen" class="row no_view">
                    <div class="col-lg-4 col-xxl-4">
                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); padding: 0.65rem 1rem;">
                                <label class="radio">
                                <input style="margin-left:5px;" type="radio" checked="checked" name="radios1" id="c0" value="0"/>
                                    <span></span>
                                        <div style="margin-left:5px;" name="unit-b" class="h6"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1 col-xxl-1">
                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); padding: 0.65rem 1rem;">
                                <label class="h2">=</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xxl-3">
                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12">
                                        <input class="form-control btn btn-block" type="text" id="item_input_mannual_conversion_rate"/>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xxl-4">
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); padding: 0.65rem 1rem;">
                                    <div name="unit-s" class="h6"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-left:5px;" class="row" id="conversion_list_for_unit"></div>

                    <div style="margin-left:5px;" class="row">
                        <input type="hidden" class="form-control" id="conversion_list_length_for_unit"/>
                    </div>
                </form>

            </div>
            <!--  -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" id="item_add_cvonversion_list_select" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<!--EndItem  Conversion Modal-->

<!-- Conversion Modal-->
<div class="modal fade" id="editUnit" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="conversion" autocomplete="off" id="add_conversion">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Conversion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                        <label>Base Unit</label>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select class="form-control selectpicker" id="conversion_modal_base_unit_select" name="base_unit_id" data-live-search="true">
                                    <option value="" disabled selected>NONE</option>
                                            <?php

                                            if($search_unit= $con->query("SELECT * FROM `unit`"))
                                            {
                                                while($fetch_unit = $search_unit->fetch_array(MYSQLI_BOTH))
                                                {
                                                echo"<option value='$fetch_unit[unit_id]'>".$fetch_unit['unit_full_name']." (".$fetch_unit['unit_short_name'].") </option>";
                                                }
                                            }
                                            
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-1 col-xxl-1">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); margin-top:1.7rem; padding: 0.65rem 1rem;">
                                    <label class="h2">=</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xxl-3">
                            <div class="form-group">
                                <label>Rate</label>
                                <input type="text" class="form-control" name="conversion_rate" value="0" laceholder="0"/>
                            </div>
                        </div>


                        <div class="col-lg-4 col-xxl-4">
                            <div class="form-group">
                            <label>Secondary Unit</label>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select class="form-control selectpicker" name="secondary_unit_id" id="conversion_modal_secondary_unit_select" data-live-search="true">
                                    <option value="" disabled selected>NONE</option>
                                            <?php

                                            if($search_unit= $con->query("SELECT * FROM `unit`"))
                                            {
                                                while($fetch_unit = $search_unit->fetch_array(MYSQLI_BOTH))
                                                {
                                                echo"<option value='$fetch_unit[unit_id]'>".$fetch_unit['unit_full_name']." (".$fetch_unit['unit_short_name'].") </option>";
                                                }
                                            }
                                            
                                            ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Conversion Modal-->

<!-- Add Category Modal-->
<div class="modal fade" id="addCategory" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <form class="category" autocomplete="off" id="add_category">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-xxl-12">
                            <div class="form-group">
                                <label>Category Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control category_name" name="category_name" placeholder="Enter Category Name"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input  type="hidden" class="form-control this_category_id" value="" name="this_category_id"/>
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary font-weight-bold" id="insert_category" value="SAVE"/>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Add Category Modal-->

<!-- Edit Category Modal-->
<div class="modal fade" id="editCategory" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-xxl-12">
                        <div class="form-group">
                            <label>Edit Category Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="stock_pname" placeholder="Enter Name"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--Edit Category Modal-->

<!-- Party Payment Modal-->
<div class="modal fade" id="partyPayment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form class="payment" autocomplete="off" id="party_payment">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Party Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-xxl-6">
                            <div class="form-group">
                                <label>Billing Amount<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="payment_billing_amount" placeholder="Enter Name"/>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xxl-6">
                            <div class="form-group">
                                <label>Paid Amount<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="payment_paid_amount" placeholder="Enter Name"/>
                            </div>
                        </div>
                    </div>
                    <input type="text" class="form-control no_view" name="payment_party_id" id="payment_party_id" placeholder="Enter Name"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Party Payment Modal-->

<!-- Expense Modal-->
<div class="modal fade" id="expense" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form class="expenses" autocomplete="off" id="add_expense">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Expenses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-xxl-4">
                                <div class="form-group">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="expense_description" placeholder="Enter Description"/>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xxl-4">
                                <div class="form-group">
                                    <label>Date<span class="text-danger">*</span></label>
                                    <div class="input-group date" >
                                        <input type="text" class="form-control customer_creation_date"  name="expense_date" id="kt_datepicker_3"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xxl-4">
                                <div class="form-group">
                                    <label>Amount<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="expense_amount" placeholder="Enter Amount"/>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Expense Modal-->