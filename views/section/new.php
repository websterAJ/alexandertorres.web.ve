          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          	<?php if ($this->Attach['sub_modulo'] === 'mensajes'): ?>
          		<h1 class="h3 mb-0 text-gray-800">Nuevo <?= $this->Attach['sub_modulo'] ?></h1>
          	<?php else: ?>
            	<h1 class="h3 mb-0 text-gray-800">Registro de 	<?= $this->Attach['sub_modulo'] ?></h1>
            <?php endif ?>
          </div>
          <!-- Content Row -->
          <div class="row">
          	<div class="col-sm-12 col-xl-12 col-md-12 card shadow h-100 py-2 p-3">
				  <form enctype="multipart/form-data" id="form_new" method="POST"  accept-charset="utf-8">
					<input type="text" hidden id="sub_modulo" name="sub_modulo" value="<?php echo $this->Attach['sub_modulo']?>">
					<?php if ($this->Attach['sub_modulo'] == 'Articulo'):?>
						<div class="col-sm-12 col-xl-12 col-md-12 mt-3 p-3">
          					<div class="form-group">
	         					<h4>Titulo</h4>
								<input type="text" id="nombre" name="nombre" value="" placeholder="" class="form-control">
							</div>
						</div>
						<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
							<h4>Descripcion</h4>
							<input type="text" id="validador" hidden value="true">
							<textarea id="descripcion" name="descripcion"></textarea>
						</div>
						<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
							<h4>Contenido</h4>
							<textarea id="contenido" name="contenido"></textarea>
						</div>
						<div class="row">
							<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
								<h4>Categoria</h4>
								<select id="categoria" name="categoria" class="form-control">
									<option value="null" selected>Seleccione una Categoria</option>
										<?php foreach ($this->Attach['data']['categoria'] as $value): ?>
											<option value="<?= $value['id'] ?>" ><?= $value['nombre'] ?></option>
										<?php endforeach ?>
								</select>
							</div>
							<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
								<h4>Estado</h4>
								<select name="estado" id="estado" class="form-control">
									<option value="NULL" selected>Seleccione una Estado</option>
									<option value="1">Publico</option>
									<option value="0">Revision</option>
								</select>
							</div>
						</div>
						<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
							<h4>Imagen Destacada</h4>
							<input type="file" id="imagen" name="imagen" class="form-control-file">
							<input type="hidden" name="tipo" id="tipo" value="1">
							<input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>">
						</div>
						
					<?php elseif ($this->Attach['sub_modulo'] == 'Proyecto'):?>
						<div class="col-sm-12 col-xl-12 col-md-12 mt-3 p-3">
          					<div class="form-group">
	         					<h4>Titulo</h4>
								<input type="text" id="titulo" name="titulo" value="" placeholder="" class="form-control">
							</div>
						</div>
						<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
							<h4>Descripcion</h4>
							<input type="text" id="validador" hidden value="true">
							<textarea id="descripcion" name="descripcion"></textarea>
						</div>
						<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
							<h4>Repositorio</h4>
							<input id="repositorio" name="repositorio" type="text" class="form-control">
						</div>
					<?php elseif ($this->Attach['sub_modulo'] === 'mensajes'): ?>
						<div class="col-sm-12 col-xl-12 col-md-12 p-3">
							<div class="form-group">
								<h4>Destino</h4>
								<input type="email" id="email" name="email" value="" placeholder="" class="form-control">
							</div>
						</div>
						<div class="form-group col-sm-12 col-xl-12 col-md-12 mt-1">
							<h4>Contenido</h4>
							<textarea id="contenido" name="contenido"></textarea>
						</div>
						<div class="form-group col-sm-6 col-xl-6 col-md-6 mt-1">
							<h4>Adjuntar Archivo</h4>
							<input type="file" id="archivo" name="archivo" class="form-control-file">
						</div>	
					<?php elseif ($this->Attach['sub_modulo'] === 'categoria'): ?>
						<div class="col-sm-12 col-xl-12 col-md-12 p-3">
							<div class="form-group">
								<h4>Nombre de la categoria</h4>
								<input type="text" id="nombre" name="nombre" value="" placeholder="" class="form-control">
							</div>
						</div>
					<?php elseif ($this->Attach['sub_modulo'] === 'permisos'): ?>
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
	          		<div class="mt-4 text-center">
	          			<?php if ($this->Attach['sub_modulo'] === 'mensajes'): ?>
	          				<button type="submit" id="btn_register" class="btn btn-primary">Enviar</button>
	          			<?php else: ?>
	          				<button type="submit" id="btn_register" class="btn btn-primary">Registrar</button>
	          			<?php endif ?>
	          			<button type="reset" id="btn_reset" class="btn btn-secondary">Limpiar</button>
	          		</div>
	          	</form>	      		
          	</div>   
          </div>
		  <script>
          	$(document).ready(function(){
          		$('#fecha_inicio').datetimepicker();
          		$('#fecha_final').datetimepicker();
          		var validador = $('#validador').val();
          		let input = new Array();
          		
          		if (validador == 'true') {
					CKEDITOR.replace( 'contenido', {
						fullPage: false,
						allowedContent: true,
						extraPlugins: 'wysiwygarea',
						lang: 'es',
						ignoreEmptyParagraph: true,
						enterMode: CKEDITOR.ENTER_BR,
						filebrowserUploadUrl: '<?php echo $this->BaseUrl('index.php/dashboard/upload/');?>',
        				filebrowserUploadMethod: 'form'
					});
					CKEDITOR.replace( 'descripcion', {
						fullPage: false,
						allowedContent: true,
						extraPlugins: 'wysiwygarea',
						lang: 'es',
						ignoreEmptyParagraph: false,
						enterMode: CKEDITOR.ENTER_BR
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
		                    url: "<?php echo _BASE_URL_;?>index.php/dashboard/consulta",
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
				$('#form_new').submit(function(event){
					event.preventDefault();
					var formData = new FormData(this);
					var subModulo ="<?= $this->Attach['sub_modulo']?>";

					if(CKEDITOR.instances['contenido'] !== undefined){
						formData.append("contenido", CKEDITOR.instances['contenido'].getData());
					}

					if(CKEDITOR.instances['descripcion'] !== undefined){
						formData.append("descripcion", CKEDITOR.instances['descripcion'].getData());
					}
						
					formData.append("sub_modulo", subModulo);
					
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
					}else{
						$.ajax({
		                    type: "POST",
		                    url: "<?php echo _BASE_URL_;?>index.php/dashboard/insert",
		                    data:formData,
		                    cache:false,
						    contentType: false,
						    processData: false,
		                    beforeSend: function(objeto){
		                      setTimeout(function() {
		                        $("#mensaje").html('<div class="alert alert-success text-center text-success w-100">Cargando......</div>');
		        			        },1000);
		        				      setTimeout(function() {
		        				        $("#mensaje").fadeOut(1500);
		        				      },2000);
		                    },
		                    success: function(response){
		                    	console.log(response);
		                    	$("#mensaje").html('<div class="alert alert-success text-center text-success w-100">'+response+'</div>');
		                    	$("#mensaje").fadeOut(1500);
		                    }
	                	});				
					}
					
				});
			});
		</script>