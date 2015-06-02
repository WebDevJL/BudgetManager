<?php

namespace Library\Core;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

class Page extends ApplicationComponent {

  protected $contentFile;
  protected $vars = array();

  public function addVar($key, $value) {
    if (!is_string($key) || is_numeric($key) || empty($key)) {
      throw new \InvalidArgumentException('Key name must be a string not null');
    }
    $this->vars[$key] = $value;
  }

  public function getGeneratedPage() {
    if (!file_exists($this->contentFile)) {
      throw new \RuntimeException('The view ' . $this->contentFile . ' doesn\'t exist.');
    }
    $user = $this->app->user();
    
    //Get resources for the left menu
    $this->addVar("resx_menu_left", $this->app->i8n->getCommonResourceArray("menu_left"));

    $int = extract($this->vars);

    ob_start();
    require $this->contentFile;
    $content = ob_get_clean();

    ob_start();

    //Set page layout based on user status: authenticated or not
    if ($this->app->user()->isAuthenticated()) {
      /**
       * FOR AUTHENTICATED USERS
       */
      if (!$this->app->router->isWsCall) {
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::HeaderTemplate;
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::MenuTopTemplate;
//        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::BreadcrumbTemplate;
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::MenuLeftTemplate;
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::ContenTemplate;
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::FooterTemplate;
      }
    } else {
      /**
       * FOR NON AUTHENTICATED USERS
       */
      if (!$this->app->router->isWsCall) {
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::HeaderTemplate;
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::ContenTemplate;
        require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. $this->app()->name() . \Library\Enums\FileNameConst::FooterTemplate;
      }
    }
    \Library\Utility\TimeLogger::EndLog($this->app(), \Library\Enums\ResourceKeys\GlobalAppKeys::log_http_request);
    return ob_get_clean();
  }

  public function setContentFile($contentFile) {
    if (!is_string($contentFile) || empty($contentFile)) {
      throw new \InvalidArgumentException('The view ' . $contentFile . ' doesn\'t exist.');
    }
    $this->contentFile = $contentFile;
  }

  /**
   * Build the page for non Authenticated users with a header, footer, center content panel
   * 
   * @param \Library\Core\Application $app
   */
  protected function setNonAuthenticatedPageLayout() {
    if (!$this->app->router->isWsCall) {
      require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName . \Library\Enums\FileNameConst::HeaderTemplate;
    }

    require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. \Library\Enums\FileNameConst::ContenTemplate;

    if (!$this->app->router->isWsCall) {
      require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. \Library\Enums\FileNameConst::FooterTemplate;
    }
  }

  /**
   * Build the page for Authenticated users with a header, footer, top menu, left menu, center content panel
   * 
   * @param \Library\Core\Application $app
   */
  protected function setAuthenticatedPageLayout() {
    if (!$this->app->router->isWsCall) {
      require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. \Library\Enums\FileNameConst::HeaderTemplate;
//      require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. \Library\Enums\FileNameConst::HeaderTemplate;
    }

    require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. \Library\Enums\FileNameConst::ContenTemplate;

    if (!$this->app->router->isWsCall) {
      require __ROOT__ . \Library\Enums\ApplicationFolderName::AppsFolderName. \Library\Enums\FileNameConst::FooterTemplate;
    }
  }

}