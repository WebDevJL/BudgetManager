<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ErrorCodes
 *
 * @author jl
 */
namespace Library\Enums;
if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');

abstract class ErrorCodes {

  /*
   * Standards HTTP error codes
   */
  const PageNotFound = 404;
  const ServerError = 500;
  /*
   * Application specific error codes
   */
  const ControllerNotExist = 1001;
  /**
   * MySQL Errors => Follow this rule: SQL error code + 1000
   */
  const MySqlAccessDenied = 2045;

}

?>
