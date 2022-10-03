<?php 
// Start Gloabal Difination
ob_start();
session_start();
$TITLE = 'Articles';
include ('init.php');


// Articles
include($FunArticles . 'article.php');
include($FunArticles . 'queries.php');
// Start Forck Functions 
function articles () {
    $articles = Queries::FromTable(
                            "articles.*, users.IdUser, users.userName, categories.IdCategory, categories.titleCategory", 
                            "articles", 
                            "INNER JOIN users on users.IdUser = articles.IdUser INNER JOIN categories ON articles.categoryID = categories.IdCategory");
    foreach ($articles as $article) {
        ?>
            <div class="article box-sh-op10-clwh flex sort-col p-10">
                <?php ShowImage::SetImg("../commonBetweenBackFront/uploaded/articles/", $article["imageName"]) ?>
                <div class="content-article">
                    <h4 class="mb-10"><?php echo $article["titleArticle"] ?></h4>
                    <div class="brief mb-10">
                            <span class="block fs-14"><i class="fa-sharp fa-solid fa-scroll mr-20"></i>Brief</span>
                            <span class="brief-content block"><?php echo $article["excerpt"] ?></span>
                        </div>
                    <div class="info-article relative flex between-ele plr-5 pb-10">
                        <span class="writer"><span class="mr-10">writer: </span><div class="target-type inline-block"><?php echo $article["userName"] ?></div></span>
                        <span class="feild"><span class="mr-10">Feild: </span><div class="target-type inline-block"><?php echo $article["titleCategory"] ?></div></span>
                        <span class="date-add fs-14"><?php echo $article["additionDate"] ?></span>
                    </div>
                    <div class="count-reactions  relative plr-5 pb-10">
                        <span class="likes relative description "description="likes">
                            <i class="fa-solid fa-thumbs-up mr-5  " ></i>
                            <?php echo $article["likes"] ?>
                        </span>
                        <span class="dislike relative description" description="dislikes">
                            <i class="fa-solid fa-thumbs-down mr-5"></i>
                            <?php echo $article["dislikes"] ?>
                        </span>
                        <span class="save relative description" description="saves">
                            <i class="fa-solid fa-bookmark mr-5"></i>
                            <?php echo $article["saveds"] ?>
                        </span>
                    </div>
                    <div class="options-artile flex between-ele ptb-0 plr-10 mb-5">
                        <div>
                            <span class="edit cursor-pointer relative description" description="edit"><i class="fa fa-edit mr-10 "></i></span>
                            <span class="del cursor-pointer relative description" description="delete"><i class="fa fa-trash"></i></span>
                        </div>
                        <div class="arow description cursor-pointer" description="Read">
                            <a href="#"><i class="fa fa-book-open-reader"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
function writers() {
    $writers = Queries::FromTable("userName", "users", "WHERE permission > 0");
    foreach($writers as $writer) {
        ?>
            <li class="name-filter" onclick="filterByType(this, 'writer')"><?php echo $writer["userName"] ?></li>
        <?php
        }
}
function fields() {
    $fields = Queries::FromTable("titleCategory", "categories");
    foreach($fields as $field) {
        ?>
            <li class="name-filter" onclick="filterByType(this, 'feild')"><?php echo $field["titleCategory"] ?></li>
        <?php
        }
}
function ControllerInsert() {
    if (ValidationArticleAdd::IfValidArticleInfo()) {
        UplodeImageAdd::UplodeImage('articles');
        InsertArticle::Insert();
    }
}
function IfInsert() {
    if (isset($_POST['submit']) && isset($_GET['insert'])) {
            ControllerInsert();
    }
}
// End Fork Function
function MainStructer() {
    ?>
        <div class="dashbord flex">
            <?php AsideHeaderStructer(); ?>
            <header class="filters-header mb-20 p-10 between-ele">
                <div class="contanter-drobown-minus flex">
                    <div class="dropdown-minu relative  mr-10 p-5 cursor-pointer rad-5"  minu-list-contaner>
                        <button class="p-5 cursor-pointer" btn-deopdown>Name Writer<i class="fa fa-angle-down angle ml-10 active"></i><i class="fa fa-angle-up angle  ml-10 "></i></button>
                        <ul class="content-minu">
                            <li class="relative">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="search" class="search-li" name="" id="" placeholder="Name Writer">
                            </li>
                            <?php writers() ?>
                        </ul>
                    </div>
                    <div class="dropdown-minu relative mr-10 p-5 cursor-pointer rad-5" minu-list-contaner>
                        <button class="p-5 cursor-pointer" btn-deopdown>Feilds<i class="fa fa-angle-down angle ml-10 active"></i><i class="fa fa-angle-up angle ml-10 "></i></button>
                        <ul class="content-minu">
                            <li class="relative">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="search" class="search-li" name="" id="" placeholder="Fields">
                            </li>
                            <?php fields() ?>
                        </ul>
                    </div>
                </div>
                <button class="add-meamber relative"><a href="articles.php?articleAction=add">Add memeber</a></button>
                <div class="search relative">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" class="rad-5 box-sh-op10-clwh" name="" id="search-article-name" placeholder="Name Article">
                </div>
            </header>
            <h1 class="txt-cn">Articles</h1>
            <div class="content-page wrapper grid p-20 gap-10">
                <?php articles() ?>
            </div>
        </div>

    <?php
}
MainStructer();
function Controller() {
    switch (GetRequests::GetValueGet('articleAction')) {
        case 'add':
            AddStructer();
            IfInsert();
            break;

        case 'edit':
            IfUpdating();
            EditStructer();
            break;
        default:
            MainStructer();
            IfDeleting();
            break;
    }
}
// Controller Part 
include ($tpl . 'footer.php');
ob_end_flush();