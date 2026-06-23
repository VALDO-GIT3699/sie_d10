
(function ($, Drupal, drupalSettings) {
	'use strict';

	Drupal.behaviors.alertarEnlaces = function(context) {
		$('highcharts-data-table').addClass("table-responsive");
	}

        Drupal.behaviors.configHighcharts = function(context) {
          Highcharts.setOptions({
		lang: {
			numericSymbols: [' thousands', ' millions']
		}
	  });
        }

	Drupal.behaviors.autoSubmit = {
	  attach: function(context, settings) {  
		$(".dynamic-layouts-container .views-element-container")
		.find("form.views-exposed-form").find("select").bind("change", function () {
			$(this).closest("form").find("input[type='submit']").click();
		});
	  }
	}; 
  }) (jQuery, Drupal, drupalSettings);
