document.addEventListener("DOMContentLoaded", function () {
  var phoneInputs = document.querySelectorAll('input[type="tel"]');

  if (phoneInputs) {
    phoneInputs.forEach(function (phoneInput) {
      var phoneMask = IMask(phoneInput, {
        mask: "+38(000)000-00-00",
      });
    });
  }
});
