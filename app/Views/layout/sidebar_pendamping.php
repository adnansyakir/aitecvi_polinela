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

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'pendamping') ? 'active' : '' ?>">
            <a href="/pendamping/pendamping" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Pendamping</span>
            </a>
        </li>

        <li class="sidebar-item has-sub <?= ($request->uri->getSegment(2) === 'kompetisiInovasi' || $request->uri->getSegment(2) === 'kontesVokasi' || $request->uri->getSegment(2) === 'eksibisiFotografi') ? 'active open' : '' ?>">
            <a href="#" class="sidebar-link">
                <i class="bi bi-person-plus-fill"></i>
                <span>Pendaftaran</span>
            </a>

            <ul class="submenu <?= ($request->uri->getSegment(3) === 'kompetisiInovasi' || $request->uri->getSegment(3) === 'kontesVokasi' || $request->uri->getSegment(3) === 'eksibisiFotografi') ? 'active' : '' ?>">

                <!-- Kompetisi Inovasi -->
                <li class="sidebar-item has-sub <?= ($request->uri->getSegment(3) === 'kompetisiInovasi') ? 'active open' : '' ?>">
                    <a href="#" class="sidebar-link"><span>Kompetisi Inovasi Teknologi Bid. Pertanian</span></a>

                    <ul class="submenu 
                    <?php
                    if (
                        $request->uri->getTotalSegments() >= 4 &&
                        ($request->uri->getSegment(4) === 'proposal' || $request->uri->getSegment(4) === 'video')
                    ) {
                        echo 'active';
                    } ?>">

                        <li class="submenu-item <?= ($request->uri->getTotalSegments() >= 4 && $request->uri->getSegment(4) === 'proposal') ? 'active' : '' ?>">
                            <a href="/pendamping/pendaftaran/kompetisiInovasi/proposal">Proposal</a>
                        </li>
                        <li class="submenu-item <?= ($request->uri->getTotalSegments() >= 4 && $request->uri->getSegment(4) === 'video') ? 'active' : '' ?>">
                            <a href="/pendamping/pendaftaran/kompetisiInovasi/video">Video</a>
                        </li>
                    </ul>
                </li>

                <!-- Kontes Vokasi dengan Submenu -->
                <li class="sidebar-item has-sub <?= ($request->uri->getSegment(3) === 'kontesVokasi') ? 'active open' : '' ?>">
                    <a href="#" class="sidebar-link"><span>Kontes Vokasi</span></a>

                    <ul class="submenu 
                    <?php
                    if (
                        $request->uri->getTotalSegments() >= 4 &&
                        ($request->uri->getSegment(4) === 'daring')
                    ) {
                        echo 'active';
                    } ?>">

                        <li class="submenu-item <?= ($request->uri->getTotalSegments() >= 4 && $request->uri->getSegment(4) === 'daring') ? 'active' : '' ?>">
                            <a href="/pendamping/pendaftaran/kontesVokasi/daring">Daring</a>
                        </li>

                        <li class="sidebar-item has-sub <?= ($request->uri->getTotalSegments() >= 5 && $request->uri->getSegment(5) === 'luring') ? 'active open' : '' ?>">
                            <a href="#" class='sidebar-link'>
                                <span>Luring</span>
                            </a>
                            <ul class="submenu 
                    <?php
                    if (
                        $request->uri->getTotalSegments() >= 5 &&
                        ($request->uri->getSegment(5) === 'individu' || $request->uri->getSegment(5) === 'tim')
                    ) {
                        echo 'active';
                    } ?>">
                                <li class="submenu-item <?= ($request->uri->getTotalSegments() >= 5 && $request->uri->getSegment(5) === 'individu') ? 'active' : '' ?>">
                                    <a href="/pendamping/pendaftaran/kontesVokasi/luring/individu">Individu</a>
                                </li>
                                <li class="submenu-item <?= ($request->uri->getTotalSegments() >= 5 && $request->uri->getSegment(5) === 'tim') ? 'active' : '' ?>">
                                    <a href="/pendamping/pendaftaran/kontesVokasi/luring/tim">Tim</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Eksibisi Fotografi -->
                <li class="submenu-item <?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === 'eksibisiFotografi') ? 'active' : '' ?>">
                    <a href="/pendamping/pendaftaran/eksibisiFotografi">Eksibisi Fotografi</a>
                </li>

            </ul>
        </li>

        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'finalisasi') ? 'active' : '' ?>">
            <a href="/pendamping/finalisasi" class='sidebar-link'>
                <i class="bi bi-person-check-fill"></i>
                <span>Finalisasi Administrasi</span>
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