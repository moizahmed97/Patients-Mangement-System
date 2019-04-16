function addRecept() {
  var id = $('#id').val();
  var fname = $('#first-name-field').val();
  var lname = $('#last-name-field').val();
  var email = $('#email-id-field').val();
  var joinDate = $('#join-date-field').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-receptionist.php",
    data : { "id" : id, "fname" : fname,
             "lname" : lname, "email" : email,
             "join-date" : joinDate },
    success : function(result) {
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#id').val();
      $('#first-name-field').val("");
      $('#last-name-field').val("");
      $('#email-id-field').val("");
      $('#join-date-field').val("");
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
    url : "delete-receptionist.php",
    data : {"id" : id},
    success : function (result) {
      var sr = id;
      sr = '#' + sr;
      // remove from front end
      tds = $(sr).children();
      $(tds[5]).html(2);
}

  });
}

function activate(id) {
  $.ajax({
    type : "POST",
    url : "activate-receptionist.php",
    data : {"id" : id},
    success : function (result) {
      var sr = id;
      sr = '#' + sr;
      // remove from front end
      tds = $(sr).children();
      $(tds[5]).html(1);    
    }

  });
}
