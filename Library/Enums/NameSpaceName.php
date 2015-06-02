<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NamespaceName
 *
 * @author jl
 */
/**
 * Constants to load dynamically the classes
 */
namespace Library\Enums;
if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');

abstract class NameSpaceName {
  const LibFolderName = "Library";
  const LibControllersFolderName = "\\Controllers\\";
  
  const AppsFolderName = "Applications";
  const AppsControllersFolderName = "\\Controllers\\";
  
}

?>
