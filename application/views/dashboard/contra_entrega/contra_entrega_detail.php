<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Activaciones</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Activaciones</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main-body">
  <div class="page-wrapper">
    <div class="row">
      <div class="container" id="printTable">
        <div>
          <div class="card">
              <div class="card-header">
                        <h5>Detalle de Compra</h5>
                      </div>
            <div class="row invoice-contact">
              <div class="col-md-4"></div>
            </div>
            <div class="card-block">
              <div class="row invoive-info">
                <div class="col-md-4 col-xs-12 invoice-client-info">
                  <h6>Información de Cliente:</h6>
                  <h6 class="m-0"><?php echo $obj_invoices->first_name." ".$obj_invoices->last_name;?></h6>
                  <p class="m-0 m-t-10"><?php echo $obj_invoices->address;?></p>
                  <p class="m-0"><?php echo $obj_invoices->phone;?></p>
                  <p><?php echo $obj_invoices->email;?></p>
                </div>
                <div class="col-md-4 col-sm-6">
                  <h6>Información de Compra :</h6>
                  <table class="table table-responsive invoice-table invoice-order table-borderless">
                    <tbody>
                      <tr>
                          <th>Fecha :</th>
                        <td><?php echo formato_fecha_barras($obj_invoices->date);?></td>
                      </tr>
                      <tr>
                        <th>Estado :</th>
                        <td>
                            <?php 
                            if($obj_invoices->active == 1){
                                $text = "Pendiente";
                                $style = "label label-warning";
                            }elseif($obj_invoices->active == 2){
                                $text = "Pagado";
                                $style = "label label-success";
                            }else{
                                $text = "Cancelado";
                                $style = "label label-important";
                            }
                            ?>
                            <span class="<?php echo $style?>"><?php echo $text?></span>
                        </td>
                      </tr>
                      <tr>
                        <th>Id Factura :</th>
                        <td>#<?php echo $obj_invoices->invoice_id;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-4 col-sm-6">
                  <h6>Detalle de Envio :</h6>
                  <table class="table table-responsive invoice-table invoice-order table-borderless">
                    <tbody>
                      <tr>
                         <th>Persona a Recibir :</th>
                        <td><?php echo $obj_invoices->contra_name;?></td>
                      </tr>
                      <tr>
                         <th>Teléfono :</th>
                        <td><?php echo $obj_invoices->contra_phone;?></td>
                      </tr>
                      <tr>
                         <th>Dirección :</th>
                        <td><?php echo $obj_invoices->contra_address;?></td>
                      </tr>
                      <tr>
                         <th>Referencia :</th>
                        <td><?php echo $obj_invoices->contra_reference;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table invoice-detail-table">
                      <thead>
                        <tr class="thead-default">
                          <th>Descripción</th>
                          <th>Imagen</th>
                          <th>Cantidad</th>
                          <th>Detalle</th>
                          <th>Importe</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php  foreach ($obj_invoice_catalog as $value) { ?>
                                <tr>
                                  <td>
                                    <h6><?php echo $value->name;?></h6>
                                  </td>
                                  <td>
                                      <img src="<?php echo site_url()."static/catalog/$value->img";?>" width="60">
                                  </td>
                                  <td><?php echo $value->quantity;?><?php echo $value->granel==1?" (Kg)":"";?> </td>
                                  <td><?php echo $value->option;?></td>
                                  <td>&dollar;<?php echo $value->price;?></td>
                                  <td>
                                      <span class="badge badge-pill badge-warning" style="font-size: 100%;">&dollar;<?php echo $value->sub_total;?></span>
                                  </td>
                               </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-responsive invoice-table invoice-total">
                    <tbody>
                      <tr>
                        <th>Sub Total :</th>
                        <td>&dollar;<?php echo $obj_invoices->sub_total;?></td>
                      </tr>
                      <tr>
                        <th>IGV (0%) :</th>
                        <td>&dollar;<?php echo $obj_invoices->igv;?></td>
                      </tr>
                      <tr class="text-info">
                        <td>
                          <hr>
                          <h5 class="text-primary m-r-10">Total :</h5>
                        </td>
                        <td>
                          <hr>
                          <h5 class="text-primary">
                              <span class="badge badge-pill badge-success" style="font-size: 100%;">&dollar;<?php echo $obj_invoices->total;?></span></h5>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-sm-12 invoice-btn-group text-center">
                <button type="button"  onclick="back_list_contra_entrega();" class="btn btn-secondary m-b-10 ">Regresar</button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
            </div>
          </div>
        </div>
</section>
<script src="<?php echo site_url();?>static/cms/js/contra_entrega.js"></script>