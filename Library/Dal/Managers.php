<?php

namespace Library\Dal;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class Managers {

  protected $api = null;
  protected $dao = null;
  protected
          $dal_folder_path = "",
          $core_dal_folder_path = "";
  protected $managers = array();
  public $filters = null;

  public function __construct($api, $app) {
    $this->api = $api;
    $this->dao = PDOFactory::getMysqlConnexion($app);
    $this->dal_folder_path = str_replace(\Library\Enums\AppSettingKeys::ApplicationNamePlaceHolder, __APPNAME__, $app->config()->get("DalFolderPath"));
    $this->core_dal_folder_path = "\Library\DAL\Modules\\";
  }

  /**
   * <p>
   * Retrieve the Dal instance for a given module.
   * </p>
   * <p>
   * A module is the name of the Dal Class, either found in Library/DAL/Modules
   * if $isCoreModule = TRUE or in Applications/CurrentApp/Models/Dal otherwise.
   * </p>
   * @param type <p>
   * $module: Name of the module to load. </p>
   * @param type <p>
   * $isCoreModule: Define if the module is to be load from the Library/DAL/Modules 
   * directory instead of the Applications/CurrentApp/Models/Dal. </p>
   * @return object <p>
   * Variable of type \Library\DAL\BaseManager for the requested module. </p>
   * @throws \InvalidArgumentException <p>
   * Thrown if the module isn't given in $module parameter. </p>
   */
  public function getManagerOf($module, $isCoreModule = FALSE) {
    error_log("Module is <" . $module . ">");
    if (!is_string($module) || empty($module)) {
      throw new \InvalidArgumentException('The module provided is invalid.');
    }

    if (!isset($this->managers[$module])) {
      if ($isCoreModule) {
        $manager = $this->core_dal_folder_path . $module . 'Dal';
      } else {
        $manager = $this->dal_folder_path . $module . 'Dal';
      }
      $this->filters = new DalFilters();
      $this->managers[$module] = new $manager($this->dao, $this->filters);
    }

    return $this->managers[$module];
  }

}
