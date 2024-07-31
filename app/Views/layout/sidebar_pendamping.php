<?php $request = service('request'); ?>

<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'dashboard') ? 'active  ' : '' ?>">
            <a href="/pendamping/dashboard" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'user') ? 'active  ' : '' ?>">
            <a href="/pendamping/user" class='sidebar-link'>
                <i class="bi bi-person-circle"></i>
                <span>Profil</span>
            </a>
        </li>
        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'peserta') ? 'active' : '' ?>">
            <a href="/pendamping/peserta" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Peserta</span>
            </a>
        </li>
        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'pendaftaran') ? 'active' : '' ?>">
            <a href="/pendamping/pendaftaran" class='sidebar-link'>
                <i class="bi bi-person-plus-fill"></i>
                <span>Pendaftaran</span>
            </a>
        </li>
        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'sertifikat') ? 'active  ' : '' ?>">
            <a href="/pendamping/sertifikat" class='sidebar-link'>
                <i class="bi bi-bricks"></i>
                <span>Sertifikat</span>
            </a>
        </li>



    </ul>
</div>