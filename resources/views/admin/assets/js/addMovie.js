var stepper1;
var stepper2;
var stepper3;
var stepper4;
var stepperForm;

$(document).ready(function () {
  stepper1 = new Stepper($('#stepper1')[0]);
  stepper2 = new Stepper($('#stepper2')[0], {
    linear: false
  });
  stepper3 = new Stepper($('#stepper3')[0], {
    linear: false,
    animation: true
  });
  stepper4 = new Stepper($('#stepper4')[0]);

  var stepperFormEl = $('#stepperForm')[0];
  stepperForm = new Stepper(stepperFormEl, {
    animation: true
  });

  var btnNextList = $('.btn-next-form').toArray();
  var stepperPanList = $(stepperFormEl).find('.bs-stepper-pane').toArray();
  var inputMailForm = $('#inputMailForm');
  var inputPasswordForm = $('#inputPasswordForm');
  var form = $(stepperFormEl).find('.bs-stepper-content form');

  btnNextList.forEach(function (btn) {
    $(btn).on('click', function () {
      stepperForm.next();
    });
  });

  $(stepperFormEl).on('show.bs-stepper', function (event) {
    form.removeClass('was-validated');
    var nextStep = event.detail.indexStep;
    var currentStep = nextStep;

    if (currentStep > 0) {
      currentStep--;
    }

    var stepperPan = stepperPanList[currentStep];

    if (($(stepperPan).attr('id') === 'test-form-1' && !inputMailForm.val().length)
      || ($(stepperPan).attr('id') === 'test-form-2' && !inputPasswordForm.val().length)) {
      event.preventDefault();
      form.addClass('was-validated');
    }
  });
});
