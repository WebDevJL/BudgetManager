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
* Lab_sample_matrix Dao Class
*
* @package     Application/PMTool
* @subpackage  Models/Dao
* @category    Lab_sample_matrix
* @author      Jeremie Litzler
* @link
*/
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Lab_sample_matrix extends \Library\Entity{  public     $task_id,    $lab_analyte_id,    $location_id;
  const     TASK_ID_ERR = 0,    LAB_ANALYTE_ID_ERR = 1,    LOCATION_ID_ERR = 2;
  // SETTERS //  public function setTask_id($task_id) {      $this->task_id = $task_id;  }
  public function setLab_analyte_id($lab_analyte_id) {      $this->lab_analyte_id = $lab_analyte_id;  }
  public function setLocation_id($location_id) {      $this->location_id = $location_id;  }
  // GETTERS //  public function task_id() {    return $this->task_id;  }
  public function lab_analyte_id() {    return $this->lab_analyte_id;  }
  public function location_id() {    return $this->location_id;  }
}