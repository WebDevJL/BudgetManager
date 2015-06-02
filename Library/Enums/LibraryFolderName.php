<?php

/**
 *
 * @package     The Loffy Framework
 * @author      Jeremie Litzler
 * @copyright   Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * LibraryFolderName Class
 *
 * @package       Library
 * @subpackage    Enums
 * @category      LibraryFolderName
 * @author        Jeremie Litzler
 * @link		
 */


namespace Library\Enums;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

abstract class LibraryFolderName {
  const Library = "Library/";
  const BL = "BL/";
  const Core = "Core/";
  const Controllers = "Controllers/";
  const BO = "BO/";
  const Utility = "Utility/";
  const DAL = "DAL/";
  const Modules = "Modules/";
  const Enums = "Enums/";
  const ResourceKeys = "ResourceKeys/";
  const UC = "UC/";
  
}