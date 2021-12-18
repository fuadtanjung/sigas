<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown {{ (request()->is('indeks')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                    <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('indeks')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('indeks.index') }}">Indeks</a></li>
                    <li><a class="nav-link" href="components-avatar.html">Tingkat Perkembangan</a></li>
                    <li><a class="nav-link" href="components-chat-box.html">Bentuk</a></li>
                    <li><a class="nav-link" href="components-empty-state.html">Keterangan</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
