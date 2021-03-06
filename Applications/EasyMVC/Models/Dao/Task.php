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
* Task Dao Class
*
* @package     Application/PMTool
* @subpackage  Models/Dao
* @category    Task
* @author      Jeremie Litzler
* @link
*/
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Task extends \Library\Entity{  public     $task_id,    $project_id,    $task_name,    $task_deadline,    $task_instructions,    $task_trigger_cal,    $task_trigger_pm,    $task_trigger_ext,    $task_active;
  const     TASK_ID_ERR = 0,    PROJECT_ID_ERR = 1,    TASK_NAME_ERR = 2,    TASK_DEADLINE_ERR = 3,    TASK_INSTRUCTIONS_ERR = 4,    TASK_TRIGGER_CAL_ERR = 5,    TASK_TRIGGER_PM_ERR = 6,    TASK_TRIGGER_EXT_ERR = 7,    TASK_ACTIVE_ERR = 8;
  // SETTERS //  public function setTask_id($task_id) {      $this->task_id = $task_id;  }
  public function setProject_id($project_id) {      $this->project_id = $project_id;  }
  public function setTask_name($task_name) {      $this->task_name = $task_name;  }
  public function setTask_deadline($task_deadline) {      $this->task_deadline = $task_deadline;  }
  public function setTask_instructions($task_instructions) {      $this->task_instructions = $task_instructions;  }
  public function setTask_trigger_cal($task_trigger_cal) {      $this->task_trigger_cal = $task_trigger_cal;  }
  public function setTask_trigger_pm($task_trigger_pm) {      $this->task_trigger_pm = $task_trigger_pm;  }
  public function setTask_trigger_ext($task_trigger_ext) {      $this->task_trigger_ext = $task_trigger_ext;  }
  public function setTask_active($task_active) {      $this->task_active = $task_active;  }
  // GETTERS //  public function task_id() {    return $this->task_id;  }
  public function project_id() {    return $this->project_id;  }
  public function task_name() {    return $this->task_name;  }
  public function task_deadline() {    return $this->task_deadline;  }
  public function task_instructions() {    return $this->task_instructions;  }
  public function task_trigger_cal() {    return $this->task_trigger_cal;  }
  public function task_trigger_pm() {    return $this->task_trigger_pm;  }
  public function task_trigger_ext() {    return $this->task_trigger_ext;  }
  public function task_active() {    return $this->task_active;  }
}