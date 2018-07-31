<?php

namespace Hackzilla\Bundle\TicketBundle\Entity;

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
}
