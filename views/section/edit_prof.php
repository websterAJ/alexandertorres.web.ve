
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Editar Perfil</h6>
            </div>
            <div class="card-body">
              <span id="mensaje"></span>
              <form id='form_edit' method="POST" enctype="multipart/form-data" action="<?php echo _BASE_URL_;?>index.php/admin/perfil/edit">
                <div class="row">
                  <?php foreach ($this->Attach['edit_prof'] as $key => $value): ?>
                      <?php switch ($key) {
                          case 'id_user':
                            echo "<input type='number' name='id_user' id='id_user' value='$value' hidden>";
                          break;
                         case 'name_user':
                            echo '<div class="form-group col-6 col-md-6 col-xl-6">';
                            echo '<label for="">Usuario</label>';
                            echo '<input type="text" id="name_user"  name="name_user" class="form-control" value="'.$value.'">';
                            echo '</div>';
                          break;

                          case 'forgot_pass':
                            echo '<div class="form-group col-6 col-md-6 col-xl-6">';
                            echo '<label for="">Clave</label>';
                            echo '<input type="password" id="forgot_pass"  name="forgot_pass" class="form-control" value="'.$value.'">';
                            echo '</div>';
                          break;

                          case'type_user':
                            echo '<div class="form-group col-6 col-md-6 col-xl-6">';
                            echo '<label for="">Tipo</label>';
                            echo '<select name="type_user" id="type_user" class="form-control">';
                              if ($value==1) {
                                echo "<option value='1' selected>Administrador</option>";
                                echo "<option value='0'>Standar</option>";
                              }else{
                                echo "<option value='0' selected>Standar</option>";
                              }
                            echo '</select>';
                            echo '</div>';
                          break;

                          case 'email_user':
                            echo '<div class="form-group col-6 col-md-6 col-xl-6">';
                            echo '<label for="">Correo</label>';
                            echo '<input type="text" id="email_user"  name="email_user" class="form-control" value='.$value.'>';
                            echo '</div>'; 
                          break;

                          case 'statud_user':
                            echo '<div class="form-group col-6 col-md-6 col-xl-6">';
                            echo '<label for="">Status</label>';
                            echo '<select id="statud_user"  name="statud_user" class="form-control">';
                            if($value==1){
                              echo "<option value='1' selected>activo</option>";
                              echo "<option value='0'>inactivo</option>";
                            }else{
                              echo "</option value='0' selected>inactivo</option>";
                            }
                            echo '</select>';
                            echo '</div>';
                          break;

                          case 'avatar':
                            echo '<div class="form-group col-6 col-md-6 col-xl-6 text-center">';
                            echo "<img class='img-profile' width='150' height='150' src='".$this->BaseUrl('uploads/avatar/'.$value)."'><br>";
                            echo '<label for="">Avatar</label>';
                            echo '<input type="file" id="avatar"  name="avatar" class="btn form-control-file">';
                            echo '</div>';
                          break;
                      } ?>                    
                  <?php endforeach ?>
                </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary text-center" id="btn_edit" data-ajax='true'>Editar</button>
              </div>
            </form>
          </div>