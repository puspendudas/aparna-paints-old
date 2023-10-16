"use strict";
var KTDatatablesAdvancedColumnVisibility = function() {

	var init = function() {
		var table = $('#all_customer');

		// begin first table
		table.DataTable({
			scrollY: 300,
			scrollCollapse: true,
			deferRender: true,
			paging:         false,
			lengthChange: false,
			searching: false,
			responsive: true,
			info : false,
			ordering: false,
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
			init();
		}
	};

}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedColumnVisibility.init();
});
