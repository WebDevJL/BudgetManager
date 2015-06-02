<?php

/**
 *
 * @package		The Loffy Framework
 * @author		Jeremie Litzler
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * Breadcrumb Class
 *
 * @package		Library
 * @subpackage	UC
 * @category	Breadcrumb
 * @author		Jeremie Litzler
 * @link		
 */

namespace Library\UC;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class Breadcrumb {

  protected $app = null;
  protected $url = "";
  protected $resx = array();

  public function __construct($app) {
    $this->app = $app;
    $this->resx = $this->app->i8n->getCommonResourceArray("breadcrumb");
    $this->url = $this->app->config->get("base_url") === "/" ?
            substr($this->app->HttpRequest->requestURI(), 1) : //remove first / if base url is only a /
            str_replace($this->app->config->get("base_url"), "", $this->app->HttpRequest->requestURI());
  }

  /**
   * Returns a string representing the left menu
   * 
   * @return type string
   */
  public function Build() {
    $out = "";
    $breadcrumbs = $this->_LoadXml();
    foreach ($breadcrumbs as $breadcrumb) {
      if ($breadcrumb->getAttribute("href") === $this->url) {
        
        $out = $this->_AddLevels($breadcrumb);
      }
    }
    return $out;
  }

  /**
   * Load the left menu from xml and returns the data to process
   * The list of DOMElementNode is the list of main menus to display
   * 
   * @return type DOMELementNodeList
   * @throws Exception when file is not found
   */
  public function _LoadXml() {
    $xml = new \DOMDocument;
    $filename = __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName . $this->app->name() . '/Config/breadcrumbs.xml';
    if (file_exists($filename)) {
      $xml->load($filename);
    } else {
      throw new Exception("In " . __CLASS__ . " > Method: " . __METHOD__);
    }
    return $xml->getElementsByTagName("breadcrumb");
  }
  
  /**
   * Add the levels based on selected breadcrumb.
   * 
   * @param DOMElement $breadcrumb
   * @return string
   */
  private function _AddLevels($breadcrumb) {
    $out = "<ul>";
    $levels = $breadcrumb->getElementsByTagName("level");
    $addSeperator = FALSE;
    foreach ($levels as $level) {
      if ($addSeperator) {
        $out .= "<li class=\"br_seperator\"><span class=\"glyphicon glyphicon-chevron-right\"></span></li>";
      }
      $out .= "<li>" . $this->resx[$level->getAttribute("resourcekey")] . "</li>";
      $addSeperator = TRUE;
    }
    $out .= "</ul>";
    return $out;
  }

}