 <!--<form method="POST" enctype="text"> 
   username: <input id="username" type="text" name="username" value="<?=$username?>" size="35"autofocus/> Допустимы буквы русского и латинского алфавита и знак "_"<br>
   password: <input id="password" type="text" name="password" value="<?=$password?>" size="35"autofocus/><br>
   email: <input id="email" type="text" name="email" value="<?=$email?>" size="35"autofocus/><br>
   phone: <input id="phone" type="text" name="phone" value="<?=$phone?>" size="35"autofocus/>phone<br>
	<button type="submit">login</button>
</form>-->
  <div id="wrap">
        <div id="inwrap">
<form method="POST" enctype="text">
                <!-- Text input-->
                <div class="formcontrol">
                    <label class=" control-label" for="field1">USERNAME</label>

                    <input id="username" type="text" name="username" value="<?=$username?>"  class="form-control   inwrapinput">
                </div>
                <!-- Text input-->
                <div class="formcontrol">
                    <label class=" control-label" for="password">PASSWORD</label>

                    <input id="password" type="text" name="password" value="<?=$password?>" class="form-control   inwrapinput">
                </div>
                <a href="#">Forgot your password?</a>
                <!-- Text input-->
                <div class="formcontrol">
                    <label class=" control-label" for="email">EMAIL</label>

                    <input id="email" type="text" name="email" value="<?=$email?>" class="form-control   inwrapinput">
                </div>
                <div class="formcontrol">
                    <label class=" control-label" for="phone">PHONE</label>

                    <input id="phone" type="text" name="phone" value="<?=$phone?>"  required class="form-control   inwrapinput">
                </div>
                <div class="formcontrol">
                    <div class="fleft">
                    <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                    <label  class="chklabale" for="checkboxes-1">&nbsp;Remember?</label>
                    </div><div class="fright">
                    <button type="submit" class="btn btn-info">LOGIN</button>
                    </div>
                </div>
            </form>
			</div>
			</div>
	