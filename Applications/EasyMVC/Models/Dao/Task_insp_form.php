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
* Task_insp_form Dao Class
*
* @package     Application/PMTool
* @subpackage  Models/Dao
* @category    Task_insp_form
* @author      Jeremie Litzler
* @link
*/
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Task_insp_form extends \Library\Entity{  public     $task_id,    $inspection_question_id;
  const     TASK_ID_ERR = 0,    INSPECTION_QUESTION_ID_ERR = 1;
  // SETTERS //  public function setTask_id($task_id) {      $this->task_id = $task_id;  }
  public function setInspection_question_id($inspection_question_id) {      $this->inspection_question_id = $inspection_question_id;  }
  // GETTERS //  public function task_id() {    return $this->task_id;  }
  public function inspection_question_id() {    return $this->inspection_question_id;  }
}