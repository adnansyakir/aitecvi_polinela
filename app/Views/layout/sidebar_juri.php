<?php $request = service('request'); ?>

<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'dashboard') ? 'active  ' : '' ?>">
            <a href="/juri/dashboard" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'user') ? 'active  ' : '' ?>">
            <a href="/juri/user" class='sidebar-link'>
                <i class="bi bi-person-circle"></i>
                <span>Profil</span>
            </a>
        </li>
        <li class="sidebar-item  <?= ($request->uri->getSegment(2) === 'hasillomba') ? 'active  ' : '' ?>">
            <a href="/juri/hasillomba" class='sidebar-link'>
                <i class="bi bi-trophy"></i>
                <span>Hasil Lomba</span>
            </a>
        </li>
        <li class="sidebar-item <?= ($request->uri->getSegment(2) === 'juri') ? 'active' : '' ?>">
            <a href="/juri/juri" class='sidebar-link'>
                <i class="bi bi-person-fill"></i>
                <span>Juri</span>
            </a>
        </li>

    </ul>
</div>