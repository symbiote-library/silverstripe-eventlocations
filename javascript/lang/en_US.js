if(typeof(ss) == 'undefined' || typeof(ss.i18n) == 'undefined') {
	if(typeof(console) != 'undefined') console.error('Class ss.i18n not defined');
} else {
	ss.i18n.addDictionary('en_US', {
		'EventLocations.UPDATECAPACITY': 'Do you wish to update the event capacity to match the location capacity (%s)?'
	});
}
