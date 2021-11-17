<?php

$url = 'http://localhost:8000/api';

$class = '/users';

$param = '/3';

$response = file_get_contents($url.$class.$param);

$response = json_decode($response, 1);

print_r($response['data']['name']);
exit;