<?php 
	if (!empty($this->session->flashdata('info'))) {?>
		<div class="alert alert-success" role="alert"><?= $this->session->flashdata('info');?></div>
	<?php }
?>

<?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator'){?>
    <div class="row">
	<div class="col-md-12">
		<a href="<?= base_url()?>peminjaman/tambah_peminjaman" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
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
					<th>Id Peminjaman</th>
					<th>Peminjam</th>
					<th>Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Status</th>
					<?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator'){?>
						<th>Aksi</th>
					<?php }?>
				</tr>
			</thead>

			<tbody>
				<?php 
					foreach ($data as $row) {
						$tgl_kembali = new DateTime($row->tgl_kembali);
						$tgl_sekarang = new DateTime();
						$selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
						?>
						<tr>
							<td><?= $row->id_pm;?></td>
							<td><?= $row->nama;?></td>
							<td><?= $row->judul_buku;?></td>
							<td><?= $row->tgl_pinjam;?></td>
							<td><?= $row->tgl_kembali;?></td>
							<td>
								<?php 
									if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
										echo "<span class='label label-warning'>Belum di Kembalikan</span>";
									}else{
										echo "Telat <b style = 'color:red;'>".$selisih."</b> Hari <br> <span class='label label-danger'> Denda Perhari = 1.000";
									}
								?>
							</td>
							<?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator'){?>
								<td>
									<a href="<?= base_url()?>peminjaman/kembalikan/<?= $row->id_pm;?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin Buku ini Mau di Kembalikan ?');"> Kembalikan</a>
								</td>
							<?php }?>
						</tr>
					<?php }
				?>
			</tbody>
		</table>
	</div>
</div>