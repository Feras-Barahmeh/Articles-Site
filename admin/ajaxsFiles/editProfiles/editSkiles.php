<?php 
require_once "configuration.php";


class EditSkiles  {
    private function GetCurrentSkiles () {
        $currentTech = Queries::FromTable("name_technical", "technicals", "WHERE id_user = " . $_REQUEST["idUser"], "fetch");
        return $currentTech;
    }

    private function newValue() {
        return explode(',', $_REQUEST["newValue"]);
    }

    private function IfAradyExist($newSkile, $currentSkiles) {
        foreach($currentSkiles as $skile) {
            if ($skile === $newSkile) {
                return true;
            }
        }
        return false;
    }

    public function EditProcedures () {
        $currentTech = $this->GetCurrentSkiles();
        $newSkiles = $this->newValue();

        foreach($newSkiles as $newSkile) {
            if (! $this->IfAradyExist($newSkile, $currentTech)) {
                if (Queries::Insert(
                        "technicals",
                        ["name_technical", "id_user"],
                        [ "'" . $newSkile . "'", $_REQUEST["idUser"]])) 
                    {
                        echo "Done";
                    } 
            } 

        }

    }


    
}

$skileEdit = new EditSkiles ;
$skileEdit->EditProcedures();