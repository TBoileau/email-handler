<?php

namespace TBoileau\EmailHandlerBundle\Factory;

use Symfony\Component\DependencyInjection\ServiceLocator;
use TBoileau\EmailHandlerBundle\Manager\EmailManager;
use TBoileau\EmailHandlerBundle\Manager\EmailManagerInterface;

/**
 * Class EmailManagerFactory
 * @package TBoileau\EmailHandlerBundle\Factory
 * @author Thomas Boileau <t-boileau@email.com>
 */
class EmailManagerFactory implements EmailManagerFactoryInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    /**
     * EmailManagerFactory constructor.
     * @param \Swift_Mailer $mailer
     * @param ServiceLocator $serviceLocator
     */
    public function __construct(\Swift_Mailer $mailer, ServiceLocator $serviceLocator)
    {
        $this->mailer = $mailer;
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @inheritdoc
     */
    public function createEmailManager(string $email, $data = null): EmailManagerInterface
    {
        if($this->serviceLocator->has($email)) {
            return new EmailManager($this->serviceLocator->get($email), $this->mailer, $data);
        }

        return new EmailManager(new $email(), $this->mailer, $data);
    }

}