<?php

namespace TBoileau\EmailHandlerBundle\Manager;

use TBoileau\EmailHandlerBundle\Email\EmailInterface;

/**
 * Class EmailManager
 * @package TBoileau\EmailHandlerBundle\Manager
 * @method EmailManagerInterface addPart($body, $contentType = null, $chartset = null)
 * @method EmailManagerInterface attachSigner(\Swift_Signer $signer)
 * @method EmailManagerInterface detachSigner(\Swift_Signer $signer)
 * @method EmailManagerInterface clearSigners()
 * @method EmailManagerInterface toByteStream(\Swift_InputByteStream $is)
 * @method EmailManagerInterface doSign()
 * @method EmailManagerInterface saveMessage()
 * @method EmailManagerInterface saveHeaders(array $altered)
 * @method EmailManagerInterface restoreHeaders()
 * @method EmailManagerInterface restoreMessage()
 * @method EmailManagerInterface setSubject($subject)
 * @method EmailManagerInterface setDate(DateTimeInterface $dateTime)
 * @method EmailManagerInterface setReturnPath($address)
 * @method EmailManagerInterface getReturnPath()
 * @method EmailManagerInterface setSender($address, $name = null)
 * @method EmailManagerInterface addFrom($address, $name = null)
 * @method EmailManagerInterface setFrom($addresses, $name = null)
 * @method EmailManagerInterface addReplyTo($address, $name = null)
 * @method EmailManagerInterface setReplyTo($addresses, $name = null)
 * @method EmailManagerInterface addTo($address, $name = null)
 * @method EmailManagerInterface setTo($addresses, $name = null)
 * @method EmailManagerInterface addCc($address, $name = null)
 * @method EmailManagerInterface setCc($addresses, $name = null)
 * @method EmailManagerInterface addBcc($address, $name = null)
 * @method EmailManagerInterface setBcc($addresses, $name = null)
 * @method EmailManagerInterface setPriority($priority)
 * @method EmailManagerInterface setReadReceiptTo($addresses)
 * @method EmailManagerInterface attach(\Swift_Mime_SimpleMimeEntity $entity)
 * @method EmailManagerInterface detach(\Swift_Mime_SimpleMimeEntity $entity)
 * @method EmailManagerInterface embed(\Swift_Mime_SimpleMimeEntity $entity)
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
