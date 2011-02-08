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

}