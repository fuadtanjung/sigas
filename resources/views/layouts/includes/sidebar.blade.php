<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Sigas</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SG</a>
        </div>
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="{{ url('arsip') }}"><i class="fas fa-file-alt"></i> <span>Arsip</span></a></li>
            <li class="nav-item dropdown {{ (request()->is('indeks') or request()->is('tingkat_perkembangans') or request()->is('bentuks') or request()->is('keterangans')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                    <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('tingkat_perkembangans')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('tingkat_perkembangans.index') }}">Tingkat Perkembangan</a></li>
                    <li class="{{ (request()->is('bentuks')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('bentuks.index') }}">Bentuk</a></li>
                    <li class="{{ (request()->is('keterangans')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('keterangans.index') }}">Keterangan</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
