<?php 
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'Articles';
    include ('init.php');

    // Articles
    include($FunArticles . 'article.php');
    include($FunArticles . 'queries.php');
    SetNav();

// Fork Functions

    function ControllerInsert() {
        if (ValidationArticleAdd::IfValidArticleInfo()) {
            UplodeImageAdd::UplodeImage('articles');
            InsertArticle::Insert();
        }
    }

    function ControllerUpdate() {
        if (ValidationArticleEdit::IfValidArticleInfo()) {
            FetchChanged::IfChangs();
            UplodeImageEdit::UplodeImage('articles');
            UpdateArticle::Update();
        }
    }


    function PrintCategories() {
        $data = Queries::FromTable("IdCategory, titleCategory", 'categories');

        foreach($data as $info) {
        ?>
            <option value="<?php echo $info['IdCategory'] ?>"><?php echo $info['titleCategory'] ?></option>
        <?php 
        }
    }

    function AddStructer() {

        ?>
            <div class="body-add-article">
                <form action="articles.php?articleAction=insert" method="POST" enctype="multipart/form-data">

                    <div class="">
                        <label for="title" class="label">Title</label>
                        <i class="fa-solid fa-heading"></i>
                        <input type="text" name="titleArticle" id="title"   placeholder="Title" class="input-edit-feild">
                    </div>

                    <div class="">
                        <label for="writer" class="label">writer</label>
                        <i class="fa-solid fa-feather"></i>
                        <select name="IdUser" id="writer" class="input-edit-feild">
                            <?php Printer::PrintWriters() ?>
                        </select>
                    </div>

                    <div class="">
                        <label for="img" class="label">Image</label>
                        <i class="fa-solid fa-image"></i>
                        <input type="file" name="imageName" id="img" class="input-edit-feild file">
                    </div>

                    <div class="">
                        <label for="categoryID" class="label">Category</label>
                        <i class="fa-solid fa-feather"></i>
                        <select name="categoryID" id="categoryID" class="input-edit-feild" required>
                            <?php PrintCategories() ?>
                        </select>
                    </div>

                    <div class="">
                        <label for="article" class="label">Article</label>
                        <textarea name="content" id="article" cols="80" rows="10" class="input-edit-feild"></textarea>
                        
                    </div>

                    <input type="submit" value="Add" class="btn-submit">
                </form>

            </div>
        <?php
    }



    function EditStructer() {
        global $commfilesuploaded;
        $IdArticle = GetRequests::GetValueGet('IdArticle');
        $info = Queries::FromTable("titleArticle, imageName, content, categoryID", 'articles', "WHERE IdArticle = " . $IdArticle, 'fetch');
        $catname  = Queries::FromTable("titleCategory", 'categories', "WHERE IdCategory = " . $info['categoryID'], 'fetch')['titleCategory'];
        ?>
            <div class="body-add-article">
                    <?php ShowImage::SetImg($commfilesuploaded . 'articles/', $info['imageName'], 'img-user-aside') ?>

                    <form action="articles.php?articleAction=update&IdArticle=<?php echo $IdArticle ?>" method="POST" enctype="multipart/form-data">

                        <div class="">
                            <label for="title" class="label">Title</label>
                            <i class="fa-solid fa-heading"></i>
                            <input type="text" name="titleArticle" id="title"  value="<?php echo $info['titleArticle'] ?>"  placeholder="Title" class="input-edit-feild">
                        </div>

                        <div class="">
                            <label for="writer" class="label">writer</label>
                            <i class="fa-solid fa-feather"></i>
                            <select name="IdUser" id="writer" class="input-edit-feild">
                                <?php Printer::PrintWriters() ?>
                            </select>
                        </div>

                        <div class="">
                            <label for="img" class="label">Image</label>
                            <i class="fa-solid fa-image"></i>
                            <input type="file" name="imageName" id="img" class="input-edit-feild file">
                        </div>

                    <div class="">
                        <label for="categoryID" class="label">Category</label>
                        <i class="fa-solid fa-feather"></i>
                        <select name="categoryID" id="categoryID" class="input-edit-feild" required>
                            <option value="<?php echo $info['categoryID'] ?>"><?php echo $catname ?></option>
                            <?php PrintCategories() ?>
                        </select>
                    </div>

                        <div class="">
                            <label for="article" class="label">Article</label>
                            <textarea name="content" id="article"  cols="80" rows="10" class="input-edit-feild"><?php echo $info['content'] ?></textarea>
                            
                        </div>

                        <input type="submit" class="btn-submit" value="Edit">
                    </form>

            </div>
        <?php
    }

    function PrintArticle() {
        $data = NameWriter::NameWriter();
        global $commfilesuploaded;

        foreach($data as $info ) {
            $infocAT = Queries::FromTable("categories.titleCategory, categories.IdCategory, articles.*", 'categories', "INNER JOIN  articles ON  categories.IdCategory = articles.categoryID WHERE IdArticle = " . $info['IdArticle'], 'fetch');
            ?>
                <div class="box-article" id="">
                    <?php ShowImage::SetImg($commfilesuploaded . 'articles/', $info['imageName'], 'img-user-aside') ?>
                    <div class="content">
                        <h3><?php echo $info['titleArticle'] ?></h3>
                        <p><?php echo $info['content'] ?></p>
                    </div>
                    <div class="options-article">
                        <a href="articles.php?articleAction=edit&IdArticle=<?php echo $info['IdArticle'] ?>" class="process-btn" data-hover="Edit"><i class="fa-solid fa-pen-to-square no-move"></i></a>
                        <a href="articles.php?articleAction=delete&IdArticle=<?php echo $info['IdArticle'] ?>"  onclick="return Confirm()" class="process-btn" data-hover="Delete"><i class="fa-solid fa-trash-can no-move"></i></a>
                        <a href="showarticle.php?<?php echo str_replace(" ", '-', $info['titleArticle']) ?>" class="read-mode">Read More</a>
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                </div>
            <?php 
        }
    }

    function MainStructer () {
        ?>
                <div class="articles">
                    <h3 class="h-title">Articles</h3>
                    <div class="options">
                        <a href="" class="add-btn">Add Article</a>
                        <table class="saerch-table">
                            <tr>
                                <td><i class="fas fa-search"></i></td>
                                <td><input type="text" placeholder="saerch" id="SearchValue"
                                onkeyup="FilterArticles()"></td>
                            </tr>
                        </table>
                        <span class="add-btn">Number Articles <span class="num"><?php echo  Queries::Counter("IdArticle", 'articles', "Where  IdUser = " . Sessions::GetValueSessionDepKey('IdUser')) ?></span></span>
                    </div>
                    <div class="container">
                        <?php PrintArticle() ?>
                    </div>
                </div>


        <?php
    }


// Main Function
    function Controller() {
        switch (GetRequests::GetValueGet('articleAction')) {
            case 'add':
                AddStructer();
                break;

            case 'insert':
                ControllerInsert();
                break;

            case 'edit':
                EditStructer();
                break;

            case 'update':
                ControllerUpdate();
                break;

            case 'delete':
                Queries::Delete('articles', "IdArticle = " . GetRequests::GetValueGet('IdArticle'));
                break;

            default:
                MainStructer();
                break;
        }
    }



// Controller Part 
    Controller();
    include ($tpl . 'footer.php');
    ob_end_flush();