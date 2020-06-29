          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="h3 mb-0 text-gray-800">Editar de 	<?= $this->Attach['sub_modulo'] ?></h1>

					

          </div>
          <!-- Content Row -->
          <div class="row">
          	<div class="col-sm-12 col-xl-12 col-md-12 card shadow h-100 py-2 p-3">
          		<form action="new_submit" id="form_new" method="POST" accept-charset="utf-8">
          			<?php $data=$this->Attach['data'];
          				for ($i=0; $i < count($data); $i++):
          			?>
          			<?php foreach ($data[$i] as $key => $value): ?>
          			<?php if ($this->Attach['sub_modulo'] <> 'permisos'): ?>
          				<?php if ($key=="id_".$this->Attach['sub_modulo']):?>
          					<input type="number" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>" hidden>
          				<?php endif; ?>
          				<?php if ($key=="titulo"): ?>
          					<div class="col-sm-12 col-xl-12 col-md-12 mt-3 p-3">
	          					<div class="form-group">
		         					<h4>Titulo</h4>
									<input type="text" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>" placeholder="" class="form-control">
								</div>
	         				</div> 
          				<?php endif ?>
          				
	         			<?php if ($this->Attach['sub_modulo'] === 'entradas' || $this->Attach['sub_modulo'] === 'actividades' || $this->Attach['sub_modulo'] <> 'archivos'): ?> 
		         			<?php if ($this->Attach['sub_modulo'] <> 'banner'): ?>
		         			    <div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
		         					<h4>Contenido</h4>
		         					<input type="text" id="validador" hidden value="true">
		         					<textarea id="contenido" name="contenido"></textarea>
		         				</div>
		         				<?php if ($this->Attach['sub_modulo'] <> 'mensajes'): ?>
		         					<?php if ($this->Attach['sub_modulo'] <> 'actividades'): ?>
		         						<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
					         				<h4>Etiquetas</h4>
						         			<input type="text" class="form-control">
		         						</div>
		         					<?php endif ?>
		         					<?php if ($key=="texto" || $key=="descripcion"): ?>
		         						<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
					         				<h4>Descripcion</h4>
					         				<input id="descripcion" name="descripcion" type="text" class="form-control">
				         				</div>
		         					<?php endif ?>
		         				<?php endif ?>
		         						
		         			<?php endif ?>
		         			<?php if ($this->Attach['sub_modulo'] <> 'mensajes'): ?>
		         				<?php if ($key=="texto" || $key=="descripcion"): ?>
		         					<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
					         			<h4>Descripcion</h4>
					         			<input id="<?= $key?>" name="<?= $key?>" value="<?= $value?>" type="text" class="form-control">
				         			</div>
		         				<?php endif ?>
		         				
		         			<?php endif ?>      			
		         			
	         			<?php endif ?>
	         			<div class="row">
	         				<?php if ($this->Attach['sub_modulo'] === 'archivos'): ?>
	         					<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
				         			<h4>Adjuntar Archivo</h4>
				         			<input type="file" id="" name="" class="form-control-file">
		         				</div>
	         				<?php endif ?>
	         				<?php if ($this->Attach['sub_modulo'] === 'entradas' || $this->Attach['sub_modulo'] === 'actividades'): ?>
		         				<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
			         				<h4>Categoria</h4>
			         				<select name="" class="form-control">
			         					<option value="" selected>Seleccione una Categoria</option>
			         				</select>
	         					</div>
	         					<?php if ($this->Attach['sub_modulo'] === 'entradas' || $this->Attach['sub_modulo'] === 'actividades'): ?>
	         						<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
			         					<h4>Imagen Destacada</h4>
			         					<input type="file" id="" name="" class="form-control-file">
	         						</div>
	         					<?php endif ?>
	         				<?php endif ?>
	         			</div>
	         			<?php if ($this->Attach['sub_modulo']==='actividades'): ?>
	         				<div class="row">
	         					<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-4">
			         				<h4>Fecha y hora  de inicio</h4>
			         				<input type="date" name="" id="" placeholder="" class="form-control">
	         					</div>
	         					<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-4">
			         				<h4>fecha y hora de finalizacion</h4>
			         				<input type="date" name="" id=""  placeholder="" class="form-control">
	         					</div>
	         				</div>
	         			<?php elseif($this->Attach['sub_modulo'] === 'entradas' || $this->Attach['sub_modulo'] === 'banner' ): ?>
	         				<div class="row">
	         					<?php if ($key=="banner"): ?>
		         					<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
				         				<h4>Adjuntar Archivo</h4>
				         				<input type="file" id="<?= $key?>" name="<?= $key?>" class="form-control-file">
			         				</div>
			         				<article class="form-group col-sm-6 col-xl-6 col-md-6 mt-1 text-center">
	        								<img src="<?= $this->BaseUrl('/assets/img/'.$value);?>" width="150px" heigth="100px" >
	        						</article>
		         				<?php elseif ($key=="estado"): ?>
		         					<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
		         						<h4>Estado</h4>
			         					<select name="<?= $key?>" id="<?= $key?>" class="form-control">
			         						<option value="NULL" selected>Seleccione una Estado</option>
			         						<?php if ($value == 1): ?>
			         							<option value="1" selected>Publico</option>
			         							<option value="0">Revision</option>
			         						<?php elseif ($value == 0): ?>
			         							<option value="0" selected>Revision</option>
			         							<option value="1">Publico</option>
			         						<?php endif ?>
			         						
			         					</select>
	         						</div>
		         				<?php endif ?>

	         				</div>
	         			<?php endif; ?>
	         		<?php else: ?>
	         			<!-- casos de asignacion de permisos -->
	         			<input type="text" id="validador" hidden value="false">
	         			<div class="row">
	         				<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
	         					<h4>Usuario</h4>
			         			<select id="user_per" name="user_per" class="form-control">
			         				<option value="null" selected>Seleccione un Usuario</option>
			         				<?php foreach ($this->Attach['data']['usuarios'] as $key => $value): ?>
			         					<option value="<?= $value['id_user']?>"><?= $value['name_user']?></option>
			         				<?php endforeach ?>
			         			</select>
	         				</div>
	         			</div>
	         			<div class="row">
	         				<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
	         					<h4>Permisos</h4>
	         					<span id="mensajes"></span>
	         					<?php foreach ($this->Attach['data']['ruta'] as $key => $value): ?>
			         					<label><input type="checkbox" name="<?= $value['modulo']?>" id='<?= $value['modulo']?>' value="<?= $value['id_ruta'] ?>" class="btn"> <?= $value['modulo']?></label><br>
			         			<?php endforeach ?>
	         				</div>
	         			</div>
          			<?php endif; ?>
          			<?php endforeach ?>
          		<?php endfor; ?>
	          		<div class="mt-4 text-center">
	          			<button type="button" id="btn_register" class="btn btn-primary">Editar</button>
	          			<button type="reset" class="btn btn-secondary">Limpiar</button>
	          		</div>
	          		
	          	</form>	      		
          	</div>   
          </div>
          <script src="<?php echo $this->BaseUrl('assets/js/ckeditor/ckeditor.js');?>"></script>
          <script>
          	$(document).ready(function(){
          		var validador = $('#validador').val();
          		let input = new Array();

          		if (validador == 'true') {
          			CKEDITOR.replace( 'contenido', {
						fullPage: true,
						allowedContent: true,
						extraPlugins: 'wysiwygarea'
					});
          		}

          		$('#user_per').change(function() {
					var user= $('#user_per').val();
					if (user== 'null' || user == '') {
						$('#mensajes').html('<div class="alert alert-warning text-center text-warning w-100">Seleccione un usuario valido</div>');
						for (var i = 0; i < input.length; i++) {
							$('#'+input[i]).removeAttr('ckecked');
						}
					} else {
						$.ajax({
		                    type: "POST",
		                    url: "<?php echo _BASE_URL_;?>index.php/admin/inicio/consulta",
		                    data:{user: user},
		                    beforeSend: function(objeto){
		                      setTimeout(function() {
		                        $("#mensaje").html('<div class="alert alert-success text-center text-success w-100">Cargando......</div>');
		        			        },1000);
		        				      setTimeout(function() {
		        				        $("#mensaje").fadeOut(1500);
		        				      },2000);
		                    },
		                    success: function(response){
		                    	if(response==''|| response==null){
		                    		$('#mensajes').html('<div class="alert alert-info text-center text-info w-100">El usuario seleccionado no tiene permisos asignados</div>');
		                    	}else{
		                    		let a = eval('('+response+')');
		                    		for (var i = 0; i < a.length; i++) {
		                    			$('#'+a[i].modulo).attr('checked','true');
		                    			input.push(a[i].modulo);
		                    		}
		                    	}
		                    }
	                	});
					}
				}); 

				$('#btn_register').click(function() {
					var sub_modulo = '<?= $this->Attach['sub_modulo']?>';
					var form = $('#form_new');
					var p = new Array();
					if (sub_modulo == 'permisos') {
						for (var i = 2; i <= 8; i++) {
							var permisos = new Object();
							if (form[0][i].checked) {
								permisos.permisos=form[0][i].value;
								p.push(permisos)
							}
						}
						var user = form[0][1].value;
					}
					$.ajax({
		                type: "POST",
		                url: "<?php echo _BASE_URL_;?>index.php/admin/inicio/register_permisos",
		                data:{user: user, permisos: p},
		                beforeSend: function(objeto){
		                    setTimeout(function() {
		                       $("#mensaje").html('<div class="alert alert-success text-center text-success w-100">Cargando......</div>');
		        		    },1000);
		        		    setTimeout(function() {
		        		        $("#mensaje").fadeOut(1500);
		        		    },2000);
		                },
		                success: function(response){
		                   if(response==''|| response==null){
		                   		$('#mensajes').html('<div class="alert alert-success text-center text-success w-100">Algo salio mal por favor verifique los datos</div>');
		                   	}else{
		             			$('#mensajes').html('<div class="alert alert-success text-center text-success w-100">'+response+'</div>');
		                    }
		                }
	                });

					
				});
			});
		</script>