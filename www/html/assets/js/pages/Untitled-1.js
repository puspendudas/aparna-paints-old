"use strict";
var KTDatatablesExtensionsScroller = function() {

	var initTable1 = function() {
		var table = $('#kt_datatable1');

		// begin first table
		table.DataTable({
			responsive: true,
            deferRender: true,
            searching: false,
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
					className: 'dt-right', 
					targets: 1
				},
				{
					className: 'dt-left', 
					targets: 0
				},
				{
					className: 'dt-center', 
					targets: 2
				}
			],
		});
	};


	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesExtensionsScroller.init();
});
