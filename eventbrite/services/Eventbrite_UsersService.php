<?php
namespace Craft;

class Eventbrite_UsersService extends Eventbrite_BaseService
{
	protected function _getIdFromOptions($options)
	{
		return $this->pop_from_array($options, 'id');
	}

	public function getUser($options = array())
	{
		$id = $this->_getIdFromOptions($options);
		$query = http_build_query($options);
		$url = $this->_buildEventbriteUrl('users/' . $id . '/') . $query;
		$response = $this->_makeRequest($url);
		return $response;
	}

	public function getOwnedEvents($options = array())
	{
		$id = $this->_getIdFromOptions($options);
		$query = http_build_query($options);
		$url = $this->_buildEventbriteUrl('users/' . $id . '/owned_events/') . $query;
		$response = $this->_makeRequest($url);
		return $response['events'];
	}

	public function getEvents($options = array())
	{
		$id = $this->_getIdFromOptions($options);
		$query = http_build_query($options);
		$url = $this->_buildEventbriteUrl('users/' . $id . '/events/') . $query;
		$response = $this->_makeRequest($url);
		return $response['events'];
	}
}