<?php 
require_once "configuration.php";

class EditSkiles  {
    private function GetCurrentSkiles () {
        $techs = Queries::FromTable("name_technical", "technicals", "WHERE id_user = " . $_REQUEST["idUser"]);
        $currentTech = [];
        foreach ($techs as $tech) {
            foreach ($tech as $key => $nameTech) {
                if (gettype($key) === "string") {
                    array_push($currentTech, $nameTech);
                }
            }
        }
        return $currentTech;
    }

    private function newValue() {
        return explode(',', $_REQUEST["newValue"]);
    }

    private function removedSkiles($removedSkiles) {

        foreach($removedSkiles as $skileRemoved) {
            Queries::Delete("technicals", "name_technical = '$skileRemoved' AND id_user = " . $_REQUEST["idUser"]);
        }
    }

    public function EditProcedures () {
        $currentTech = $this->GetCurrentSkiles();
        $newSkiles = $this->newValue();

        foreach($newSkiles as $newSkile) {
            if (! in_array($newSkile, $currentTech) ) {
                if (Queries::Insert(
                        "technicals",
                        ["name_technical", "id_user"],
                        [ "'" . $newSkile . "'", $_REQUEST["idUser"]])) 
                    {
                        echo "Done";
                    }
            }
        }

        $getRemovedSkiles = array_diff($currentTech, $newSkiles);
        $this->removedSkiles($getRemovedSkiles);
    }

}

$skileEdit = new EditSkiles ;
$skileEdit->EditProcedures();