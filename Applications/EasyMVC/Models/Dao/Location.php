<?php

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
* Location Dao Class
*
* @package     Application/PMTool
* @subpackage  Models/Dao
* @category    Location
* @author      Jeremie Litzler
* @link
*/
namespace Applications\PMTool\Models\Dao;

    $location_address,
    $location_category;

    LOCATION_ADDRESS_ERR = 8,
    LOCATION_CATEGORY_ERR = 9;









      $this->location_address = $location_address;
  }
  public function setLocation_category($location_category) {
      $this->location_category = $location_category;
  }
  // GETTERS //








    return $this->location_address;
  }

    return $this->location_category;
  }
}