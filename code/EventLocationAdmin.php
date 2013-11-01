<?php
/**
 * Allows administrators to manage available event locations.
 *
 * @package silverstripe-eventlocations
 */
class EventLocationAdmin extends ModelAdmin {

	private static $title       = 'Event Locations';
	private static $menu_title  = 'Event Locations';
	private static $url_segment = 'event-locations';

	private static $managed_models  = 'EventLocation';
	private static $model_importers = array();

}