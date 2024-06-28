var stepper1;

$(document).ready(function () {
  // Initialize stepper1
  stepper1 = new Stepper($('#stepper-movie')[0]);

  // Get all 'next' buttons and stepper panels in the form stepper
  var btnNextList = $('.btn-next-form').toArray();
  
  // Get email and password input fields
  var inputMailForm = $('#inputMailForm');
  var inputPasswordForm = $('#inputPasswordForm');

  // Add click event to all 'next' buttons to move to the next step
  btnNextList.forEach(function (btn) {
    $(btn).on('click', function () {
      stepperForm.next();
    });
  });

});
