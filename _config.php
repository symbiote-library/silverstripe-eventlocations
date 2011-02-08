<?php
/**
 * @package silverstripe-eventmanagement-locations
 */

if (!class_exists('Addressable')) {
	throw new Exception('The Event Management Locations module requires the Addressable module.');
}


Object::add_extension('RegisterableDateTime', 'LocationDateTimeExtension');
Object::add_extension('EventTimeDetailsController', 'LocationDetailsExtension');