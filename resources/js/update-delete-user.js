$(document).ready(function () {
  // Edit button click event
  $(document).on('click', '.edit-btn', function () {
    var userId = $(this).data('user-id');
    // AJAX request to fetch user data
    $.ajax({
      url: '/get-user/' + userId,
      method: 'GET',
      cache: false,
      success: function (user) {
        // Populate modal fields with user data
        $('#userId').val(user.user_id);
        $('#name').val(user.name);
        $('#address').val(user.address);
        $('#phone').val(user.phone);
        $('#email').val(user.email);
        $('#usertype').val(user.usertype);

        // Set data-user-id attribute of update button
        $('#update-btn').attr('data-user-id', user.user_id);

        // Show edit modal
        $('#edit-modal').modal('show');
      },
      error: function (xhr, status, error) {
        console.error('Error fetching user data:', error);
      }
    });
  });

  // Update button click event
  $(document).on('click', '#update-btn', function (e) {
    e.preventDefault();
    var userId = $(this).data('user-id');
    var formData = $('#edit-form').serialize();
    // AJAX request to update user data
    $.ajax({
      url: '/update-user/' + userId,
      method: 'PUT',
      data: formData,
      success: function (response) {
        // Close modal
        $('#edit-modal').modal('hide');
        // Update user data in table without refreshing
        reloadTableData();
        // Show success message
        swal({
          icon: 'success',
          title: 'User updated successfully!',
          timer: 1500
        });
      },
      error: function (xhr, status, error) {
        console.error('Error updating user data:', error);
      }
    });
  });

  // Delete button click event
  $(document).on('click', '.delete-btn', function (e) {
    var userId = $(this).data('user-id');
    // Confirm deletion using SweetAlert
    swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this user!',
      icon: 'warning',
      buttons: true,
      dangerMode: true
    }).then(willDelete => {
      if (willDelete) {
        // AJAX request to delete user
        $.ajax({
          url: '/delete-user/' + userId,
          method: 'DELETE',
          success: function (response) {
            // Update user data in table without refreshing
            reloadTableData();
            // Show success message
            swal({
              icon: 'success',
              title: 'User deleted successfully!',
              timer: 1500
            });
          },
          error: function (xhr, status, error) {
            console.error('Error deleting user:', error);
          }
        });
      }
    });
  });

  function reloadTableData() {
    $.ajax({
      url: '/adduser-get', // Replace with the actual endpoint to fetch user data
      method: 'GET',
      success: function (data) {
        var tbody = $('#example tbody');

        // Clear existing table rows and event handlers
        tbody.empty();

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
                '"><i class="bx bx-edit"></i> Edit</button>' +
                '<button type="button" class="btn btn-danger btn-sm delete-btn" data-user-id="' +
                user.user_id +
                '"><i class="bx bx-trash-alt"></i> Delete</button>' +
                '</div>'
            )
          );
          tbody.append(newRow);
        });
      },
      error: function (xhr, status, error) {
        console.error('Error loading user data:', error);
      }
    });
  }
});
