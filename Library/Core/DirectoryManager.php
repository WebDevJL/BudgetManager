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
 * DirectoryManager Class
 *
 * @package       Library
 * @subpackage    Core
 * @category      
 * @author        Jeremie Litzler
 * @link		
 */

namespace Library\Core;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class DirectoryManager {

  /**
   * Get the file paths for the current directory
   * 
   * @param string $dir <p>
   * Directory value to scan.</p>
   * @return array <p>
   * List of files found in directory scanned.</p>
   */
  public static function GetFileNames($dir) {
    return array_diff(scandir($dir), array('..', '.'));
  }

  /**
   * 
   * @param type $dirName <p>
   * Directory value to scan.</p>
   * @param type $type <p>
   * File extension to find.</p>
   * @return array(of SplFileInfo) <p>
   * List of SplFileInfo objects scanned in the top-level directory.</p>
   */
  public static function GetFilesNamesRecursively($dirName, $extension) {
    $files = array();
    $dir_iterator = new \RecursiveDirectoryIterator($dirName);
    $iterator = new \RecursiveIteratorIterator($dir_iterator, \RecursiveIteratorIterator::SELF_FIRST);
    foreach ($iterator as $file) {
      if (preg_match('~^.*'.$extension.'$~', $file->getFileName())) {
        array_push($files, $file);
      }
    }
    return $files;
  }

  /**
   * <p>
   * Create a directory if doesn't exist.
   * Return True if file exists, otherwise False after creation of directory.
   * </p>
   * @param string <p>
   * $dir Value of directory to create. </p>
   * @return boolean <p>
   * File exists or not. </p>
   */
  public static function CreateDirectory($dir) {
    if (!file_exists($dir) && !is_dir($dir)) {
      mkdir($dir, 0777, true);
      return FALSE;
    } else {
      return TRUE;
    }
  }

  /**
   * <p>
   * Check if file exists.
   * Return True if file exists, otherwise False after creation of directory.
   * </p>
   * @param string <p>
   * $filePath File path </p>
   * @return boolean <p>
   * File exists or not. </p>
   */
  public static function FileExists($filePath) {
    if (!file_exists($filePath)) {
      return FALSE;
    } else {
      return TRUE;
    }
  }
}
