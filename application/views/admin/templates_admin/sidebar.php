<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">

                    <div class="container">
                        
                        <div class="float-start">
                            <a href="<?php echo base_url('admin/dashboard_admin') ?>"><h2><i class="bi bi-person-square"></i> Admin</h2></a>
							
							
                        </div>
						
                        <div class="header-top-right">
                            
                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>

						<div class="float-end">
						<strong><?php echo anchor('auth/logout', '<button type="button" class="btn btn-outline-danger">
								<i class="fas fa-sign-out-alt"></i> &nbsp;Log Out
							</button>') ?></strong></li>
						</div>
                    </div>
                </div>

                <nav class="main-navbar">
                    <div class="container">
                        <ul>            
                            
                            <li class="menu-item  ">
                                <a href="<?php echo base_url('admin/dashboard_admin') ?>" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="menu-item  ">
                                <a href="<?php echo base_url('admin/data_barang') ?>" class='menu-link'>
                                    <i class="bi bi-server"></i>
                                    <span>Data Barang</span>
                                </a>
                            </li>
                            
                            <li class="menu-item  ">
                                <a href="<?php echo base_url('admin/transaksi/validasi_transaksi') ?>" class='menu-link'>
                                    <i class="bi bi-card-list"></i>
                                    <span>List Validasi Transaksi</span>
                                </a>
                            </li>

                            <li class="menu-item  ">
                                <a href="<?php echo base_url('admin/transaksi/transaksi_sukses') ?>" class='menu-link'>
                                    <i class="bi bi-card-checklist"></i>
                                    <span>List Transaksi Suskes</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>                    
                </nav>
                
            </header>
