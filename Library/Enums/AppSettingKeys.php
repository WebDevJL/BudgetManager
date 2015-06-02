<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppSettings
 *
 * @author jl
 */

namespace Library\Enums;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

abstract class AppSettingKeys {

  const ApplicationNamePlaceHolder = "{{app_name}}";
  
  const ApplicationMode = "ApplicationMode";
  const CurrentVersion = "CurrentVersion";
  const DefaultLanguage = "DefaultLanguage";
  const BaseUrl = "base_url";
  const BaseUrlRelease = "BaseUrlRelease";
  const RootImageFolderPath = "RootImageFolderPath";
  const RootUploadsFolderPath = "RootUploadsFolderPath";
  const DalFolderPath = "DalFolderPath";
  const RootDocumentUpload = "RootDocumentUpload";
  const Myslq_host = "Myslq_host";
  const Mysql_user = "Mysql_user";
  const Mysql_pwd = "Mysql_pwd";
  const Mysql_db_name = "Mysql_db_name";
  
  const GoogleMapsCenterLat = "GoogleMapsCenterLat";
  const GoogleMapsCenterLng = "GoogleMapsCenterLng";
  const GoogleMapsNoLatLngIcon = "GoogleMapsNoLatLngIcon";

  const DefaultEmailDomainValue = "DefaultEmailDomainValue";
}

?>
