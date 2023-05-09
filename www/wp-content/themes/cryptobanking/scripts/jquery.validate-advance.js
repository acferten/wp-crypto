(function (factory) {
  if (typeof define === "function" && define.amd) {
    define(["jquery", "../jquery.validate"], factory);
  } else if (typeof module === "object" && module.exports) {
    module.exports = factory(require("jquery"));
  } else {
    factory(jQuery);
  }
})(function ($) {
  /*
   * Translated default messages for the jQuery validation plugin.
   * Locale: RU (Russian; русский язык)
   */

  var vocabulary =
    document.vocabulary && document.vocabulary.validation
      ? document.vocabulary.validation
      : {};

  $.extend($.validator.messages, {
    required: vocabulary.required
      ? vocabulary.required
      : "Это поле обязательно",
    remote: vocabulary.remote
      ? vocabulary.remote
      : "Пожалуйста, введите правильное значение.",
    email: vocabulary.email
      ? vocabulary.email
      : "Пожалуйста, введите корректный e-mail",
    url: vocabulary.url
      ? vocabulary.url
      : "Пожалуйста, введите корректный URL.",
    date: vocabulary.date
      ? vocabulary.date
      : "Пожалуйста, введите корректную дату.",
    dateISO: vocabulary.dateISO
      ? vocabulary.dateISO
      : "Пожалуйста, введите корректную дату в формате ISO.",
    number: vocabulary.number
      ? vocabulary.number
      : "Пожалуйста, введите число.",
    digits: vocabulary.digits
      ? vocabulary.digits
      : "Пожалуйста, вводите только цифры.",
    creditcard: vocabulary.creditcard
      ? vocabulary.creditcard
      : "Пожалуйста, введите правильный номер кредитной карты.",
    equalTo: vocabulary.equalTo ? vocabulary.equalTo : "Пароли не совпадают!",
    extension: vocabulary.extension
      ? vocabulary.extension
      : "Пожалуйста, выберите файл с правильным расширением.",
    maxlength: $.validator.format(
      vocabulary.maxlength
        ? vocabulary.maxlength
        : "Пожалуйста, введите не больше {0} символов."
    ),
    minlength: $.validator.format(
      vocabulary.minlength
        ? vocabulary.minlength
        : "Пожалуйста, введите не меньше {0} символов."
    ),
    rangelength: $.validator.format(
      vocabulary.rangelength
        ? vocabulary.rangelength
        : "Пожалуйста, введите значение длиной от {0} до {1} символов."
    ),
    range: $.validator.format(
      vocabulary.range
        ? vocabulary.range
        : "Пожалуйста, введите число от {0} до {1}."
    ),
    max: $.validator.format(
      vocabulary.max
        ? vocabulary.max
        : "Пожалуйста, введите число, меньшее или равное {0}."
    ),
    min: $.validator.format(
      vocabulary.min
        ? vocabulary.min
        : "Пожалуйста, введите число, большее или равное {0}."
    ),
  });

  /**
   * email pattern
   */
  $.validator.addMethod(
    "email",
    function (value, element) {
      return (
        this.optional(element) ||
        /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,6}$/.test(value)
      );
    },
    vocabulary.email ? vocabulary.email : "Введите корректный адрес эл. почты"
  );

  return $;
});

(function () {
  function onlyLetters(el) {
    el.on("change keyup input click", function () {
      if (this.value.match(/[^A-Za-zА-Яа-яЁё-\s()]/g)) {
        this.value = this.value.replace(/[^A-Za-zА-Яа-яЁё-\s()]/g, "");
      }
    });

    return false;
  }

  function phoneSymbols(el) {
    el.on("change keyup input click", function () {
      if (this.value.match(/[^\d\+\(\)-\s]/g)) {
        this.value = this.value.replace(/[^\d\+\(\)-\s]/g, "");
      }
    });

    return false;
  }

  function onlyNumbers(el) {
    el.on("change keyup input click", function () {
      if (this.value.match(/[^\d]/g)) {
        this.value = this.value.replace(/[^\d]/g, "");
      }
    });

    return false;
  }

  var nameInput = $(".js-nameInput");
  if (nameInput.length) {
    onlyLetters(nameInput);
  }

  var msgPP = $("#js-msgPP");
  var msgPPtext = msgPP.find("#js-msgPPtext");
  var dsm = "The application has been successfully sent!";
  var dem = "Something went wrong, please try again later.";

  var successMsg = msgPPtext.length
    ? msgPPtext.attr("data-success") || dsm
    : dsm;
  var errorMsg = msgPPtext.length ? msgPPtext.attr("data-error") || dem : dem;

  function sendForm(form) {
    var $form = $(form);
    var action = $form.attr("action");

    var formPP = $form.closest(".js-pp");

    var formdata = {};
    var textElements = $(form).find(
      "input[type=text], input[type=email], textarea"
    );

    var clearArr = [];

    $.each(textElements, function (i) {
      var name = $(this).attr("name") || i;
      formdata[name] = $(this).val();

      if ($(this).hasClass("js-clear")) {
        clearArr.push($(this));
      }

      if (i == textElements.length - 1) {
        $.ajax({
          url: action,
          data: formdata,
          dataType: "json",
          method: "POST",
          success: function (data) {
            var response =
              typeof data === "object" ? data : JSON.parse(response);

            if (formPP.length) formPP.removeClass("pp--active");

            if (response.success) {
              if (msgPP.length) {
                msgPPtext.removeClass("pp__message--error");
                msgPPtext.text(
                  response.message ? response.message : successMsg
                );
                msgPP.addClass("pp--active");
              } else {
                alert(successMsg);
              }

              $.each(clearArr, function (i) {
                $(this).val("");
              });
            } else if (msgPP.length) {
              msgPPtext.addClass("pp__message--error");
              msgPPtext.text(response.message ? response.message : errorMsg);
              msgPP.addClass("pp--active");
            } else {
              alert(errorMsg);
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            if (formPP.length) formPP.removeClass("pp--active");
            if (msgPP.length) {
              msgPPtext.addClass("pp__message--error");
              msgPPtext.text(errorMsg);
              msgPP.addClass("pp--active");
            } else {
              alert(errorMsg);
            }
          },
        });
      }
    });
  }

  var faqForm = $("#js-faqForm");

  if (faqForm.length) {
    faqForm.validate({
      errorElement: "span",
      submitHandler: function (form, event) {
        event.preventDefault();
        sendForm(form);
      },
    });
  }

  var supForm = $("#js-supForm");

  if (supForm.length) {
    supForm.validate({
      errorElement: "span",
      submitHandler: function (form, event) {
        event.preventDefault();
        sendForm(form);
      },
    });
  }

  var ppReg = $("#js-ppReg");
  var regBtn = $(".js-regBtn");
  if (ppReg.length && regBtn.length) {
    regBtn.on("click", function (event) {
      event.preventDefault();
      document.documentElement.classList.add("pp-overflow");
      ppReg.addClass("pp--active");
    });

    var regForm = ppReg.find("#js-regForm");

    regForm.validate({
      errorElement: "span",
      submitHandler: function (form, event) {
        event.preventDefault();
        sendForm(form);
      },
    });
  }
})();
