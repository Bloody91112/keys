<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.home') }}" class="brand-link">
        <i class="fas fa-gamepad brand-image" style="float: unset; margin-left:20px"></i>
        <span class="brand-text font-weight-light">SKEYS</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cookie"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tags.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Tags</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.promocodes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Promocodes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.comments.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>Comments</p>
                        @if(\App\Models\Comment::rejectedItems()->count() > 0)
                            <span class="badge badge-info right">
                                {{ \App\Models\Comment::rejectedItems()->count() }}
                            </span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.payments.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Payments</p>
                        @if(\App\Models\Payment::failedItems()->count() > 0)
                            <span class="badge badge-info right">
                                {{ \App\Models\Payment::failedItems()->count() }}
                            </span>
                        @endif
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
