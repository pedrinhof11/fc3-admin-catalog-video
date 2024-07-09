<?php

namespace Core\Domain\Shared\Validator;

abstract class EntityValidator
{
    abstract public function handle(): void;

}