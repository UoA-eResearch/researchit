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
  $(".button-collapse").sideNav({menuWidth: 500, closeOnClick: false});
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
  /*
  var offset = 220;
  var lastP = 0;
  $(window).scroll(function(){
    var p = $(window).scrollTop();
    $(".research_lifecycle_stage.name").each(function() {
      var t = $(this).offset().top - offset;
      if (t > lastP && t < p || t < lastP && t > p) {
        var d = $(this).next();
        $('.research_lifecycle_stage.services').not(d).fadeOut();
        d.fadeIn();
      }
    });
    lastP = p;
  });
  */
  $(".research_lifecycle_stage.name").mouseover(function() {
    var d = $(this).next();
    $('.research_lifecycle_stage.services').not(d).fadeOut();
    d.fadeIn();
  });
  $(".research_lifecycle_stage.name").click(function() {
    var d = $(this).next();
    $('.research_lifecycle_stage.services').not(d).fadeOut();
    d.fadeIn();
  });
  var research_lifecycle = ['Plan_Design', 'Create_Collect_Capture', 'Analyze_Interpret', 'Write_up_Publish', 'Discover_Re-use'];
  $.each(research_lifecycle, function(i,stage) {
    $('.lifecycle_selector.' + stage).mouseover(function() {
      var target = $('.research_lifecycle_stage.' + stage);
      $('.research_lifecycle_tip').hide();
      $('.research_lifecycle_stage').not(target).hide();
      target.show();
      target = $('.triangle-down.' + stage);
      $('.triangle-down').not(target).css("visibility", "hidden");
      target.css("visibility", "visible");
    });
  });
  $('.search_button').click(function(e) {
    e.preventDefault();
    $('.searchBox').slideToggle();
  });
})(jQuery);
