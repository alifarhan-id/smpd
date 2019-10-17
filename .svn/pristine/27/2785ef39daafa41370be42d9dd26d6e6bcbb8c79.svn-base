<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Block Piutang</span>
        </li>
    </ul> 
</div>
<script type="text/javascript">

</script>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Status</label>
                    <div class="input-group col-md-2">
                        <select class="form-control" id="status">
                            <option value="">--- Pilih Status ---</option>
                            <option value="T">BLOCK</option>
                            <option value="F">BUKA BLOCK</option>
                        </select>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Alasan</label>
                    <div class="input-group col-md-5">
                        <textarea class="form-control required" id="alasan" rows="5"></textarea>  
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="btnUpdate()">Update</button>
                </div>
            </div>
        </div>
    </div>  
</div>
</div>




<script type="text/javascript">
    

    function btnUpdate(){

        var status = $('#status').val();
        var alasan = $('#alasan').val(); 

        if (status==''||alasan==''){
            swal('Informasi','Semua Harus Diisi','info');
            return;
        }

        var url = "<?php echo WS_JQGRID . "transaksi.t_block_piutang_controller/edit/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&status="+status;
            url += "&alasan="+alasan;

        $.getJSON( url , function( items ) {
            swal('Informasi', items.rows[0].f_update_block_piutang, 'info');
        });
        
        
    

        
        


    }



</script>



