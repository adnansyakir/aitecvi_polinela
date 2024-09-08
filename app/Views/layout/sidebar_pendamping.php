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
        <!-- <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'pendaftaran') ? 'active' : '' ?>">
            <a href="/pendamping/pendaftaran" class='sidebar-link'>
                <i class="bi bi-person-plus-fill"></i>
                <span>Pendaftaran</span>
            </a>
        </li> -->
        <li class="sidebar-item has-sub <?= ($request->uri->getSegment(3) === 'kompetisiInovasi' || $request->uri->getSegment(3) === 'prodi' || $request->uri->getSegment(3) === 'lomba' || $request->uri->getSegment(3) === 'users' || $request->uri->getSegment(3) === 'informasi') ? 'active open' : '' ?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-person-plus-fill"></i>
                <span>Pendaftaran</span>
            </a>
            <ul class="submenu <?= ($request->uri->getSegment(3) === 'kompetisiInovasi' || $request->uri->getSegment(3) === 'prodi' || $request->uri->getSegment(3) === 'lomba' || $request->uri->getSegment(3) === 'users' || $request->uri->getSegment(3) === 'informasi') ? 'active' : '' ?>">
                <li class="submenu-item <?= ($request->uri->getSegment(3) === 'kompetisiInovasi') ? 'active' : '' ?>">
                    <a href="/pendamping/master/kompetisiInovasi">Kompetisi Inovasi</a>
                </li>
                <li class="submenu-item <?= ($request->uri->getSegment(3) === 'kontesVokasi') ? 'active' : '' ?>">
                    <a href="/pendamping/master/kontesVokasi">Kontes Vokasi</a>
                    <ul class="submenu">
                        <li class="submenu-item <?= ($request->uri->getSegment(3) === 'daring') ? 'active' : '' ?>">
                            <a href="/pendamping/master/kontesVokasi/daring">Daring</a>
                        </li>
                        <li class="submenu-item <?= ($request->uri->getSegment(3) === 'luring') ? 'active' : '' ?>">
                            <a href="/pendamping/master/kontesVokasi/luring">Luring</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-item <?= ($request->uri->getSegment(3) === 'eksibisiFotografi') ? 'active' : '' ?>">
                    <a href="/pendamping/master/eksibisiFotografi">Eksibisi Fotografi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'finalisasi') ? 'active' : '' ?>">
            <a href="/pendamping/finalisasi" class='sidebar-link'>
                <i class="bi bi-person-plus-fill"></i>
                <span>Finalisasi Admin</span>
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