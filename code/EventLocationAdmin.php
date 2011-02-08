<?php
/**
 * Allows administrators to manage available event locations.
 *
 * @package silverstripe-eventlocations
 */
class EventLocationAdmin extends ModelAdmin {

	public static $title       = 'Event Locations';
	public static $menu_title  = 'Event Locations';
	public static $url_segment = 'event-locations';

	public static $managed_models  = 'EventLocation';
	public static $model_importers = array();

}