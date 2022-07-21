<?php

namespace itrax\core\Database\contract;


interface IDbstandard
{
    public function select($table, $column);

    public function where($column, $compair, $value);

    public function andWhere($column, $compair, $value);

    public function orWhere($column, $compair, $value);

    public function join($tablename, $first, $second);

    public function getAll();

    public function getRow();

    public function insert($table, $data);

    public function update($table, $data);

    public function delete($table);

    public function excute();

    public function prepareData($data);

    public function query();

    public function showError();

    // public function GetTableName();
}
