<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul;?></h3>
		</div>

		<form method="post" action="<?= base_url()?>anggota/simpan" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">ID</label>
					<div class="col-sm-10">
						<input type="text" name="id" value="<?= $id_anggota;?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
					<div class="col-sm-10">
						<select name="jk" class="form-control" required>
							<option value=""> - Pilih Jenis Kelamin - </option>
							<option value="Laki-laki"> Laki-laki </option>
							<option value="Perempuan"> Perempuan </option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<textarea name="alamat" class="form-control" cols="30" rows="5" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">No. Telepon</label>
					<div class="col-sm-10">
						<input type="text" name="telp" class="form-control" placeholder="No. Telepon" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Level</label>
					<div class="col-sm-10">
						<select name="level" class="form-control" required>
							<option value=""> - Pilih Level - </option>
							<option value="Administrator"> Administrator </option>
							<option value="Petugas"> Petugas </option>
							<option value="Anggota"> Anggota </option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
						<input type="text" name="username" class="form-control" placeholder="Username" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<a href="<?= base_url()?>anggota" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>

	</div>
</div>