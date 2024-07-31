<?php $request = service('request'); ?>

<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'dashboard') ? 'active  ' : '' ?>">
            <a href="/guru/dashboard" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'user') ? 'active  ' : '' ?>">
            <a href="/guru/user" class='sidebar-link'>
                <i class="bi bi-person-circle"></i>
                <span>USER</span>
            </a>
        </li>
        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'jadwal') ? 'active  ' : '' ?>">
            <a href="/guru/jadwal" class='sidebar-link'>
                <i class="bi bi-bricks"></i>
                <span>JADWAL</span>
            </a>
        </li>



    </ul>
</div>