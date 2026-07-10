(function ($) {
  "use strict";

  // Validate email format
  function isValidEmail(email) {
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);
  }

  // Handle form submission via AJAX
  function handleFormSubmit(e) {
    e.preventDefault();
    var $form = $(this);
    var action = $form.attr('action') || 'mail.php';
    var $formMessages = $form.find('.form-messages');
    if ($formMessages.length === 0) {
      $formMessages = $form.siblings('.form-messages');
    }
    if ($formMessages.length === 0) {
      $formMessages = $form.parent().find('.form-messages');
    }

    var valid = true;
    var invalidCls = 'is-invalid';

    // Validate required fields
    $form.find('[required]').each(function () {
      var $input = $(this);
      if (!$input.val()) {
        $input.addClass(invalidCls);
        valid = false;
      } else {
        $input.removeClass(invalidCls);
      }
    });

    // Validate email inputs
    $form.find('input[type="email"]').each(function () {
      var $emailInput = $(this);
      var val = $emailInput.val();
      if (val && !isValidEmail(val)) {
        $emailInput.addClass(invalidCls);
        valid = false;
      } else if (val) {
        $emailInput.removeClass(invalidCls);
      }
    });

    if (!valid) {
      $formMessages.removeClass('success').addClass('error').text('Please fill in all required fields correctly.');
      return;
    }

    // Submit via AJAX
    var formData = $form.serialize();
    var $submitBtn = $form.find('[type="submit"]');
    var originalBtnText = $submitBtn.text();
    $submitBtn.prop('disabled', true).text('Sending...');

    $.ajax({
      url: action,
      data: formData,
      type: "POST"
    })
    .done(function (response) {
      $formMessages.removeClass('error').addClass('success').text(response);
      // Clear all inputs except submit button
      $form.find('input:not([type="submit"]), textarea, select').val('');
      // Restore preferred defaults if select dropdowns had options
      $form.find('select').prop('selectedIndex', 0);
    })
    .fail(function (data) {
      $formMessages.removeClass('success').addClass('error');
      if (data.responseText !== '') {
        $formMessages.text(data.responseText);
      } else {
        $formMessages.text('Oops! An error occurred and your message could not be sent.');
      }
    })
    .always(function () {
      $submitBtn.prop('disabled', false).text(originalBtnText);
    });
  }

  // Bind submit event to all contact forms
  $(document).on('submit', '.contact-form, #appointmentForm', handleFormSubmit);

})(jQuery);