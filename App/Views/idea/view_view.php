<?php
if ($idea != null) { ?>
    <!-- Exportable Table -->
    <div class="row clearfix my-5">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 class="text-center my-5">
                        <span> فكرة </span><span><?= $idea->name?></span>
                    </h2>
                </div>
                <div class="body">
                    <!-- js-exportable -->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>التحكم</th>
                            <th>عنوان الفكرة</th>
                            <th>الإدارة</th>
                            <th>المجال</th>
                            <th>القسم</th>
                            <th>لوحدة</th>
                            <th>الجوال</th>
                            <th>الحاسب</th>
                            <th>البريد</th>
                            <th>السجل</th>
                            <th>اسم المرسل</th>
                            <th>مسلسل</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> طباعة</button></td>
                            <td><?= $idea->idea_title ?></td>
                            <td><?= $idea->management ?></td>
                            <td><?= $idea->area ?></td>
                            <td><?= $idea->section ?></td>
                            <td><?= $idea->unit ?></td>
                            <td><?= $idea->phone ?></td>
                            <td><?= $idea->com_num ?></td>
                            <td><?= $idea->email ?></td>
                            <td><?= $idea->rec_num ?></td>
                            <td><?= $idea->name ?></td>
                            <td><?= $idea->id ?></td>
                        </tr>
                        <th colspan="12" class="text-center">
                            محتوة الفكرة
                        </th>
                        <tr class="text-center">
                            <td colspan="12"><textarea style="direction: rtl; padding: 10px; resize: none;" disabled cols="80" rows="10"><?= $idea->idea_content ?></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
<?php } else { ?>

    <div class="alert alert-danger font-weight-bold text-center col-lg-6 mt-5 mx-auto">لا توجد تفاصيل لهذه الفكرة</div>

    <?php } ?>

