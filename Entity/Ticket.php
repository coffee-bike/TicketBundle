<?php

namespace Hackzilla\Bundle\TicketBundle\Entity;
namespace Hackzilla\Bundle\TicketBundle\Model;

use Hackzilla\Bundle\TicketBundle\Entity\TicketMessage;
use Hackzilla\Bundle\TicketBundle\Entity\Traits\TicketTrait;
use Hackzilla\Bundle\TicketBundle\Model\TicketInterface;

/**
 * Ticket.
 */
class Ticket implements TicketInterface
{
    use TicketTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @var string
    *
    * @ORM\Column(name="salesforceId", type="string", length=255)
    **/
    protected $salesforceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_assigned_id", type="guid")
     */
    protected $userAssigned;
    protected $userAssignedObject;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_created_id", type="guid")
     */
    protected $userCreated;
    protected $userCreatedObject;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_user_id", type="guid")
     */
    protected $lastUser;
    protected $lastUserObject;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Set status string
     *
     * @param string $status
     */
    public function setStatusString($status)
    {
        $status = \array_search(\strtolower($status), TicketMessage::$statuses);

        if ($status > 0) {
            $this->setStatus($status);
        }
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get status string
     *
     * @return string
     */
    public function getStatusString()
    {
        if (isset(TicketMessage::$statuses[$this->status])) {
            return TicketMessage::$statuses[$this->status];
        }

        return TicketMessage::$statuses[0];
    }

    /**
     * Set priority
     *
     * @param integer $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Set priority string
     *
     * @param string $priority
     */
    public function setPriorityString($priority)
    {
        $priority = \array_search(\strtolower($priority), TicketMessage::$priorities);

        if ($priority > 0) {
            $this->setPriority($priority);
        }
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get priority string
     *
     * @return string
     */
    public function getPriorityString()
    {
        if (isset(TicketMessage::$priorities[$this->priority])) {
            return TicketMessage::$priorities[$this->priority];
        }

        return TicketMessage::$priorities[0];
    }

    /**
     * Set userCreated
     *
     * @param integer|object $userCreated
     * @return Ticket
     */
    public function setUserCreated($userCreated)
    {
        if (\is_object($userCreated)) {
            $this->userCreatedObject = $userCreated;
            $this->userCreated = $userCreated->getId();
        } else {
            $this->userCreatedObject = null;
            $this->userCreated = $userCreated;
        }

        return $this;
    }

    /**
     * Get userCreated
     *
     * @return integer
     */
    public function getUserCreated()
    {
        return $this->userCreated;
    }

    /**
     * Get userCreated object
     *
     * @return object
     */
    public function getUserCreatedObject()
    {
        return $this->userCreatedObject;
    }

    /**
     * Set lastUser
     *
     * @param integer|object $lastUser
     *
     * @return Ticket
     */
    public function setLastUser($lastUser)
    {
        if (\is_object($lastUser)) {
            $this->lastUserObject = $lastUser;
            $this->lastUser = $lastUser->getId();
        } else {
            $this->lastUserObject = null;
            $this->lastUser = $lastUser;
        }

        return $this;
    }

    /**
     * Get lastUser
     *
     * @return integer
     */
    public function getLastUser()
    {
        return $this->lastUser;
    }

    /**
     * Get lastUser object
     *
     * @return object
     */
    public function getLastUserObject()
    {
        return $this->lastUserObject;
    }

    /**
     * Set lastMessage
     *
     * @param \DateTime $lastMessage
     *
     * @return Ticket
     */
    public function setLastMessage($lastMessage)
    {
        $this->lastMessage = $lastMessage;

        return $this;
    }

    /**
     * Get lastMessage
     *
     * @return \DateTime
     */
    public function getLastMessage()
    {
        return $this->lastMessage;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Ticket
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Ticket
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Add messages
     *
     * @param TicketMessage $messages
     *
     * @return Ticket
     */
    public function addMessage(TicketMessage $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param TicketMessage $messages
     */
    public function removeMessage(TicketMessage $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set salesforceId
     *
     * @param string $salesforceId
     * @return Ticket
     */
     public function setSalesforceId($salesforceId)
     {
         $this->salesforceId = $salesforceId;

         return $this;
     }

     /**
      * Get salesforceId
      *
      * @return string Salesforce ID
      */
     public function getSalesforceId()
     {
         return $this->salesforceId;
     }
}