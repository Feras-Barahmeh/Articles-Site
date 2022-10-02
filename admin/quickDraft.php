<?php 
    ob_start();
    session_start();
    $TITLE = "Dashbord";
    include('init.php');

function SetCheckBox($infoDraft) {
    if ($infoDraft["if_executed"] === 0) {
        ?> <i class="fa-solid check-box-draft center-ele" id_draft="<?php echo $infoDraft["id_draft"] ?>"></i><?php
    } else {
        ?> <i class="fa-solid fa-check check-box-draft center-ele" id_draft="<?php echo $infoDraft["id_draft"] ?>"></i> <?php
    }
}
function setDrafts() {
    $infoDrafts = Queries::FromTable("*", "quick_draft", "WHERE id_user = {$_SESSION['IdUser']}");

    if (! empty($infoDrafts)) {
        foreach($infoDrafts as $infoDraft) {
            ?>
                    <li class="draft mtb-15 relaive w-fu  box-sh-op10-clwh">
                        <span class="title between-ele">
                            <span class="flex-1 flex f-al-ce">
                                <!-- Set Check Box -->
                                <?php SetCheckBox($infoDraft) ?>
                                <?php echo $infoDraft["title_draft"] ?>
                            </span>
                            <i class="fa-solid fa-trash delete-draft"  id_draft="<?php echo $infoDraft["id_draft"] ?>" ></i>
                            <i class="fa angle fa-angle-down ml-20"></i>
                            <i class="fa angle fa-angle-up ml-20 hidden" id_draft="<?php echo $infoDraft["id_draft"] ?>"></i>
                        </span>
                        <p class="content p-20 hidden">
                            <?php echo $infoDraft["content_draft"] ?>
                        </p>
                    </li> 

            <?php
        }
    } else {
        ?>
            <div class="alter info m-20 p-15">No Drafts Yet</div>
        <?php
    }

}
function StructerDrafts() {
    $infoDraft = Queries::FromTable("*", "quick_draft", "WHERE id_user = {$_SESSION['IdUser']}", "fetch");
        ?>
            <div class="box-drafts p-20 center-ele sort-col mt-20 box-sh-op10-clwh">
                <div class="heading w-fu between-ele p-10">
                    <h5>Drafts</h5>
                    <div class="flex f-al-ce">
                        <div class="clear-btn mr-10" id="clear-drafts">Clear</div>
                        <a href="dashbord.php#quick-draft">Add</a>
                    </div>
                </div>
                <ul id="listdrafts" class="relative w-fu">
                    <?php setDrafts() ?>
                </ul>
            </div>
        <?php
}
?>
        <!-- Start Main Page  -->
        <div class="dashbord flex">
                        <?php AsideHeaderStructer() ;?>
                    <!-- End Head -->
                    <?php StructerDrafts(); ?>
                </div>
<?php 

    include($tpl . 'footer.php');
    ob_end_flush();