<?php

if(empty($knowledges) == false) {

    foreach ($knowledges as $knowledge) { ?>
        <div class="text-right my-3 border shadow knowledge" style="direction: rtl">
            <div class="col-lg-5 my-3 text-right pb-2" style="direction: rtl"><?= $knowledge->title ?></div>
            <p class="col-lg-10"><?= $knowledge->content ?></p>
        </div>
    <?php }
} else { ?>
    <div class="text-center text-danger mt-3 font-weight-bold border col-lg-6 mx-auto py-2 rounded shadow">لا توجد مواضيع في الوقت الحالي</div>
<?php }

?>