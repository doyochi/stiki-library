<?php 
	if (!empty($this->session->flashdata('info'))) {?>
		<div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
	<?php }
?>

<div class="row">
	<div class="col-md-12">
		<a href="<?= base_url()?>anggota/tambah_anggota" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengguna</a>
	</div>
</div>

<br>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Table With Full Features</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>No. Telpon</th>
					<th>Level</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					foreach ($data as $row) {?>
						<tr>
							<td><?= $row->id;?></td>
							<td><?= $row->nama;?></td>
							<td><?= $row->jk;?></td>
							<td><?= $row->alamat;?></td>
							<td><?= $row->telp;?></td>
							<td><?= $row->level;?></td>
							<td>
								<a href="<?= base_url()?>anggota/edit/<?= $row->id;?>" class="btn btn-success btn-xs">Edit</a>
								<a href="<?= base_url()?>anggota/hapus/<?= $row->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus ?');">Hapus</a>
							</td>
						</tr>
					<?php }
				?>
			</tbody>
		</table>
	</div>
</div>