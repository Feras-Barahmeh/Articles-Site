<?php
require_once "PrepareAddReactiosnMethods.php";

class AddLike extends PrepareAddReactiosnMethods {
    public function AddLike () {

        if ($this->ifReactionSet()) {
            if ($this->DecCountReaction()) {
                $this->DeleteReaction();
                $operation = "Unlike";

                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => --$this->currentLikes,
                    "typeReact" => "like",
                ]);
            }
        } else {
            if ($this->IncCountReaction()) {
                $this->InsertReaction();
                $operation = "Setlike";

                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => ++$this->currentLikes,
                    "typeReact" => "like",
                ]);
            } 
        }
    }
}