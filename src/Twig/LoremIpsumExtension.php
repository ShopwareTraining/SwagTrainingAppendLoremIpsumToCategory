<?php declare(strict_types=1);

namespace SwagTraining\AppendLoremIpsumToCategory\Twig;

use SwagTraining\AppendLoremIpsumToCategory\Util\LoremIpsum;
use Twig\Extension\AbstractExtension;

class LoremIpsumExtension extends AbstractExtension implements \Twig\Extension\GlobalsInterface
{
    public function __construct(
        private LoremIpsum $loremIpsum
    ) {
    }

    public function getGlobals(): array
    {
        return [
            'lorumipsum' => $this->loremIpsum,
            'lorumipsum2' => [$this, 'generate'],
        ];
    }

    public function generate()
    {
        $lipsum = new \joshtronic\LoremIpsum();
        return nl2br($lipsum->paragraph(2));
    }
}
