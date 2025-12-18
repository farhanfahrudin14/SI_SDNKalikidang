<?php
$role = $this->session->userdata('role') ?? 'Admin';
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4"
       href="<?= ($role === 'Guru') ? base_url('guru') : base_url('admin') ?>">
        <img src="<?= base_url('img/identitas/logo.png') ?>"
             alt="Logo SDN Kalikidang"
             class="sidebar-logo">
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link"
           href="<?= ($role === 'Guru') ? base_url('guru') : base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <?php
    // MENU BERDASARKAN ROLE
    if ($role === 'Guru') {
        $menus = $this->Menu_model->getMenuGuru();
    } else {
        $menus = $this->Menu_model->getMenuAdmin();
    }

    foreach ($menus as $menu) :

        if ($role === 'Guru') {
            $submenu = $this->Menu_model->getSubmenuGuru($menu->id);
        } else {
            $submenu = $this->Menu_model->getSubmenuAdmin($menu->id);
        }
    ?>

        <li class="nav-item">
            <?php if (!empty($submenu)) : ?>
                <a class="nav-link collapsed"
                   href="#"
                   data-toggle="collapse"
                   data-target="#collapse<?= $menu->id ?>">
                    <i class="<?= $menu->icon ?>"></i>
                    <span><?= $menu->title ?></span>
                </a>

                <div id="collapse<?= $menu->id ?>"
                     class="collapse"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php foreach ($submenu as $sm) : ?>
                            <a class="collapse-item"
                               href="<?= base_url($sm->sub_url) ?>">
                                <?= $sm->sub_title ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php else : ?>
                <a class="nav-link" href="<?= base_url($menu->url) ?>">
                    <i class="<?= $menu->icon ?>"></i>
                    <span><?= $menu->title ?></span>
                </a>
            <?php endif; ?>
        </li>

    <?php endforeach; ?>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<style>
.sidebar-logo {
    width: 160px;
    height: auto;
}
</style>
