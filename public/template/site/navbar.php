<!-- Navigation -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= $this->route->baseUrl() . 'idea#idea' ?>">تسجيل فكرة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= $this->route->baseUrl() . 'creation#creation' ?>">المبادرات التطويرية و الافكار الابداعية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= $this->route->baseUrl() . 'training' ?>">الدورات التدريبية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= $this->route->baseUrl() . 'knowledge' ?>">ثقافة ومعرفة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= $this->route->baseUrl()?>">الرئيسية</a>
            </li>
        </ul>
    </div>
</nav>