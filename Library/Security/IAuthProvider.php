<?php

namespace Library\Security;

use Library\Interfaces\IUser;

interface IAuthProvider
{
  /**
   * @return IUser
   */
  public function getUser();
  public function getUserType();
} 