<?php

namespace TBoileau\EmailHandlerBundle\Manager;

use TBoileau\EmailHandlerBundle\Email\EmailInterface;

/**
 * Interface EmailManagerInterface
 * @package TBoileau\EmailHandlerBundle\Email
 * @author Thomas Boileau <t-boileau@email.com>
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
