<?php
// Get cURL resource
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true, //or 1
    CURLOPT_URL => 'https://apikey-v2-2v218ufnyicgtk8vu1v0vbwjb6236g53t22rurcr5d53:f0e2ce87d5ba606675d8e72e59f60da2@ff8b0397-8bc8-4ec2-bb15-a29dfbd20c6b-bluemix.cloudantnosqldb.appdomain.cloud/_all_dbs'
]);
// Send the request & save response to $resp
$resp = curl_exec($curl);
if (!$resp=curl_exec($curl)) {
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
else{
//php returns in json format, so decode in
$resp = json_decode($resp);
for($i = 0; $i < count($resp); $i++){
  echo $resp[$i] . "<br>"; // dot . is the string concatenation operator
}

}
// Close request to clear up some resources
curl_close($curl);
?>
