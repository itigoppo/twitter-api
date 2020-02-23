<?php

namespace Itigoppo\TwitterApi\Twitter;

use Itigoppo\TwitterApi\Connector\Connector;

class Followers
{
    /** @var Connector $connector */
    protected $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * GET followers/ids.json
     * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-followers-ids
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function ids(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('followers/ids.json', [], $queryParams);
    }

    /**
     * GET followers/list.json
     * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-followers-list
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function lists(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('followers/list.json', [], $queryParams);
    }
}
