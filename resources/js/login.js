$(document).ready(function () {
  $('#frmlogin').on('submit', function (e) {
    e.preventDefault();

    if ($('#frmlogin')[0].checkValidity()) {
      $.ajax({
        url: '/auth/credentials-basic',
        method: 'POST',
        data: $('#frmlogin').serialize(),
        dataType: 'json',
        beforeSend: function () {
          $('#subtn').html('Redirecting...').prop('disabled', true);
        },
        success: function (data) {
          if (data.success) {
            window.location.href = '/dashboard';
          } else {
            $('#error-message')
              .text('Invalid Credentials. Attempts remaining: ' + data.attemptsLeft)
              .show();
            if (data.attemptsLeft <= 0 && !isNaN(data.timeLeft)) {
              startTimer(data.timeLeft);
            } else {
              $('#error-time').hide();
            }
          }
          $('#subtn').html('Login').prop('disabled', false);
        },
        error: function (xhr, status, error) {
          console.error('Error: ' + error);
          console.error('Response Text: ' + xhr.responseText);
          alert('Error!');
        },
        complete: function () {
          $('#subtn').val('Login').prop('disabled', false);
        }
      });
    }
  });
});

function startTimer(timeLeft) {
  var timer = setInterval(function () {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;
    $('#error-time')
      .text('Try again in ' + minutes + ' minutes and ' + seconds + ' seconds.')
      .show();
    timeLeft--;
    if (timeLeft < 0) {
      clearInterval(timer);
      $('#error-time').hide();
    }
  }, 1000);
}
