function addClinicAdmin() {
  var id = $('#id').val();
  var fname = $('#first-name-field').val();
  var lname = $('#last-name-field').val();
  var email = $('#email-id-field').val();
  var clinicName = $('#clinic-name-field').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-clinic-admin.php",
    data : { "id" : id, "fname" : fname,
             "lname" : lname, "email" : email,
             "clinicName" : clinicName },
    success : function(result) {
      if (result.length > 35) {
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#id').val();
      $('#first-name-field').val("");
      $('#last-name-field').val("");
      $('#email-id-field').val("");
      $('#clinic-name-field').val("");
    }
    else {
      alert(result);
    }
    }
  });
}

// When the user clicks on the Remove BUtton
/*
  $('.btn-danger').click( function() {
    // get the ID of the receptinist deleted
    var row = $(this).parent().parent();
    var id = $(row).children('td')[0].innerHTML;

    $.ajax({
      type : "POST",
      url : "delete-receptionist.php",
      data : {"id" : id},
      success : function (result) {
        alert(result);
        row.remove();       // removes row from the front end
      }

    });
  }

);   */

function removeRow(id) {
  console.log("He");
  $.ajax({
    type : "POST",
    url : "delete-clinic-admin.php",
    data : {"id" : id},
    success : function (result) {
      var sr = id;
      sr = '#' + sr;
      // remove from front end
      tds = $(sr).children();
      $(tds[5]).html("Inactive");
}

  });
}

function activate(id) {
  $.ajax({
    type : "POST",
    url : "activate-clinic-admin.php",
    data : {"id" : id},
    success : function (result) {
      var sr = id;
      sr = '#' + sr;
      // remove from front end
      tds = $(sr).children();
      $(tds[5]).html("Active");
    }

  });
}
