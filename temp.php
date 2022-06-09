<?php
 function main(array $args) : array
 {
   if (!isset($args['temp_c'])) {
       throw new Exception("Input temperature (Celsius) not supplied");
   }
   $temp_c = $args['temp_c'];
   $temp_f = ($temp_c * 9/5) + 32;
   return ['temp_c' => $temp_c, 'temp_f' => $temp_f];
 }
 ?>