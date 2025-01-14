<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Головна</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('companies.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Компанії</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Співробітники</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
