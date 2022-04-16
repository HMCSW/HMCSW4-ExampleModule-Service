<?php

use hmcsw\service\module\moduleService;
use hmcsw\service\general\hosts\domainService;

class ExampleModuleService extends moduleService
{
  private array $config;
  public \hmcsw\hmcsw4 $hmcsw4;
  public \hmcsw\objects\ServiceObject $serviceObject;

  public ?ExampleModuleService $externalOBJ = null;

  public array $get = ["success" => false];

  public function __construct (\hmcsw\hmcsw4 $hmcsw4, \hmcsw\service\service $service)
  {
    $this->hmcsw4 = $hmcsw4;
    $this->config = json_decode(file_get_contents(__DIR__.'/../config/config.json'), true);
  }

  public function startModule(): bool
  {
    if($this->config['enabled']){
      return true;
    } else {
      return false;
    }
  }

  public function getMessages(string $lang): array|bool {
    if(!file_exists(__DIR__.'/../messages/'.$lang.'.json')){
      return false;
    }

    return json_decode(file_get_contents(__DIR__.'/../messages/'.$lang.'.json'), true);
  }

  public function getModuleInfo(): array
  {
    return json_decode(file_get_contents(__DIR__.'/../module.json'), true);
  }

  public function getProperties(): array
  {
    return json_decode(file_get_contents(__DIR__.'/../properties.json'), true);
  }

  public function loadPage($args): void
  {
    $get = $this->getData();

    $this->hmcsw4->getService()->getTemplateService()->renderPage('cp/teams/services/domain.twig', $args);
  }

  public function initial(\hmcsw\objects\ServiceObject $serviceObject){
    $this->serviceObject = $serviceObject;
    if ($this->serviceObject->hostOBJ->host_id != 0) $this->externalOBJ = $this->getExternalOBJ();

    $this->get = $this->get();
  }

  public function getExternalOBJ (): ExampleModuleService
  {
    return $this;
  }

  private function get (): array
  {
    return ["success" => true, "response" => []];
  }

  public function createService (): array
  {
    return ["success" => true, "response" => []];
  }

  public function deleteService (): array
  {
    return ["success" => true, "response" => []];
  }

  public function enableService (): array
  {
    return ["success" => true, "response" => []];
  }

  public function disableService (): array
  {
    return ["success" => true, "response" => []];
  }

  public function getData (): array
  {
    $data = $this->get;
    if (!$data['success']) return $data;

    return ["success" => true, "response" => []];
  }

  public function renewService (): array
  {

    return ["success" => true];
  }

  public function hook (): array
  {

  }

  public function task(){
    
  }


}