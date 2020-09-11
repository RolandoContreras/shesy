<link rel="stylesheet" href="<?php echo site_url() . 'static/backoffice/css/tree.css'; ?>">
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Mi Red</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Arbol Unilevel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Personas total en Red*</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-users text-c-green f-30 m-r-10"></i>
                                                </h3>
                                            </div>
                                            <div class="col-3 text-right">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <?php echo $obj_total_referidos; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Personas Directas * </h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-user-plus text-c-green f-30 m-r-10"></i>
                                                </h3>
                                            </div>
                                            <div class="col-3 text-right">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <?php echo $obj_total_direct; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 100%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card" style="width: 1002%;overflow: auto">
                                    <div class="card-header">
                                        <h5>Mi Red Unilevel</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="tree-family" style="width: 1002%;">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <!-- /.box-header -->
                                                            <div class="tree" style="width: 10000%;">
                                                                    <ul class="arvore">
                                                                        <li style="float: none !important;">
                                                                            <div align="center">
                                                                                <!------------->
                                                                                <!--//NIVEL 1-->
                                                                                <!------------->
                                                                                <ul class="init" style="">
                                                                                    <li>
                                                                                        <?php
                                                                                            if ($obj_customer->active_month == 1) {
                                                                                                $text = "<div class='value badge badge-pill badge-success'> Activo </div>";
                                                                                            } else {
                                                                                                $text = "<div class='value badge badge-pill badge-danger'> Inactivo </div>";
                                                                                            }
                                                                                            ?>
                                                                                        <!-- Meu Usuario -->
                                                                                        <a href="javascript:void(0);" data-html="true" data-toggle="tooltip" data-placement="right" data-original-title="&lt;b&gt;Nombre:&lt;/b&gt; <?php echo $obj_customer->first_name . " " . $obj_customer->last_name; ?> &lt;br&gt; &lt;b&gt;&lt;b&gt;Kit:&lt;/b&gt; <?php echo $obj_customer->kit; ?> &lt;br&gt; Estado:&lt;/b&gt; <?php echo $text; ?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                                            <img src="<?php echo site_url()."static/backoffice/images/plan/$obj_customer->img";?>" width="70"/>
                                                                                        </a>
                                                                                        <!------------->
                                                                                        <!--//NIVEL 2-->
                                                                                        <!------------->
                                                                                        <?php if (count($obj_customer_n2) > 0) { ?>
                                                                                            <ul>
                                                                                                <?php
                                                                                                foreach ($obj_customer_n2 as $value) {
                                                                                                    if ($value->active_month == 1) {
                                                                                                        $text_2 = "<div class='value badge badge-pill badge-success'> Activo </div>";
                                                                                                    } else {
                                                                                                        $text_2 = "<div class='value badge badge-pill badge-danger'> Inactivo </div>";
                                                                                                    }
                                                                                                    ?>
                                                                                                    <li>
                                                                                                        <a href="<?php echo site_url() . 'backoffice/unilevel/' . encrypt($value->customer_id); ?>" data-html="true" data-toggle="tooltip" data-placement="right" data-original-title="&lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value->first_name . " " . $value->last_name; ?> &lt;br&gt; &lt;b&gt;&lt;b&gt;Kit:&lt;/b&gt; <?php echo $value->kit; ?> &lt;br&gt; Estado:&lt;/b&gt; <?php echo $text_2; ?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                                                            <img src="<?php echo site_url()."static/backoffice/images/plan/$value->img";?>" width="70"/>
                                                                                                        </a>
                                                                                                        <!------------->
                                                                                                        <!--//NIVEL 3-->
                                                                                                        <!------------->
                                                                                                        <?php if (count($obj_customer_n3) > 0) {
                                                                                                            ?>
                                                                                                            <ul class="d-sm-block">
                                                                                                                <?php
                                                                                                                foreach ($obj_customer_n3 as $value3) {
                                                                                                                    if ($value3->active_month == 1) {
                                                                                                                        $text_3 = "<div class='value badge badge-pill badge-success'> Activo </div>";
                                                                                                                    } else {
                                                                                                                        $text_3 = "<div class='value badge badge-pill badge-danger'> Inactivo </div>";
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                    <?php if ($value->customer_id == $value3->parend_id) { ?>
                                                                                                                        <li>
                                                                                                                            <a href="<?php echo site_url() . 'backoffice/unilevel/' . encrypt($value3->customer_id); ?>" data-html="true" data-toggle="tooltip" data-placement="right" data-original-title="&lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value3->first_name . " " . $value3->last_name; ?> &lt;br&gt; &lt;b&gt;&lt;b&gt;Kit:&lt;/b&gt; <?php echo $value3->kit; ?> &lt;br&gt; Estado:&lt;/b&gt; <?php echo $text_3; ?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                                                                                    <img src="<?php echo site_url()."static/backoffice/images/plan/$value3->img";?>" width="70"/>
                                                                                                                            </a>
                                                                                                                            <!------------->
                                                                                                                            <!--//NIVEL 4-->
                                                                                                                            <!------------->
                                                                                                                            <?php if (count($obj_customer_n4) > 0) { ?>
                                                                                                                                <ul class="d-sm-block">
                                                                                                                                    <?php
                                                                                                                                    foreach ($obj_customer_n4 as $value4) {
                                                                                                                                        if ($value4->active_month == 1) {
                                                                                                                                            $text_4 = "<div class='value badge badge-pill badge-success'> Activo </div>";
                                                                                                                                        } else {
                                                                                                                                            $text_4 = "<div class='value badge badge-pill badge-danger'> Inactivo </div>";
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                        <?php if ($value3->customer_id == $value4->parend_id) { ?>
                                                                                                                                            <li>
                                                                                                                                                <a href="<?php echo site_url() . 'backoffice/unilevel/' . encrypt($value4->customer_id); ?>" data-html="true" data-toggle="tooltip" data-placement="right" data-original-title="&lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value4->first_name . " " . $value4->last_name; ?> &lt;br&gt; &lt;b&gt;&lt;b&gt;Kit:&lt;/b&gt; <?php echo $value4->kit; ?> &lt;br&gt; Estado:&lt;/b&gt; <?php echo $text_4; ?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                                                                                                    <img src="<?php echo site_url()."static/backoffice/images/plan/$value4->img";?>" width="70"/>
                                                                                                                                                </a>
                                                                                                                                                <!------------->
                                                                                                                                                <!--//NIVEL 5-->
                                                                                                                                                <!------------->
                                                                                                                                                <?php if (count($obj_customer_n5) > 0) { ?>
                                                                                                                                                    <ul class="d-sm-block">
                                                                                                                                                        <?php
                                                                                                                                                        foreach ($obj_customer_n5 as $value5) {
                                                                                                                                                            if ($value5->active_month == 1) {
                                                                                                                                                                $text_5 = "<div class='value badge badge-pill badge-success'> Activo </div>";
                                                                                                                                                            } else {
                                                                                                                                                                $text_5 = "<div class='value badge badge-pill badge-danger'> Inactivo </div>";
                                                                                                                                                            }
                                                                                                                                                            ?>
                                                                                                                                                            <?php if ($value4->customer_id == $value5->parend_id) { ?>
                                                                                                                                                                <li>
                                                                                                                                                                    <a href="<?php echo site_url() . 'backoffice/unilevel/' . encrypt($value5->customer_id); ?>" data-html="true" data-toggle="tooltip" data-placement="right" data-original-title="&lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value5->first_name . " " . $value5->last_name; ?> &lt;br&gt; &lt;b&gt;&lt;b&gt;Kit:&lt;/b&gt; <?php echo $value5->kit; ?> &lt;br&gt; Estado:&lt;/b&gt; <?php echo $text_5; ?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                                                                                                                            <img src="<?php echo site_url()."static/backoffice/images/plan/$value5->img";?>" width="70"/>
                                                                                                                                                                    </a>
                                                                                                                                                                    <!------------->
                                                                                                                                                                    <!--//NIVEL 6-->
                                                                                                                                                                    <!------------->
                                                                                                                                                                    <?php if (count($obj_customer_n6) > 0) { ?>
                                                                                                                                                                        <ul class="d-sm-block">
                                                                                                                                                                            <?php
                                                                                                                                                                            foreach ($obj_customer_n6 as $value6) {
                                                                                                                                                                                if ($value6->active_month == 1) {
                                                                                                                                                                                    $text_6 = "<div class='value badge badge-pill badge-success'> Activo </div>";
                                                                                                                                                                                } else {
                                                                                                                                                                                    $text_6 = "<div class='value badge badge-pill badge-danger'> Inactivo </div>";
                                                                                                                                                                                }
                                                                                                                                                                                ?>
                                                                                                                                                                                <?php if ($value5->customer_id == $value6->parend_id) { ?>
                                                                                                                                                                                    <li>
                                                                                                                                                                                        <a href="<?php echo site_url() . 'backoffice/unilevel/' . encrypt($value6->customer_id); ?>" data-html="true" data-toggle="tooltip" data-placement="right" data-original-title="&lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value6->first_name . " " . $value6->last_name; ?> &lt;br&gt; &lt;b&gt;&lt;b&gt;Kit:&lt;/b&gt; <?php echo $value6->kit; ?> &lt;br&gt; Estado:&lt;/b&gt; <?php echo $text_6; ?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                                                                                                                                            <img src="<?php echo site_url()."static/backoffice/images/plan/$value6->img";?>" width="70"/>
                                                                                                                                                                                        </a>
                                                                                                                                                                                    </li>
                                                                                                                                                                                <?php } ?>
                                                                                                                                                                            <?php } ?>
                                                                                                                                                                        </ul>
                                                                                                                                                                    <?php } ?>
                                                                                                                                                                </li>
                                                                                                                                                            <?php } ?>
                                                                                                                                                        <?php } ?>
                                                                                                                                                    </ul>
                                                                                                                                                <?php } ?>
                                                                                                                                            </li>
                                                                                                                                        <?php } ?>
                                                                                                                                    <?php } ?>
                                                                                                                                </ul>
                                                                                                                            <?php } ?>
                                                                                                                        </li>
                                                                                                                    <?php } ?>
                                                                                                                <?php } ?>
                                                                                                            </ul>
                                                                                                        <?php } ?>
                                                                                                    </li>                                
                                                                                                <?php } ?>
                                                                                            </ul>
                                                                                        <?php } ?>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
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