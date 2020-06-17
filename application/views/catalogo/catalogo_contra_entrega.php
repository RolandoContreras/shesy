<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Mis Pedido</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a>Compras</a></li>
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
                                        <h5>Contra Entrega</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid"
                                                               aria-describedby="zero-configuration_info">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                                                        aria-label="Office: activate to sort column ascending">Nombre</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                                                        aria-label="Office: activate to sort column ascending">Cantidad (Kg)</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                                                        aria-label="Age: activate to sort column ascending">Precio</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                                                        aria-label="Age: activate to sort column ascending">Sub Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1; ?>
                                                                <?php foreach ($this->cart->contents() as $items): ?>
                                                                    <tr>
                                                                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                                                        <td><?php echo $items['name']; ?></td>
                                                                        <td>
                                                                            <?php echo format_number_miles($this->cart->format_number($items['qty'])); ?>
                                                                        </td>
                                                                        <td>S/. <?php echo $this->cart->format_number($items['price']); ?></td>
                                                                        <th>
                                                                            s/.<?php echo $this->cart->format_number($items['subtotal']); ?>
                                                                        </th>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                <tr>
                                                                    <th></th>
                                                                    <th><b>TOTAL</b></th>
                                                                    <th class="text-c-purple">
                                                                        <span class="badge badge-pill badge-success" style="font-size: 100%;">
                                                                            S/. <?php echo $this->cart->format_number($this->cart->total()); ?>
                                                                        </span>

                                                                    </th>
                                                                    <th></th>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <form name="entrega" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="procesar_contra_entrega();">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Persona a Recibir</label>
                                                                                <input class="form-control" type="text" id="name" name="name" class="input-xlarge-fluid" placeholder="Ingrese Nombre" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Teléfono</label>
                                                                                <input class="form-control" type="text" id="phone" name="phone" class="input-xlarge-fluid" placeholder="Ingrese Teléfono" required>
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
                                                                        <div class="form-group col-md-12">
                                                                            <div class="form-group">
                                                                                <button id="save_entrega" type="submit" class="btn btn-success">Solicitar Pedido &nbsp;&nbsp;<i data-feather="user-check"></i></button>
                                                                                <button class="btn btn-success"  type="button" style="display: none;" id="spinner_entrega">
                                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                                    Procesando ...
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="card-block text-center">

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
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo site_url(); ?>static/catalog/js/contra_entrega.js"></script>