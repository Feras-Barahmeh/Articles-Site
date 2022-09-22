<?php
require_once "PrepareAddReactiosnMethods.php";
include_once "conflicitingReactions.php";

class AddLike extends PrepareAddReactiosnMethods {
    public function AddLike () {

        if ($this->ifReactionSet()) {
            if ($this->DecCountReaction()) {
                $this->DeleteReaction();
                $operation = "Unlike";

                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => $this->currentLikes,
                    "typeReact" => "like",
                ]);
            }
        } else {
            $delConflict = new ConflicitingReactions(["dislikes"], ["dislikeID"], ["IdContent" => $this->idArticle, "IdUser" => $this->idUser]);
            $delConflict->RemoveConflicting();

            if ($this->IncCountReaction()) {

                // add reactions
                $this->InsertReaction();
                $this->UpdateContanerReactions("articles", "dislikes", $this->currentDislikes);

                $operation = "Setlike";
                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => $this->currentLikes,
                    "typeReact" => "like",
                ]);
            } 
        }
    }
}