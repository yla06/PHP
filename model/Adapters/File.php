<?php
require_once '../ModelInterface.php';

class FileModel implements ModelInterface
{
    public function insert( $data, $target)
    {
      $a_data = $this -> selectAll( $target);
      $a_data[]= $data;
      file_put_contents( "{$target}dat", serialize( $a_data ));
    }
    public function update();
    public function delete();
    public function selectAll();
    public function selectAttr($attr);
}
