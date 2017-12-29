<section class="content">
        <div class="container-fluid">
            
            <!-- Basic Card -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste importée <small>Description text here...</small>
                            </h2>
                            
                        </div>
                        
                       <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <?php foreach ($column as $row) {

                                            if($row->COLUMN_NAME != "etat"){
                                         ?>

                                            <th><?= separateNomColumnBase($row->COLUMN_NAME) ?></th>

                                        <?php } 
                                    } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; $a=0; foreach ($data_list as $value) {
                                        if($a >= 5){
                                            $a = 0;
                                        }
                                        $color_temp = $color[$a];
                                     ?>
                                        <tr>
                                            <td><i class="glyphicon glyphicon-plus plus<?= $i?>" style="cursor:pointer" onclick="clickPlus(<?= $i?>)"></i></td>
                                            <?php foreach ($column as $row1) {

                                                if($row1->COLUMN_NAME != "etat"){
                                             ?>

                                                <td><?= $value->__get($row1->COLUMN_NAME)?></td>

                                            <?php }
                                             }?>

                                            
                                            <td></td>
                                        <tr>
                                        
                                            <?php
                                            $pk = $value->__get("primary_key");
                                            if($value->__get("etat") == 0){

                                                $list = getListWithCommentsByidClass($value->__get("nom_table"),$value->__get($pk));

                                                foreach ($list as $list_) { ?>

                                                <tr class="plushide plushide<?= $i?>" style="display:none;background:<?= $color_temp?>">
                                                    <td></td>
                                                    <?php foreach ($column as $row1) {
                                                        if($row1->COLUMN_NAME != "etat"){
                                                     ?>

                                                        <td><?= $value->__get($row1->COLUMN_NAME)?></td>

                                                    <?php } ?>

                                                    <?php } ?>
                                                    <td style="color:red"><?= $list_->__get("commentaire")?></td>
                                                </tr>
                                                <?php }
                                            }?>
                                        
                                    <?php $i++; $a++; } ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>

                
                
            </div>
            <!-- #END# Basic Card -->
            <!-- Basic Card - With Loading <th scope="row"></th>-->
            
            
            <!-- #END# Basic Card - With Loading -->
        </div>
    </section>


<script>
    

    function clickPlus(a){
        var plus = $(".plus" + a);
        var plushide = $(".plushide" + a);
        if(plus.hasClass("open")){
            plushide.hide(500);
            plus.removeClass("open");
            plus.addClass("glyphicon-plus");
            plus.removeClass("glyphicon-minus");
        }
        else{
            plus.addClass("open");
            plushide.show(500);
            plus.removeClass("glyphicon-plus");
            plus.addClass("glyphicon-minus");
        }
    }
</script>