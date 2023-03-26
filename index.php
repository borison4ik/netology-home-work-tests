<?php
declare(strict_types=1);
require_once('./vendor/autoload.php');
require_once('autoload.php');

$Users = new UserTableWrapper();

$Users->insert(array(
  'id' => 1,
  'name' => 'Ivan',
  'age' => 23
));

$Users->insert(array(
  'id' => 2,
  'name' => 'Viktoria',
  'age' => 22
));

$Users->update(1, array(
  'id' => 2,
  'name' => 'Viktoria',
  'age' => 24
));

$Users->insert(array(
  'id' => 3,
  'name' => 'Pavel',
  'age' => 23
));

// $Users->delete(1);

var_dump(count($Users->get()));