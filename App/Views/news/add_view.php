<div class="alert alert-success alert-dismissible success_msg hidden" role="alert" style="direction: rtl; font-size: 20px; font-weight: 600; text-align: center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <span class="span_msg"></span>
</div>
<div class="alert alert-danger alert-dismissible error_msg hidden" role="alert" style="direction: rtl; font-size: 20px; font-weight: 600; text-align: center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <span class="span_msg"></span>
</div>
<div class="body">
    <h2 class="card-inside-title pull-right">إضافة خبر</h2>
    <div class="row clearfix">
        <div class="col-sm-12">
            <form action="<?= $this->route->baseUrl() . 'news/addNew' ?>" method="post" class="add_new_form" id="add_new_form">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="news_title" id="news_title" class="news_title form-control" placeholder="عنوان الخبر" style="direction: rtl" maxlength="255">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <textarea name="news_content" id="news_content" style="direction: rtl" rows="4" class="form-control no-resize" placeholder="قم بكتابة محتوى الخبر هنا"></textarea>
                    </div>
                </div>
                <input type="submit" name="addNew" id="addNew" class="addNew btn btn-primary pull-right d-block" value="إضافة خبر">
            </form>
        </div>
    </div>
</div>