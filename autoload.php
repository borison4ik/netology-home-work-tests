<?php
declare(strict_types=1);
const CLASSES_DIR = 'classes';

function autoload(string $classname)
{
  $fileName = __DIR__ . DIRECTORY_SEPARATOR . CLASSES_DIR . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
  if (is_file($fileName)) {
      return require_once($fileName);
  }

  throw new Exception('No file' . $fileName);
}

spl_autoload_register('autoload');