<?php
/**
 * Adds the fields to select a location for an event datetime.
 *
 * @package silverstripe-eventmanagement-locations
 */
class LocationDateTimeExtension extends DataObjectDecorator {

	public function extraStatics() {
		return array('has_one' => array(
			'Location' => 'EventLocation'
		));
	}

	public function updateDateTimeCMSFields($fields) {
		if (!$locations = DataObject::get('EventLocation')) {
			return;
		}

		$capacities = array();
		foreach ($locations as $location) {
			if ($location->Capacity) {
				$capacities[$location->ID] = (int) $location->Capacity;
			}
		}

		$dropdown = new DropdownField(
			'LocationID',
			_t('EventLocations.LOCATION', 'Location'),
			$locations->map('ID', 'Title'),
			null, null, true);
		$dropdown->addExtraClass('{ capacities: ' . Convert::array2json($capacities) . ' }');

		$fields->addFieldToTab('Root.Main', $dropdown, 'StartDate');
	}

	public function updateDateTimeTable($table) {
		$table->requirementsForPopupCallback = array($this, 'getPopupRequirements');
	}

	public function getPopupRequirements() {
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript(THIRDPARTY_DIR . '/jquery-metadata/jquery.metadata.js');
		Requirements::add_i18n_javascript('eventmanagement/locations/javascript/lang');
		Requirements::javascript('eventmanagement-locations/javascript/LocationDateTimeCms.js');
	}

}