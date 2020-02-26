<?php
/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 26.02.2020
 * Time: 20:12
 */

namespace Framework\Command;

use RegisterRoutesCommand;
use CommandInterface;

class RegisterRoutesHandler implements CommandInterface
{
    /**
     * @var RegisterRoutesCommand
     */
    private $command;

    /**
     * RegisterUser constructor.
     * @param RegisterRoutesCommand $command
     */
    public function __construct(RegisterRoutesCommand $command)
    {
        $this->command = $command;
    }

    /**
     * Выполнение команды.
     */
    public function execute(): void
    {
        $this->command->registerRoutes();
    }
}