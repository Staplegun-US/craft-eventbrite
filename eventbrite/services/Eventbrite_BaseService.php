<?php 
namespace Craft;

class Eventbrite_BaseService extends BaseApplicationComponent
{
	protected $oAuthToken;
	public $cacheDuration;

	public function init()
	{
		$settings = craft()->plugins->getPlugin('eventbrite')->getSettings();

		$this->oAuthToken = $settings->oAuthToken;
		$this->cacheDuration = $settings->cacheDuration;
	}

	protected function _makeRequest($url)
	{
		try {
			$cached = craft()->cache->get($url);
			if ($cached) {
				return $cached;
			} else {
				$client = new \Guzzle\Http\Client();
				$request = $client->get($url);
				$request->addHeader('Authorization', 'Bearer ' . $this->oAuthToken);
				$response = $request->send();
				if (!$response->issuccessful()){
					return;
				}
				$output = $response->json();
				craft()->cache->set($url, $output, $this->cacheDuration);
				return $output;
			}
		} catch(\Exception $e) {
			throw $e;
		}
	}

	protected function _buildEventbriteUrl($endpoint)
	{
		return 'https://www.eventbriteapi.com/v3/' . $endpoint . '?';
	}

	protected function _getIdFromOptions(&$options)
	{
		return $this->pop_from_array($options, 'id');
	}

  protected function _get($endpoint, $options){
    $query    = http_build_query($options);
    $url      = $this->_buildEventbriteUrl($endpoint) . $query;
    $response = $this->_makeRequest($url);
    return $response;
  }

	public function pop_from_array(&$array, $key, $default = null)
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
