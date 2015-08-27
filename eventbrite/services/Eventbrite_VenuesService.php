<?php
namespace Craft;

class Eventbrite_VenuesService extends Eventbrite_BaseService
{
	public function getVenue($options = array())
	{
		$id = $this->_getIdFromOptions($options);
		$query = http_build_query($options);
		$url = $this->_buildEventbriteUrl('venues/' . $id . '/') . $query;
		$response = $this->_makeRequest($url);
		return $response;
	}
}