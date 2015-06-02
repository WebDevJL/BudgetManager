<?php
/**** @package    The Loffy Framework* @author     Jeremie Litzler* @copyright  Copyright (c) 2015* @license* @link* @since* @filesource*/// ------------------------------------------------------------------------
/**** Common_field_analyte Dao Class** @package     Application/PMTool* @subpackage  Models/Dao* @category    Common_field_analyte* @author      Jeremie Litzler* @link*/
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Common_field_analyte extends \Library\Entity{  public     $common_field_analyte_id,    $common_field_analyte_name;
  const     COMMON_FIELD_ANALYTE_ID_ERR = 0,    COMMON_FIELD_ANALYTE_NAME_ERR = 1;
  // SETTERS //  public function setCommon_field_analyte_id($common_field_analyte_id) {      $this->common_field_analyte_id = $common_field_analyte_id;  }
  public function setCommon_field_analyte_name($common_field_analyte_name) {      $this->common_field_analyte_name = $common_field_analyte_name;  }
  // GETTERS //  public function common_field_analyte_id() {    return $this->common_field_analyte_id;  }
  public function common_field_analyte_name() {    return $this->common_field_analyte_name;  }
}