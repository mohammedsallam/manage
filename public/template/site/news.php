<?php
use Models\NewsModel;

$sql = "SELECT * FROM news ORDER BY id DESC";
$news = NewsModel::query($sql);
?>

<div class="my-3 news">
    <div class="row container-fluid d-flex justify-content-end align-items-center">
        <div class="col-lg-9 text-right pt-2 text-light news_container">
            <?php
            if (! empty($news)){
                foreach ($news as $new) { ?>
                    <h6 class="new"><?= $new->news_title ?> <i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i> <a href="<?= $this->route->baseUrl() . 'news/more/' . $new->id?>">اقرأ مزيد من التفاصيل</a> </h6>
                <?php }
            } else { ?>
                <h6 class="new w-100 text-right">لا توجد أخبار في الوقت الحالي</h6>
            <?php } ?>
        </div>
        <span class="shadow col-lg-2 text-light text-center last_news">آخر الأخبار</span>
    </div>
</div>