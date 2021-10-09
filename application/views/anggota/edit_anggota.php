<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul;?></h3>
		</div>

		<form method="post" action="<?= base_url()?>anggota/update" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">ID</label>
					<div class="col-sm-10">
						<input type="text" name="id" value="<?= $data['id'];?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="nama" value="<?= $data['nama'];?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
					<div class="col-sm-10">
						<select name="jk" class="form-control" required>
							<?php 
								if ($data['jk'] == "Laki-laki") {?>
									<option value="Laki-laki" selected> Laki-laki </option>
									<option value="Perempuan"> Perempuan </option>
								<?php }else{?>
									<option value="Laki-laki"> Laki-laki </option>
									<option value="Perempuan" selected> Perempuan </option>
								<?php }
							?>
							
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<textarea name="alamat" class="form-control" cols="30" rows="5" required><?= $data['alamat'];?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">No. Telepon</label>
					<div class="col-sm-10">
						<input type="text" name="telp" value="<?= $data['telp'];?>" class="form-control" placeholder="No. Telepon" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Level</label>
					<div class="col-sm-10">
						<select name="level" class="form-control" required>
							<?php 
								if ($data['level'] == "Administrator") {?>
									<option value="Administrator" selected> Administrator </option>
									<option value="Petugas"> Petugas </option>
									<option value="Anggota"> Anggota </option>
								<?php }else if ($data['level'] == "Petugas") {?>
									<option value="Administrator"> Administrator </option>
									<option value="Petugas" selected> Petugas </option>
									<option value="Anggota"> Anggota </option>
								<?php }else{?>
									<option value="Administrator"> Administrator </option>
									<option value="Petugas"> Petugas </option>
									<option value="Anggota" selected> Anggota </option>
								<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
						<input type="text" name="username" value="<?= $data['username'];?>" class="form-control" placeholder="Username" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" name="password" value="<?= $data['password'];?>" class="form-control" placeholder="Password" required>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<a href="<?= base_url()?>anggota" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>

	</div>
</div>