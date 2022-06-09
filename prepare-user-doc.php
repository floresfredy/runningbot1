<?php
 function main(array $args) : array
     {
   // check for inputs
   if (!isset($args['user'])) {
     throw new Exception('User name not found');
   }

   if (!isset($args['role'])) {
     throw new Exception('Role not found');
   }

   // create document
   $doc = [
     'user' => $args['user'],
     'role' => $args['role'],
     'status' => 'active'
   ];

   // return values in format expected by cloudant/create-document
   return ['dbname' => 'cloud-function', 'doc' => json_encode($doc)];
 }