<div class="row">

    			<div class="span4"></div>
                    <div class="span8">
                            <legend>Kemaskini Maklumat Kakitangan</legend>
                            <form action='#' id='loginForm' class='form-signin' autocomplete='off'>
                                <div class="form-inner">
                                    	<div class="input-prepend">
                                        
                                        <span class="add-on" rel="tooltip" title="Username or E-Mail Address" data-placement="top"><i class="icon-user"></i></span>
                                        <input type='text' class='span5' id='username' value='<?=$username?>' disabled/>
                                    	</div>

                                    	<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-key"></i> </span>
                                        <input type='password' class='span5' id='password' placeholder='Katalaluan Baru Anda'/>
                                    	</div>

					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-group"></i> </span>
					<select class='span5' id='bahagian'>
						
						<?php
						for($i = 0; $i < count($bahagian)-1; $i++) {
							if ($bahagian[$i]['gidnumber'][0] == $profil['gidnumber']['0']){
							echo "<option selected='selected'  value='".$bahagian[$i]['gidnumber'][0]."'>".$bahagian[$i]['cn'][0]."</option>";
								
							}
							else {
							echo "<option value='".$bahagian[$i]['gidnumber'][0]."'>".$bahagian[$i]['cn'][0]."</option>";
							}
						}
						?>
  						
					</select>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-phone"></i></span>
                                        <input type='text' class='span5' id='nophone' value='<?=$profil['telephonenumber']['0']?>'/>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-phone-sign"></i></span>
                                        <input type='text' class='span5' id='nophonehp' value='<?=$profil['mobile']['0']?>'/>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-credit-card"></i></span>
                                        <input type='text' class='span5' id='noic' value='<?=$profil['employeenumber']['0']?>' />
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-info-sign"></i></span>
                                        <input type='text' class='span5' id='jawatan' value='<?=$profil['title']['0']?>' />
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-info-sign"></i></span>
                                        <input type='text' class='span5' id='grad' value='<?=$profil['initials']['0']?>' />
                                    	</div>

					
                                     
				</div>
                                <footer class="signin-actions">
                                    <input class="btn btn-primary" type='button' name='login' id="tukar" value='Kemaskini Profile'/>
                                </footer>
                            </form>
                    </div>
                    <div class="span3"></div>
                </div>