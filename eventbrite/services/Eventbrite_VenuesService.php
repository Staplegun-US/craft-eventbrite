<?php
namespace Craft;

class Eventbrite_VenuesService extends Eventbrite_BaseService
{
  public function getVenue($options = array())
  {
    $id       = $this->_getIdFromOptions($options);
    $response = $this->_get('venues/' . $id . '/', $options);
    return $response;
  }
}
