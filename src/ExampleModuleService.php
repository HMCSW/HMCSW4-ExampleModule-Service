<?php

namespace hmcswModule\ExampleModule\src;

use hmcsw\objects\user\teams\service\Service;
use hmcsw\objects\user\teams\service\ServiceRepository;
use hmcsw\service\module\ModuleServiceRepository;

class ExampleModuleService implements ServiceRepository
{
  protected Service $service;
  protected ModuleServiceRepository $module;
  protected array $get = ["success" => false];

  public function __construct(Service $service, ModuleServiceRepository $module)
  {
    $this->service = $service;
    $this->module = $module;
  }

  public function getService(): Service
  {
    return $this->service;
  }

  public function getModule(): ModuleServiceRepository
  {
    return $this->module;
  }

  public function onCreate(bool $reinstall = false): array
  {
    // TODO: Implement onCreate() method.
  }

  public function onDelete(bool $reinstall = false): array
  {
    // TODO: Implement onDelete() method.
  }

  public function onEnable(): array
  {
    // TODO: Implement onEnable() method.
  }

  public function onDisable(): array
  {
    // TODO: Implement onDisable() method.
  }

  public function onTerminate(): array
  {
    // TODO: Implement onTerminate() method.
  }

  public function onTerminateInstant(): array
  {
    // TODO: Implement onTerminateInstant() method.
  }

  public function onWithdrawTerminate(): array
  {
    // TODO: Implement onWithdrawTerminate() method.
  }

  public function onExtend(int $time): array
  {
    // TODO: Implement onExtend() method.
  }

  public function onLogin(string $key): array
  {
    // TODO: Implement onLogin() method.
  }

  public function onSetName(string $name): array
  {
    // TODO: Implement onSetName() method.
  }

  public function getData(): array
  {
    // TODO: Implement getData() method.
  }
}