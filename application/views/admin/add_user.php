 <form action='#' id='loginForm' class='form-signin' autocomplete='off'>
                                <div class="form-inner">
                                    	<div class="input-prepend">
                                        
                                        <span class="add-on" rel="tooltip" title="Username or E-Mail Address" data-placement="top"><i class="icon-user"></i></span>
                                        <input type='text' class='span5' id='username' value='' />
                                    	</div>

                                    	<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-key"></i> </span>
                                        <input type='password' class='span5' id='password' placeholder='Katalaluan Baru Anda'/>
                                    	</div>

					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-group"></i> </span>
					<select class='span5' id='bahagian'>
						<option value='' > Sila Pilih Bahagian/Cawangan</option>
						<?php
						for($i = 0; $i < count($bahagian)-1; $i++) {
				
							echo "<option value='".$bahagian[$i]['gidnumber'][0]."'>".$bahagian[$i]['cn'][0]."</option>";
	
						}
						?>
						
  						
					</select>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-phone"></i></span>
                                        <input type='text' class='span5' id='nophone' placeholder='No Tel Pejabat'/>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-phone-sign"></i></span>
                                        <input type='text' class='span5' id='nophonehp' placeholder='No Tel Bimbit'/>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-credit-card"></i></span>
                                        <input type='text' class='span5' id='noic' placeholder='No Kad Pengenala cht:- 890717045312' />
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-info-sign"></i></span>
                                        <input type='text' class='span5' id='jawatan' placeholder='Jawatan cth:- Penolong Pegawai Takdbir' />
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-info-sign"></i></span>
                                        <input type='text' class='span5' id='grad' placeholder='Grad cth:- N27' />
                                    	</div>

					
                                     
				</div>
                                <footer class="signin-actions">
                                    <input class="btn btn-primary" type='button' name='login' id="tukar" value='Simpan'/>
                                </footer>
                            </form>