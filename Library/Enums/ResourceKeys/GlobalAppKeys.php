<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GlobalKeys.php
 * 
 * It lists all the resource keys used globally in a given web app.
 *
 * @author jl
 */
namespace Library\Enums\ResourceKeys;
if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');

abstract class GlobalAppKeys {
  const log_http_request = "log_http_request";
  const log_controller_method_request = "log_controller_method_request";
  const log_type = "log_type";
  const log_data = "log_data";
  const log_time_prefix = "time";
  
}

?>
