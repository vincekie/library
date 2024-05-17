$(document).ready(function () {
  $('#btnRegister').click(function (event) {
    event.preventDefault();

    var formData = $('#registerForm').serialize();

    $.ajax({
      type: 'POST',
      url: '/auth/register-user-basic',
      data: formData,
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Registration successful!',
          showConfirmButton: false,
          timer: 1500
        }).then(function () {
          window.location.href = '/';
        });
      }
    });
  });
});
