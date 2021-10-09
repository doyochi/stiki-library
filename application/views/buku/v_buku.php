<?php 
	if (!empty($this->session->flashdata('info'))) {?>
		<div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
	<?php }
?>

<?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator'){?>
    <div class="row">
		<div class="col-md-12">
			<a href="<?= base_url()?>buku/tambah_buku" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Buku</a>
		</div>
</div>
<?php }?>


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
					<th>Id Buku</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun Terbit</th>
					<th>Jumlah</th>
					<th class="col-md-1">Cover</th>
					<?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator'){?>
						<th>Aksi</th>
					<?php }?>
				</tr>
			</thead>

			<tbody>
				<?php 
					foreach ($data->result() as $row) {?>
						<tr>
							<td><?= $row->id_buku;?></td>
							<td><?= $row->judul_buku;?></td>
							<td><?= $row->nama_pengarang;?></td>
							<td><?= $row->nama_penerbit;?></td>
							<td><?= $row->tahun_terbit;?></td>
							<td><?= $row->jumlah;?></td>
							<td class="col-md-2">
            					<a href="#" class="thumbnail">
              						<img src="<?=base_url()?>assets/covers/<?= $row->cover;?>" alt="cover">
            					</a>	
							</td>
							<?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator'){?>
								<td>
									<a href="<?= base_url()?>buku/edit/<?= $row->id_buku;?>" class="btn btn-success btn-xs">Edit</a>
									<a href="<?= base_url()?>buku/hapus/<?= $row->id_buku;?>" class="btn btn-danger btn-xs" onclick= "return confirm('Yakin Mau Menghapus ?');">Hapus</a>
								</td>
							<?php }?>
							
						</tr>
					<?php }
				?>
			</tbody>
		</table>
	</div>
</div>