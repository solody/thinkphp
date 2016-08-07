<?php
/**
 * Created by PhpStorm.
 * User: kent
 * Date: 2016/8/7
 * Time: 9:54
 */

namespace Entity;

/**
 * Class User
 * @package Entity
 * @Entity
 * @Table(name="user")
 */
class User
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
    public $username;

    /**
     * @var string
     * @Column(length=45)
     */
    public $password;

    /**
     * @var Person
     * @OneToOne(targetEntity="Entity\Person", mappedBy="user")
     */
    public $person;

    public function getPerson()
    {
        return $this->person;
    }
}