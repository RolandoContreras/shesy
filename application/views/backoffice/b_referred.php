<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content"> 
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Red</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Referidos Directos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-xl-2">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Kits - Posición</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <img src="<?php echo site_url().'static/backoffice/images/plan/libre1.png';?>" width="70"> <?php echo $obj_total->total_posicion;?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-2">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Kits - RETO IMPARABLE</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <img src="<?php echo site_url().'static/backoffice/images/plan/pack_1.png';?>" width="70"> <?php echo $obj_total->total_pack_1;?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-2">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Kits - PACK EMBAJADOR</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <img src="<?php echo site_url().'static/backoffice/images/plan/pack_2.png';?>" width="70"> <?php echo $obj_total->total_pack_2;?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Mis Directos</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="table" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="text-center sorting_desc" tabindex="0" rowspan="1" colspan="1"> Usuario </th>
                                                                    <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Datos </th>
                                                                    <th class="text-center sorting" rowspan="1" colspan="1"> Fecha Registro </th>
                                                                    <th class="text-center sorting" rowspan="1" colspan="1"> Fecha Activación </th>
                                                                    <th class="text-center sorting" rowspan="1" colspan="1"> Estado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($obj_referidos as $value) { ?>
                                                                    <tr role="row " class="odd ">
                                                                        <td align="center">
                                                                            <span class="lighter"><?php echo $value->username;?></span>
                                                                        </td>
                                                                        <td align="center"> 
                                                                            <?php echo $value->first_name." ".$value->last_name?>
                                                                        </td>
                                                                        <td align="center"> 
                                                                            <span><?php echo !empty($value->created_at)?formato_fecha_barras($value->created_at):"---"; ?></span><br> 
                                                                        </td>
                                                                        <td align="center"> 
                                                                            <span><?php echo !empty($value->date_start)?formato_fecha_barras($value->date_start):"---"; ?></span><br> 
                                                                        </td>
                                                                        <td align="center">
                                                                             <?php 
                                                                                if($value->active == 1){ ?>
                                                                                        <a class="badge badge-success-inverted text_status">Activo</a>
                                                                                <?php }else{ ?>
                                                                                        <a class="badge badge-danger">Inativo</a> 
                                                                                <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr><th rowspan="1" class="text-center" colspan="1">Usuario</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Datos</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Fecha Registro</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Fecha Activación</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Estado</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
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
</div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').dataTable({
            "order": [[0, "desc"]]
        });
    });
</script>