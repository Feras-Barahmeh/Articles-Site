<?php 


abstract class MainMethods {
    public $infoArticle ; public $nameArticle ; public $currentLikes; public $currentDislikes; public $currentSaveds; public $idArticle; public $idUSer;

    public function __construct($idArticle=NULL, $idUser=NULL) {
        $this->idArticle = $idArticle;
        $this->infoArticle = Queries::FromTable("titleArticle, likes, dislikes, saveds", "articles", "WHERE IdArticle = {$this->idArticle}", "fetch");
        $this->nameArticle = $this->infoArticle["titleArticle"];
        $this->currentLikes = Queries::Counter("likeID", "likes");
        $this->currentDislikes = Queries::Counter("dislikeID", "dislikes");
        $this->currentSaveds = Queries::Counter("idSaved", "saveds");
        $this->idUser = $idUser;
    }

    public  function ifReactionSet() {}
    protected  function SelectReaction () {}
    public  function DecCountReaction(){}
    public  function IncCountReaction(){}
    public  function DeleteReaction() {}
    public  function InsertReaction() {}

    public static function GetReactionsNumber () {
        return [
            "like" => Queries::Counter("likeID", "likes"),
            "dislike" => Queries::Counter("dislikeID", "dislikes"),
            "save" => Queries::Counter("idSaved", "saveds"),
        ];
    }
}