<?php 


abstract class MainMethods {
    public $infoArticle ; public $nameArticle ; public $currentLikes; public $currentDislikes; public $currentSaveds; public $idArticle; public $idUSer;

    public function __construct($idArticle=NULL, $idUser=NULL) {
        $this->idArticle = $idArticle;
        $this->infoArticle = Queries::FromTable("titleArticle, likes, dislikes, saveds", "articles", "WHERE IdArticle = {$this->idArticle}", "fetch");
        $this->nameArticle = $this->infoArticle["titleArticle"];
        $this->currentLikes = $this->infoArticle['likes'];
        $this->currentDislikes = $this->infoArticle["dislikes"];
        $this->currentSaveds = $this->infoArticle["saveds"];
        $this->idUser = $idUser;
    }

    public  function ifReactionSet() {}
    protected  function SelectReaction () {}
    public  function DecCountReaction(){}
    public  function IncCountReaction(){}
    public  function DeleteReaction() {}
    public  function InsertReaction() {}
}