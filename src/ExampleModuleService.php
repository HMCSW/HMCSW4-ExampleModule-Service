<?php

namespace hmcswModule\ExampleModule\src;

use hmcsw\exception\ServiceException;
use hmcsw\objects\user\teams\service\Service;
use hmcsw\objects\user\teams\service\ServiceRepository;
use hmcsw\objects\user\teams\Team;
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
    return [];
  }

  public function onDelete(bool $reinstall = false): void
  {
    // TODO: Implement onDelete() method.
  }

  public function onEnable(): void
  {
    // TODO: Implement onEnable() method.
  }

  public function onDisable(): void
  {
    // TODO: Implement onDisable() method.
  }

  public function onTerminate(): void
  {
    // TODO: Implement onTerminate() method.
  }

  public function onTerminateInstant(): void
  {
    // TODO: Implement onTerminateInstant() method.
  }

  public function onWithdrawTerminate(): void
  {
    // TODO: Implement onWithdrawTerminate() method.
  }

  public function onExtend(int $time): void
  {
    // TODO: Implement onExtend() method.
  }

  public function onLogin(string $key): array
  {
    throw new ServiceException("Not implemented");
  }

  public function onSetName(string $name): void
  {
    // TODO: Implement onSetName() method.
  }

  public function getData(): array
  {
    return $this->get;
  }

  public function onSetTeam(Team $newTeam): void
  {
    // TODO: Implement onSetTeam() method.
  }
}