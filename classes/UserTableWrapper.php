<?php
declare(strict_types=1);
require_once('TableWrapperInterface.php');

class UserTableWrapper implements TableWrapperInterface
{
    private array $rows = array();

    /**
     * @param array|[column => row_value] $values
     */
    public function insert(array $values): void
    {
      $this->rows[] = $values;
    }

    public function update(int $id, array $values): array
    {
      $this->rows[$id] = $values;
      return $this->rows;
    }
    public function delete(int $id): void
    {
      unset($this->rows[$id]);
    }
    
    public function get(): array
    {
      return $this->rows;
    }
}