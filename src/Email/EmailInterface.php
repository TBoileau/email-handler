<?php

namespace TBoileau\EmailHandlerBundle\Email;

use TBoileau\EmailHandlerBundle\Manager\EmailManagerInterface;

/**
 * Interface MessageInterface
 * @package TBoileau\EmailHandlerBundle\Email
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface EmailInterface
{
    /**
     * @param EmailManagerInterface $email
     */
    public function buildMessage(EmailManagerInterface $email): void;
}