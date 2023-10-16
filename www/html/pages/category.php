<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-4">

            <!--begin::Mixed Widget 14-->
            <div class="card card-custom card-stretch">

                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <div class="col-lg-4" id="tmst">
                        <div id="s-bar">
                            <button class="btn btn-primary" onclick="callModal('addCategory')">
                                <i class="flaticon2-plus"></i>
                                <span>New</span>
                        </div>
                    </div>
                    <div class="col-lg-8" id="tms">
                        <form action="" class="search-bar">
                            <input type="search" name="search" id="category_search_box" onfocusout="fOut()" onfocus="fIn()" pattern=".*\S.*" required>
                                <button class="search-btn" type="submit">
                                    <span>Search</span>
                                </button>
                        </form>
                    </div>
                </div>

                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">

                    <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th title="Field #1">Name</th>
                                    <th title="Field #2"></th>
                                </tr>
                            </thead>
                            <tbody id="display_category"></tbody>
                        </table>
                    <!--end: Datatable-->
                </div>

                <!--end::Body-->
            </div>

            <!--end::Mixed Widget 14-->

            
        </div>
        <div class="col-lg-8">

            <!--begin::Advance Table Widget 4-->
            <div class="card card-custom card-stretch gutter-b" id="info_category">

                <!--begin::Header-->
                
            </div>

                <!--end::Header-->
            <div class="card card-custom card-stretch gutter-b">

                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">

                        <div class="col-lg-12" id="tms" style="margin:20px;">
                            <form  class="search-bar">
                                <input type="search" name="search" id="search_right_category" pattern=".*\S.*" required>
                                    <button class="search-btn" type="submit">
                                        <span>Search</span>
                                    </button>
                            </form>
                        </div>

                        <!--begin::Table-->
                        <table class="table table-separate table-head-custom table-checkable" id="data_info_1">
                            <thead>
                                <tr>
                                    <th>SERIAL NUMBER</th>
                                    <th>ITEM NAME</th>
                                    <th>QUANTITY</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="category_details_table"></tbody>
        		        </table>

                        <input type="hidden" id="category_id_for_search_right_category" class="form-control" value="" name=""/>

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