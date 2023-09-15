<?php declare(strict_types=1);

namespace SwagTraining\AppendLoremIpsumToCategory\Util;

use Shopware\Core\Framework\Struct\Struct;

class LoremIpsum extends Struct
{
    public function generate(int $count = 1, string $type = 'paragraph')
    {
        $lipsum = new \joshtronic\LoremIpsum();
        return nl2br($lipsum->paragraph($count));
    }
}