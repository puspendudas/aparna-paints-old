"use strict";
var KTDatatablesBasicScrollable = function() {

    var initTable2 = function() {
        var table = $('#data_info');

        // begin first table
        table.DataTable({
            responsive: true,
            deferRender: true,
            searching: true,
            paging: true,
            lengthChange: false,
            ordering: true,
            scrollY: 500,
            scrollX: '100%',
            scrollCollapse: true,
            scroller: true,
			fnInitComplete: function () {
				//$('.dataTables_scrollBody').perfectScrollbar();
				const ps = new PerfectScrollbar('.dataTables_scrollBody');
			},
			   //on paginition page 2,3.. often scroll shown, so reset it and assign it again
			fnDrawCallback: function (oSettings) {
				//$('.dataTables_scrollBody').perfectScrollbar('destroy').perfectScrollbar();
				//ps.update();
				const ps = new PerfectScrollbar('.dataTables_scrollBody');
			},
            columnDefs: [
				{
					className: 'dt-center',
					targets: '_all'
                }
            ],
        });
    };

    return {

        //main function to initiate the module
        init: function() {
            initTable2();
        },

    };

}();

jQuery(document).ready(function() {
    KTDatatablesBasicScrollable.init();
});
