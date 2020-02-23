<?php

namespace Itigoppo\TwitterApi\Twitter;

use Itigoppo\TwitterApi\Connector\Connector;

class Timelines
{
    /** @var Connector $connector */
    protected $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * GET statuses/home_timeline
     * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-home_timeline.html
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function home(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('statuses/home_timeline.json', [], $queryParams);
    }

    /**
     * GET statuses/user_timeline
     * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-user_timeline.html
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function user(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('statuses/user_timeline.json', [], $queryParams);
    }

    /**
     * GET statuses/mentions_timeline
     * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-mentions_timeline.html
     *
     * @param array $queryOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function mentions(array $queryOptions = [])
    {
        $queryParams = [
            ] + $queryOptions;

        return $this->connector->get('statuses/mentions_timeline.json', [], $queryParams);
    }
}
