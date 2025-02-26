<?php

declare(strict_types=1);

$transactions = [
    [
        "id" => 1,
        "date" => "2019-01-01",
        "amount" => 100.00,
        "description" => "Payment for groceries",
        "merchant" => "SuperMart",
    ],
    [
        "id" => 2,
        "date" => "2020-02-15",
        "amount" => 75.50,
        "description" => "Dinner with friends",
        "merchant" => "Local Restaurant",
    ],
];

$GLOBALS['transactions'];

function calculateTotalAmount(array $transactions): float
{
    $total = array_sum(array_column($transactions, 'amount'));
    return $total;
}

function findTransactionByDescription(array $transactions, string $descriptionPart): array
{
    $result = array_filter($transactions, function ($transaction) use ($descriptionPart) {
        return $transaction['description'] === $descriptionPart;
    });
    return $result;
}

// findTransactionById foreach realisation
//
// function findTransactionById(array $transactions, int $id): array
// {	
// 	$result = [];
// 	foreach ($transactions as $transaction) {
// 		if ($transaction['id'] === $id) {
// 			array_push($result, $transaction);
// 		}
// 	}
// 	return $result;
// }

function findTransactionById(array $transactions, int $id): array
{
    $result = array_filter($transactions, function ($transaction) use ($id) {
        return $transaction['id'] === $id;
    });
    return $result;
}

function daysSinceTransaction(string $date): int
{
    $transactionDate = new DateTime($date);
    $today = new DateTime();
    $interval = $transactionDate->diff($today);
    $daysPassed = $interval->days;
    return $daysPassed;
}

function addTransaction(int $id, string $date, float $amount, string $description, string $merchant): void
{
    $transaction = [
        "id" => $id,
        "date" => $date,
        "amount" => $amount,
        "description" => $description,
        "merchant" => $merchant,
    ];

    array_push($GLOBALS['transactions'], $transaction);
}


echo calculateTotalAmount($transactions);

echo '<br><br><br>';

print_r(findTransactionByDescription($transactions, "Payment for groceries"));

echo '<br><br><br>';

print_r(findTransactionById($transactions, 2));

echo '<br><br><br>';

print_r(daysSinceTransaction("2019-01-01"));

echo '<br><br><br>';

print_r(addTransaction(3, "2014-01-01", 34.23, "sampledesc", "samplemerch"));

echo '<br><br><br>';

print_r($transactions);

echo '<br><br><br>';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table style="border: 1px solid black;">
        <thead>
            <tr>
                <!-- Заголовки столбцов -->
            </tr>
        </thead>

        <tbody>
            <!-- Вывод студентов -->
        </tbody>

    </table>
</body>

</html>
