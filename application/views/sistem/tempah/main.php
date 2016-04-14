 <script src="<?=base_url()?>asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>

<script>
	$(document).ready(function(){
    	$("#bbaru").click(function(){
        	$("#baru").show();
        	$("#status").hide();
        	$("#cari").hide();
    	});
    	
    	$("#bstatus").click(function(){
        	$("#status").show();
        	$("#baru").hide();
        	$("#cari").hide();
    	});
    	$("#bcari").click(function(){
        	$("#status").hide();
        	$("#baru").hide();
        	$("#cari").show();
    	});
	});
</script>

 <div class="row">
 	<div class="span16" align="center">
 				<div class="well well-small well-shadow">
 					<h4>Sistem Permohonan Alat Tulis</h4> 
 				</div>
 			</div>
            <div class="span2">
 				<div class="box-content">
                        <div class="btn-group-box">
                            <button id="bbaru" class="btn"><i class="icon-pencil icon-large"></i><br/>Baru</button>
                            <button id="bcari" class="btn"><i class="icon-search icon-large"></i><br/>Carian</button>
                            <button id="bstatus" class="btn"><i class="icon-list-alt icon-large"></i><br/>Status</button>
                        </div>
				</div>
			</div>
			<div class="span14">
 				<div id="status" class="box">
                            <div class="box-header">
                                <i class="icon-paper-clip"></i>
                                <h5>Sejarah Pinjaman</h5>
                            </div>
                            <div class="box-content">
                               <table id="sejarah" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        <tr>
                                            <th>Tarikh</th>
                                            <th>Nama Barang</th>
                                            <th class="td-actions">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>7.0</td>
                                            <td>Internet
                                            Explorer</td>
                                            <td class="td-actions">
                                                <a href="javascript:;" class="btn btn-small btn-info">
                                                    <i class="btn-icon-only icon-ok"></i>
                                                </a>

                                                <a href="javascript:;" class="btn btn-small btn-danger">
                                                    <i class="btn-icon-only icon-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div id="baru" class="box" style='display:none'>
                            <div class="box-header">
                                <i class="icon-folder-open"></i>
                                <h5>Pinjaman Baru</h5>
                            </div>
                            <div class="box-content">
                              Borang Pinjaman
                            </div>
                        </div>
                        <div id="cari" class="box" style='display:none'>
                            <div class="box-header">
                                <i class="icon-folder-open"></i>
                                <h5>Carian</h5>
                            </div>
                            <div class="box-content">
                              carian
                            </div>
                        </div>
			</div>
</div>