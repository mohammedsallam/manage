<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="alert alert-success alert-dismissible success_msg hidden" role="alert" style="direction: rtl; font-weight: 600; font-size: 20px; text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="span_msg"></span>
            </div>
            <div class="alert alert-danger alert-dismissible error_msg hidden" role="alert" style="direction: rtl; font-weight: 600; font-size: 20px; text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="span_msg"></span>
            </div>
            <div class="header">
                <h2 style="direction: rtl">
                    جدول الأخبار
                </h2>
            </div>
            <div class="body">
                <!-- js-exportable -->
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>التحكم</th>
                        <th>محتوى الخبر</th>
                        <th>مسلسل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($news as $new){ ?>
                        <tr class="tr_<?= $new->id ?>">
                            <td>
                                <div class="button-demo">
                                    <button data-href = "<?=  $this->route->baseUrl() . 'news/delete' ?>" type="button" id="delete_news" data-news-id="<?= $new->id ?>"  class="btn bg-red waves-effect delete_news">حذف</button>
                                </div>
                            </td>
                            <td><?= $new->news_content ?></td>
                            <td><?=  $new->id ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->