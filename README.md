 mcheck-php
=================

# Requirements

In order to use the library you need to have available one of `CURL` extension or `HTTP_Request2`:

For `CURL`:

```
php-curl
php-openssl
```

For `HTTP_Request2` :

```
pear install HTTP_Request2-2.3.0
```

By default the SDK is checking for `CURL` extension first and then fallbacks to `HTTP_Request2`.
You can specify the method using the second argument from `MCheckRest` constructor.

# Installation

The SDk can be installed using `Composer`:

```sh
composer require  mcheck/mcheck-php
```

# API Documentation

MCheck APIs are based on `HTTP` methods, which make it easy to integrate into your own products.
You can use any `HTTP` client in any programming language to interact with the API.
The SDK is only a wrapper over the REST API described [here][1]

# Basic Usage for SDK:

For all properties accepted by the following methods check [the documentation][1].

```php

//create an instance of `MCheckRest`

use mcheck\MCheckRest;

$api = new MCheckRest("secret key here");

//validate a number using "Missed sms method". (type can be : sms)

$response = $api->RequestValidation(array("type" => "sms", "number" => "+number_here"));

//verify a pin for a certain request

$response = $api->VerifyPin(array("id" => "request id here", "pin" => "5659"));

//check validation status for a certain request

$response = $api->ValidationStatus(array("id" => "request id here"));


```

[1]:http://isms.center/
