<div class="alert alert-success alert-dismissible success_msg hidden" role="alert" style="direction: rtl; font-size: 20px; font-weight: 600; text-align: center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <span class="span_msg"></span>
</div>
<div class="alert alert-danger alert-dismissible error_msg hidden" role="alert" style="direction: rtl; font-size: 20px; font-weight: 600; text-align: center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <span class="span_msg"></span>
</div>
<div class="body">
    <h2 class="card-inside-title pull-right">إضافة موضوع</h2>
    <div class="row clearfix">
        <div class="col-sm-12">
            <form action="<?= $this->route->baseUrl() . 'knowledge/addKnowledge' ?>" method="post" class="add_knowledge_form" id="add_knowledge_form">
                <div class="form-group">
                    <div class="form-line">
                        <input style="direction: rtl" type="text" name="title" id="title" class="form-control" placeholder="فضلا قم بكتابة عنوان الموضوع">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <textarea name="content" id="content" style="direction: rtl" rows="4" class="form-control no-resize" placeholder="قم بكتابة محتوى الموضوع هنا"></textarea>
                    </div>
                </div>
                <input type="submit" name="addKnowledge" id="addKnowledge" class="addKnowledge btn btn-primary pull-right d-block" value="إضافة موضوع">
            </form>
        </div>
    </div>
</div>