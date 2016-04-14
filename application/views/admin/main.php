<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://skor.dosh.gov.my/asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" >
	
</script>
<script>

	
    
    
    
	$(document).ready(function(){
		
		$("#tambah").click(function(){
			
			$.post("<?=base_url()?>index.php/admin/add_user",{conf : 'bahagian'},
			function(data){
				
				//alert('test');
				$("#proses").show();
				$( "#prosesc" ).text("Muat Naik Maklumat ...").show();
				$( "#prosesc" ).html(data).show();
				
			});
		});
		
		$("#adminm").click(function(){
			$.post("<?=base_url()?>index.php/admin/module_admin",{conf : 'bahagian'},
			function(data){
				
				//alert('test');
				$("#proses").show();
				$( "#prosesc" ).text("Memuat Naik Kandungan ..").show();
				$( "#prosesc" ).html(data).show();
				
			});
		});
		$("#keaskini").click(function(){
			$.post("<?=base_url()?>index.php/admin/edit_user",{conf : 'panduan'},
			function(data){
				
				//alert('test');
				$("#proses").show();

				$( "#prosesc" ).text("Memuat Naik Kandungan ..").show();
				$( "#prosesc" ).html(data).show();
				
			});
		});
		$("#carip").click(function(){
			$.post("<?=base_url()?>index.php/admin/cari_user",{conf : 'panduan'},
			function(data){
				
				//alert('test');
				$("#proses").show();

				$( "#prosesc" ).text("Memuat Naik Kandungan ..").show();
				$( "#prosesc" ).html(data).show();
				
			});
		});
		$("#laporan").click(function(){
			$.post("<?=base_url()?>index.php/admin/laporan",{conf : 'panduan'},
			function(data){
				
				//alert('test');
				$("#proses").show();

				$( "#prosesc" ).text("Memuat Naik Kandungan ..").show();
				$( "#prosesc" ).html(data).show();
				
			});
		});
		$("#statistik").click(function(){
			$.post("<?=base_url()?>index.php/panel/latihan_stat",{conf : 'bahagian'},
			
			function(data){
				
				var papar = jQuery.parseJSON(data);
				
				google.load('visualization', '1', {'packages': ['corechart']});
    			google.setOnLoadCallback(drawVisualization);
				function drawVisualization() {
		        visualization_data = new google.visualization.DataTable();
		        
		        visualization_data.addColumn('string', 'Latihan');
		        
		        visualization_data.addColumn('number', 'Jumlah');
		
		        visualization_data.addRow(['Latihan Dalam Negara', eval(papar[0].jumlah)]);
		        
		        visualization_data.addRow(['Latihan Luar Negara', eval(papar[1].jumlah)]);
		        
		        visualization_data.addRow(['Sesi Pembelajaran', eval(papar[2].jumlah)]);
		        
		        visualization_data.addRow(['Pembelajaran Kendiri', eval(papar[3].jumlah)]);

		
		        visualization = new google.visualization.PieChart(document.getElementById('prosesc'));
		
		        visualization.draw(visualization_data, {title: 'Aktiviti Latihan', height: 260});
		
		         }
   
				$("#proses").show();
				//$( "#prosesc" ).html(data).show();
				drawVisualization();
				
			});
		});
		$("#log").click(function() {
		
			
			$.post("<?=base_url()?>index.php/admin/log",{conf : 'bahagian'},
			function(data){
				
				//alert('test');
				$("#proses").show();
				$("#panduan2").hide();
				$( "#prosesc" ).html(data).show();
				
			});
		});			
		
	});
</script>
            
			<div class="span14">
				
				<?php if ($admin == 1) { ?>
<div class="well">
       <button class="btn " id="tambah"><i class="icon-user"></i> Tambah Pengguna</button>
        <button class="btn " id="adminm"><i class="icon-user"></i> Admin Module</button>
       <button class="btn " id="keaskini"><i class="icon-book"></i> Kemaskini Pengguna</button>
       <button class="btn" id="carip"><i class="icon-list "></i> Cari Pengguna</button>
       <button class="btn" id="laporan"><i class="icon-list-alt "></i> Laporan</button>
       <button class="btn" id="statistik"><i class="icon-bar-chart "></i> Statistik</button>
       <button class="btn" id="log"><i class="icon-bar-chart "></i> Log Sistem</button>

</div>

<div id="proses" class="box" style='display:none'>
		
			<div id="prosesc" class="box-content">
			
			</div>
			
			
</div>
		

<?php } ?>
				
			</div>