<?php
interface ModelInterface
{
    public function insert( $data, $target ); //target імя файла в базі даних
    public function update( $id, $data, $target);
    public function delete( $id, $target);
    public function selectAll( $target);
    public function selectAttr($attr, $target);
}
