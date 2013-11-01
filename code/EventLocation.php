<?php
/**
 * An event location is an address where an event can be held, and also pulls
 * in capacity information to a calendar date time object.
 *
 * @package silverstripe-eventlocations
 */
class EventLocation extends DataObject {

	private static $db = array(
		'Title'    => 'Varchar(255)',
		'Capacity' => 'Int'
	);

	private static $extensions = array(
		'Addressable'
	);

	private static $summary_fields = array(
		'Title'       => 'Title',
		'Capacity'    => 'Capacity',
		'FullAddress' => 'Address'
	);

	private static $searchable_fields = array(
		'Title'
	);

	public function getCMSFields(){
		$fields = parent::getCMSFields();

		if(!class_exists('EventRegistration')){
			$fields->removeByName('Capacity');
		}
		
		return $fields;
	}

	public function summaryFields(){
		$fields = parent::summaryFields();
		if(!class_exists('EventRegistration')){
			unset($fields['Capacity']);
		}
		return $fields;
	}

	
	/**
	 * @param Member $member
	 * @return boolean
	 */
	public function canView($member = null) {
		return Permission::check('CMS_ACCESS_EventLocationAdmin', 'any', $member);
	}

	/**
	 * @param Member $member
	 * @return boolean
	 */
	public function canEdit($member = null) {
		return Permission::check('CMS_ACCESS_EventLocationAdmin', 'any', $member);
	}

	/**
	 * @param Member $member
	 * @return boolean
	 */
	public function canDelete($member = null) {
		return Permission::check('CMS_ACCESS_EventLocationAdmin', 'any', $member);
	}

	/**
	 * @todo Should canCreate be a static method?
	 *
	 * @param Member $member
	 * @return boolean
	 */
	public function canCreate($member = null) {
		return Permission::check('CMS_ACCESS_EventLocationAdmin', 'any', $member);
	}
}