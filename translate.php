<?php
 use GuzzleHttp\Client;
 use GuzzleHttp\Exception\ClientException;

 function main(array $args) : array
 {
   // check for input text
   if (!isset($args['text'])) {
     throw new Exception('No input provided');
   }

   // create an HTTP client
   $c = new Client([
     'base_uri' => 'https://api.funtranslations.com',
     'timeout'  => 6000,
   ]);

   // generate POST request and return output
   $response = $c->post('/translate/yoda.json', ['body' => json_encode(['text' => $args['text']])]);
   $data = json_decode($response->getBody());

   return [$data];
 }