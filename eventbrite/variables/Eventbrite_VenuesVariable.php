<?php
namespace Craft;

class Eventbrite_VenuesVariable
{
	public function venues($options = array())
	{
		return craft()->eventbrite_venues->getVenue($options);
	}
}