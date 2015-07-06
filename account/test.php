<?php

//require_once('functions.php');
//$info['encryptedEmail'] = $_COOKIE['email'];
?>
<html>
<head>
<title></title>
</head>
<body>
<div><a href="#" id="btn">Show bank div and hide fancy div</a></div>
<div id="btn-bk"><a href="#">back</a></div>
<div id="bank">Bank Div</div>
<div id="fancy">Fancy Div</div>

<script src="js/jquery-1.10.2.min.js"></script>
<style>
#bank {display:none;}
#btn-bk {display:none;}
</style>

<script language="Javascript" type="text/javascript">
$(document).ready(function() {

$('#btn').click(function(e){    
    $('#fancy, #btn').fadeOut('slow', function(){
        $('#bank, #btn-bk').fadeIn('slow');
    });
});

    $('#btn-bk').click(function(e){    
        $('#bank, #btn-bk').fadeOut('slow', function(){
            $('#fancy, #btn').fadeIn('slow');
        });
    });
});
</script>
</body>
</html>
