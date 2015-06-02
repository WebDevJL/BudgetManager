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
* Facility Dao Class
*
* @package     Application/PMTool
* @subpackage  Models/Dao
* @category    Facility
* @author      Jeremie Litzler
* @link
*/
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Facility extends \Library\Entity{  public     $facility_id,    $project_id,    $facility_name,    $facility_address,    $facility_lat,    $facility_long,    $facility_contact_name,    $facility_contact_phone,    $facility_contact_email,    $facility_id_num,    $facility_sector,    $facility_sic,    $boundary;
  const     FACILITY_ID_ERR = 0,    PROJECT_ID_ERR = 1,    FACILITY_NAME_ERR = 2,    FACILITY_ADDRESS_ERR = 3,    FACILITY_LAT_ERR = 4,    FACILITY_LONG_ERR = 5,    FACILITY_CONTACT_NAME_ERR = 6,    FACILITY_CONTACT_PHONE_ERR = 7,    FACILITY_CONTACT_EMAIL_ERR = 8,    FACILITY_ID_NUM_ERR = 9,    FACILITY_SECTOR_ERR = 10,    FACILITY_SIC_ERR = 11,    BOUNDARY_ERR = 12;
  // SETTERS //  public function setFacility_id($facility_id) {      $this->facility_id = $facility_id;  }
  public function setProject_id($project_id) {      $this->project_id = $project_id;  }
  public function setFacility_name($facility_name) {      $this->facility_name = $facility_name;  }
  public function setFacility_address($facility_address) {      $this->facility_address = $facility_address;  }
  public function setFacility_lat($facility_lat) {      $this->facility_lat = $facility_lat;  }
  public function setFacility_long($facility_long) {      $this->facility_long = $facility_long;  }
  public function setFacility_contact_name($facility_contact_name) {      $this->facility_contact_name = $facility_contact_name;  }
  public function setFacility_contact_phone($facility_contact_phone) {      $this->facility_contact_phone = $facility_contact_phone;  }
  public function setFacility_contact_email($facility_contact_email) {      $this->facility_contact_email = $facility_contact_email;  }
  public function setFacility_id_num($facility_id_num) {      $this->facility_id_num = $facility_id_num;  }
  public function setFacility_sector($facility_sector) {      $this->facility_sector = $facility_sector;  }
  public function setFacility_sic($facility_sic) {      $this->facility_sic = $facility_sic;  }
  public function setBoundary($boundary) {      $this->boundary = $boundary;  }
  // GETTERS //  public function facility_id() {    return $this->facility_id;  }
  public function project_id() {    return $this->project_id;  }
  public function facility_name() {    return $this->facility_name;  }
  public function facility_address() {    return $this->facility_address;  }
  public function facility_lat() {    return $this->facility_lat;  }
  public function facility_long() {    return $this->facility_long;  }
  public function facility_contact_name() {    return $this->facility_contact_name;  }
  public function facility_contact_phone() {    return $this->facility_contact_phone;  }
  public function facility_contact_email() {    return $this->facility_contact_email;  }
  public function facility_id_num() {    return $this->facility_id_num;  }
  public function facility_sector() {    return $this->facility_sector;  }
  public function facility_sic() {    return $this->facility_sic;  }
  public function boundary() {    return $this->boundary;  }
}