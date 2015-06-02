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
* Inspection_question Dao Class
*
* @package     Application/PMTool
* @subpackage  Models/Dao
* @category    Inspection_question
* @author      Jeremie Litzler
* @link
*/
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Inspection_question extends \Library\Entity{  public     $inspection_question_id,    $inspection_question_form_name,    $inspection_question_data,    $pm_id;
  const     INSPECTION_QUESTION_ID_ERR = 0,    INSPECTION_QUESTION_FORM_NAME_ERR = 1,    INSPECTION_QUESTION_DATA_ERR = 2,    PM_ID_ERR = 3;
  // SETTERS //  public function setInspection_question_id($inspection_question_id) {      $this->inspection_question_id = $inspection_question_id;  }
  public function setInspection_question_form_name($inspection_question_form_name) {      $this->inspection_question_form_name = $inspection_question_form_name;  }
  public function setInspection_question_data($inspection_question_data) {      $this->inspection_question_data = $inspection_question_data;  }
  public function setPm_id($pm_id) {      $this->pm_id = $pm_id;  }
  // GETTERS //  public function inspection_question_id() {    return $this->inspection_question_id;  }
  public function inspection_question_form_name() {    return $this->inspection_question_form_name;  }
  public function inspection_question_data() {    return $this->inspection_question_data;  }
  public function pm_id() {    return $this->pm_id;  }
}