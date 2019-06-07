<?php
namespace System;

class AdminTemplate
{
    /**
     * Application
     * @var Application
     */

    public $app;

    /**
     * Loader constructor.
     *
     * @param Application $app
     */

    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    /**
     * Load head lay out
     *
     * @return void
     */

    public function loadHeadStart()
    {
        $headStart = ADMIN_TEMPLATE_PATH . 'head_start.php';
        if (file_exists($headStart)){
            extract($this->app->container);
            require_once $headStart;
        }
    }


    /**
     * Css resources
     *
     * @return array
     */

    public function cssResources()
    {
       return [
           'bootstrap'      => $this->route->baseUrl() . ADMIN_CSS .'bootstrap.min.css',
           'waves'          => $this->route->baseUrl() . ADMIN_CSS . 'waves.css',
           'animate'        => $this->route->baseUrl() . ADMIN_CSS . 'animate.css',
           'bootstrap_select'        => $this->route->baseUrl() . ADMIN_CSS . 'bootstrap-select.css',
           'waitme'        => $this->route->baseUrl() . ADMIN_CSS . 'waitMe.css',
           'sweet'        => $this->route->baseUrl() . ADMIN_CSS . 'sweetalert.css',
           'data_table'        => $this->route->baseUrl() . ADMIN_CSS . 'dataTables.bootstrap.css',
           'morris'         => $this->route->baseUrl() . ADMIN_CSS . 'morris.css',
           'style'          => $this->route->baseUrl() . ADMIN_CSS . 'style.css',
           'theme'          => $this->route->baseUrl() . ADMIN_CSS . 'all-themes.css',
           'my_style'       => $this->route->baseUrl() . ADMIN_CSS . 'my_style.css',
       ];
    }


    /**
     * Load css resources
     *
     * @return void
     */

    public function loadCssResources()
    {

//        if ($this->app->controller == Application::NOT_FOUND_CONTROLLER){
//
//            $class = Application::NOT_FOUND_CONTROLLER;
//        } else {
//            $class = Route::CONTROLLERS_NAMESPACE . ucfirst($this->app->controller) . 'Controller';
//        }
//
//        $class = new $class($this->app);
        $cssResources = $this->cssResources();

        if (property_exists(get_called_class(), 'loadCss')){
            for ($i = 0; $i < count($this->loadCss); $i++){
                if (array_key_exists($this->loadCss[$i], $cssResources)){ ?>
                    <link rel="stylesheet" href="<?= $cssResources[$this->loadCss[$i]] ?>">
                <?php }
            }
        } else {
            foreach ($cssResources as $key => $value) { ?>
                <link rel="stylesheet" href="<?= $value ?>">
            <?php }
        }

    }

    /**
     * Load head end
     *
     * @return  void
     */

    public function loadHeadEnd()
    {
        $headEnd = ADMIN_TEMPLATE_PATH . 'head_end.php';
        if (file_exists($headEnd)){
            extract($this->app->container);
            require_once $headEnd;
        }
    }


    /**
     * Load body end
     *
     * @return  void
     */

    public function bodyStart()
    {
        $bodyStart = ADMIN_TEMPLATE_PATH . 'body_start.php';
        if (file_exists($bodyStart)){
            extract($this->app->container);
            require_once $bodyStart;
        }
    }


    /**
     * Load loader end
     *
     * @return  void
     */

    public function loader()
    {
        $loader = ADMIN_TEMPLATE_PATH . 'loader.php';
        if (file_exists($loader)){
            extract($this->app->container);
            require_once $loader;
        }
    }


    /**
     * Load overlay end
     *
     * @return  void
     */

    public function overlay()
    {
        $overlay = ADMIN_TEMPLATE_PATH . 'overlay.php';
        if (file_exists($overlay)){
            extract($this->app->container);
            require_once $overlay;
        }
    }


    /**
     * Load search nav end
     *
     * @return  void
     */

    public function searchNav()
    {
        $searchNav = ADMIN_TEMPLATE_PATH . 'search_bar.php';
        if (file_exists($searchNav)){
            extract($this->app->container);
            require_once $searchNav;
        }
    }


    /**
     * Load top nav end
     *
     * @return  void
     */

    public function topNav()
    {
        $topNav = ADMIN_TEMPLATE_PATH . 'top_navbar.php';
        if (file_exists($topNav)){
            extract($this->app->container);
            require_once $topNav;
        }
    }


    /**
     * Load sides section end
     *
     * @return  void
     */

    public function sidesSection()
    {
        $sidesSection = ADMIN_TEMPLATE_PATH . 'sides_section.php';
        if (file_exists($sidesSection)){
            extract($this->app->container);
            require_once $sidesSection;
        }
    }


    /**
     * Load content start end
     *
     * @return  void
     */

    public function contentStart()
    {
        $contentStart = ADMIN_TEMPLATE_PATH . 'content_start.php';
        if (file_exists($contentStart)){
            extract($this->app->container);
            require_once $contentStart;
        }
    }


    /**
     * Load content end end
     *
     * @return  void
     */

    public function contentEnd()
    {
        $contentEnd = ADMIN_TEMPLATE_PATH . 'content_end.php';
        if (file_exists($contentEnd)){
            extract($this->app->container);
            require_once $contentEnd;
        }
    }


    /**
     * Js resources
     *
     * @return array
     */

    public function jsResources()
    {
        return [
            'jquery'    => $this->route->baseUrl() . ADMIN_JS . 'jquery.min.js',
            'bootstrap' => $this->route->baseUrl() . ADMIN_JS . 'bootstrap.js',
            'bootstrap_select'    => $this->route->baseUrl() . ADMIN_JS . 'bootstrap-select.js',
            'slim_scroll'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.slimscroll.js',
            'waves'  => $this->route->baseUrl() . ADMIN_JS . 'waves.js',
            'notify'  => $this->route->baseUrl() . ADMIN_JS . 'bootstrap-notify.js',
            'validate'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.validate.js',
            'sign_in'  => $this->route->baseUrl() . ADMIN_JS . 'sign-in.js',
            'sign_up'  => $this->route->baseUrl() . ADMIN_JS . 'sign-up.js',
//            'moment'  => $this->route->baseUrl() . ADMIN_JS . 'momentjs.js',
            'jquery_steps'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.steps.js',
            'sweet'  => $this->route->baseUrl() . ADMIN_JS . 'sweetalert.min.js',
//            'auto_size'  => $this->route->baseUrl() . ADMIN_JS . 'autosize.js',
            'jquery_datatable'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.dataTables.js',
            'jquery_datatable_skin'  => $this->route->baseUrl() . ADMIN_JS . 'dataTables.bootstrap.js',
            'datatable_button'  => $this->route->baseUrl() . ADMIN_JS . 'dataTables.buttons.min.js',
            'buttons_flash' => $this->route->baseUrl() . ADMIN_JS . 'buttons.flash.min.js',
            'js_zip'  => $this->route->baseUrl() . ADMIN_JS . 'jszip.min.js',
            'pdf_make'  => $this->route->baseUrl() . ADMIN_JS . 'pdfmake.min.js',
            'vfs'  => $this->route->baseUrl() . ADMIN_JS . 'vfs_fonts.js',
            'buttons_html5'  => $this->route->baseUrl() . ADMIN_JS . 'buttons.html5.min.js',
            'buttons_print'  => $this->route->baseUrl() . ADMIN_JS . 'buttons.print.min.js',
            'jquery_datatable_js'  => $this->route->baseUrl() . ADMIN_JS . 'jquery-datatable.js',
            'countTo'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.countTo.js',
            'raphael'  => $this->route->baseUrl() . ADMIN_JS . 'raphael.min.js',
            'morris'  => $this->route->baseUrl() . ADMIN_JS . 'morris.js',
            'Chart_bundle'  => $this->route->baseUrl() . ADMIN_JS . 'Chart.bundle.js',
            'float1'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.flot.js',
            'float2'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.flot.resize.js',
            'float3'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.flot.pie.js',
            'float4'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.flot.categories.js',
            'float5'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.flot.time.js',
            'spark'  => $this->route->baseUrl() . ADMIN_JS . 'jquery.sparkline.js',
            'form_validation'  => $this->route->baseUrl() . ADMIN_JS . 'form-validation.js',
            'admin'      => $this->route->baseUrl() . ADMIN_JS . 'admin.js',
//            'index'      => $this->route->baseUrl() . ADMIN_JS . 'index.js.js',
            'demo'      => $this->route->baseUrl() . ADMIN_JS . 'demo.js',
//            'jquery_fit'      => $this->route->baseUrl() . ADMIN_JS . 'jquery.fittext.js',
            'lettering' => $this->route->baseUrl() . ADMIN_JS . 'jquery.lettering.js',
            'main'      => $this->route->baseUrl() . ADMIN_JS . 'main.js'
        ];
    }


    /**
     * Load js resources
     *
     * @return void
     */

    public function loadJsResources()
    {

//        if ($this->app->controller == Application::NOT_FOUND_CONTROLLER){
//
//            $class = Application::NOT_FOUND_CONTROLLER;
//        } else {
//            $class = Route::CONTROLLERS_NAMESPACE . ucfirst($this->app->controller) . 'Controller';
//        }
//
//        $class = new $class($this->app);

        $jsResources = $this->jsResources();

        if (property_exists(get_called_class(), 'loadJs')){
            for ($i = 0; $i < count($this->loadJs); $i++){
                if (array_key_exists($this->loadJs[$i], $jsResources)){ ?>
                    <script src="<?= $jsResources[$this->loadJs[$i]] ?>"></script>
                <?php }
            }
        } else {

            foreach ($jsResources as $key => $value) { ?>
                <script src="<?= $value ?>"></script>
            <?php }

        }
    }


    /**
     * Load footer
     *
     * @return void
     */

    public function loadBodyEnd()
    {
        $bodyEnd = ADMIN_TEMPLATE_PATH . 'body_end.php';

        if (file_exists($bodyEnd)){
            extract($this->app->container);
            require_once $bodyEnd;
        }
    }


    public function __get($name)
    {
        return $this->app->$name;
    }

}