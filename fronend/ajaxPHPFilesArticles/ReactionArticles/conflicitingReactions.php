<?php
include_once "MainMethods.php";

class ConflicitingReactions extends MainMethods {
    public function __construct (array $tablesReactions, array $colIdName , array $colsAndVals) {
        $this -> tablesReactions = $tablesReactions;
        $this->colIdName = $colIdName;
        $this->colsAndVals = $colsAndVals;
    }

    public function RemoveConflicting () {
        $numberTables = count($this->tablesReactions);
        $numberMainCol = count($this->colIdName);

        if ($numberMainCol === $numberTables) {
            for ($i=0; $i < $numberTables; $i++) { 
                $table = $this->tablesReactions[$i];

                $mainCol = $this->colIdName[$i];
                $conditionExist  = "WHERE ";

                foreach ($this->colsAndVals as $key => $value) {
                    $conditionExist .= $key . " = $value AND ";
                }

                $conditionExist = explode(" ", $conditionExist);
                $lenQuyery = count($conditionExist);
                $conditionExist = array_slice($conditionExist, 0, count($conditionExist) - 2); // 2 last Space And Last AND Key Word
                $conditionExist = implode(" ", $conditionExist);

                if (Queries::Counter($mainCol, $table, $conditionExist)) {
                    $conditionExist = explode(" ", $conditionExist);
                    $conditionExist  = array_slice($conditionExist, 1, $lenQuyery);
                    $conditionExist = implode(" ", $conditionExist);
                    Queries::Delete($table, $conditionExist);
                } 
            }
        }

    }
}