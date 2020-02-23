<?php

namespace Itigoppo\TwitterApi\Twitter;

use Itigoppo\TwitterApi\Connector\Connector;

class Friends
{
    /** @var Connector $connector */
    protected $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * GET friends/ids.json
     * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friends-ids
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function ids(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('friends/ids.json', [], $queryParams);
    }

    /**
     * GET friends/list.json
     * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friends-list
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function lists(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('friends/list.json', [], $queryParams);
    }
}
