<?php

declare(strict_types=1);

namespace Framework\Command;

interface CommandInterface
{
    /**
     * Выполнение команды.
     */
    public function execute(): void;
}