          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Panel Administrativo</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Usuario</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            
            <div class="table-responsive card shadow h-100 py-2 p-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php for ($i=0; $i < COUNT($this->Attach['data']); $i++):?>
                  <?php if($i==0): ?>
                    <thead>
                      <tr class='text-center'>
                        <?php foreach ($this->Attach['data'][$i] as $key => $value):?>
                            <?php if ($key=='id') :?>
                              <th>#</th> 
                            <?php else: ?>
                              <th><?= translate::msg($key) ?></th>  
                            <?php endif; ?>               
                        <?php endforeach; ?>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class='text-center'>
                        <?php foreach ($this->Attach['data'][$i] as $key => $value):?>
                              <?php if ($key=='id') :?>
                                <th>#</th> 
                              <?php else: ?>
                                <th><?= translate::msg($key) ?></th>  
                              <?php endif; ?>              
                        <?php endforeach; ?>
                        <th>Accion</th>
                      </tr>
                    </tfoot>
                  <?php endif; ?>
                    <tbody>
                      <tr>
                        <?php foreach ($this->Attach['data'][$i] as $key => $value):?>
                          <th class="text-center">
                          <?php 
                                if ($key=='pass_user') {
                                  echo str_replace($value,"********",$value);
                                } elseif ($key=='rol') {
                                    if ($value=='1') {
                                        echo '<span class="badge badge-success">Administrador</span>';
                                    } else {
                                        echo '<span class="badge badge-info">Standar</span>';
                                    }
                                    
                                } elseif ($key=='condicion') {
                                    if ($value=='1') {
                                        echo '<span class="badge badge-success">Activo</span>';
                                    } else {
                                        echo '<span class="badge badge-info">Inactivo</span>';
                                    }

                                }else {
                                  echo "$value";
                                }
                           ?>
                           </th>    
                        <?php endforeach; ?>
                        <?php foreach ($this->Attach['data'][$i] as $key => $value):?>
                          <?php if ($key=='id'): ?>
                            <th class="text-center center"> 
                              <div class="btn-group center">
                                  <a href="#" onclick="editar('usuarios','<?= $this->Attach['data'][$i]['id'] ?>');" class="btn btn-sm btn-outline"><span class="fas fa-edit text-black-50 "></span> Editar</a>
                                  <a href="#" onclick="eliminar('usuarios','<?= $this->Attach['data'][$i]['id'] ?>');" class="btn btn-sm btn-outline"><span class="fas fa-trash  text-black-50 "></span> Eliminar</a>
                              </div>
                            </th>
                          <?php endif ?>
                          
                         <?php endforeach; ?>
                      </tr>
                    </tbody>
                  
                <?php endfor; ?>
              </table>
            </div>

          </div>
