<?php
declare(strict_types=1);
require_once('UserTableWrapper.php');
require_once('TableWrapperInterface.php');

use PHPUnit\Framework\TestCase;

class UserTableWrapperTest extends TestCase
{

  public function testInsert()
  {
    $users = new UserTableWrapper();
    $users->insert([
      'id' => 2,
      'name' => 'Viktoria',
      'age' => 24
    ]);
    $users->insert([
      'id' => 2,
      'name' => 'Viktoria',
      'age' => 24
    ]);

    $this->assertEquals(2, count($users->get()));
  }


  public function testUpdate()
  {
    $users = new UserTableWrapper();
    $users->insert([
      'id' => 2,
      'name' => 'Viktoria',
      'age' => 24
    ]);
    $users->insert([
      'id' => 2,
      'name' => 'Viktoria',
      'age' => 24
    ]);
    $users->update(1, [
      'id' => 3,
      'name' => 'Pavel',
      'age' => 23
    ]);

    $this->assertEquals(3, $users->get()[1]['id']);
    $this->assertEquals('Pavel', $users->get()[1]['name']);
    $this->assertEquals(23, $users->get()[1]['age']);
  }

  public function testDelete()
  {
    $users = new UserTableWrapper();
    $users->insert([
      'id' => 2,
      'name' => 'Viktoria',
      'age' => 24
    ]);
    $users->insert([
      'id' => 2,
      'name' => 'Viktoria',
      'age' => 24
    ]);
    $users->delete(0);

    $this->assertEquals(1, count($users->get()));
  }

  /**
   * testGet
   *
   * @return void
   * 
   * @dataProvider providerTestGet
   */
  public function testGet(array $values, int $count)
  {
    $users = new UserTableWrapper();

    foreach ($values as $value) {
      $users->insert($value);
    }

    $this->assertEquals($count, count($users->get()));
  }

  public static function providerTestGet()
  {
    return [
      [[['id' => 2, 'name' => 'Viktoria', 'age' => 24], ['id' => 3, 'name' => 'Pavel', 'age' => 20]], 2]
    ];
  }
}