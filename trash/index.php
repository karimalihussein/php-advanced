<?php

# PHP Function Parameters - Named Arguments - Variadic Functions & Unpacking
function foo(int|float $a, int|float $b): int|float
{
    return $a / $b;
}

function sum(int|float $a, int|float $b,int|float ...$numbers): int|float
{
    return $a + $b + array_sum($numbers);
}

$data = [
    'b' => 2,
    'a' => 10,
];

echo foo(...$data) . PHP_EOL;

# end



// $x = 'sum';
// 
// if (is_callable($x)) {
//     echo $x(1, 2, 3, 4, 5, 6, 7, 8, 9, 10) . PHP_EOL;
// }

// echo $sum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10) . PHP_EOL;

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$array2 = array_map(fn($number) => $number * 2, $array);

print_r($array2);


# How To Work With Dates & Time Zones 

$date = date('Y-m-d H:i:s', strtotime('last day of february 2020'));

echo '<pre>';
print_r(date_parse($date));
echo '</pre>';
$items = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4,
    'e' => 5,
    'f' => 6,
    'g' => 7,
    'h' => 8,
    'i' => 9,
    'j' => 10,
    'k' => 11,
    'l' => 12,
    'm' => 13,
    'n' => 14,
    'o' => 15,
    'p' => 16,
    'q' => 17,
    'r' => 18,
    's' => 19,
    't' => 20,
    'u' => 21,
    'v' => 22,
    'w' => 23,
    'x' => 24,
    'y' => 25,
    'z' => 26,
];


// $even = array_filter($items, fn($value) => $value % 2 === 0);

// $odd = array_filter($items, fn($value) => $value % 2 !== 0);

// $array = array_map(fn($value) => $value * 2, $items);

// $key = array_search(5, $items);

$array1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 60];
$array2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// in_array() is a function that checks if a value exists in an array"


if (in_array(5, $items)) {
    echo '5 exists in the array';
}
echo '<br>';
// array_diff() is a function that compares two arrays and returns the difference
$diff = array_diff($array1, $array2);
if (empty($diff)) {
    echo "the array1 and array2 are the same";
} else {
    echo "The difference between array1 and array2 is: " . implode(', ', $diff);
}
echo '<br>';
// array_intersect() is a function that compares two arrays and returns the intersection
$intersect = array_intersect($array1, $array2);
if (empty($intersect)) {
    echo "there is no intersection between array1 and array2";
} else {
    echo "The intersection between array1 and array2 is: " . implode(', ', $intersect);
}
echo '<br>';
// array_key_exists() is a function that checks if a key exists in an array
if (array_key_exists('a', $items)) {
    echo 'a exists in the array';
}else{
    echo 'a does not exist in the array';
}
echo '<br>';
// array_keys() is a function that returns all the keys of an array
$keys = array_keys($array1);
echo "The keys of the array are: " . implode(', ', $keys);
echo '<br>';
// array_merge() is a function that merges two or more arrays
$merged = array_merge($array1, $array2);
echo "The merged array is: " . implode(', ', $merged);
echo '<br>';
// array_pop() is a function that removes the last element of an array
array_pop($array1);
echo "The array after removing the last element is: " . implode(', ', $array1);
echo '<br>';
// array_push() is a function that adds one or more elements to the end of an array
array_push($array1, 11, 12, 13);
echo "The array after adding elements to the end is: " . implode(', ', $array1);
echo '<br>';
// array_reverse() is a function that returns an array in the reverse order
$reversed = array_reverse($array1);
echo "The reversed array is: " . implode(', ', $reversed);
echo '<br>';    
// array_shift() is a function that removes the first element of an array
array_shift($array1);
echo "The array after removing the first element is: " . implode(', ', $array1);
echo '<br>';
// array_slice() is a function that returns selected parts of an array
$sliced = array_slice($array1, 2, 3);
echo "The sliced array is: " . implode(', ', $sliced);
echo '<br>';
// array_sum() is a function that returns the sum of the values in an array
$sum = array_sum($array1);
echo "The sum of the values in the array is: " . $sum;
echo '<br>';
// array_unique() is a function that removes duplicate values from an array
$unique = array_unique($array1);
echo "The array after removing duplicates is: " . implode(', ', $unique);
echo '<br>';
// array_values() is a function that returns all the values of an array
$values = array_values($array1);
echo "The values of the array are: " . implode(', ', $values);
echo '<br>';
// count() is a function that counts all elements in an array, or something in an object
$count = count($array1);
echo "The number of elements in the array is: " . $count;
echo '<br>';
// sort() is a function that sorts an array in ascending order
sort($array1);
echo "The sorted array is: " . implode(', ', $array1);
echo '<br>';
// rsort() is a function that sorts an array in descending order
rsort($array1);
echo "The sorted array is: " . implode(', ', $array1);
echo '<br>';
// array_filter() is a function that filters elements of an array using a callback function
$even = array_filter($array1, fn($value) => $value % 2 === 0);
echo "The even numbers in the array are: " . implode(', ', $even);
echo '<br>';
// array_map() is a function that sends each value of an array to a callback function, and returns the modified array
$array = array_map(fn($value) => $value * 2, $array1);
echo "The modified array is: " . implode(', ', $array);
echo '<br>';
// array_reduce() is a function that iteratively reduces the array to a single value using a callback function
$reduced = array_reduce($array1, fn($carry, $item) => $carry + $item);
echo "The reduced array is: " . $reduced;
echo '<br>';
// array_search() is a function that searches an array for a given value and returns the corresponding key if successful
$key = array_search(5, $array1);
echo "The key of the value 5 is: " . $key;
echo '<br>';
// array_rand() is a function that returns one or more random keys from an array
$random = array_rand($array1, 2);
echo "The random keys are: " . implode(', ', $random);
echo '<br>';
// array_flip() is a function that exchanges all keys with their associated values in an array
$flipped = array_flip($array1);
echo "The flipped array is: " . implode(', ', $flipped);
echo '<br>';
// array_change_key_case() is a function that changes all keys in an array to lowercase or uppercase
$lowercase = array_change_key_case($array1, CASE_LOWER);
echo "The lowercase array is: " . implode(', ', $lowercase);
echo '<br>';
# new functions in php8.0
// array_key_first() is a function that returns the first key of an array
$first = array_key_first($array1);
echo "The first key of the array is: " . $first;
echo '<br>';
// array_key_last() is a function that returns the last key of an array
$last = array_key_last($array1);
echo "The last key of the array is: " . $last;
echo '<br>';
# substr() is a function that returns a part of a string
$part = substr('Hello World', 6);
echo "The part of the string is: " . $part;
echo '<br>';
# str_replace() is a function that replaces some characters with some other characters in a string
$replaced = str_replace('World', 'PHP', 'Hello World');
echo "The replaced string is: " . $replaced;
echo '<br>';
# str_repeat() is a function that repeats a string a specified number of times
$repeated = str_repeat('Hello ', 3);
echo "The repeated string is: " . $repeated;
echo '<br>';
# str_shuffle() is a function that randomly shuffles all characters in a string
$shuffled = str_shuffle('Hello World');
echo "The shuffled string is: " . $shuffled;
echo '<br>';
# str_split() is a function that splits a string into an array
$split = str_split('Hello World');
echo "The split string is: " . implode(', ', $split);
echo '<br>';
# str_word_count() is a function that counts the number of words in a string
$words = str_word_count('Hello World');
echo "The number of words in the string is: " . $words;
echo '<br>';
# strrev() is a function that reverses a string
$reversed = strrev('Hello World');
echo "The reversed string is: " . $reversed;
echo '<br>';
# strlen() is a function that returns the length of a string
$length = strlen('Hello World');
echo "The length of the string is: " . $length;
echo '<br>';


    







# PHP Error Handling & Error Handlers 
function errorHandle(int $type, string $message, ?string $file = null,?int $line = null): void
{
    echo $type . ' ' . $message . ' ' . $file . ' ' . $line;
    exit;
}
error_reporting(E_ALL & ~E_WARNING);
set_error_handler('errorHandle', E_ALL);

function getTransactionFiles(string $dirPath): array
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}

function getTransactions(string $fileName, ?callable $transactionHandler = null): array
{
    if (! file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.', E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    fgetcsv($file);

    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        if ($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }

    return $transactions;
}

function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount,
    ];
}

function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}


$files = getTransactionFiles(FILES_PATH);

$transactions = [];
foreach($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}


$totals = calculateTotals($transactions);


require VIEWS_PATH . 'transactions.php';


# classes 
$transaction = (new App\Transaction(100, 'Test'))->addTax(10)->applyDiscount(5);
var_dump($transaction->getAmount());

$str = '{"name":"John","age":30,"city":"New York"}';
$arr = json_decode($str);
var_dump($arr->name);

# Nullsafe Operator examples 
$person = new stdClass();
$person->name = 'John';
$person->age = 30;
$person->address = new stdClass();
$person->address->city = 'New York';
$person->address->country = 'USA';

$city = $person?->address?->city;
var_dump($city);

# Object Oriented PHP - Class Constants 
class Person
{
    public const TYPE = 'human';

    public function getType(): string
    {
        return self::TYPE;
    }
}

$person = new Person();
var_dump($person->getType());

# Static Properties & Methods In Object Oriented PHP
class Animal
{
    public static $type = 'animal';

    public static function getType(): string
    {
        return self::$type;
    }
}

var_dump(Animal::$type);
var_dump(Animal::getType());

# PHP - Encapsulation & Abstraction exmaples 

$db = new \PDO('mysql:host=db;dbname=main', 'root', 'root', [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
]);
// $query = 'SELECT * FROM `users`';
// $statement = $db->query($query);
// $users = $statement->fetchAll();
// var_dump($users);
$data = [
    'full_name' => 'John Doe',
    'email' => 'john@gmail.com',
    'is_active' => 1,
    'created_at' => date('Y-m-d H:i:s'),
];
$query = 'INSERT INTO `users` (`full_name`, `email`, `is_active`, `created_at`) VALUES (:full_name, :email, :is_active, :created_at)';
$statement = $db->prepare($query);
$statement->execute($data);


        //     // foreach ($methods as $method) {
        //     //     $attributes = $method->getAttributes(Route::class);
        //     //     foreach ($attributes as $attribute) {
        //     //         $route = $attribute->newInstance();
        //     //         $this->register($route->method, $route->routePath, [$controller => $method->getName()]);
        //     //         // $this->routes[$route->path][$route->methods[0]] = [
        //     //         //     'controller' => $controller,
        //     //         //     'method' => $method->getName(),
        //     //         //     'middlewares' => $route->middlewares,
        //     //         //     'params' => $route->params
        //     //         // ];
        //     //     }
              
        //     }
        // }


                // $email = (new Email())
        //     ->from('support@example.com')
        //     ->to($email)
        //     ->subject('Welcome to our website')
        //     ->text($text);
        // $dsn = $_ENV['MAIL_DRIVER'] . '://' . $_ENV['MAIL_HOST'] . ':' . $_ENV['MAIL_PORT'];
        // $transport = Transport::fromDsn($dsn);
        // $mailer = new Mailer($transport);
        // $mailer->send($email);