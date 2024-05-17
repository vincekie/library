$(document).ready(function () {
  $('#book-register').submit(function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    // Serialize the form data
    var formData = $(this).serialize();

    // Send an AJAX request to register the book
    $.ajax({
      url: '/register-book',
      method: 'POST',
      data: formData,
      success: function (response) {
        // Show success message
        $('#book-errors').html('').hide();
        swal({
          icon: 'success',
          title: 'Book Added Successfully!',
          showConfirmButton: false,
          timer: 1000
        });

        // Reset form fields
        $('#book-register')[0].reset();

        // Hide the modal
        $('#bookmodal').modal('hide');

        // Reload the table data using AJAX
        reloadTableData();
      },
      error: function (xhr, status, error) {
        var errors = xhr.responseJSON.errors;
        var errorMessage = errors ? Object.values(errors).flat().join('<br>') : 'An error occurred. Please try again.';
        $('#book-errors').html(errorMessage).show();
      }
    });
  });
});

function reloadTableData() {
  $.ajax({
    url: '/addbooks-get', // Replace with the actual endpoint to fetch book data
    method: 'GET',
    cache: false,
    success: function (data) {
      // Clear existing table rows
      $('#book-table tbody').empty();

      // Append new rows for each book
      data.forEach(function (book) {
        var newRow = $('<tr>');
        newRow.append($('<td>').text(book.book_id));
        newRow.append($('<td>').text(book.title));
        newRow.append($('<td>').text(book.author));
        newRow.append($('<td>').text(book.book_number));
        newRow.append($('<td>').text(book.genre));
        newRow.append($('<td>').text(book.availability_status));
        newRow.append(
          $('<td>').html(
            '<div class="btn-group" role="group"><button type="button" id="edit-btn" class="btn btn-primary btn-sm edit-button" data-bs-toggle="modal" data-bs-target="#edit-modal"><i class="bx bx-edit"></i>Edit</button><button type="button" id="delete-button" class="btn btn-danger btn-sm delete-btn"><i class="bx bx-trash-alt"></i>Delete</button></div>'
          )
        );
        $('#book-table tbody').append(newRow);
      });
    },
    error: function (xhr, status, error) {
      console.error('Error loading book data:', error);
    }
  });
}
