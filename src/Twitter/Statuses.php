<?php

namespace Itigoppo\TwitterApi\Twitter;

use Itigoppo\TwitterApi\Connector\Connector;

class Statuses
{
    /** @var Connector $connector */
    protected $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * POST statuses/update
     * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-update
     *
     * @param string $status
     * @param array $formOptions
     * @return mixed|string
     * @throws \Exception
     */
    public function update(string $status, array $formOptions = [])
    {
        $formParams = [
            'status' => $status,
            ] + $formOptions;

        return $this->connector->post('statuses/update.json', $formParams, []);
    }
}
