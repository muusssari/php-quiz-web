<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function chk(val, num) 
    {
        let dataString=num[1].name +'='+val;;
        //window.location.href = "test.php?name=" + num[1].name + "&val="+val;
        
        $.post('test.php', {val: val, name: num[1].name});
        console.log("send");
    }
    function chkinput(val, num) {
        $.post('test.php', {val: val, name: num[1].name});
    }
</script>
<!--- Load the Jquaries ---->