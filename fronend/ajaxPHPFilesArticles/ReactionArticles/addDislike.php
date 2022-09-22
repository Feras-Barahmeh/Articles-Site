<?php
require_once "PrepareAddReactiosnMethods.php";
include_once "conflicitingReactions.php";

class AddDislike extends PrepareAddReactiosnMethods {
    public function AddDislike () {

        if ($this->ifReactionSet()) {
            if ($this->DecCountReaction()) {
                $this->DeleteReaction();
                $operation = "Unislike";

                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => $this->currentDislikes,
                    "typeReact" => "dislike",
                ]);
            }
        } else {

            $delConflict = new ConflicitingReactions(["likes"], ["likeID"], ["IdContent" => $this->idArticle, "IdUser" => $this->idUser]);
            $delConflict->RemoveConflicting();

            if ($this->IncCountReaction()) {
                $this->InsertReaction();
                $this->UpdateContanerReactions("articles", "likes", $this->currentLikes);
                $operation = "Setdislike";

                echo json_encode([
                    "operation" => $operation,
                    "countReaction" => $this->currentDislikes,
                    "typeReact" => "dislike",
                ]);
            } 
        }
    }
}