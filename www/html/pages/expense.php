<?php
include("lib/config.php");
?>
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <?php
            //<div class="col-lg-4">
            
                // <!--begin::Mixed Widget 14-->
                // <div class="card card-custom card-stretch shadow-shorter">
                //     <!--begin::Header-->
                //     <div class="card-header border-0 pt-5">
                //         <div class="col-lg-9" id="tmst">
                //             <div id="s-bar">
                //                 <button class="btn btn-primary"  onclick="callModal('addPartyDetailsModal')"  >
                //                     <i class="flaticon2-plus"></i>
                //                     <span>PARTY</span>
                //             </div>
                //         </div>
                //         <div class="col-lg-3" id="tms">
                //             <form  class="search-bar">
                //                 <input type="search" name="search" id="party_search_box" onfocusout="fOut()" onfocus="fIn()" pattern=".*\S.*" required>
                //                     <button class="search-btn" type="submit">
                //                         <span>Search</span>
                //                     </button>
                //             </form>
                //         </div>
                //     </div>
                //     <!--end::Header-->

                //     <!--begin::Body-->
                //     <div class="card-body pt-0 pb-3">
                //         <div class="tab-content">
                //             <!--begin: Datatable-->
                //             <table class="table table-separate table-head-custom table-checkable table-hover" id="all_party">
                //                 <thead>
                //                     <tr>
                //                         <th>NAME</th>
                //                         <th>AMOUNT</th>
                //                         <th></th>
                //                     </tr>
                //                 </thead>

                //                 <tbody id="display_party"></tbody>
                                
                //             </table>
                //             <!--end: Datatable-->
                //         </div>
                //     </div>
                //     <!--end::Body-->
                // </div>
                // <!--end::Mixed Widget 14-->
                
            //</div>
        ?>
        <div class="col-lg-12">
            <!--begin::Advance Table Widget 4-->
            <!-- <div class="card card-custom card-stretch gutter-b" id="info_party"></div> -->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body">
                    <div class="tab-content">
                        <button class="btn btn-primary"  onclick="callModal('expense')" ><i class="flaticon2-plus"></i><span>Add Expense</span></button>
                    </div>
                </div>
            </div>
            

                <!--end::Header-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <div class="tab-content">
                        
                        <!--begin::Table-->
                        <table class="table table-separate table-head-custom table-checkable " id="data_info_1">
                            <thead>
                                <tr>
                                    <th>NUMBER</th>
                                    <th>DESCRIPTION</th>
                                    <th>DATE</th>
                                    <th>AMOUNT</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="display_expense"></tbody>
        		        </table>

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