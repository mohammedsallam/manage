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
                <h2  style="direction: rtl">
                    جدول الدورات التدريبية
                </h2>
            </div>
            <div class="body">
                <!-- js-exportable -->
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>التحكم</th>
                        <th>محتوى الدورة</th>
                        <th>عنوان الدورة</th>
                        <th>مسلسل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($trainings as $training){ ?>
                        <tr class="tr_<?= $training->id ?>">
                            <td>
                                <div class="button-demo">
                                    <button data-href = "<?=  $this->route->baseUrl() . 'training/delete' ?>" type="button" id="delete_training" data-training-id="<?= $training->id ?>"  class="btn bg-red waves-effect delete_training">حذف</button>
                                </div>
                            </td>
                            <td><?= $training->content ?></td>
                            <td><?= $training->title ?></td>
                            <td><?=  $training->id ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->