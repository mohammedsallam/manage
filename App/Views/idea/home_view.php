<div class="container-fluid" id="idea">
    <div class="row">
        <div class="share_form col-lg-10 mx-auto rounded shadow py-5 mt-3 mb-4 border">
            <h3 class="text-center mb-5">تسجيل فكرة</h3>
            <div class="text-danger text-center my-5 mx-auto w-75"><i>* برجاء إدخال أنواع الحقول بشكل صحيح، إذا تم إدخال حروف مع أرقام في حقل رقمي فسوف يتم حذف الحروف</i></div>
            <form action="<?= $this->route->baseUrl() . 'idea/sendIdea'?>" method="post">
                <div class="form-group mx-auto w-75">
                    <label for="name">الإسم بالكامل (نصي)</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="rec_num">رقم السجل المدني (رقمي)</label>
                    <input type="text" class="form-control" name="rec_num" id="rec_num">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="management">الإدراة (نصي)</label>
                    <input type="text" class="form-control" name="management" id="management">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="com_num">رقم الحاسب (رقمي)</label>
                    <input type="text" class="form-control" name="com_num" id="com_num">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="section">القسم (نصي)</label>
                    <input type="text" class="form-control" name="section" id="section">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="phone">رقم الجوال (رقمي)</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="unit">الوحدة (نصي)</label>
                    <input type="text" class="form-control" name="unit" id="unit">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="email">البريد الإلكتروني (نصي+رقمي)</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group mx-auto w-75">
                    <select name="area" id="area" class="form-control">
                        <option value="0">اختر المجال التدريبي</option>
                        <option value="تطويري">تطويري</option>
                        <option value="مهاري">مهاري</option>
                        <option value="تثقيفي">تثقيفي</option>
                    </select>
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="idea_title">عنوان الفكرة (نصي+رقمي)</label>
                    <input type="text" class="form-control" name="idea_title" id="idea_title">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="idea_content">اكتب الفكرة هنا</label>
                    <textarea name="idea_content" id="idea_content" class="form-control" cols="30" rows="10" maxlength="255"></textarea>
                </div>

                <div class="form-group mx-auto w-75">
                    <button id="send_idea" name="send_idea" class="form-control btn btn-success">إرسال</button>
                    <div class="alert alert-danger mt-2 text-center error_msg d-none"></div>
                    <div class="alert alert-success mt-2 text-center success_msg d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>