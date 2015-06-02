<?php

/**
 *
 * @package		The Loffy Framework
 * @author		Jeremie Litzler
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * PhpModuleKeys Class
 *
 * @package		Applications/PMTool
 * @subpackage	Resources/Enum
 * @category	PhpModuleKeys
 * @author		Jeremie Litzler
 * @link		
 */

namespace Applications\PMTool\Resources\Enums;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class PhpModuleKeys {

  const active_list = "active_list_module";
  const inactive_list = "inactive_list_module";
	const popup_msg = "popup_msg_module";
  const group_list_left = "group_list_left";
  const group_list_right = "group_list_right";
	
  const project_tabs_open = "project_tabs_open";
  const project_form = "project_form";
  const facility_form = "facility_form";
  const client_form = "client_form";
  const project_buttons = "project_buttons";
  const tabs_close = "tabs_close";
  
  const task_tabs_open = "task_tabs_open";
  const task_form = "task_form";
  const task_buttons = "task_buttons";
  
  const analyte_tabs_open = "analyte_tabs_open";
  const field_analyte_list = "field_analyte_list";
  const lab_analyte_list = "lab_analyte_list";
  const field_analyte_form = "field_analyte_form";
  const lab_analyte_form = "lab_analyte_form";
  const analyte_buttons = "analyte_buttons";

}

?>
