function fOut() {
    var element1 = document.getElementById("s-bar");
    var element = document.getElementById("tmst");
    var ele = document.getElementById("tms");

     element.classList.remove("no_view");
     element1.classList.remove("no_view");
     ele.classList.remove("col-lg-12");
     ele.classList.add("col-lg-3");
     ele.value = '';
 }
function fIn() {
    var element1 = document.getElementById("s-bar");
    var element = document.getElementById("tmst");
    var ele = document.getElementById("tms");

    element.classList.add("no_view");
    element1.classList.add("no_view");
    ele.classList.remove("col-lg-3");
    ele.classList.add("col-lg-12");
}

function blr(){
    var blr1 = document.getElementById("blr1");
    var blr2 = document.getElementById("blr2");
    var blr3 = document.getElementById("blr3");
    var blr4 = document.getElementById("blr4");
    var blr5 = document.getElementById("blr5");
    var blr6 = document.getElementById("blr6");
    blr1.classList.toggle("blr");
    blr2.classList.toggle("blr");
    blr3.classList.toggle("blr");
    blr4.classList.toggle("blr");
    blr5.classList.toggle("blr");
    blr6.classList.toggle("blr");
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function makePDF(divName) {

    var quotes = document.getElementById(divName);

    html2canvas(quotes, {
        onrendered: function(canvas) {

        //! MAKE YOUR PDF
        var pdf = new jsPDF('p', 'pt', 'letter');

        for (var i = 0; i <= quotes.clientHeight/980; i++) {
            //! This is all just html2canvas stuff
            var srcImg  = canvas;
            var sX      = 0;
            var sY      = 980*i; // start 980 pixels down for every new page
            var sWidth  = 900;
            var sHeight = 980;
            var dX      = 0;
            var dY      = 0;
            var dWidth  = 900;
            var dHeight = 980;

            window.onePageCanvas = document.createElement("canvas");
            onePageCanvas.setAttribute('width', 900);
            onePageCanvas.setAttribute('height', 980);
            var ctx = onePageCanvas.getContext('2d');
            // details on this usage of this function: 
            // https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API/Tutorial/Using_images#Slicing
            ctx.drawImage(srcImg,sX,sY,sWidth,sHeight,dX,dY,dWidth,dHeight);

            // document.body.appendChild(canvas);
            var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);

            var width         = onePageCanvas.width;
            var height        = onePageCanvas.clientHeight;

            //! If we're on anything other than the first page,
            // add another page
            if (i > 0) {
                pdf.addPage(612, 791); //8.5" x 11" in pts (in*72)
            }
            //! now we declare that we're working on that page
            pdf.setPage(i+1);
            //! now we add content to that page!
            pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width*.62), (height*.62));

        }
        //! after the for loop is finished running, we save the pdf.
        pdf.save('test.pdf');
    }
  });
}
// Class definition

var KTBootstrapSelect = function () {

	// Private functions
	var demos = function () {
		// minimum setup
		$('.kt-selectpicker').selectpicker();
	}

	return {
		// public functions
		init: function() {
			demos();
		}
	};
}();

jQuery(document).ready(function() {
	KTBootstrapSelect.init();
});

