<?php

namespace App\EventSubscriber;

use App\Entity\Scientist;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StudentScientistSubscriber implements EventSubscriberInterface
{
    public function onAfterEntityUpdatedEvent($event): void
    {
       $entityInstance = $event->getEntityInstance();
       if ($entityInstance instanceof Scientist) {
           dd($entityInstance);
       }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'AfterEntityUpdatedEvent' => 'onAfterEntityUpdatedEvent',
        ];
    }
}
