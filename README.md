# Twitter API Library for PHP
[![Build Status](https://travis-ci.org/itigoppo/twitter-api.svg?branch=master)](https://travis-ci.org/itigoppo/twitter-api)

TwitterAPIのPHPライブラリです。

- Twitter
- Twitter API version 1.1
    - https://developer.twitter.com/en/docs/api-reference-index

# Requirements
- PHP7.3

# Installation

```bash
composer require itigoppo/twitter-api
```

# Usage

```php

$consumerKey = 'Your API key';
$consumerSecret = 'Your API secret key';
$token = 'Your Access token';
$tokenSecret = 'Your Access token secret';

$twitter = new Twitter(new Connector($consumerKey, $consumerSecret, $token, $tokenSecret));

```
