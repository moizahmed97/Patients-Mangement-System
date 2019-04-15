function addRecept() {
  var fname = $('#first-name-field').val();
  var lname = $('#last-name-field').val();
  var email = $('#email-id-field').val();
  var join-date = $('#join-date-field').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-receptionist.php",
    data : { "fname" : fname,
             "lname" : lname, "email" : email,
             "join-date" : join-date },
    success : function(result) {
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#first-name-field').val("");
      $('#last-name-field').val("");
      $('#email-id-field').val("");
      $('#join-date-field').val("");
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
