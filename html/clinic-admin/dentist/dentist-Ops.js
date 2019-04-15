function addDentist() {
  var dentist-first-name = $('#first-name-field').val();
  var dentist-last-name = $('#last-name-field').val();
  var dentist-email = $('#email-id-field').val();
  var dentist-phone-number = $('#clinic-number-field').val();
  var dentist-years-active = $('#years-active-field').val();
  var specialty-id = $('#specialty-id-field').val();
  var clinic-office = $('#clinic-office-field').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-dentist.php",
    data : { "fname" : dentist-first-name,
             "lname" : dentist-last-name, "email" : dentist-email,
             "phone-number" : dentist-phone-number, "years-active" : dentist-years-active
             "specialty-id" : specialty-id, "clinic-office" : clinic-office
           },
    success : function(result) {
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#first-name-field').val("");
      $('#last-name-field').val("");
      $('#email-id-field').val("");
      $('#phone-number-field').val("");
      $('#years-active-field').val("");
      $('#specialty-id-field').val("");
      $('#clinic-office-field').val("");
    }
  });
}

// When the user clicks on the Remove BUtton
  $('.btn-danger').click( function() {
    // get the ID of the receptinist deleted
    var row = $(this).parent().parent();
    var id = $(row).children('td')[0].innerHTML;

    $.ajax({
      type : "POST",
      url : "delete-receptionist.php",
      data : {"id" : id},
      success : function (result) {
        row.remove();       // removes row from the front end
      }

    });
  }

);
