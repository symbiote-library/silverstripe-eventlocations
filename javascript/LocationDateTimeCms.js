;(function($) {
	$("select[name='LocationID']").change(function() {
		var location   = $(this).val();
		var capacities = $(this).metadata().capacities;

		if (location && location in capacities) {
			var capacity = capacities[location];
			var message  = ss.i18n._t(
				'EventLocations.UPDATECAPACITY',
				'Do you wish to update the event capacity to match the location capacity (%s)?');

			if (confirm(ss.i18n.sprintf(message, capacity))) {
				$("input[name='Capacity']").val(capacity);
			}
		}
	});
})(jQuery);