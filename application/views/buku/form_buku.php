<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul;?></h3>
		</div>

		<form method="post" action="<?= base_url()?>buku/simpan" class="form-horizontal" enctype="multipart/form-data">
			<div class="box-body">
				<?php 
					if (!empty($this->session->flashdata('error'))) {?>
						<div class="alert alert-error" role="alert"><?= $this->session->flashdata('error');?></div>
				<?php }
				?>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Id Buku</label>
					<div class="col-sm-10">
						<input type="text" name="id_buku" value="<?= $id_buku;?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Judul Buku</label>
					<div class="col-sm-10">
						<input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Pengarang</label>
					<div class="col-sm-10">
						<select name="id_pengarang" class="form-control select2" required>
							<option value=""> - Pilih Pengarang - </option>
							<?php 
								foreach ($pengarang as $row) {?>
									<option value="<?= $row->id_pengarang;?>"><?= $row->nama_pengarang;?></option>
								<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Penerbit</label>
					<div class="col-sm-10">
						<select name="id_penerbit" class="form-control select2" required>
							<option value=""> - Pilih Penerbit - </option>
							<?php 
								foreach ($penerbit as $row) {?>
									<option value="<?= $row->id_penerbit;?>"><?= $row->nama_penerbit;?></option>
								<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
					<div class="col-sm-10">
						<select name="tahun_terbit" class="form-control select2" required ?>">
							<option value=""> - Pilih Tahun - </option>
							<?php 
								for($tahun = 1950; $tahun<=2020; $tahun++){?>
									<option value="<?= $tahun?>"><?= $tahun;?></option>
								<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>
					<div class="col-sm-10">
						<input type="number" name="jumlah" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Cover</label>
					<div class="col-sm-10">
						<input type="file" name="coverpost" class="form-control" required>
					</div>
				</div>

			</div>

			<div class="box-footer">
				<a href="<?= base_url()?>buku" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>

	</div>
</div>