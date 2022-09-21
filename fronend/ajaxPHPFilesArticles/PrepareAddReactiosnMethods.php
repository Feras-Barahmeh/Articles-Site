<?php
include_once "MainMethods.php";


class PrepareAddReactiosnMethods extends MainMethods {

    protected function AppropriateReaction($tableReact) {
        switch ($tableReact) {
            case 'likes':
                return $this->currentLikes;
                break;
            case "dislikes" :
                return $this->currentDislikes;
                break;
            case "saveds":
                return $this->currentSaveds;
                break;
        }
    }

    public function __construct($idArticle, $idUser, $tableReact, $colReactName) {

        $this->tableReact = $tableReact;
        $this->colReactName = $colReactName;
        $this->idArticle = $idArticle;
        $this->idUser = $idUser;
    }

    public  function ifReactionSet() {
        $reactExist = Queries::IfExsist("IdContent", $this->tableReact, $this->idArticle);
        return $reactExist;
    }

    protected  function SelectReaction() {
        $idLike = Queries::FromTable(
                                    $this->colReactName, 
                                    $this->tableReact,
                                    "WHERE $this->tableReact.IdUser = {$this->idUser} AND $this->tableReact.IdContent = {$this->idArticle}",
                                    "fetch"
                                    )[$this->colReactName];
        return $idLike;
    }

    protected function currentReaction($prevReaction) {
        return $prevReaction - 1 < 0 ?  0 : $prevReaction - 1; 
    }

    public  function DecCountReaction() {
        $updated = Queries::Update("articles", $this->tableReact, $this->currentReaction($this->AppropriateReaction($this->tableReact))  , "WHERE IdArticle = {$this->idArticle}");
        return $updated;
    }

    public  function IncCountReaction() {
        $updated = Queries::Update("articles", $this->tableReact, $this->AppropriateReaction($this->tableReact) + 1 , "WHERE IdArticle = {$this->idArticle}");
        return $updated;
    }

    public  function DeleteReaction() {
        $idDel = Queries::Delete($this->tableReact, "$this->colReactName = " . $this->SelectReaction());
        return $idDel;
    }

    public  function InsertReaction() {
        Queries::Insert($this->tableReact, ["IdUser", "IdContent"], [$this->idUser,  $this->idArticle ]);
    }
}