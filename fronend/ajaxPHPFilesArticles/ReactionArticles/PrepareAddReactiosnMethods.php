<?php
include_once "MainMethods.php";


class PrepareAddReactiosnMethods extends MainMethods {
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

    public function UpdateContanerReactions ($table, $column, $val) {
        Queries::Update($table, $column, $val, "WHERE IdArticle = {$this->idArticle}");
    }

    protected function AppropriateReaction($tableReact) {
        switch ($tableReact) {
            case 'likes':
                return Queries::Counter("likeID", "likes");
                break;
            case "dislikes" :
                return Queries::Counter("dislikeID", "dislikes");
                break;
            case "saveds":
                return Queries::Counter("idSaved", "saveds");
                break;
        }
    }

    public  function DecCountReaction() {
        $updated = Queries::Update(
                                    "articles",
                                    $this->tableReact, 
                                    $this->AppropriateReaction($this->tableReact) - 1, 
                                    "WHERE IdArticle = {$this->idArticle}");
        return $updated;
    }

    public  function IncCountReaction() {

        $updated = Queries::Update( 
                                    "articles",
                                    $this->tableReact, 
                                    $this->AppropriateReaction($this->tableReact) + 1 ,
                                    "WHERE IdArticle = {$this->idArticle}");
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