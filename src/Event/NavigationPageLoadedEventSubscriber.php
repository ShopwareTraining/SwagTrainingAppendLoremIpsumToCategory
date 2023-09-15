<?php declare(strict_types=1);

namespace SwagTraining\AppendLoremIpsumToCategory\Event;

use Shopware\Storefront\Page\Navigation\NavigationPageLoadedEvent;
use SwagTraining\AppendLoremIpsumToCategory\Util\LoremIpsum;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class NavigationPageLoadedEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private LoremIpsum $loremIpsum
    ) {}

    public function onNavigationPageLoaded(NavigationPageLoadedEvent $navigationPageLoadedEvent)
    {
        $navigationPageLoadedEvent->getPage()->addExtension('loremipsum', $this->loremIpsum);
    }

    public static function getSubscribedEvents()
    {
        return [
            NavigationPageLoadedEvent::class => 'onNavigationPageLoaded'
        ];
    }
}
