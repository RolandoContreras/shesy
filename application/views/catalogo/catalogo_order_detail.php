  <section class="pcoded-main-container">
    <div class="pcoded-wrapper">
      <div class="pcoded-content">
        <div class="pcoded-inner-content">
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Listado</h5>
                  </div>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'course';?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a>Productos Todos</a></li>
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
            <div class="row invoice-contact">
              <div class="col-md-4"></div>
            </div>
            <div class="card-block">
              <div class="row invoive-info">
                <div class="col-md-4 col-xs-12 invoice-client-info">
                  <h6>Información de Cliente:</h6>
                  <h6 class="m-0">Josephin Villa</h6>
                  <p class="m-0 m-t-10">1065 Mandan Road, Columbia MO, Missouri. (123)-65202</p>
                  <p class="m-0">(1234) - 567891</p>
                  <p>demo@gmail.com</p>
                </div>
                <div class="col-md-4 col-sm-6">
                  <h6>Información de Compra :</h6>
                  <table class="table table-responsive invoice-table invoice-order table-borderless">
                    <tbody>
                      <tr>
                          <th>Fecha :<?php echo formato_fecha_barras($obj_invoice_catalog->date);?></th>
                        <td>November 14</td>
                      </tr>
                      <tr>
                        <th>Estado :</th>
                        <td>
                            <span class="label label-warning">Pending</span>
                        </td>
                      </tr>
                      <tr>
                        <th>Id :</th>
                        <td>#146859</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-4 col-sm-6">
                  <h6 class="m-b-20">Número de Factura <span>#123685479624</span></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table invoice-detail-table">
                      <thead>
                        <tr class="thead-default">
                          <th>Description</th>
                          <th>Quantity</th>
                          <th>Amount</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <h6>Logo Design</h6>
                            <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                          </td>
                          <td>6</td>
                          <td>$200.00</td>
                          <td>$1200.00</td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Logo Design</h6>
                            <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                          </td>
                          <td>7</td>
                          <td>$100.00</td>
                          <td>$700.00</td>
                        </tr>
                        <tr>
                          <td>
                            <h6>Logo Design</h6>
                            <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                          </td>
                          <td>5</td>
                          <td>$150.00</td>
                          <td>$750.00</td>
                        </tr>
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
                        <td>$4725.00</td>
                      </tr>
                      <tr>
                        <th>Taxes (10%) :</th>
                        <td>$57.00</td>
                      </tr>
                      <tr>
                        <th>Discount (5%) :</th>
                        <td>$45.00</td>
                      </tr>
                      <tr class="text-info">
                        <td>
                          <hr>
                          <h5 class="text-primary m-r-10">Total :</h5>
                        </td>
                        <td>
                          <hr>
                          <h5 class="text-primary">$4827.00</h5>
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
                <!--<button type="button" class="btn btn-primary btn-print-invoice m-b-10">Print</button>-->
                <button type="button"  onclick="back_list();" class="btn btn-secondary m-b-10 ">Regresar</button></div>
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