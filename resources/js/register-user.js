$(document).ready(function () {
  // Handle registration form submission
  $('#register-form').submit(function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    // Serialize the form data
    var formData = $(this).serialize();

    // Send an AJAX request to register the user
    $.ajax({
      url: '/adduser-register',
      method: 'POST',
      data: formData,
      success: function (response) {
        // Show success message
        $('#registration-errors').html('').hide();
        swal({
          icon: 'success',
          title: 'Registration successful!',
          showConfirmButton: false,
          timer: 1000
        });

        // Reset form fields
        $('#register-form')[0].reset();

        // Hide the modal
        $('#addModal').modal('hide');

        // Reload the table data using AJAX
        reloadTableData();
      },
      error: function (xhr, status, error) {
        var errors = xhr.responseJSON.errors;
        var errorMessage = errors ? Object.values(errors).flat().join('<br>') : 'An error occurred. Please try again.';
        $('#registration-errors').html(errorMessage).show();
      }
    });
  });

  // Function to reload table data
  function reloadTableData() {
    $.ajax({
      url: '/adduser-get', // Replace with the actual endpoint to fetch user data
      method: 'GET',
      cache: false,
      success: function (data) {
        // Clear existing table rows
        $('#example tbody').empty();

        // Append new rows for each user
        data.forEach(function (user) {
          var newRow = $('<tr>');
          newRow.append($('<td>').text(user.user_id));
          newRow.append($('<td>').text(user.name));
          newRow.append($('<td>').text(user.address));
          newRow.append($('<td>').text(user.phone));
          newRow.append($('<td>').text(user.usertype));
          newRow.append($('<td>').text(user.email));
          newRow.append(
            $('<td>').html(
              '<div class="btn-group" role="group">' +
                '<button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#edit-modal" data-user-id="' +
                user.user_id +
                '"><i class="bx bx-edit"></i>Edit</button>' +
                '<button type="button" class="btn btn-danger btn-sm delete-btn" data-user-id="' +
                user.user_id +
                '"><i class="bx bx-trash-alt"></i>Delete</button>' +
                '</div>'
            )
          );
          $('#example tbody').append(newRow);
        });
      },
      error: function (xhr, status, error) {
        console.error('Error loading user data:', error);
      }
    });
  }
});
