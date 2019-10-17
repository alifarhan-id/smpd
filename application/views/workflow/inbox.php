<!-- breadcrumb -->
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-right: 16px solid green;
        border-bottom: 16px solid red;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>


<div class="page-bar">
<h3 class="page-title">Job List</h3>
</div>
<div class="space-4"></div>

<div id="inbox-panel">
    <div class="loader"></div>
</div>
<script>

    $(function() {
        $.ajax({
            type: 'POST',
            url: '<?php echo WS_JQGRID."workflow.wf_controller/list_inbox"; ?>',
            timeout: 10000,
            success: function(data) {
                 $("#inbox-panel").html(data);
            }
        });
    });
</script>