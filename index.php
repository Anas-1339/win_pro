
<?php
include './inc/db.php';
include './inc/form.php';
include './inc/select.php';
?>



<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>AnasAhmad</title>
</head>

<body>

    <!-- غطاء التحميل عند اختيار الفائز -->
    <div class="loader-con">
        <div id="loader">
            <canvas id="circularLoader" width="200" height="200"></canvas>
        </div>
    </div>

    <div class="container">

        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg- rgba(61, 14, 23, 0.85)">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 fw-normal">اربح iphone 18 pro max الجديد</h1>
                <p class="lead fw-normal">باقي على فتح الطلب المسبق</p>

                <h3 id="countdown" class="count-box"></h3>

                <p class="lead fw-normal">للسحب على iphone 18 pro max</p>
                <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
        </div>

        <ul >
            <li >أهلية المشاركة: المسابقة متاحة للأفراد الذين يبلغون من العمر 18 عامًا أو أكثر</li>
            <li >حد المشاركات: يُسمح بمشاركة واحدة فقط لكل شخص أو عنوان بريد إلكتروني، وتُلغى كافة المشاركات المكررة تلقائيًا</li>
            <li >طريقة اختيار الفائز: يتم اختيار الفائز بـ iPhone 18 Pro Max عبر سحب عشوائي إلكتروني</li>
            <li >التواصل واستلام الجائزة: يتم التواصل مع الفائز عبر البيانات المسجلة، وفي حال عدم الرد خلال 7 أيام من تاريخ الإخطار، يتم إجراء سحب جديد لاختيار فائز آخر.</li>
            <li >شروط الجائزة والبيانات: الجائزة غير قابلة للتعويض النقدي أو التحويل لشخص آخر، وبالمشاركة يوافق الفائز على الإعلان عن اسمه عند إعلان النتائج.</li>
        </ul>

        <!-- نموذج تسجيل البيانات -->
        <div class="position-relative text-center">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <form class="mt-5" action="index.php" method="POST">
                    <h3>الرجاء ادخل معلوماتك</h3>

                    <div class="mb-3">
                        <label for="fname" class="form-label">الاسم الاول</label>
                        <input type="text" name="fname" class="form-control" id="fname"
                            value="<?php echo htmlspecialchars($fname ?? ''); ?>">
                        <div class="form-text error text-danger"><?php echo $errors['fnameError'] ?? ''; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="lname" class="form-label">الاسم الاخير</label>
                        <input type="text" name="lname" class="form-control" id="lname"
                            value="<?php echo htmlspecialchars($lname ?? ''); ?>">
                        <div class="form-text error text-danger"><?php echo $errors['lnameError'] ?? ''; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="u_email" class="form-label">البريد الالكتروني</label>
                        <input type="text" name="u_email" class="form-control" id="u_email"
                            value="<?php echo htmlspecialchars($u_email ?? ''); ?>">
                        <div class="form-text error text-danger"><?php echo $errors['u_emailError'] ?? ''; ?></div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">ارسال</button>
                </form>
            </div>
        </div>

        <!-- Button trigger modal -->
        <div class="d-grid gap-2 col-6 mx-auto my-5">
            <button type="button" id="winner" class="btn btn-primary">
                اختيار الرابح
            </button>
        </div>

        <!-- Modal (تم تصحيح تكرار foreach) -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">الرابح في المسابقة</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="display-5 text-primary fw-bold text-center">
                            <?php 
                            if (!empty($users)) {
                                $user = end($users);
                                echo htmlspecialchars(($user['firstName'] ?? $user['fname'] ?? '') . " " . ($user['lastName'] ?? $user['lname'] ?? ''));
                            }
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once './parts/footer.php'; ?>

        <!-- استدعاء ملفات الـ JS -->
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/loader.js"></script>
        <script src="./js/script_gem.js"></script>
        <script src="./js/fire.js"></script>
</body>

</html>