<?php

namespace TBoileau\EmailHandlerBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class EmailHandlerPass
 * @package TBoileau\EmailHandlerBundle\DependencyInjection\Compiler
 * @author Thomas Boileau <t-boileau@email.com>
 */
class EmailHandlerPass implements CompilerPassInterface
{
    /**
     * @var string
     */
    private $emailManagerFactory;

    /**
     * @var string
     */
    private $emailHandlerTag;

    /**
     * FormHandlerPass constructor.
     * @param string $emailManagerFactory
     * @param string $emailHandlerTag
     */
    public function __construct(string $emailManagerFactory = "tboileau.email_handler.manager_factory", string $emailHandlerTag = "tboileau.email_handler.handler")
    {
        $this->emailManagerFactory = $emailManagerFactory;
        $this->emailHandlerTag = $emailHandlerTag;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition($this->emailManagerFactory);

        $definition->replaceArgument(1, $this->processFormHandler($container));
    }

    /**
     * @param ContainerBuilder $container
     * @return Reference
     */
    private function processFormHandler(ContainerBuilder $container): Reference
    {
        $servicesMap = [];

        foreach ($container->findTaggedServiceIds($this->emailHandlerTag, true) as $serviceId => $tag) {
            $serviceDefinition = $container->getDefinition($serviceId);
            $servicesMap[$emailType = $serviceDefinition->getClass()] = new Reference($serviceId);
        }

        return ServiceLocatorTagPass::register($container, $servicesMap);
    }

}