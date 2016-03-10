/**
 * @file
 * Contains helper functions to work with theme. NB: javascript in this file is included on every page, sitewide
 */

(function ($) {
  "use strict"

  /**
   * Changes caret icon for fieldset when it is being collapsed or expanded.
   */
  Drupal.behaviors.materializeFieldset = {
    attach: function (context) {
      jQuery('fieldset', context).on('collapsed', function (data) {
        var $caretIcon = jQuery('.fieldset-title i', this);
        if (data.value === true) {
          $caretIcon.removeClass('mdi-hardware-keyboard-arrow-down').addClass('mdi-hardware-keyboard-arrow-right');
        }
        else {
          $caretIcon.removeClass('mdi-hardware-keyboard-arrow-right').addClass('mdi-hardware-keyboard-arrow-down');
        }
      });
    }
  };
  $(".button-collapse").sideNav();
  $('.modal-trigger').leanModal();
  $('#request_service_form_submit').click(function( event ) {
    var email = $('#request_service_form').attr('contact');
    var service = $('#request_service_form').attr('service').replace("'s", '');
    var body = 'Hi,\n\nI would like to request a ' + service + '\nMy details are as follows:\n\n';
    $('#request_service_form div.input-field input').each(function(field) {
      body += this.id + ':' + $(this).val() + '\n';
    });
    var mailto = 'mailto:' + email + '?Subject=' + service + ' request&body=' + encodeURIComponent(body);
    console.log(mailto);
    window.location = mailto;
    $('#request').closeModal();
    return false;
  });
})(jQuery);
