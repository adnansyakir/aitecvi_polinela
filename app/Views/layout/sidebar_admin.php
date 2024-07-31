<?php $request = service('request'); ?>

<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'dashboard') ? 'active' : '' ?>">
            <a href="/admin/dashboard" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'user') ? 'active' : '' ?>">
            <a href="/admin/user" class='sidebar-link'>
                <i class="bi bi-person-circle"></i>
                <span>Profil</span>
            </a>
        </li>

        <li class="sidebar-item has-sub <?= ($request->uri->getSegment(3) === 'perguruantinggi' || $request->uri->getSegment(3) === 'prodi' || $request->uri->getSegment(3) === 'lomba' || $request->uri->getSegment(3) === 'users' || $request->uri->getSegment(3) === 'informasi') ? 'active open' : '' ?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Master</span>
            </a>
            <ul class="submenu <?= ($request->uri->getSegment(3) === 'perguruantinggi' || $request->uri->getSegment(3) === 'prodi' || $request->uri->getSegment(3) === 'lomba' || $request->uri->getSegment(3) === 'users' || $request->uri->getSegment(3) === 'informasi') ? 'active' : '' ?>">
                <li class="submenu-item <?= ($request->uri->getSegment(3) === 'perguruantinggi') ? 'active' : '' ?>">
                    <a href="/admin/master/perguruantinggi">Perguruan Tinggi</a>
                </li>
                <li class="submenu-item <?= ($request->uri->getSegment(3) === 'prodi') ? 'active' : '' ?>">
                    <a href="/admin/master/prodi">Prodi</a>
                </li>
                <li class="submenu-item <?= ($request->uri->getSegment(3) === 'lomba') ? 'active' : '' ?>">
                    <a href="/admin/master/lomba">Cabang Perlombaan</a>
                </li>
                <li class="submenu-item <?= ($request->uri->getSegment(3) === 'users') ? 'active' : '' ?>">
                    <a href="/admin/master/users">Users</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'juri') ? 'active' : '' ?>">
            <a href="/admin/juri" class='sidebar-link'>
                <i class="bi bi-person-badge"></i>
                <span>Juri</span>
            </a>
        </li>


        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'pendamping') ? 'active' : '' ?>">
            <a href="/admin/pendamping" class='sidebar-link'>
                <i class="bi bi-person-fill"></i>
                <span>Pendamping</span>
            </a>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'koordinator') ? 'active' : '' ?>">
            <a href="/admin/koordinator" class='sidebar-link'>
                <i class="bi bi-person-badge-fill"></i>
                <span>Koordinator</span>
            </a>
        </li>


        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'pendaftaran') ? 'active' : '' ?>">
            <a href="/admin/pendaftaran" class='sidebar-link'>
                <i class="bi bi-person-plus-fill"></i>
                <span>Pendaftaran</span>
            </a>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'hasillomba') ? 'active' : '' ?>">
            <a href="/admin/hasillomba" class='sidebar-link'>
                <i class="bi bi-trophy-fill"></i>
                <span>Hasil Lomba</span>
            </a>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'peserta') ? 'active' : '' ?>">
            <a href="/admin/peserta" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Peserta</span>
            </a>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'sertifikat') ? 'active' : '' ?>">
            <a href="/admin/sertifikat" class='sidebar-link'>
                <i class="bi bi-award-fill"></i>
                <span>Sertifikat</span>
            </a>
        </li>
    </ul>
</div>