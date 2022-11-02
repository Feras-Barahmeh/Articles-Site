<?php 
require_once "configuration.php";


class GlobalEdit extends Configuration {
    public function EditProcedures() {
        if (Queries::Update($this->tableName, $this->colName, $this->newValue, "WHERE IdUser = " . $this->idUser)) {
            echo "Done";
        } else {
            echo "Fail";
        }
    }
}

$edit = new GlobalEdit;
$edit->EditProcedures();
