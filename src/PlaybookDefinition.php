<?php

declare(strict_types=1);

namespace BaseCodeOy\Playbooks;

final class PlaybookDefinition
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var \BaseCodeOy\Playbooks\Playbook
     */
    public $playbook;

    /**
     * @var int
     */
    public $times = 1;

    /**
     * @var bool
     */
    public $once = false;

    public function __construct(string $className)
    {
        $this->playbook = app($className);
        $this->id = \get_class($this->playbook);
    }

    public static function times(string $className, int $times): self
    {
        $definition = new self($className);

        $definition->times = $times;

        return $definition;
    }

    public static function once(string $className): self
    {
        $definition = new self($className);

        $definition->once = true;

        return $definition;
    }
}
