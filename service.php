<?php

header('Content-Type: application/json');

// validate user input

function validateInput($keys)
{
    $parametersAreValid = true;

    foreach($keys as $key)
    {
        if (!(isset($_GET[$key]) && is_string($_GET[$key])))
        {
            $parametersAreValid = false;

            break;
        }
    }

    return $parametersAreValid;
}

// output response

function output()
{
    $inputIsValid = validateInput(['from', 'to', 'amount']);

    if ($inputIsValid)
    {
        $from = strtoupper(trim($_GET['from']));
        $to = strtoupper(trim($_GET['to']));
        $amount = abs((float) $_GET['amount']);

        $allowedCurrencies = include('currencies.php');
        $maxAmount = 100000000000;
        $output = [
            'rate' => 0,
            'unitRate' => 0,
            'from' => null,
            'to' => null
        ];

        if (isset($allowedCurrencies[$from]) && isset($allowedCurrencies[$to]) && $amount <= $maxAmount && $amount)
        {
            $base = urlencode($from);
            $serviceAddress = 'https://api.exchangeratesapi.io/latest?base='.$base;

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $serviceAddress);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($statusCode == 200)
            {
                $data = json_decode($response);

                $output['rate'] = $amount * $data -> rates -> $to;
                $output['unitRate'] = $data -> rates -> $to;
                $output['from'] = $from;
                $output['to'] = $to;
            }

            curl_close($ch);
        }

        echo json_encode($output);
    }
}

output();
