<?php

declare(strict_types=1);

namespace AppBundle;

use AppBundle\DependencyInjection\PasswordCheckerProviderCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    /**
     * @inheritdoc
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new PasswordCheckerProviderCompilerPass());
    }
}
