<?php
namespace Craft;

class EventbriteVariable
{
	public function __call($name, $arguments)
	{
		$className = 'Craft\Eventbrite_' . ucfirst($name) . 'Variable';
		return (class_exists($className)) ? new $className() : 'null';
	}
}