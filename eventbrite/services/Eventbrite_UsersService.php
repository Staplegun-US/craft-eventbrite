<?php
namespace Craft;

class Eventbrite_UsersService extends Eventbrite_BaseService
{
  public function getUser($options = array())
  {
    $id       = $this->_getIdFromOptions($options);
    $response = $this->_get('users/' . $id . '/', $options);
    return $response;
  }

  public function getOwnedEvents($options = array())
  {
    $id       = $this->_getIdFromOptions($options);
    $response = $this->_get('users/' . $id . '/owned_events/', $options);
    return $response['events'];
  }

  public function getEvents($options = array())
  {
    $id       = $this->_getIdFromOptions($options);
    $response = $this->_get('users/' . $id . '/events/', $options);
    return $response['events'];
  }
}
