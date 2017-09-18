<?php declare(strict_types=1);

namespace Shopware\Framework\Event;

class ShoppingWorldComponentWrittenEvent extends NestedEvent
{
    const NAME = 'shopping_world_component.written';

    /**
     * @var string[]
     */
    private $shoppingWorldComponentUuids;

    /**
     * @var NestedEventCollection
     */
    private $events;

    /**
     * @var array
     */
    private $errors;

    public function __construct(array $shoppingWorldComponentUuids, array $errors = [])
    {
        $this->shoppingWorldComponentUuids = $shoppingWorldComponentUuids;
        $this->events = new NestedEventCollection();
        $this->errors = $errors;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @return string[]
     */
    public function getShoppingWorldComponentUuids(): array
    {
        return $this->shoppingWorldComponentUuids;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function addEvent(NestedEvent $event): void
    {
        $this->events->add($event);
    }

    public function getEvents(): NestedEventCollection
    {
        return $this->events;
    }
}