<?php
/**
 * An event location is an address where an event can be held, and also pulls
 * in capacity information to a calendar date time object.
 *
 * @package silverstripe-eventlocations
 */
class EventLocation extends DataObject {

	public static $db = array(
		'Title'    => 'Varchar(255)',
		'Capacity' => 'Int'
	);

	public static $extensions = array(
		'Addressable'
	);

	public static $summary_fields = array(
		'Title'       => 'Title',
		'Capacity'    => 'Capacity',
		'FullAddress' => 'Address'
	);

	public static $searchable_fields = array(
		'Title'
	);

	
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