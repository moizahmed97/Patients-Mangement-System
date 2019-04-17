function addDentist() {
  var id = $('#id').val();
  var fname = $('#first-name-field').val();
  var lname = $('#last-name-field').val();
  var email = $('#email-id-field').val();
  var number = $('#clinic-number-field').val();
  var yearsActive = $('#years-active-field').val();
  var specialtyID = $('#specialty-id-field').val();
  var clinicOffice = $('#clinic-office-field').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-dentist.php",
    data : { "id" : id, "fname" : fname,
             "lname" : lname, "email" : email,
             "phone-number" : number, "years-active" : yearsActive,
             "specialty-id" : specialtyID, "clinic-office" : clinicOffice
           },
    success : function(result) {
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#id').val("");
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
/*  $('.btn-danger').click( function() {
    // get the ID of the receptinist deleted
    var row = $(this).parent().parent();
    var id = $(row).children('td')[0].innerHTML;
    console.log(id);
    $.ajax({
      type : "POST",
      url : "delete-dentist.php",
      data : {"id" : id},
      success : function (result) {
        alert(result);
        row.remove();       // removes row from the front end
      }

    });
  }

);   */

function updateDentist(dID) {
  $.ajax({
    type : "POST",
    url : "update-dentist.php",
    data : $('#updateForm').serialize(),
    success : function (result) {
      alert(result);
    }

  });
}

function removeRow(id) {
  $.ajax({
    type : "POST",
    url : "delete-dentist.php",
    data : {"id" : id},
    success : function (result) {
      var sr = id;
      sr = '#' + sr;
      // remove from front end
      $(sr).fadeOut(1000);
    }

  });
}
