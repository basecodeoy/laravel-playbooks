<?php

declare(strict_types=1);

namespace BaseCodeOy\Playbooks;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Playbook
{
    public static $timesRun = 0;

    public static function times(int $times): PlaybookDefinition
    {
        return PlaybookDefinition::times(static::class, $times);
    }

    public static function once(): PlaybookDefinition
    {
        return PlaybookDefinition::once(static::class);
    }

    public function before(): array
    {
        return [];
    }

    public function hasRun(): void
    {
        self::$timesRun++;
    }

    public function timesRun(): int
    {
        return self::$timesRun;
    }

    public function after(): array
    {
        return [];
    }

    abstract public function run(InputInterface $input, OutputInterface $output);
}
