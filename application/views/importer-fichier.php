
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
            </div>
            <!-- Basic Card -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Importation de fichier <small>Description text here...</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="input-group">
                                <div class="form-line">
                                    <select id="table_" name="table_" class="form-control show-tick">
                                        <option value="">Veuillez selectionner une table </option>
                                        <?php foreach ($exp_table as $row) { ?>
                                            <option name="<?= $row->id_exp_table ?>"><?= $row->nom_exp_table ?></option>
                                        <?php }?>
                                        
                                    </select>
                                </div>
                            </div>
                            <form action="<?= base_url('index.php/Dropzone/upload')?>" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                    <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                                </div>
                                <div class="fallback">
                                    <input name="file" id="file" type="file" multiple />
                                </div>
                                <br><br>
                                <input type="hidden" id="table" name="table" value="">
                                <input type="hidden" id="file_name" name="file_name" value="">
                            </form>
                            <div class="col-sm-offset-4 col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect custom-button importer" id="button-importe" type="submit">IMPORTER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix js-sweetalert" style="display:none">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <button class="btn btn-primary waves-effect" id="erreur" data-type="with-title">CLICK ME</button>
                    </div>
                </div>
                
            </div>
            <!-- #END# Basic Card -->
            <!-- Basic Card - With Loading -->
            
            
            <!-- #END# Basic Card - With Loading -->
        </div>
    </section>
<script src="<?= plugins_url('jquery/jquery.min.js')?>"></script>
<script src="<?= plugins_url('bootstrap/js/bootstrap.js')?>"></script>
<script src="<?= js_url('pages/ui/dialogs.js')?>"></script>
<script src="<?= js_url('admin.js')?>"></script>
<script src="<?= plugins_url('sweetalert/sweetalert.min.js')?>"></script>


<script type="text/javascript">
    $(document).ready(function(){


        $("#button-importe").click(function (){
            var conceptName = $('#table_').find(":selected").val();
            $("#table").val(conceptName);
            if(conceptName != ""){
                $("#frmFileUpload").removeAttr("action");
                $("#frmFileUpload").attr("action","<?php echo base_url('index.php/ImporterFichier/validerFichier') ?>");
                $("#file_name").val($(".dz-filename span").html());
                $("#frmFileUpload").submit();
            }
            else{
                $("#erreur").click();
            }
        });
        $("#erreur").click(function (){
            $(".sweet-alert h2").html("Veuillez selectionner une table");
            $(".sweet-alert p").html("");
        });
        

    })
</script>