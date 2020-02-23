<?php

namespace Itigoppo\TwitterApi\Twitter;

use Itigoppo\TwitterApi\Connector\Connector;

/**
 * Class Twitter
 * @package Itigoppo\TwitterApi\Twitter
 *
 * @property Timelines $timelines
 * @property Followers $followers
 * @property Friends $friends
 * @property Users $users
 * @property Statuses $statuses
 */
class Twitter
{
    /** @var Connector */
    protected $connector;

    /** @var null|Timelines */
    protected $_timelines = null;
    /** @var null|Followers */
    protected $_followers = null;
    /** @var null|Friends */
    protected $_friends = null;
    /** @var null|Users */
    protected $_users = null;
    /** @var null|Statuses */
    protected $_statuses = null;

    /**
     * Twitter constructor.
     * @param Connector $connector
     */
    public function __construct($connector)
    {
        $this->connector = $connector;
    }

    /**
     * Magic getter
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        throw new \LogicException('Unknown method ' . $name);
    }

    /**
     * Access the Timelines
     *
     * @return Timelines|null
     */
    protected function getTimelines()
    {
        if (!$this->_timelines) {
            $this->_timelines = new Timelines($this->connector);
        }

        return $this->_timelines;
    }

    /**
     * Access the Followers
     *
     * @return Followers|null
     */
    protected function getFollowers()
    {
        if (!$this->_followers) {
            $this->_followers = new Followers($this->connector);
        }

        return $this->_followers;
    }

    /**
     * Access the Friends
     *
     * @return Friends|null
     */
    protected function getFriends()
    {
        if (!$this->_friends) {
            $this->_friends = new Friends($this->connector);
        }

        return $this->_friends;
    }

    /**
     * Access the Users
     *
     * @return Users|null
     */
    protected function getUsers()
    {
        if (!$this->_users) {
            $this->_users = new Users($this->connector);
        }

        return $this->_users;
    }

    /**
     * Access the Statuses
     *
     * @return Statuses|null
     */
    protected function getStatuses()
    {
        if (!$this->_statuses) {
            $this->_statuses = new Statuses($this->connector);
        }

        return $this->_statuses;
    }
}
