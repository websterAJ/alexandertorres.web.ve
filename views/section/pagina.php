          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Panel Administrativo</h1>
			<?php if (!in_array('sub_modulo',$this->Attach)): ?>
				<a href="<?php echo _BASE_URL_;?>index.php/dashboard/new/?sub_modulo=<?= $this->Attach['modulo']?>" id="new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo <?= $this->Attach['modulo'] ?></a>
			<?php endif ?>
		  </div>
	
          <!-- Content Row -->
          <div class="row">
			  <?php if ( in_array('sub_modulo',$this->Attach) && ($this->Attach['sub_modulo']== 'descripcion_actividad') ): ?>
				<?php if ( $this->Attach['sub_modulo']== 'descripcion_actividad'): ?>
					<h3><?= $this->Attach['data']['title']?></h3>
					<hr>
					<b>Fecha inicio:</b> <?= $this->Attach['data']['inicio_normal']?> <br>
					<b>Fecha termino:</b> <?= $this->Attach['data']['final_normal']?> <br>
					<b>Descripcion:</b><p><?= $this->Attach['data']['body']?></p>
					<form action="" method="post">
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
						</div>
					</form>
				<?php endif ?>
			<?php else: ?>
        		<div class="table-responsive card shadow h-100 py-2 p-3">	
					<?php if (empty($this->Attach['data'])): ?>
						<h2 class="text-center text-gray-500">No hay datos registrados en <?= $this->Attach['modulo']?></h2>
					<?php else: ?>
						<span id="mensaje"></span>
						<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
								
							<?php for ($i=0; $i < COUNT($this->Attach['data']); $i++):?>
								<?php if ($i==0): ?>
									<thead>
										<tr>
											<?php foreach ($this->Attach['data'][$i] as $key => $value): ?>
												<?php
												if ($key!='contenido') {
													$id=strpos($key,'id');
												} 
												if ($id === false): ?>
													<th><?= translate::msg($key) ?></th>
												<?php else: ?>
													<th>#</th>
												<?php endif ?>
											<?php endforeach ?>
											<th>Accion</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<?php foreach ($this->Attach['data'][$i] as $key => $value): ?>
												<?php
												if ($key!='contenido') {
													$id=strpos($key,'id');
												} 
												
												if ($id === false): ?>
													<th><?= translate::msg($key) ?></th>
												<?php else: ?>
													<th>#</th>
												<?php endif ?>
											<?php endforeach ?>
											<th>Accion</th>
										</tr>
									</tfoot>
								<?php endif ?>
								<tbody class="text-center">
									<tr>
									<?php foreach ($this->Attach['data'][$i] as $key => $value): ?>
										<th><?= $value ?></th>
									<?php endforeach ?>
										<th> 
										<div class="btn-group">
											<?php if ($this->Attach['modulo']=='mensajes') : ?>
												<a href="#" onclick="editar('<?= $this->Attach['modulo']?>','<?= $this->Attach['data'][$i]['id'] ?>');" class="btn btn-sm btn-outline"><span class="fas fa-eye text-black-50 "></span> Ver</a>
											<?php else: ?>
												<a href="#" onclick="editar('<?= $this->Attach['modulo']?>','<?= $this->Attach['data'][$i]['id'] ?>');" class="btn btn-sm btn-outline"><span class="fas fa-edit text-black-50 "></span> Editar</a>
												<a href="#" onclick="eliminar('<?= $this->Attach['modulo']?>','<?= $this->Attach['data'][$i]['id'] ?>');" class="btn btn-sm btn-outline"><span class="fas fa-trash  text-black-50 "></span> Eliminar</a>
											<?php endif; ?>
										</div>
										</th>
									</tr>
									
								</tbody>
							<?php endfor; ?>
						</table>
					<?php endif ?>
				</div>
			<?php endif ?>
          </div>