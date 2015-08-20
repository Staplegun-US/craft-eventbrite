<?php
namespace Craft;

class Eventbrite_UsersVariable
{
	protected $_serviceName = 'eventbrite_users';

	public function users($options = array())
	{
		return craft()->{$this->_serviceName}->getUser($options);
	}

	public function ownedEvents($options = array())
	{
		return craft()->{$this->_serviceName}->getOwnedEvents($options);
	}
	
	public function events($options = array())
	{
		return craft()->{$this->_serviceName}->getEvents($options);
	}
}