<?php

declare(strict_types = 1);



require_once __DIR__ . '/../vendor/autoload.php';

$fields = [
    new \App\Text('TextField'),
    new \App\Checkbox('CheckboxField'),
    new \App\Radio('Radioield'),
];

foreach ($fields as $field){
    echo $field->render() . '<br />';
}



