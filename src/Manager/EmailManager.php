<?php

namespace TBoileau\EmailHandlerBundle\Manager;

use TBoileau\EmailHandlerBundle\Email\EmailInterface;

/**
 * Class EmailManager
 * @package TBoileau\EmailHandlerBundle\Manager
 */
class EmailManager implements EmailManagerInterface
{
    /**
     * @var EmailInterface
     */
    private $email;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var null|mixed
     */
    private $data;

    /**
     * @var \Swift_Message
     */
    private $message;

    /**
     * EmailManager constructor.
     * @param EmailInterface $email
     * @param \Swift_Mailer $mailer
     * @param mixed|null $data
     */
    public function __construct(EmailInterface $email, \Swift_Mailer $mailer, ?mixed $data)
    {
        $this->email = $email;
        $this->mailer = $mailer;
        $this->data = $data;
        $this->message = new \Swift_Message();
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function getEmail(): EmailInterface
    {
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function getMessage(): \Swift_Message
    {
        return $this->message;
    }

    /**
     * @inheritdoc
     */
    public function send(): int
    {
        return $this->mailer->send($this->message);
    }

    /**
     * @inheritdoc
     */
    public function __call($name, $arguments): EmailManagerInterface
    {
        call_user_func_array([$this->message, $name], $arguments);

        return $this;
    }

}