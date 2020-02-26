<?php
/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 26.02.2020
 * Time: 19:48
 */

namespace Framework\Command;

use RegisterConfigCommand;
use CommandInterface;

class RegisterConfigHandler implements CommandInterface
{
    /**
     * @var RegisterConfigCommand
     */
    private $command;

    /**
     * RegisterUser constructor.
     * @param RegisterConfigCommand $command
     */
    public function __construct(RegisterConfigCommand $command)
    {
        $this->command = $command;
    }


    /**
     * Выполнение команды.
     */
    public function execute(): void
    {
        $this->command->registerConfigs();
    }
}