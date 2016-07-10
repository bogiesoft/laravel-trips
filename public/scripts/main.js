$(document).ready(function(){

	$(".dropdown-toggle").dropdown();

	$('.collapse').collapse();

	$( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      showButtonPanel: false,
      dateFormat: 'yy/m/d'
    });
	

	$( document ).on( 'click', '.addDestPhoto', function (e) {

		var $parentElement = $(this).parent().closest('.destinationPhotos');

		var count = $('.destinationPhotos').length;
		var assignedNo = count + 1;

		var locale = $('input.hiddenLocale').attr('data-value');
		
		if ( locale.trim() == 'en' ){

		var html = '<div class="destinationPhotos form-group">' +
                            '<label for="dest_photo' + assignedNo  +'" class="col-md-4 control-label">Destination Photo</label>' +
                            '<div class="col-md-4">' +
                                '<input id="dest_photo' + assignedNo  +'" type="file" class="form-control" name="dest_photo' + assignedNo  +'">' +
                            '</div>' + 
                    '</div>';
         }else{

         	var html = '<div class="destinationPhotos form-group">' +
                            '<label for="dest_photo' + assignedNo  +'" class="col-md-4 control-label">Φωτογραφία Προορισμού</label>' +
                            '<div class="col-md-4">' +
                                '<input id="dest_photo' + assignedNo  +'" type="file" class="form-control" name="dest_photo' + assignedNo  +'">' +
                            '</div>' + 
                    '</div>';

         }

        $parentElement.after(html);

        $('.countPhotos').attr('value', assignedNo);

	});

	$( document ).on( 'click', '.addDepartureDates', function (e) {

		var $parentElement = $(this).parent().closest('.departureDates');

		var count = $('.departureDates').length;
		var assignedNo = count + 1;

		var locale = $('input.hiddenLocale').attr('data-value');
		
		if ( locale.trim() == 'en' ){
			var html = '<div class="departureDates form-group">' +
                            '<label for="departureDates' + assignedNo  +'" class="col-md-4 control-label">Departure Date</label>' +
                            '<div class="col-md-4">' +
                                '<input id="departureDates' + assignedNo  +'" type="text" class="form-control" name="departureDates' + assignedNo  +'">' +
                            '</div>' + 
                    '</div>';
       }else{

         	var html = '<div class="departureDates form-group">' +
                            '<label for="departureDates' + assignedNo  +'" class="col-md-4 control-label">Ημερομηνία Αναχώρησης</label>' +
                            '<div class="col-md-4">' +
                                '<input id="departureDates' + assignedNo  +'" type="text" class="form-control" name="departureDates' + assignedNo  +'">' +
                            '</div>' + 
                    '</div>';

         }


        $parentElement.after(html);

        var tempName = '#departureDates' + assignedNo;
        $( tempName ).datepicker({
	      changeMonth: true,
	      changeYear: true,
	      showButtonPanel: false,
	      dateFormat: 'yy/m/d'
	    });

        $('.countDepartureDates').attr('value', assignedNo);

	});


	

});

