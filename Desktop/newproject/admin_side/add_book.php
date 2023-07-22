<?php 
include './admin-header.php';
include '../connection.php';

?>

<main id="main" class="main">

<section class="content ng-scope" style="min-height: 100%;" ng-controller="AddBookCtrl">
        <form class="form-horizontal ng-pristine ng-valid" id="book_add_form" enctype="multipart/form-data" novalidate="novalidate">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <img ng-src="https://wordpress.library-management.com/wp-content/themes/library/img/259x340.png" class="img-responsive" alt="Book Cover" width="100%" src="https://wordpress.library-management.com/wp-content/themes/library/img/259x340.png">
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="tab-content shadow AddBookCtrl" style="border: 0;padding:0;">
                        <div class="tab-pane active">
                            <div class="panel panel-custom">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <strong>Add Book</strong>
                                    </div>
                                </div>
                                <div class="panel-body form-horizontal">
                                    <input type="hidden" name="action" value="add_book_data" autocomplete="off">
                                    <input type="hidden" name="book_src" id="book_src" autocomplete="off">
                                    <!--            <input type="hidden" name="attach_bill_id" id="attach_bill_id">-->
                                    <input type="hidden" name="book_goo_id" id="book_goo_id" autocomplete="off">
                                    <div class="form-group mb0 col-sm-6">
                                        <label>ISBN *<!-- tooltips: --><tooltip tooltip-template="Open Amazon books | Copy &amp; Paste ISBN-10 Code For Fetching Book Details" tooltip-side="right" class="tooltips _right _steady _ready"><tip-cont><a class="book_sht_add ng-scope" style="        position: absolute;margin-top: -18px;right: -15px;" target="_blank" href="https://www.amazon.com/SQL-Complete-Reference-James-Groff/dp/1259003884/ref=sr_1_2?keywords=sql&amp;qid=1583495868&amp;s=books&amp;sr=1-2"><i class="fa fa-link" aria-hidden="true"></i></a></tip-cont><tip class=""><tip-tip><span class="close-button" style="display: none;">×</span>Open Amazon books | Copy &amp; Paste ISBN-10 Code For Fetching Book Details</tip-tip><tip-arrow></tip-arrow></tip></tooltip></label>

                                        <input name="book_isbn" placeholder="Enter ISBN and Press TAB" ng-model="book_isbn" ng-blur="look_for_book()" class="form-control isbn_txt ng-pristine ng-untouched ng-valid ng-empty" type="text" fdprocessedid="5gipar">

                                    </div>
                                    <div class="form-group mb0 col-sm-6">
                                        <label>Author Name</label>

                                        <input name="book_author" id="book_author" ng-model="book_author" placeholder="Enter Author Name" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" fdprocessedid="1c2fud">

                                    </div>
                                    <div class="form-group mb0 col-sm-12">
                                        <label>Book Title *</label>

                                        <input name="book_title" id="book_title" ng-model="book_title" placeholder="Enter Book Title" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" fdprocessedid="1dg1yt">

                                    </div>

                                    <div class="form-group mb0 col-sm-6">
                                        <label>Category *</label>

                                        <!-- tooltips: --><tooltip tooltip-template="Categories books as per your need.Since it will become the menu in the front end.Make it short and simple." tooltip-side="bottom" class="tooltips _bottom _steady _ready"><tip-cont><input name="book_category" id="book_category" ng-model="book_category" placeholder="Enter Category" class="form-control ng-pristine ng-untouched ng-valid ng-scope" type="text" fdprocessedid="4x7z9t"></tip-cont><tip class=""><tip-tip><span class="close-button" style="display: none;">×</span>Categories books as per your need.Since it will become the menu in the front end.Make it short and simple.</tip-tip><tip-arrow></tip-arrow></tip></tooltip>

                                    </div>
                                    <div class="form-group mb0 col-sm-6">
                                        <label>Publisher</label>

                                        <input name="book_publisher" id="book_publisher" ng-model="book_publisher" placeholder="Enter Publisher Name" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" fdprocessedid="guknv">

                                    </div>

                                    <div class="form-group mb0 col-sm-12">
                                        <label>Google Book Url</label>
                                        <!-- tooltips: --><tooltip tooltip-template="Google Book Preview Will Auto Populate here if there are no preview available then you can upload pdf book below." tooltip-side="top" class="tooltips _top _steady _ready"><tip-cont><input name="book_url" id="book_url" ng-model="book_url" placeholder="Google Book Preview Will Auto Populate here" class="form-control fix_radius pull-left ng-pristine ng-untouched ng-valid ng-scope" style="width: 94%;height: 37px;" type="text" readonly="" fdprocessedid="ijwm0g"></tip-cont><tip class=""><tip-tip><span class="close-button" style="display: none;">×</span>Google Book Preview Will Auto Populate here if there are no preview available then you can upload pdf book below.</tip-tip><tip-arrow></tip-arrow></tip></tooltip>
                                        <button class="btn btn-primary fix_radius pull-right" ng-click="visitUrl()" style="width: 5%;" fdprocessedid="7ka2ag"><i class="fa fa-external-link" aria-hidden="true"></i></button>
                                    </div>


                                    <!-- <div class="form-group">
                                        <label for="book_url" class="col-sm-2 control-label">Book Url</label>
                                        <div class="col-sm-8">
                                            <input name="book_url" id="book_url" ng-model="book_url" placeholder="Eg : https://drive.google.com/open?id=0BwiX2HTj2EuFaURvUWcxTERjblU" tooltips tooltip-template="Google Book Preview Will Auto Populate here if there are no preview available then you can upload book in your Gdrive & paste the link here."  tooltip-side="top" class="form-control fix_radius pull-left" style="width: 91%;height: 37px;" type="text">
                                            <button class="btn btn-primary fix_radius pull-right" ng-click="visitUrl()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
                                        </div>
                                    </div> -->

                                    <div class="form-group mb0 col-sm-6">
                                        <label>Upload Book Img</label>

                                        <!-- tooltips: --><tooltip tooltip-template="Upload image if no google image preview available." class="tooltips _top _steady _ready"><tip-cont><input type="file" class="form-control ng-scope" accept="image/*" id="book_upload_img" name="book_upload_img"></tip-cont><tip class=""><tip-tip><span class="close-button" style="display: none;">×</span>Upload image if no google image preview available.</tip-tip><tip-arrow></tip-arrow></tip></tooltip>

                                    </div>
                                    <div class="form-group mb0 col-sm-6">
                                        <label>Upload Pdf</label>

                                        <!-- tooltips: --><tooltip tooltip-template="Upload pdf if no preview available." tooltip-side="bottom" class="tooltips _bottom _steady _ready"><tip-cont><input type="file" class="form-control ng-scope" id="book_upload_pdf" name="book_upload_pdf"></tip-cont><tip class=""><tip-tip><span class="close-button" style="display: none;">×</span>Upload pdf if no preview available.</tip-tip><tip-arrow></tip-arrow></tip></tooltip>

                                    </div>
                                    <div class="form-group mb0 col-sm-12">
                                        <label>External Url</label>

                                        <!-- tooltips: --><tooltip tooltip-template="When you enter the external url the user will be redirected to this link instead of a preview." tooltip-side="bottom" class="tooltips _bottom _steady _ready"><tip-cont><input name="book_external_url" id="book_external_url" ng-model="book_external_url" placeholder="Enter exteral url" class="form-control fix_radius ng-pristine ng-untouched ng-valid ng-scope" type="text" fdprocessedid="oh3wap"></tip-cont><tip class=""><tip-tip><span class="close-button" style="display: none;">×</span>When you enter the external url the user will be redirected to this link instead of a preview.</tip-tip><tip-arrow></tip-arrow></tip></tooltip>

                                    </div>
                                    <div class="form-group mb0 col-sm-6">
                                        <label>Price *</label>

                                        <input name="book_price" id="book_price" ng-model="book_price" placeholder="Enter Price" class="form-control fix_radius ng-pristine ng-untouched ng-valid ng-empty" type="text" fdprocessedid="6w91m8">

                                    </div>
                                    <div class="form-group mb0 col-sm-6">
                                        <label>Quantity *</label>

                                        <input type="text" id="book_qty" name="book_qty" ng-model="book_qty" placeholder="Enter Book Quantity" class="form-control fix_radius ng-pristine ng-untouched ng-valid ng-not-empty" fdprocessedid="r16w1g">

                                    </div>
                                    <div class="form-group mb0 col-sm-12">
                                        <label>Book Desc</label>

                                        <textarea rows="4" id="book_desc" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="book_desc" name="book_desc" placeholder="Enter Book Description"></textarea>

                                    </div>
                                    <div class="form-group md0 col-sm-12" style="    padding-right: 0px;">
                                        <button type="button" ng-click="saveBook()" class="btn btn-primary fix_radius pmd-ripple-effect pull-right add_btn_book" fdprocessedid="lgadt5"><span class="fa fa-floppy-o" style="margin-right: 6px;"></span>Add Book                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>

    <?php 

include './admin-footer.php';
?>