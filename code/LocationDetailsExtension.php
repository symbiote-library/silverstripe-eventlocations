<?php
/**
 * Adds the location address and a map to the event details page.
 *
 * @package silverstripe-eventlocations
 */
class LocationDetailsExtension extends Extension {

	public function augmentSidebarContent(&$content) {
		if ($this->owner->DateTime()->LocationID) {
			$location = $this->owner->DateTime()->Location();
			$viewer   = new SSViewer('EventLocationSidebarContent');

			$content .= $viewer->process($location);
		}
	}

}