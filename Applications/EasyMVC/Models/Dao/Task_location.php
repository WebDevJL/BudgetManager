<?php
/**
*
* @package    The Loffy Framework
* @author     Jeremie Litzler
* @copyright  Copyright (c) 2015
* @license
* @link
* @since
* @filesource
*/
// ------------------------------------------------------------------------
/**
*
* Task_location Dao Class
*
* @package     Application/PMTool
* @subpackage  Models/Dao
* @category    Task_location
* @author      Jeremie Litzler
* @link
*/
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Task_location extends \Library\Entity{  public     $task_id,    $location_id;
  const     TASK_ID_ERR = 0,    LOCATION_ID_ERR = 1;
  // SETTERS //  public function setTask_id($task_id) {      $this->task_id = $task_id;  }
  public function setLocation_id($location_id) {      $this->location_id = $location_id;  }
  // GETTERS //  public function task_id() {    return $this->task_id;  }
  public function location_id() {    return $this->location_id;  }
}