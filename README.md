# API AI Webhook PHP Library

This library provides a convient interface for developing Webhooks for API AI and Google Assistant.

## Info

Work in progress.

Capabilities:
- Basic serialization/deserialization 
- Basic support for rich messages for Google Actions

## Usage

Install via composer: `composer require 20steps/api-ai-webhook-php`.

### Requests
When API AI triggers your webhook, a HTTP request will be sent to the URL you specified for your app.

You can get the `JSON` body of the request like so:
```php
$rawData = $request->getContent(); // This is how you would retrieve this with Laravel or Symfony 2.
$request = new \APIAI\Request\Request($rawData);
$request = $request->fromData();
```

The library expect raw request data, not parsed JSON as it needs to validate the request signature.

You can determine the type of the request with `instanceof`, e.g.:
```php
if ($apiaiRequest instanceof IntentRequest) {
	// Handle intent here
}
```

### Response
You can build an APIAI response with the `Response` class. You can optionally set a display text or add basic cards for Google Assistant.

Here's a few examples.
```php
$response = new \APIAI\Response\Response('my-assistant');
$response->respond('Cooool. I\'ll lower the temperature a bit for you!')
	->withDisplayText('Temperature decreased by 2 degrees')
	->withCard('My card title','My formatted text')
```

To output the response, simply use the `->render()` function, e.g. in Laravel you would create the response like so:
```php
return response()->json($response->render());
```

In vanilla PHP:
```php
header('Content-Type: application/json');
echo json_encode($response->render());
exit;
```
