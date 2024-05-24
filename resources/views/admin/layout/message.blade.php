<?php
if(!empty(Session::get('response')) && !empty(Session::get('msg'))){
$response=Session::get('response');

$alt_msg=Session::get('msg');
?>
<script type="text/javascript">
    $(function(){
        <?php if($response != "success"){ ?>
            toastr.error("{{$alt_msg}}");
        <?php }else{ ?>
            toastr.success("{{$alt_msg}}");
        <?php } ?>
    });

</script>
<?php } ?>

<script type="text/javascript">
    function show_message(status,message) {
        if(status == "success"){
            toastr.success(message,"Success");
        }else{
            toastr.error(message,"Fail");
        }
    }

    function download_file(file_path,file_name=null) {
        var link=document.createElement('a');
        var url = file_path;
        document.body.appendChild(link);
        link.href=url;
        link.download=file_name;
        link.click();
    }
</script>
