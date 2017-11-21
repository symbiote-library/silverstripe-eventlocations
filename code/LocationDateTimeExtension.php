<?php
/**
 * Adds the fields to select a location for an event datetime.
 *
 * @package silverstripe-eventlocations
 */
class LocationDateTimeExtension extends DataExtension {

	private static $has_one = array(
		'Location' => 'EventLocation'
	);

	public function updateCMSFields(FieldList $fields) {
		
		$locations = function(){
			return EventLocation::get()->where('"EventLocation"."Title" IS NOT NULL')->map()->toArray();
		};

		$dropdown = DropdownField::create(
			'LocationID',
			_t('EventLocations.LOCATION', 'Location'),
			$locations()
		)->setHasEmptyDefault(true);

		if(class_exists('QuickAddNewExtension')){
			$dropdown->useAddNew('EventLocation', $locations);
		}

		
		if($this->owner->hasField('Capacity')){
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-metadata/jquery.metadata.js');
			Requirements::add_i18n_javascript('eventlocations/javascript/lang');
			Requirements::javascript('eventlocations/javascript/LocationDateTimeCms.js');

			$capacities = array();
			foreach ($locations as $location) {
				if ($location->Capacity) {
					$capacities[$location->ID] = (int) $location->Capacity;
				}
			}
			$dropdown->addExtraClass('{ capacities: ' . Convert::array2json($capacities) . ' }');
		}
		$fields->insertBefore($dropdown, 'StartDate');
	}

}
