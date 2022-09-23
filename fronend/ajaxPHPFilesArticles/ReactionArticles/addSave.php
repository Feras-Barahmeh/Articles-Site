<?php
require_once "PrepareAddReactiosnMethods.php";

class AddSave extends PrepareAddReactiosnMethods {
    public function AddSave () {
        
        if ($this->ifReactionSet()) {
            if ($this->DecCountReaction()) {
                $this->DeleteReaction();
                $operation = "Unsave";

                echo json_encode([
                    "operation" => $operation,
                    "newCountReactions" => $this->GetReactionsNumber(),
                ]);
            }
        } else {

            if ($this->IncCountReaction()) {

                // add reactions
                $this->InsertReaction();
                $operation = "Setsave";

                echo json_encode([
                    "operation" => $operation,
                    "newCountReactions" => $this->GetReactionsNumber(),
                ]);
            } 
        }
    }
}