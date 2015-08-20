<?php
namespace Craft;

class Eventbrite_SelfService extends Eventbrite_UsersService
{
	protected function _getIdFromOptions($options)
	{
		return 'me';
	}
}