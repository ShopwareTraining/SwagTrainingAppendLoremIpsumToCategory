<?php declare(strict_types=1);

namespace SwagTraining\AppendLoremIpsumToCategory\Event;

use Shopware\Storefront\Page\Navigation\NavigationPageLoadedEvent;
use SwagTraining\AppendLoremIpsumToCategory\Util\LoremIpsum;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

class NavigationPageLoadedEventListener
{
    public function __construct(
        private LoremIpsum $loremIpsum
    ) {}

    #[AsEventListener()]
    public function onNavigationPageLoaded(NavigationPageLoadedEvent $navigationPageLoadedEvent)
    {
        $navigationPageLoadedEvent->getPage()->addArrayExtension('loremipsum', ['service' => $this->loremIpsum]);
    }
}
