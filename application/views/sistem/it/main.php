<script src="<?=base_url()?>asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/clockpicker/dist/bootstrap-clockpicker.min.css">

<script>
	$(document).ready(function() {
		$("#bbaru").click(function() {
			$("#baru").show();
			$("#status").hide();
			$("#cari").hide();
			$("#admin").hide();
		});

		$("#bstatus").click(function() {
			$("#status").show();
			$("#baru").hide();
			$("#cari").hide();
			$("#admin").hide();
		});
		$("#bcari").click(function() {
			$("#status").hide();
			$("#baru").hide();
			$("#cari").show();
			$("#admin").hide();
		});
		<?php if ($admin != 0) { ?>
		$("#badmin").click(function() {
			$("#status").hide();
			$("#baru").hide();
			$("#cari").hide();
			$("#admin").show();
		});
		<?php } ?>
		
		$("#pinjamict").submit(function(event)
		{
			
			
			db = {
				uid : "<?=$this->session->userdata['logged_in']['username']?>",
				jenis :  $("#jenis").val(),
				tarikh_dari : $("#tarikh_dari").val(),
				tarikh_hingga : $("#tarik_hingga").val(),
				masa_dari : $("#jam").val(),
				masa_hingga : $("#jam2").val(),
				maklumat : $("#komen").val() 
			};
			
			$.post("<?=base_url()?>index.php/panel/pinjaman_ict",db,
			function(data){
				
				alert(data);
				$( "#status" ).text( "Permohonan telah di hantar" ).show().fadeOut( 10000 );
				$("#baru").hide();
			});
			event.preventDefault();
			
		});
		
		$("#carian").keyup(function(ec)
		{
		$.post("<?=base_url()?>index.php/panel/cari_ict",{ cari : $("#carian").val() , uid : "<?=$this->session->userdata['logged_in']['username']?>"},
		function(data){
			
			$("#keputusan").html("<b>"+data+"</b>");
		});
		
		ec.preventDefault();	
		});
	}); 
</script>

<div class="row">
	<div class="span16" align="center">
		<div class="well well-small well-shadow">
			<h4>Sistem Pinjaman Kelengkapan ICT</h4>
		</div>
	</div>
	<div class="span2">
		<div class="box-content">
			<div class="btn-group-box">

				<button id="bbaru" class="btn btn-success">
					<i class="icon-pencil icon-large"></i>
					<br/>
					Baru
				</button>
				<button id="bcari" class="btn btn-warning">
					<i class="icon-search icon-large"></i>
					<br/>
					Carian
				</button>
				<button id="bstatus" class="btn">
					<i class="icon-list-alt icon-large"></i>
					<br/>
					Status
				</button>
				<?php if ($admin != 0) { ?>
					<button id="badmin" class="btn btn-warning">
					<i class="icon-briefcase icon-large"></i>
					<br/>
					Admin
				</button>
				<button id="bproses" class="btn">
					<i class="icon-list-ul icon-large"></i>
					<br/>
					Proses
				</button>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="span14">
		<div id="status" class="box">
			<div class="box-header">
				<i class="icon-inbox"></i>
				<h5>Sejarah Pinjaman</h5>
			</div>
			<div class="box-content">
				
				<table id="sejarah" class="table table-hover table-bordered tablesorter">
					<thead>
						<tr>
							<th width="15%">Tarikh</th>
							<th>Nama Barang</th>
							<th class="td-actions" width="10%" >Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
				
						foreach ($stat as $s) {
						?>
							
						<tr>
							<td><?=$s->tarikh_mohon?></td>
							<td><?=$s->maklumat?></td>
							<td class="td-actions">
								<a href="javascript:;" class="btn btn-small btn-info"> 
								<i class="btn-icon-only icon-ok"></i></a>
								<a href="javascript:;" class="btn btn-small btn-danger"> 
								<i class="btn-icon-only icon-remove"></i></a>
							</td>
						</tr>
						<?php
						}
				
						?>
						

					</tbody>
				</table>
				<button class="btn btn-small btn-info">
					<i class="btn-icon-only icon-ok"></i>
				</button>
				Telah Dipulangkan
				<button class="btn btn-small btn-danger">
					<i class="btn-icon-only icon-remove"></i>
				</button>
				Belum Dipulangkan
			</div>
		</div>

		<div id="baru" class="box" style='display:none'>
			<div class="box-header">
				<i class="icon-inbox"></i>
				<h5>Pinjaman Baru</h5>
			</div>
			<div class="box-content">
				<div id="status"></div>
				<form class="contact-us form-horizontal" method="post" id="pinjamict">
					<div class="control-group">
						<label class="control-label">Jenis Pinjaman</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-inbox"></i></span>
								<select class='span5' id='jenis'>
									<option value='' > Sila Pilih </option>
									<?php foreach ($ict_jenis as $j ) {
									?>
									<option value='<?=$j->jenis_id?>' > <?=$j->jenis_nama?> </option>
									<?php	
									}
									?>
									

								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tarikh Dari</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">Dari</span>
								<div id="datepicker1" class="input-prepend date">
									<span class="add-on"><i class="icon-th"></i></span>
									<input class="span2" id="tarikh_dari" type="text" >
								</div>
							</div>
							<div class="input-prepend">
								<span class="add-on">Hingga</span>
								<div id="datepicker2" class="input-prepend date">
									<span class="add-on"><i class="icon-th"></i></span>
									<input class="span2" type="text" id="tarikh_hingga" >
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Waktu</label>
						<div class="controls">
							<div class="input-prepend" >
								<span class="add-on">Dari</span>
								<span class="add-on"><i class="icon-time"></i></span>

								<input type="text" id="jam" class="span2 clockpicker" data-autoclose="true" name="jam" >
							</div>
							<div class="input-prepend" >
								<span class="add-on">Hingga</span>
								<span class="add-on"><i class="icon-time"></i></span>

								<input type="text" id="jam2" class="span2 clockpicker" data-autoclose="true" name="jam2" >
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Keterangan</label>
						<div class="controls">
							<div class="input-prepend">
								<textarea name="comment" id="komen" class="span6" rows="4" cols="80" placeholder="Maklumat (Max 200 characters)"></textarea>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" id="hantar" class="btn btn-primary">
								Hantar
							</button>
							<button type="button" class="btn" onclick="this.form.reset()" >
								Batal
							</button>
						</div>
					</div>
				</form>

			</div>
		</div>
		<div id="cari" class="box" style='display:none'>
			<div class="box-header">
				<i class="icon-folder-open"></i>
				<h5>Carian</h5>

			</div>
			<div class="box-content">
				<form class="contact-us form-horizontal" method="post" id="cari">
					<div class="control-group">
						<label class="control-label">Buat Carian</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span>
								<input class="span8" id="carian" type="text" >
							<!--
								<button type="submit" id="hantar" class="btn btn-primary">
								Cari
							</button>
							-->
							</div>
						</div>
						<br/>
						<div id="keputusan"></div>
					</div>
				
				</form>
			</div>
		</div>
		
		<!--- admin -->
		<?php if ($admin != 0) { ?>
			<div id="admin" class="box" style='display:none'>
			<div class="box-header">
				<i class="icon-inbox"></i>
				<h5>Admin Perkakasan ICT</h5>
			</div>
			<div class="box-content">
				
				<table id="sejarah" class="table table-hover table-bordered tablesorter">
					<thead>
						<tr>
							<th width="15%">Tarikh</th>
							<th>Nama Barang</th>
							<th class="td-actions" width="10%" >Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
				
						foreach ($stat as $s) {
						?>
							
						<tr>
							<td><?=$s->tarikh_mohon?></td>
							<td><?=$s->maklumat?></td>
							<td class="td-actions">
								<a href="javascript:;" class="btn btn-small btn-info"> 
								<i class="btn-icon-only icon-ok"></i></a>
								<a href="javascript:;" class="btn btn-small btn-danger"> 
								<i class="btn-icon-only icon-remove"></i></a>
							</td>
						</tr>
						<?php
						}
				
						?>
						

					</tbody>
				</table>
				<button class="btn btn-small btn-info">
					<i class="btn-icon-only icon-ok"></i>
				</button>
				Telah Dipulangkan
				<button class="btn btn-small btn-danger">
					<i class="btn-icon-only icon-remove"></i>
				</button>
				Belum Dipulangkan
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/jquery/jquery-chosen.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/jquery/virtual-tour.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?=base_url()?>asset/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

<script type="text/javascript">
	
$(document).ready(function() {			
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		 
		var checkin = $('#tarikh_dari').datepicker({
		  onRender: function(date) {
		    return date.valueOf() < now.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  if (ev.date.valueOf() > checkout.date.valueOf()) {
		    var newDate = new Date(ev.date)
		    newDate.setDate(newDate.getDate() + 1);
		    checkout.setValue(newDate);
		  }
		  checkin.hide();
		  $('#tarikh_hingga')[0].focus();
		}).data('datepicker');
		var checkout = $('#tarikh_hingga').datepicker({
		  onRender: function(date) {
		    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  checkout.hide();
		}).data('datepicker');
		
});
</script>

<script type="text/javascript">
	$('.clockpicker').clockpicker().find('input').change(function() {
		console.log(this.value);
	});
	$('#jam').clockpicker({
		autoclose : true
	});

	if (something) {
		$('#jam').clockpicker('show').clockpicker('toggleView', 'minutes');
	}
</script>

<script type="text/javascript">
	$('.clockpicker').clockpicker().find('input').change(function() {
		console.log(this.value);
	});

	$('#jam2').clockpicker({
		autoclose : true
	});

	if (something) {
		$('#jam2').clockpicker('show').clockpicker('toggleView', 'minutes');
	}
</script>