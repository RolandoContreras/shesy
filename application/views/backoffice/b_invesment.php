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
                                    <h5 class="m-b-10">Portafolio de Inversión</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Inversiones</a></li>
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
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach ($obj_investment as $value) { ?>
                                                <div class="col-md-6">
                                                    <div class="element-box p-2">
                                                        <div class="card">
                                                            <div class="body pad-materiais" align="center"> 
                                                                <a href="<?php echo site_url() . "static/cms/images/investment/$value->img";?>" data-lightbox="roadtrip">
                                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . "static/cms/images/investment/$value->img";?>">
                                                                </a>
                                                                <p class="titulo-materiais"><?php echo $value->name;?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
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
    <script src="<?php echo site_url(); ?>static/catalog/js/materiales.js"></script>
    <script src="<?php echo site_url() . 'static/backoffice/js/lightbox.js'; ?>"></script>