<?php
/**
 * Created by PhpStorm.
 * User: kent
 * Date: 2016/8/7
 * Time: 10:20
 */

namespace Entity;

/**
 * Class Person
 * @package Entity
 * @Entity
 * @Table(name="person")
 */
class Person
{
    /**
     * @var int
     * @Column(type="integer")
     * @id
     * @GeneratedValue
     */
    public $id;

    /**
     * @var string
     * @Column(length=45)
     */
    public $nickname;

    /**
     * @var string
     * @Column(length=45)
     */
    public $avatar;

    /**
     * @var User
     * @OneToOne(targetEntity="Entity\User", inversedBy="person")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;

    public function getUser()
    {
        return $this->user;
    }
}