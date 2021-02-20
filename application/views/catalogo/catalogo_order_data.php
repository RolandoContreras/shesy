  <section class="pcoded-main-container">
    <div class="pcoded-wrapper">
      <div class="pcoded-content">
        <div class="pcoded-inner-content">
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Mi Compra</h5>
                  </div>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'course';?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a>Información Adicional</a></li>
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
              <div class="card-block">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table invoice-detail-table">
                        <thead>
                          <tr class="thead-default">
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>
                                <h6><?php echo $obj_invoice_catalog->name;?></h6>
                              </td>
                              <td><?php echo $obj_invoice_catalog->quantity;?></td>
                              <td>&dollar;<?php echo $obj_invoice_catalog->price;?></td>
                              <td>&dollar;<b><?php echo $obj_invoice_catalog->sub_total;?></b></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-header">
                <form name="data_adicional" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="procesar_data_landing();">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label>Persona a Recibir</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Ingrese Nombre" required="">
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control" type="text" id="phone" name="phone" placeholder="Ingrese Teléfono" required="">
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <textarea name="address" id="address" placeholder="Ingrese Dirección" class="form-control" required=""></textarea>
                            </div>    
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label>Referencia</label>
                                <textarea name="reference" id="reference" class="form-control" placeholder="Ingrese Dirección" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <div class="alert alert-info">
                                    Luego de hacer el pedido el personal de la empresa se estará comunicando con usted para corroborar los datos y hacer entregar del producto solicitado.
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="invoice_id" value="<?php echo $invoice_id;?>"/>
                        <input type="hidden" name="invoice_catalog_id" value="<?php echo $obj_invoice_catalog->invoice_catalog_id;?>"/>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <button type="button" onclick="back_list();" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg> Regresar</button>
                                <button id="save_entrega" type="submit" class="btn btn-success">Solicitar Pedido &nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></button>
                            </div>
                        </div>
                    </div>
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
  </section>
    <script src="<?php echo site_url();?>static/catalog/js/order.js"></script>