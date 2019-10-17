<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url();?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Workflow</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Monitoring Pendaftaran WP</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">

  		<div class="portlet light bordered" >
  			<div class="portlet-title">
  				<div class="caption">
  					<i class=" icon-info font-blue"></i>
  					<span class="caption-subject font-blue bold uppercase"> Filter Monitoring Pendaftaran WP
  					</span>
  				</div>
  			</div>
  			<form role="form">
  				  <div class="row">
            <div class="col-md-9">

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Order Status </label>
                <div class="col-sm-5">
                   <select class="form-control" id="workflow" name="workflow"></select>
                </div>
                <a id="findFilter" class="fm-button ui-state-default ui-corner-all fm-button-icon-right ui-reset btn btn-sm btn-info">
                      <span class="ace-icon fa fa-search"></span> Find</a>
              </div>  
              <br>
              <!-- <div class="form-group"> -->
                  <!-- <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> No. Order </label>
                  <div class="col-sm-5">
                      <input class="form-control" type="text" id="skeyword" name="skeyword" placeholder="Nomor Order" />
                  </div> -->
                  <!-- <a id="findFilter" class="fm-button ui-state-default ui-corner-all fm-button-icon-right ui-reset btn btn-sm btn-info">
                      <span class="ace-icon fa fa-search"></span> Find</a> -->
              <!-- </div> -->
            </div>
              
            </div>  
  			</form>
  		</div>

    </div>

    <!-- isi -->
    <div id="tab-content"></div>

<script type="text/javascript">

  /*init workflow*/
        $.ajax({
            type: 'POST',
            datatype: "json",
            url: '<?php echo WS_JQGRID."workflow.wf_controller/order_list"; ?>',
            timeout: 10000,
            success: function(data) {
                var response = JSON.parse(data);
                $("#workflow").html( response.opt_status );
            }
        });

  $(document).ready(function(){

        $('#findFilter').click(function(){
            var workflow = $("#workflow").val();
            //var skeyword = $("#skeyword").val();

            if(!workflow){
                swal("Informasi", "Order belum dipilih", "info");
                return false;
            }

            $.ajax({
                url: '<?php echo site_url('transaksi/processMonitoringPendWP');?>',
                // data: {p_workflow_id : workflow, skeyword: skeyword},
                data: {p_order_status_id : workflow},
                type: 'POST',
                success: function (data) {
                    $('#tab-content').html(data);
                }
            });

        });
    });
</script>