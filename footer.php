
<script>
    function chk(val, num) 
    {   
        $.post('onChangeSave.php', {val: val, name: num.name});
        //console.log("send1");
        //dropdown saving onchange
    }
    function chkinput(val, num) {
        $.post('onChangeSave.php', {val: val, name: num.name});
        //console.log("send2");
        //Input saving onchange
    }
</script>