// Edit button click event
$(document).on('click', '.edit-button', function () {
  var bookId = $(this).closest('tr').find('td:first').text();
  // AJAX request to fetch book data
  $.ajax({
    url: '/books-fetch/' + bookId,
    method: 'GET',
    cache: false,
    success: function (book) {
      // Populate modal fields with book data
      $('#bookId').val(book.book_id);
      $('#title').val(book.title);
      $('#author').val(book.author);
      $('#book_number').val(book.book_number);
      $('#genre').val(book.genre);
      $('#availability_status').val(book.availability_status);

      // Set data-book-id attribute of update button
      $('#update-book').attr('data-book-id', book.book_id);

      // Show edit modal
      $('#edit-book-modal').modal('show');
    },
    error: function (xhr, status, error) {
      console.error('Error fetching book data:', error);
    }
  });
});

$(document).on('click', '#update-book', function (e) {
  e.preventDefault();
  var bookId = $(this).data('book-id'); // Fetching the book id from data-book-id attribute
  var formData = $('#update-book-new').serialize();
  // AJAX request to update book data
  $.ajax({
    url: '/books-update/' + bookId, // Corrected URL matching the route name
    method: 'PUT',
    data: formData,
    success: function (response) {
      // Close modal
      $('#edit-book-modal').modal('hide');
      // Update book data in table without refreshing
      reloadTableData();
      // Show success message
      swal({
        icon: 'success',
        title: 'Book updated successfully!',
        timer: 1500
      });
    },
    error: function (xhr, status, error) {
      // Handle errors
    }
  });
});

// Delete button click event
$(document).on('click', '.delete-button', function () {
  var bookId = $(this).closest('tr').find('td:first').text();
  // Confirm deletion using SweetAlert
  swal({
    title: 'Are you sure?',
    text: 'Once deleted, you will not be able to recover this book!',
    icon: 'warning',
    buttons: true,
    dangerMode: true
  }).then(willDelete => {
    if (willDelete) {
      // AJAX request to delete book
      $.ajax({
        url: '/books-delete/' + bookId,
        method: 'DELETE',
        success: function (response) {
          // Update book data in table without refreshing
          reloadTableData();
          // Show success message
          swal({
            icon: 'success',
            title: 'Book deleted successfully!',
            timer: 1500
          });
        },
        error: function (xhr, status, error) {
          // Handle errors
        }
      });
    }
  });
});

function reloadTableData() {
  $.ajax({
    url: '/books', // Replace with the actual endpoint to fetch book data
    method: 'GET',
    success: function (data) {
      var tbody = $('#example tbody');
      // Clear existing table rows and event handlers
      tbody.empty().off();
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
            '<div class="btn-group" role="group"><button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#edit-book-modal" data-book-id="' +
              book.book_id +
              '"><i class="bx bx-edit"></i>Edit</button><button type="button" class="btn btn-danger btn-sm delete-btn" data-book-id="' +
              book.book_id +
              '"><i class="bx bx-trash-alt"></i>Delete</button></div>'
          )
        );
        tbody.append(newRow);
      });
    },
    error: function (xhr, status, error) {
      // Handle errors
    }
  });
}
