<table id="sejarah" class="table table-hover table-bordered tablesorter">
					<thead>
						<tr>
							<th width="15%">Tarikh</th>
							<th>Tajuk</th>
							<th class="td-actions" width="10%" >Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
				
						foreach ($latihan as $s) {
						?>
							
						<tr>
							<td><?=$s->hadir_tarikh_dari?></td>
							<td><?=$s->hadir_tajuk?></td>
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