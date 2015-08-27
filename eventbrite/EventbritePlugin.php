<?php
namespace Craft;

class EventbritePlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Eventbrite');
	}

	function getVersion()
	{
		return '0.1';
	}

	function getDeveloper() 
	{
		return 'STAPLEGUN';
	}

	function getDeveloperUrl()
	{
		return 'http://staplegun.us';
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('eventbrite/_settings', array(
			'settings' => $this->getSettings()
		));
	}

	protected function defineSettings()
	{
		return array(
			'oAuthToken' => array(AttributeType::String, 'label' => 'Eventbrite OAuth Token (Personal)'),
			'cacheDuration' => array(AttributeType::Number, 'label' => 'Cache Duration (seconds)', 'default' => 3600)
		);
	}
}