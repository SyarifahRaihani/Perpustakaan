<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar" >
    
<!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center " href="index.html">
        <div class="sidebar-brand-icon rotate-n-30">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Perpustakaan</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider">
 
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Aplikasi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="far fa-address-card "></i>
            <span>Pustakawan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pustakawan Sistem</h6>
                <a class="collapse-item" href="<?=site_url('pustakawan')?>">Pustakawan Sistem</a>
            </div>
        </div>
        
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="far fa-address-card "></i>
            <span>Data Anggota</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pustakawan</h6>
                <a class="collapse-item" href="<?=site_url('anggota')?>">Anggota Perpustakaan</a>
            </div>
        </div>
        
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-book"></i>
            <span>Data Buku</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Input Buku</h6>
                <a class="collapse-item" href="<?=site_url('klasifikasi')?>">Klasifikasi</a>
                <a class="collapse-item" href="<?=site_url('bahasa')?>">Bahasa</a>
                <a class="collapse-item" href="<?=site_url('kategori')?>">Kategori</a>
                <a class="collapse-item" href="<?=site_url('penerbit')?>">Penerbit</a>
            </div>
        </div>
        
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-book-open"></i>
            <span>Koleksi Buku</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Input Koleksi Buku</h6>
                <a class="collapse-item" href="<?=site_url('koleksi')?>">Koleksi</a>
                <a class="collapse-item" href="<?=site_url('stokkoleksi')?>">Stok Koleksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-book-reader"></i>
            <span>Peminjaman</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Input Peminjaman Buku</h6>
                <a class="collapse-item" href="<?=site_url('pemesanan')?>">Pemesanan</a>
                <a class="collapse-item" href="<?=site_url('transaksi')?>">Transaksi</a>
                
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Log Out</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Log Out</h6>
            <a class="collapse-item" href="<?=site_url('login')?>">Log Out</a>
        </div>
    </div>
</li>
</ul>
<!-- End of Sidebar -->