<?php

declare(strict_types=1);

namespace Welp\IcalBundle;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Welp\IcalBundle\DependencyInjection\WelpIcalExtension;

class WelpIcalBundle extends Bundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        if (!$this->extension instanceof ExtensionInterface) {
            $this->extension = new WelpIcalExtension();
        }

        return $this->extension;
    }
}
