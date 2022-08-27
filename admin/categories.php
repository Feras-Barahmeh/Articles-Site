<?php 
    
// Start Gloabal Difination
    ob_start();
    session_start();
    $TITLE = 'Categories';
    include ('init.php');

    include($FunCategories . 'queries.php');
    include($FunCategories . 'category.php');
    SetNav();

// Fork Functions


    function PrintCategories() {
        $data = Queries::FromTable("categories.*, users.IdUser, users.userName", "categories", "INNER JOIN users ON users.IdUser = categories.IDwriter");

        if ( !empty($data))  {
            foreach($data as $info ) {

                ?>
                    <div class="category">
                        <div class="content-category">
                            <h4><a href="filterByCat.php?CatName=<?php echo $info['titleCategory'] ?>"><?php echo $info['titleCategory'] ?></a></h4>
                            <p class="content"><?php echo $info['content'] ?></p>
                        </div>
                        <div class="info-category">
                            <div class="layout">
                                <div class="optins">
                                    <a href="#" class="writer" data-hover="created by"><span>Created By : </span><span class="name"><?php echo $info['userName'] ?></span></a>
                                    <div class="">
                                        <a href="categories.php?categoriesAction=edit&IdCategory=<?php echo $info['IdCategory'] ?>" class="process-btn" data-hover="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="categories.php?categoriesAction=delete&IdCategory=<?php echo $info['IdCategory'] ?>"  onclick="return Confirm()" class="process-btn" data-hover="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </div>
                                <span class="date-category"><?php echo $info['additionDate'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php 
            }
        } else {
            ?> <div class=""><?php GlobalFunctions::AlertMassage("Not Add Any Category Yet ", "info"); ?> </div> <?php
        }
    }

    function PrepareInsert() {
        if (ValidationCategory::ValidationInput()) {
            Insert::Insert();
        }
    }

    function StructerAdd() {
        ?>
            <h3 class="h-title">Add Categories</h3>
            <div class="body-add-category">
                <form action="categories.php?categoriesAction=insert" method="POST" enctype="multipart/form-data">

                    <div class="">
                        <label for="title" class="label">Title</label>
                        <i class="fa-solid fa-heading"></i>
                        <input type="text" name="titleCategory" id="title" required autocomplete="off"  placeholder="Title" class="input-edit-feild">
                    </div>

                    <div class="">
                        <label for="title" class="label">Discription</label>
                        <i class="fa-solid fa-comment-medical"></i>
                        <input type="text" name="content" id="Discription"  autocomplete="off" placeholder="Discription" class="input-edit-feild">
                    </div>

                    <div class="">
                        <label for="writer" class="label">writer</label>
                        <i class="fa-solid fa-feather"></i>
                        <select name="IdUser" id="writer" class="input-edit-feild">
                            <?php Printer::PrintWriters() ?>
                        </select>
                    </div>

                    <input type="submit" value="Add Category" class="btn-submit">
                </form>
            </div>
        <?php
    }

    function PrepareUpdate() {
        if (PostRequests::IfPOST()) {
            if (ValidationCategory::ValidationInput()) {
                IfChangsCategoryInfo::IfChangs();
                Update::Update();
            }
        } else {
            GlobalFunctions::AlertMassage("Can't Enter This Page Directry");
            ?> <a href="index.php" class="back-btn form-btn">Back</a> <?php
        }
    }

    function StructerEdit() {
        $data = Queries::FromTable("categories.*, users.IdUser, users.userName", 'categories', "INNER JOIN users ON users.IdUser = categories.IDwriter  WHERE IdCategory = " . GetRequests::GetValueGet('IdCategory'), 'fetch');
        ?>
            <h3 class="h-title">Edit Categories</h3>
            <div class="body-add-category">
                <form action="categories.php?categoriesAction=update&IdCategory=<?php echo GetRequests::GetValueGet('IdCategory') ?>" method="POST">

                    <div class="">
                        <label for="title" class="label">Title</label>
                        <i class="fa-solid fa-heading"></i>
                        <input type="text" name="titleCategory" id="title" value="<?php echo $data['titleCategory'] ?>"  placeholder="Title" class="input-edit-feild">
                    </div>

                    <div class="">
                        <label for="title" class="label">Discription</label>
                        <i class="fa-solid fa-comment-medical"></i>
                        <input type="text" name="content" id="Discription" value="<?php echo $data['content'] ?>"  placeholder="Discription" class="input-edit-feild">
                    </div>

                    <div class="">
                        <label for="writer" class="label">writer</label>
                        <i class="fa-solid fa-feather"></i>
                        <select name="IdUser" id="writer" class="input-edit-feild">
                            <option value="<?php echo $data['IdUser'] ?>"><?php echo $data['userName'] ?></option>
                            <?php Printer::PrintWriters() ?>
                        </select>
                    </div>

                    <input type="submit" value="Edit Category" class="btn-submit">
                </form>
            </div>
        <?php
    }

    function PrepareDelete() {
        if (GlobalFunctions::IfExsist('IdCategory', 'categories', GetRequests::GetValueGet('IdCategory') ))  {
            Queries::Delete('categories', "IdCategory = " . GetRequests::GetValueGet('IdCategory'));
        } else {
            echo "cant inter this page Directore";
        }
    }



// Controller function

function MainStructer () {
    ?>
        <h3 class="h-title">Categories</h3>

        <div class="additions">
                <a href="categories.php?categoriesAction=add" class="add-btn">Add Category</a>
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" placeholder="Search" id="gsearch" name="gsearch">
                </div>

                <div class="number-articles">
                    <span>Number Categories</span> <span class="num"><?php echo  Queries::Counter("IdCategory", 'categories') ?></span>
                </div>
            </div>

        <div class="page-category">
            <?php PrintCategories() ?>
        </div>
    <?php
}


// Main Function
    function Controller() {
        switch (GetRequests::GetValueGet('categoriesAction')) {
            case 'add':
                StructerAdd();
                break;

                case 'insert':
                    PrepareInsert();
                break;

                case 'edit':
                    StructerEdit();
                break;

                case 'update':
                    PrepareUpdate();
                break;

                case 'delete':
                    PrepareDelete();

                break;

            default:
                MainStructer();
                break;
        }
    }


// Last Page
    Controller();
    include ($tpl . 'footer.php');
    ob_end_flush();