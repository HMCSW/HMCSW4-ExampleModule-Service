<?php

namespace hmcswModule\ExampleModule\src;

use hmcsw\controller\web\cp\CPController;
use hmcsw\objects\user\teams\service\Service;
use hmcsw\objects\user\teams\service\ServiceRepository;
use hmcsw\service\module\ModuleServiceRepository;

class ExampleModule implements ModuleServiceRepository
{
  private array $config;

  public function __construct()
  {
    $this->config = json_decode(file_get_contents(__DIR__ . '/../config/config.json'), true);
  }

  public function startModule(): bool
  {
    if ($this->config['enabled']) {
      return true;
    } else {
      return false;
    }
  }

  public function getMessages(string $lang): array|bool
  {
    if (!file_exists(__DIR__ . '/../messages/' . $lang . '.json')) {
      return false;
    }

    return json_decode(file_get_contents(__DIR__ . '/../messages/' . $lang . '.json'), true);
  }

  public function getModuleInfo(): array
  {
    return json_decode(file_get_contents(__DIR__ . '/../module.json'), true);
  }

  public function getProperties(): array
  {
    return json_decode(file_get_contents(__DIR__ . '/../properties.json'), true);
  }

  public function loadPage(array $args, ServiceRepository $serviceRepository, CPController $CPController): void
  {
    $get = $this->getData();

    $CPController->renderPage('/cp/teams/services/domain.twig', $args);
  }

  public function getData(): array
  {
    $data = $this->get;
    if (!$data['success']) return $data;

    return ["success" => true, "response" => []];
  }

  public function hook(): array
  {
    // your webhook logic

  }

  public function task()
  {
    // task every 1 minute
  }

  public function getConfig(): array
  {
    return $this->config;
  }

  public function getInstance(Service $service): ServiceRepository
  {
    return new ExampleModuleService($service, $this);
  }

}