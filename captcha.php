<div>
<label>Captcha</label>
<span id="captcha-info" class="info"></span><br/>
<input type="text" name="captcha" id="captcha" class="demoInputBox"><br>
</div>
<div>
<img id="captcha_code" src="captcha.php" />
<button name="submit" class="btnRefresh" onClick="refreshCaptcha();">Refresh Captcha</button>
</div>
<script>
    if(!$("#captcha").val()) {
    $("#captcha-info").html("(required)");
    $("#captcha").css('background-color','#FFFFDF');
    valid = false;
    }
    function refreshCaptcha() {
    $("#captcha_code").attr('src','captcha.php');
    }
</script>