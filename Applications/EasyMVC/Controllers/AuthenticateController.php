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
 * Authenticate controller Class
 *
 * @package		Application
 * @subpackage	Controllers
 * @author		Jeremie Litzler
 * @link
 */

namespace Applications\EasyMVC\Controllers;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class AuthenticateController extends \Library\Controllers\BaseController {

  /**
   * Method that loads the Login view.
   *
   * It loads the page title and the resources to load in the placeholders
   *
   * @param \Library\HttpRequest $rq: the request
   */
  public function executeLoadLoginView(\Library\HttpRequest $rq) {
    $resourceFileKey = "login";

    $this->app->pageTitle = $this->app->i8n->getLocalResource($resourceFileKey, "page_title");
    $this->page->addVar('resx', $this->app->i8n->getLocalResourceArray($resourceFileKey));
    
    $this->executeDisconnect($rq,FALSE);
  }

  /**
   * Method that receives the call from JS Client to login a user
   *
   * @param \Library\HttpRequest $rq: the request
   * @return json object A JSON object with the result bool value and success/error message
   */
  public function executeAuthenticate(\Library\HttpRequest $rq) {
    //Initialize the response to error.
    $result = $this->InitResponseWS();

    //Let's retrieve the inputs from AJAX POST request
    $data_sent = $rq->retrievePostAjaxData(FALSE);

    //Then, retrieve the login and password.
    $user = $this->PrepareUserObject($data_sent);

    //Load interface to query the database
    $manager = $this->managers->getManagerOf('Login');
    //Search for user in DB and return him
    $user_db = $manager->selectOne($user);

    //If user_db is null or not matching, set error message
    if (count($user_db) === 0) {
      //TODO: redirect after 3 sec
      //$this->Redirect("login");
    } else {
      if (!isset($data_sent["encrypt_pwd"])) {
        $this->EncryptUserPassword($manager, $user, $user_db);
      }
      //User is correct so log him in and set result to success
      $result = $this->InitResponseWS("success", $user_db);
    }
    //return the JSON data
    echo \Library\HttpResponse::encodeJson($result);
  }

  /**
   * Method that logout a user from the session and then redirect him to Login page.
   *
   * @param \Library\HttpRequest $rq
   */
  public function executeDisconnect(\Library\HttpRequest $rq, $redirect = TRUE) {
    $this->app->user->setAuthenticated(FALSE);
    $this->app->user->unsetAttribute(\Library\Enums\SessionKeys::UserConnected);
    session_destroy();
    if ($redirect) { $this->Redirect("login"); }
  }
  
    /**
   * Method that logout a user from the session and then redirect him to Login page.
   *
   * @param \Library\HttpRequest $rq
   */
  public function executeCreate(\Library\HttpRequest $rq) {
    $protect = new \Library\BL\Core\Encryption();
    $data = array(
      "username" => $rq->getData("login"),
      "password" => $rq->getData("pwd"),
      "pm_name" => "Demo User"
    );
    $pm = \Library\Helpers\CommonHelper::PrepareUserObject($data, new \Applications\PMTool\Models\Dao\Project_manager());
    $pm->setPassword($protect->Encrypt($this->app->config->get("encryption_key"), $pm->password()));

    $loginDal = $this->managers->getManagerOf("Login");
    $id = $loginDal->add($pm);
    $redirect = intval($id) > 0 ? TRUE : FALSE;
    
    if ($redirect) { $this->Redirect("login"); }
  }

  /**
   * Prepare the User Object before calling the DB.
   * 
   * @param array $data_sent from POST request
   * @return \Applications\PMTool\Models\Dao\Project_manager
   */
  private function PrepareUserObject($data_sent) {
    $protect = new \Library\BL\Core\Encryption();

    $user = new \Applications\PMTool\Models\Dao\Project_manager();
    $user->setPm_email($data_sent["email"]);
    $user->setUsername($data_sent["username"]);
    if (!isset($data_sent["encrypt_pwd"])) {
      $user->setPassword($data_sent["pwd"]);
    } else {
      $user->setPassword($protect->Encrypt($this->app->config->get("encryption_key"), $data_sent["pwd"]));
    }
    
    return $user;
  }

  /**
   * Method that logs in a user in the session.
   *
   */
  private function LoginUser($pm_user) {
    //set authenticated flag
    $this->app->user->setAuthenticated();
    //store user in session
    $this->app->user->setAttribute(\Library\Enums\SessionKeys::UserConnected, $pm_user);
    //Brian
    \Applications\PMTool\Helpers\PmHelper::StoreSessionPm($this->app()->user(), $pm_user[0], true);
    //Test
  }

  /**
   * Encrypt the user password
   * 
   * @param DAL\BaseManager $manager
   * @param BO\ProjectManager $user_in
   * @param array(BO\ProjectManager) $user_db
   */
  private function EncryptUserPassword($manager, $user_in, $user_db) {
    $protect = new \Library\BL\Core\Encryption();
    $user_in->setPassword($protect->Encrypt($this->app->config->get("encryption_key"), $user_in->password()));
    $user_in->pm_id = $user_db[0]->pm_id;
    $manager->update($user_in);
  }

  /**
   * 
   * @param string $step
   * @return array
   */
  public function InitResponseWS($step = "init", $user = NULL) {
    $resourceFileKey = "login";
    if ($step === "success") {
      $this->LoginUser($user);
      return array(
        "result" => 1,
        "message" => $this->app->i8n->getLocalResource($resourceFileKey, "message_success")
      );
    } else {
      return array(
        "result" => 0,
        "message" => $this->app->i8n->getLocalResource($resourceFileKey, "message_error")
      );
    }
  }

}
