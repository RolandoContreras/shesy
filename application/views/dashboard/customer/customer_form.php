<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Clientes</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/panel';?>">
                          <span class="pcoded-micon"><i data-feather="home"></i></span>
                          </a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/videos';?>">Listado de Clientes</a></li>
                  <li class="breadcrumb-item"><a href="#!">Cliente</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main-body">
          <div class="page-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Datos</h5>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/clientes/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" id="customer_id" name="customer_id" value="<?php echo isset($obj_customer->customer_id)?$obj_customer->customer_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo isset($obj_customer)?$obj_customer->customer_id:"";?>">
                                  </div>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Usuario</label>
                                <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($obj_customer->username)?$obj_customer->username:"";?>" class="input-xlarge-fluid" placeholder="Username">
                              </div>
                              <div class="form-group">
                                  <label>Contraseña</label>
                                  <input class="form-control" type="text" id="password" name="password" value="<?php echo isset($obj_customer->password)?$obj_customer->password:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
                              </div>
                              <div class="form-group">
                                  <label>Nombres</label>
                                  <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo isset($obj_customer->first_name)?$obj_customer->first_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
                              </div>
                                <div class="form-group">
                                  <label>Apellidos</label>
                                  <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo isset($obj_customer->last_name)?$obj_customer->last_name:"";?>" class="input-xlarge-fluid" placeholder="Apellidos">
                              </div>
                              
                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Dirección</label>
                                <textarea class="form-control" name="address" id="address" rows="3"><?php echo isset($obj_customer->address)?$obj_customer->address:"";?></textarea>
                            </div>
                              <label for="inputState">Financiado</label>
                                 <select name="financy" id="financy" class="form-control">
                                    <option value="">[ Seleccionar ]</option>
                                    <option value="1" <?php if(isset($obj_customer)){
                                        if($obj_customer->financy == 1){ echo "selected";}
                                    }else{echo "";} ?>>Si</option>
                                    <option value="0" <?php if(isset($obj_customer)){
                                        if($obj_customer->financy == 0){ echo "selected";}
                                    }else{echo "";} ?>>No</option>
                                </select>
                          </div>
                            
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" value="<?php echo isset($obj_customer->email)?$obj_customer->email:"";?>" class="input-xlarge-fluid" placeholder="Correo Electrónico">
                              </div>
                              <div class="form-group">
                                    <label>DNI</label>
                                    <input class="form-control" type="text" id="dni" name="dni" value="<?php echo isset($obj_customer->dni)?$obj_customer->dni:"";?>" class="input-xlarge-fluid" placeholder="DNI">
                              </div>
                              <div class="form-group">
                                    <label>Telefono</label>
                                    <input class="form-control" type="text" id="phone" name="phone" class="input-small-fluid" placeholder="Telefono" value="<?php echo isset($obj_customer->phone)?$obj_customer->phone:"";?>">
                              </div>
                              <div class="form-group">
                                  <label>BTC Wallet</label>
                                  <input class="form-control" type="text" id="btc_address" name="btc_address" class="input-xlarge-fluid" placeholder="Direccion de BitCoin" value="<?php echo isset($obj_customer->btc_address)?$obj_customer->btc_address:"";?>">
                              </div>
                              <div class="form-group">
                                    <label>Fecha de Activación</label>
                                    <input class="form-control" type="text" id="date_start" name="date_start" class="input-small-fluid" placeholder="YYYY/mm/dd" value="<?php echo isset($obj_customer->date_start)?$obj_customer->date_start:"";?>">
                              </div>
                              <div class="form-group">
                                    <label>Fecha de Creación</label>
                                    <input class="form-control" type="text" id="created_at" name="created_at" class="input-small-fluid" placeholder="Fecha de Creación" value="<?php echo isset($obj_customer->created_at)?$obj_customer->created_at:"";?>" disabled="">
                              </div>
                              
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Pais</label>
                                <select name="pais" id="pais" class="form-control">
                                <option value="">[ Seleccionar ]</option>
                                    <?php foreach ($obj_paises as $value ): ?>
                                <option value="<?php echo $value->id;?>"
                                    <?php 
                                            if(isset($obj_customer->country)){
                                                    if($obj_customer->country==$value->id){
                                                        echo "selected";
                                                    }
                                            }else{
                                                      echo "";
                                            }

                                    ?>><?php echo $value->nombre;?>
                                </option>
                                    <?php endforeach; ?>
                                </select>
                                <br/>
                                <label for="inputState">Kit</label>
                                <select name="kit" id="kit" class="form-control">
                                <option value="">[ Seleccionar ]</option>
                                    <?php foreach ($obj_kit as $value ): ?>
                                <option value="<?php echo $value->kit_id;?>"
                                    <?php 
                                            if(isset($obj_customer->kit_id)){
                                                    if($obj_customer->kit_id==$value->kit_id){
                                                        echo "selected";
                                                    }
                                            }else{
                                                      echo "";
                                            }

                                    ?>><?php echo $value->name;?>
                                </option>
                                    <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Rango</label>
                                    <select name="rango" id="rango" class="form-control">
                                    <option value="">[ Seleccionar ]</option>
                                        <?php foreach ($obj_ranges as $value ): ?>
                                    <option value="<?php echo $value->range_id;?>"
                                        <?php 
                                                if(isset($obj_customer->range_id)){
                                                        if($obj_customer->range_id==$value->range_id){
                                                            echo "selected";
                                                        }
                                                }else{
                                                          echo "";
                                                }

                                        ?>><?php echo str_to_mayusculas($value->name);?>
                                    </option>
                                        <?php endforeach; ?>
                                    </select>
                                <br/>
                                <label for="inputState">Estado</label>
                                    <select name="active" id="active" class="form-control">
                                     <option value="">[ Seleccionar ]</option>
                                      <option value="1" <?php if(isset($obj_customer)){
                                          if($obj_customer->active == 1){ echo "selected";}
                                      }else{echo "";} ?>>Activo</option>
                                      <option value="0" <?php if(isset($obj_kit)){
                                          if($obj_customer->active == 0){ echo "selected";}
                                      }else{echo "";} ?>>Inactivo</option>
                                </select>
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancelar_customer();">Cancelar</button>                    
                    </form>
                </div>
            </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo site_url().'static/cms/js/customer.js'?>"></script>