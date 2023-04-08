<!-- <?php  ?> -->

<div class="container" style="margin-top:65px">

	<div class="card">

		<div class="card-header"><b><strong>Profile</strong></b></div>

		<div class="card-body">

		<?php foreach ($user as $data) : ?>
		<form method="post" action="<?php echo base_url().'user/profile/profile_user/edit_profile' ?>" enctype="multipart/form-data">
		
			<div class="row">
			
				<div class="col-md-4">
					<section>
						<img src="<?php echo base_url().'/uploads/user_profile/' . $data->gambar ?>">
						<div class="form-group">
							<br>
							<b><label>Upload/Edit Foto</label></b>
							<input type="file" name="gambar">
						</div>
						<!-- <img src="<?php ?>"> -->
					</section>
					<br><br>
				</div>
				
				

				<div class="col-md-8">

					<h2> 
						<span class="badge text-light bg-dark" style="color: white;"><?php echo $this->session->userdata('username')?></span>	
					</h2>
					
					<br>
						<input type="hidden" name="id_user" class="form-control" value="<?php echo $data->id_user ?>">

						<div class="for-group">
							<label><strong>Nama Lengkap</strong></label>
							<input type="text" name="nama_lengkap" class="form-control mb-3" value="<?php echo $data->nama_lengkap ?>">
							<?php echo form_error('nama_lengkap', '<div class="text-danger small ml-2 mb-2">', '</div>'); ?>
						</div>

						<div class="for-group">
							<label><strong>Email</strong></label>
							<input type="text" name="email" class="form-control mb-3" value="<?php echo $data->email ?>">
							<?php echo form_error('email', '<div class="text-danger small ml-2 mb-2">', '</div>'); ?>
						</div>

						<div class="for-group">
							<span class="badge text-light bg-warning text-dark">*isi Password jika ingin mengubah password</span>	
							<br>
							<label><strong>Password</strong></label>
							<input type="password" name="password"  class="form-control mb-1" placeholder="Password..." >
							<?php echo form_error('password', '<div class="text-danger small ml-2 mb-2">', '</div>'); ?>
						</div>

						<div class="for-group">
							<label><strong>Konfirmasi Password</strong></label>
							<input type="password" name="password_2"  class="form-control mb-1" placeholder="Ulangi Password...">
							<?php echo form_error('password_2', '<div class="text-danger small ml-2 mb-2">', '</div>'); ?>
						</div>

						<br>

						<button type="submit" class="btn btn-warning btn-sm"><strong>Simpan</strong></button>		
				</div>

			</div>

		
		</form>
		<?php endforeach; ?>

		</div>

	</div>

</div>
