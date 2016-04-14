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
        $("#check_availability").click(function(){
        	alert('test');
        });
	});
</script>

 <div class="row">
 			<div class="span16" align="center">
 				<div class="well well-small well-shadow">
 					<h4>Sistem Tempahan Makanan/Jamuan </h4> 
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
                                <i class="icon-glass"></i>
                                <h5>Status Tempahan</h5>
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
                                <h5>Tempahan Baru</h5>
                            </div>
                            <div class="box-content">
    <form class="contact-us form-horizontal" method="post" id="pinjam">
                  
        <div class="control-group">
            <label class="control-label" for="trip_type">Jenis Tempahan</label>
            <div class="controls">
                <select name="full_day">
                    <option value="1">Slot Masa</option>
                    <option value="2">Sepanjang Hari</option>
                </select>
               
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="start_date">Masa Mula</label>
            <div class="controls">
                <input readonly autocomplete="off" type="text" class="span2" id="start_date" name="start_date" value="">
                <span class="label label-important validate-required">Wajib</span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="end_date">Masa Tamat</label>
            <div class="controls">
                <input readonly autocomplete="off" type="text" class="span2" id="end_date" name="end_date" value="">
                <span class="label label-important validate-required">Wajib</span>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button id="check_availability" class="btn btn-small btn-primary" type="button"><i class="icon-search"></i> Periksa kekosongan</button>
            </div>
        </div>
        <div class="control-group msg-check-success">
            <label class="control-label"></label>
            <div class="controls padding-right20">
                <div id="ajax-placeholder-success" class="alert margin-bottom0 alert-success"></div>
            </div>
        </div>
        <div class="control-group msg-check-error">
            <label class="control-label"></label>
            <div class="controls padding-right20">
                <div id="ajax-placeholder-error" class="alert margin-bottom0 alert-error"></div>
            </div>
            <div>&nbsp;</div>
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
                              carian
                            </div>
                        </div>
			</div>
</div>