<?php 
namespace Craft;

class Eventbrite_BaseService extends BaseApplicationComponent
{
	protected $apiKey;
	protected $oAuthToken;

	public function init()
	{
		$settings = craft()->plugins->getPlugin('eventbrite')->getSettings();

		$this->apiKey = $settings->apiKey;
		$this->oAuthToken = $settings->oAuthToken;
	}

	protected function _makeRequest($url)
	{
		try {
			$client = new \Guzzle\Http\Client();
			$request = $client->get($url);
			$request->addHeader('Authorization', 'Bearer ' . $this->oAuthToken);
			$response = $request->send();
			if (!$response->issuccessful()){
				return;
			}
			return $response->json();
		} catch(\Exception $e) {
			throw $e;
		}
	}

	protected function _buildEventbriteUrl($endpoint)
	{
		return 'https://www.eventbriteapi.com/v3/' . $endpoint . '?';
	}

	public function pop_from_array($array, $key, $default = null)
	{
		if (array_key_exists($key, $array)) {
			$val = $array[$key];
			unset($array[$key]);
			return $val;
		} else {
			return $default;
		}
	}
}