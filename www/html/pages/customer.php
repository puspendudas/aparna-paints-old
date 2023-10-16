<?php
include("lib/config.php");
?>
<div class="container-fluid" >

        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-custom card-stretch shadow-shorter">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <div class="col-lg-9" id="tmst">
                            <div id="s-bar">
                                <button class="btn btn-primary"  onclick="callModal('addCustomerDetailsModal')"  >
                                    <i class="flaticon2-plus"></i>
                                    <span>CUSTOMER</span></button>
                            </div>
                        </div>
                        <div class="col-lg-3" id="tms">
                            <form  class="search-bar">
                                <input type="search" name="search" id="search_box" onfocusout="fOut()" onfocus="fIn()" pattern=".*\S.*" required>
                                    <button class="search-btn" type="submit">
                                        <span>Search</span>
                                    </button>
                            </form>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-0 pb-3">
                        <div class="tab-content">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable table-hover" id="all_customer">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>BALANCE</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id="display_customer"></tbody>
                                
                            </table>
                            <!--end: Datatable-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            <div class="col-lg-8">
                <!--begin::Advance Table Widget 4-->
                <div class="card card-custom card-stretch gutter-b" id="info_customer"></div>

                    <!--end::Header-->
                <div class="card card-custom card-stretch gutter-b">

                    <!--begin::Body-->
                    <div class="card-body pt-0 pb-3">
                        <div class="tab-content">

                        <div class="col-lg-12" id="tms" style="margin:20px;">
                            <form  class="search-bar">
                                <input type="search" name="search" id="search_right_customer" pattern=".*\S.*" required>
                                    <button class="search-btn" type="submit">
                                        <span>Search</span>
                                    </button>
                            </form>
                        </div>

                            <!--begin::Table-->
                            <table class="table table-separate table-head-custom table-checkable " id="all_customer">
                                <thead>
                                    <tr>
                                        <th>BILL NUMBER</th>
                                        <th>BILL TYPE</th>
                                        <th>DATE</th>
                                        <th>TOTAL</th>
                                        <th>BALANCE</th>
                                    </tr>
                                </thead>
                                <tbody id="customer_details_table"></tbody>
                            </table>

                            <input type="hidden" id="customer_id_for_search_right_customer" class="form-control" value="" name=""/>

                            <!--end::Table-->
                        </div>
                    </div>

                    <!--end::Body-->
                </div>

                <!--end::Advance Table Widget 4-->

                <!--[html-partial:end:{"id":"demo1/dist/inc/view/partials/content/widgets/advance-tables/widget-4","page":"index"}]/-->
            </div>
        </div>

        <!--end::Row-->

        
        
</div>