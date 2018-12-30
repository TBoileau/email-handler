<?php

namespace TBoileau\EmailHandlerBundle\Manager;

use TBoileau\EmailHandlerBundle\Email\EmailInterface;

/**
 * Interface EmailManagerInterface
 * @package TBoileau\EmailHandlerBundle\Email
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface EmailManagerInterface
{
    /**
     * @return mixed|null
     */
    public function getData();

    /**
     * @return EmailInterface
     */
    public function getEmail(): EmailInterface;

    /**
     * @return \Swift_Message
     */
    public function getMessage(): \Swift_Message;

    /**
     * @return int
     */
    public function send(): int;

    /**
     * @param $name
     * @param $arguments
     * @return EmailManagerInterface
     */
    public function __call($name, $arguments): self;
}