<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="alert alert-success alert-dismissible success_msg_delete hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="span_msg"></span>
            </div>
            <div class="alert alert-danger alert-dismissible error_msg hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="span_msg"></span>
            </div>
            <div class="alert alert-success alert-dismissible success_msg hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="span_msg"></span>
            </div>
            <div class="header">
                <h2 style="direction: rtl">
                    جدول الأفكار
                </h2>
            </div>
            <div class="body">
                <!-- js-exportable -->
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>التحكم</th>
                        <th>الفكرة</th>
                        <th>عنوان الفكرة</th>
                        <th>الإدارة</th>
                        <th>السجل</th>
                        <th>اسم المرسل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($ideas as $idea){ ?>
                        <tr class="tr_<?= $idea->id ?>">
                            <td>
                                <?php  if ($idea->approve == 1) {
                                    $color = 'btn-success';
                                    $approve = 'non-active';
                                    $title = ' قبول';
                                } else {
                                    $color = 'btn-warning';
                                    $approve = 'active';
                                    $title = 'رفض';
                                }?>

                                <div class="button-demo">
                                    <button data-href = "<?=  $this->route->baseUrl() . 'idea/active' ?>" data-idea-id="<?= $idea->id ?>" type="button" class="btn <?=$color?> waves-effect approve_idea <?= $approve ?> hidden"><?=$title?></button>
                                    <button data-href = "<?=  $this->route->baseUrl() . 'idea/delete' ?>" type="button" id="delete_idea" data-idea-id="<?= $idea->id ?>" class="btn bg-red waves-effect delete_idea">حذف</button>
                                    <a target="_blank" href = "<?=  $this->route->baseUrl() . 'idea/view/'. $idea->id?>" id="view_idea" class="btn btn-primary view_idea">تفاصيل</a>
                                </div>`
                            </td>
                            <td><?= $idea->idea_content ?></td>
                            <td><?= $idea->idea_title ?></td>
                            <td><?= $idea->management ?></td>
                            <td><?= $idea->rec_num ?></td>
                            <td><?=  $idea->name ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->