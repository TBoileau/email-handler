<?php

namespace TBoileau\EmailHandlerBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use TBoileau\EmailHandlerBundle\DependencyInjection\Compiler\FormHandlerPass;

/**
 * Class TBoileauEmailHandlerBundle
 * @package TBoileau\EmailHandlerBundle
 * @author Thomas Boileau <t-boileau@email.com>
 */
class TBoileauEmailHandlerBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new FormHandlerPass());
    }

}