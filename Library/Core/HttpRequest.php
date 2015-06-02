<?php

namespace Library\Core;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class HttpRequest {
  public $requestId;

  public function __construct() {
    $this->requestId = uniqid();
  }

  public function requestId() {
    return $this->requestId;
  }
  public function setRequestId($requestId) {
    $this->requestId = $requestId;
  }
  
  public function cookieData($key) {
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
  }

  public function cookieExists($key) {
    return isset($_COOKIE[$key]);
  }

  public function getData($key) {
    return isset($_GET[$key]) ? $_GET[$key] : null;
  }

  public function getExists($key) {
    return isset($_GET[$key]);
  }

  public function method() {
    return $_SERVER['REQUEST_METHOD'];
  }

  public function postData($key) {
    return isset($_POST[$key]) ? $_POST[$key] : null;
  }

  public function postExists($key) {
    return isset($_POST[$key]);
  }

  public function requestURI() {
    return strtok($_SERVER['REQUEST_URI'], '?');
  }

  public function initLanguage(Application $currentApp, $type) {
    if ($type === "default") {
      return $currentApp->config()->get(Enums\AppSettingKeys::DefaultLanguage);
    }
    if ($type === "browser") {
      return substr(strtok($_SERVER['HTTP_ACCEPT_LANGUAGE'], '?'), 0, 2);
    }
  }

  /**
   * Fetch an item from the php://input array which is compatible with ajax post requests
   * FYI, the regular post method doesn't work with ajax 
   *
   * @access	public
   * @param	string
   * @param	bool
   * @return	string
   */
  public function retrievePostAjaxData($xss_clean = TRUE) {
    $post_cleaned = array();
    if (file_get_contents('php://input') != "") {
      // Create an array from the JSON object in the POST request
      $json_decode = json_decode(file_get_contents('php://input'));
      if(!is_null($json_decode)) {
        $post_raw = get_object_vars($json_decode);
      }
      // Check if a field has been provided
      if (! empty($post_raw)) {
        foreach (array_keys($post_raw) as $key) {
          $post_cleaned[$key] = $this->_fetch_from_array($post_raw, $key, TRUE);
        }
      }
    }
    if ((count($post_cleaned) > 0) || count($_POST) > 0) {
      foreach (array_keys($_POST) as $key) {
        $post_cleaned[$key] = $this->_fetch_from_array($_POST, $key, TRUE);
      }
      return $post_cleaned;
    }
    return FALSE; // Nothing in post request
  }

  // --------------------------------------------------------------------

  /**
   * Fetch from array
   *
   * This is a helper function to retrieve values from global arrays
   *
   * @access	private
   * @param	array
   * @param	string
   * @param	bool
   * @return	string
   */
  private function _fetch_from_array(&$array, $index = '', $xss_clean = FALSE) {
    if (!isset($array[$index])) {
      return FALSE;
    }

    if ($xss_clean === TRUE) {
      $array[$index] = strip_tags($array[$index]);
      $array[$index] = filter_var($array[$index]);
//$security = new BL\Security\Security();
      //return $security->xss_clean($array[$index]);
    }

    return $array[$index];
  }
}
