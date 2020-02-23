<?php

namespace Itigoppo\TwitterApi\Twitter;

use Itigoppo\TwitterApi\Connector\Connector;

class Users
{
    /** @var Connector $connector */
    protected $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * GET users/lookup.json
     * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-lookup
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function lookup(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('users/lookup.json', [], $queryParams);
    }

    /**
     * GET users/search.json
     * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-search
     *
     * @param string $keyword
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function search(string $keyword, array $queryOptions = [])
    {
        $queryParams = [
                'q' => $keyword,
            ] + $queryOptions;

        return $this->connector->get('users/search.json', [], $queryParams);
    }

    /**
     * GET users/show.json
     * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-show
     *
     * @param int $id
     * @param string $name
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function show(int $id, string $name, array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        if (!empty($id)) {
            $queryParams['id'] = $id;
        }

        if (!empty($name)) {
            $queryParams['screen_name'] = $name;
        }

        return $this->connector->get('users/show.json', [], $queryParams);
    }
}
