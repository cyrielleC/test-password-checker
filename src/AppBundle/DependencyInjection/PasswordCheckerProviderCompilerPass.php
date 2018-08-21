<?php

namespace AppBundle\DependencyInjection;

use AppBundle\Service\PasswordChecker;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Yaml\Yaml;

class PasswordCheckerProviderCompilerPass implements CompilerPassInterface
{
    const CHECKER_CLASS = PasswordChecker::class;
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        $config = Yaml::parse(file_get_contents(__DIR__ . '/../config/checkers.yml'))[self::CHECKER_CLASS];
        foreach ($container->findTaggedServiceIds('password_checker') as $id => $attributes) {
            if (!empty($config[$id])){
                $container->getDefinition(self::CHECKER_CLASS)->addMethodCall('addChecker', [new Reference($id)]);
            }
        }
    }
}
