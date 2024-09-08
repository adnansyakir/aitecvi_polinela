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
        
        <li class="sidebar-item has-sub <?= ($request->uri->getSegment(2) === 'kompetisiInovasi' || $request->uri->getSegment(2) === 'kontesVokasi' || $request->uri->getSegment(2) === 'eksibisiFotografi') ? 'active open' : '' ?>">
            <a href="#" class="sidebar-link">
                <i class="bi bi-person-plus-fill"></i>
                <span>Pendaftaran</span>
            </a>
            <ul class="submenu <?= ($request->uri->getSegment(2) === 'kompetisiInovasi' || $request->uri->getSegment(2) === 'kontesVokasi' || $request->uri->getSegment(2) === 'eksibisiFotografi') ? 'active' : '' ?>">

                <!-- Kompetisi Inovasi -->
                <li class="sidebar-item has-sub <?= ($request->uri->getSegment(3) === 'proposal' || $request->uri->getSegment(2) === 'video') ? 'active open' : '' ?>">
                    <a href="#" class="sidebar-link">
                        <span>Kompetisi Inovasi</span>
                    </a>
                    <ul class="submenu <?= ($request->uri->getSegment(3) === 'proposal' || $request->uri->getSegment(3) === 'video') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($request->uri->getSegment(3) === 'proposal') ? 'active' : '' ?>">
                            <a href="/admin/pendaftaran/kompetisiInovasi/proposal">Proposal</a>
                        </li>
                        <li class="submenu-item <?= ($request->uri->getSegment(3) === 'video') ? 'active' : '' ?>">
                            <a href="/admin/pendaftaran/kompetisiInovasi/video">Video</a>
                        </li>
                    </ul>
                </li>

                <!-- Kontes Vokasi dengan Submenu -->
                <li class="sidebar-item has-sub <?= ($request->uri->getSegment(2) === 'kontesVokasi') ? 'active open' : '' ?>">
                    <a href="#" class="sidebar-link">
                        <span>Kontes Vokasi</span>
                    </a>
                    <ul class="submenu <?= ($request->uri->getSegment(3) === 'daring' || $request->uri->getSegment(3) === 'luring') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($request->uri->getSegment(3) === 'daring') ? 'active' : '' ?>">
                            <a href="/admin/pendaftaran/kontesVokasi/daring">Daring</a>
                        </li>
                        <li class="submenu-item <?= ($request->uri->getSegment(3) === 'luring') ? 'active' : '' ?>">
                            <a href="/admin/pendaftaran/kontesVokasi/luring">Luring</a>
                        </li>
                    </ul>
                </li>

                <!-- Eksibisi Fotografi -->
                <li class="submenu-item <?= ($request->uri->getSegment(2) === 'eksibisiFotografi') ? 'active' : '' ?>">
                    <a href="/admin/pendaftaran/eksibisiFotografi">Eksibisi Fotografi</a>
                </li>

            </ul>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'finalisasi') ? 'active' : '' ?>">
            <a href="/pendamping/finalisasi" class='sidebar-link'>
            <i class="bi bi-person-check-fill"></i>
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