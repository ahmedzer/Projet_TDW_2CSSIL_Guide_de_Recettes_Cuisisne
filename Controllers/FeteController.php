<?php
require_once ('../Models/FeteModel.php');
class FeteController
{
    private $fete;

    public function __construct() {
        $this->fete = new FeteModel();
    }

    public function getFetes() {
        return $this->fete->getFetes();
    }


    public function getRecetteFete() {
        return $this->fete->getRecetteFete();
    }


}