<?php

namespace TBoileau\EmailHandlerBundle\Factory;

use TBoileau\EmailHandlerBundle\Manager\EmailManagerInterface;

/**
 * Interface EmailManagerFactoryInterface
 * @package TBoileau\EmailHandlerBundle\Factory
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface EmailManagerFactoryInterface
{
    /**
     * @param string $email
     * @param mixed|null $data
     * @return EmailManagerInterface
     */
    public function createEmailManager(string $email, $data = null): EmailManagerInterface;
}