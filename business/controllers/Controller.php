<?php
require_once realpath(dirname(__FILE__) . "/../config/constants.php");

class Controller {
    public function model($model) {
        require_once realpath(dirname(__FILE__) . "/../models/$model.php");
        return new $model;
    }
}