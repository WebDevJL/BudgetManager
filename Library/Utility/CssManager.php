<?php

/**
 *
 * @package     The Loffy Framework
 * @author      Jeremie Litzler
 * @copyright   Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CssManager Class
 *
 * @package       Library
 * @subpackage    Utility
 * @category      
 * @author        Jeremie Litzler
 * @link		
 */

namespace Library\Utility;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class CssManager extends \Library\Core\ApplicationComponent {

  /**
   *
   * @var array $files CSS files list
   */
  protected $files = array();

  public function __construct(\Library\Core\Application $app) {
    parent::__construct($app);
  }

}
