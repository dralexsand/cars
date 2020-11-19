<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="/admin">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Главная</span>
                        </a>
                    </li>

                    <li class="nav-active">
                        <a href="/admin/cars">
                            <i class="fa fa-car" aria-hidden="true"></i>
                            <span>Автомобили</span>
                        </a>
                    </li>

                    <li class="nav-active">
                        <a href="/admin/brands">
                            <i class="fa fa-trademark" aria-hidden="true"></i>
                            <span>Бренды</span>
                        </a>
                    </li>

                    <li class="nav-active">
                        <a href="/admin/carmodels">
                            <i class="fa fa-car" aria-hidden="true"></i>
                            <span>Модели</span>
                        </a>
                    </li>

                    <li class="nav-active">
                        <a href="/admin/colors">
                            <i class="fa fa-tint" aria-hidden="true"></i>
                            <span>Цвета</span>
                        </a>
                    </li>

                </ul>
            </nav>

            <hr class="separator" />

        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>


    </div>

</aside>
<!-- end: sidebar -->
