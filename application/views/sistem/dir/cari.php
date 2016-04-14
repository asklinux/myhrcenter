<table id="sejarah" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Bahagian</th>
                                            <th>Email</th>
                                            <th class="td-actions">Ext</th>
                                            <th class="td-actions">Tel Bimbit</th>
                                            <th>WP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      	<?php foreach ($hasil as $h ) { ?>
										<?php if ($h['givenname'][0] !== null ){ ?>
										<tr>
                                            <td><?=$h['givenname'][0]?></td>
                                            <td><?=$h['gidnumber'][0]?></td>
                                            <td><?=$h['mail'][0]?></td>
                                            <td><?php  //$h['telephonenumber'][0]; ?></td>
                                            <td><?php //$h['mobile'][0]; ?></td>
                                            <td><?php //$h['gidnumber'][0]; ?></td>
                                        </tr>
										<?php } ?>
										<?php										
										}
										?>
                                        
                                       
                                    </tbody>
</table>