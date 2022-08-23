<?php 
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'users';
    include ('init.php');
    SetNav();

// Fork Functions

    function ControllerInsert() {
        if (Articles::IfValidInput()) {
            Images::controllerUplodeProcess('articles');
            Articles::Insert();
        }
    }

    function ControllerUpdate() {
        if (Articles::IfValidInput()) {
            Articles::IfChangs();
            Images::controllerUplodeProcess('articles');
            Articles::Update();
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
                            <?php Backend::PrintWriters() ?>
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

                    <input type="submit" value="Add" class="form-btn add-member-in-users">
                </form>

            </div>
        <?php
    }

    function NameWriter () {
        global $db;
        $stmt = $db->prepare("SELECT 
                                users.userName,
                                users.IdUser,
                                articles.*

                            FROM
                                users
                            INNER JOIN
                                articles
                            ON
                                users.IdUser = articles.IdUser
                            ORDER BY IdArticle DESC ");
        $stmt->execute();

        $nams = $stmt->fetchAll();

        if ($stmt->rowCount() > 0 ) {
            return $nams;
        } else {
            echo "Some Errors";
        }
    }

    function EditStructer() {
        global $commfilesuploaded;
        $IdArticle = GetRequests::GetValueGet('IdArticle');
        $info = Queries::FromTable("titleArticle, imageName, content, categoryID", 'articles', "WHERE IdArticle = " . $IdArticle, 'fetch');
        $catname  = Queries::FromTable("titleCategory", 'categories', "WHERE IdCategory = " . $info['categoryID'], 'fetch')['titleCategory'];
        ?>
            <div class="body-add-article">
                    <?php Images::SetImg($commfilesuploaded . 'articles/', $info['imageName'], 'img-user-aside') ?>

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
                                <?php Backend::PrintWriters() ?>
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

                        <input type="submit" class="form-btn add-member-in-users" value="Edit">
                    </form>


            </div>
        <?php
    }




    function PrintArticle() {
        $data = NameWriter();
        global $commfilesuploaded;

        foreach($data as $info ) {
            $infocAT = Queries::FromTable("categories.titleCategory, categories.IdCategory, articles.*", 'categories', "INNER JOIN  articles ON  categories.IdCategory = articles.categoryID WHERE IdArticle = " . $info['IdArticle'], 'fetch');
            ?>
                <div class="article">
                    <div class="content-article">
                        <h4><?php echo $info['titleArticle'] ?></h4>
                        <p class="content"><?php echo $info['content'] ?></p>
                    </div>
                    <div class="info-article">
                        <?php Images::SetImg($commfilesuploaded . 'articles/', $info['imageName'], 'img-user-aside') ?>

                        <div class="layout">
                            <a href="#" class="writer"><?php echo $info['userName'] ?></a>

                            <div class="optins">
                                <a href="articles.php?articleAction=edit&IdArticle=<?php echo $info['IdArticle'] ?>" class="process-btn" data-hover="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="articles.php?articleAction=delete&IdArticle=<?php echo $info['IdArticle'] ?>"  onclick="return Confirm()" class="process-btn" data-hover="Delete"><i class="fa-solid fa-trash-can"></i></a>
                            </div>

                            <div class="cat-date">
                                <a href="filterByCat.php?CatName=<?php  echo $infocAT['titleCategory'] ?>"><?php  echo $infocAT['titleCategory'] ?></a>
                                <span class="date"><?php echo $info['additionDate'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
        }
    }

    function MainStructer () {
        ?>
            <h3 class="h-title">Articles</h3>

            <div class="additions">
                    <a href="articles.php?articleAction=add" class="add-btn">Add Article</a>
                    <div class="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" placeholder="Search" id="gsearch" name="gsearch">
                    </div>

                    <div class="number-articles">
                        <span>Number Articles</span> <span class="num"><?php echo  Queries::Counter("IdArticle", 'articles') ?></span>
                    </div>
                </div>

            <div class="page-article">
                <?php PrintArticle() ?>
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