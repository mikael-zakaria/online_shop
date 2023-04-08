<?php  ?>

<body style="margin-bottom:200px">
<!-- Navigation bar start -->
		<nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:rgba(0,0,0,0.5)">
            
            <div class="container">
                <a href="<?php echo base_url() ?>" class="navbar-brand" style="font-family: 'Delius Swash Caps'">Ngr_secondhand</a>
                
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mynavbar">
                    
					<ul class="nav navbar-nav">
                       <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle text-light" id="navbar-drop" data-toggle="dropdown">
                               Kategori
                            </a>
                            
                            <div class="dropdown-menu">
                               <a href="<?php echo base_url('kategori/hoodie') ?>" class="dropdown-item">Hoodie</a>
                               <a href="<?php echo base_url('kategori/crewneck') ?>" class="dropdown-item">Crewneck</a>
                               <a href="<?php echo base_url('kategori/celana') ?>" class="dropdown-item">Celana</a>
                            </div>
                       </li>
                       <li class="nav-item"><a href="<?php echo base_url('main_dashboard/produk') ?>" class="nav-link text-light">Produk</a></li>
                       <!-- <li class="nav-item"><a href="<?php echo base_url() ?>" class="nav-link">Tentang Kami</a></li> -->
                    </ul>
                    
					<!-- Untuk Keranjang -->
                    <ul class="nav navbar-nav ml-auto">
						<li class="nav-item">
					   		<?php //$keranjang = ' '.'&nbsp'.$this->cart->total_items().'  ' ?>
							<a href="<?php echo base_url('dashboard_welcome/detail_keranjang') ?>" class="nav-link text-light"><i class="fas fa-shopping-cart"></i> &nbsp; <?php echo $total ?></a>
                        	<!-- <?php //echo anchor('dashboard_welcome/detail_keranjang', $keranjang) ?> -->
						</li>

						<?php if($this->session->userdata('username')) { ?>

                       <li class="nav-item">
						
					   <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle text-light" id="navbar-drop" data-toggle="dropdown">
								<?php //foreach ($user as $data) : ?>
									<img id="mini_pic" src="<?php echo base_url().'/uploads/user_profile/' . $gambar ?>">
									&nbsp;<?php echo $username ?>
								<?php //endforeach; ?>
                            </a>
                            
                            <div class="dropdown-menu">
                               <a href="<?php echo base_url('user/transaksi/transaksi_user/riwayat_transaksi') ?>" class="dropdown-item"><i class="fas fa-list-alt"></i> &nbsp; Riwayat Transaksi</a>
                               <a href="<?php echo base_url('user/profile/profile_user') ?>" class="dropdown-item"> <i class="far fa-user-circle"></i> &nbsp; Profil </a>
                               <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item"><i class="fa fa-sign-out"></i> &nbsp; Keluar </a>
                            </div>
                       </li>
                        <!-- <a href="<?php echo base_url('auth/logout') ?>" class="nav-link text-light"><i class="fa fa-sign-out"></i> Keluar </a></li> -->
                    </ul>

                    <?php
                        } else {
                    ?>

                    <ul class="nav navbar-nav ml-auto">
                       <li class="nav-item "><a href="<?php echo base_url('registrasi') ?>" class="nav-link text-light" ><i class="fa fa-user"></i> Daftar </a></li>
                       <li class="nav-item "><a href="<?php echo base_url('auth/login') ?>" class="nav-link text-light" ><i class="fa fa-sign-in"></i> Masuk</a></li>
                    </ul>

                    <?php 
                        }
                    ?>

                </div>
            </div>
        </nav>
    <!--navigation bar end-->
    