<div id="mainblock">
    <div id="mbhead">
        <div id="mbhtext">
            <?=$headline?>
        </div>
	</div>
	<div id="apbform">
	<br>
	<form method="POST" enctype="multipart/form-data" class="form-inline">
       <input name="uid" type="hidden" value="<?=$uid?>">
	   <fieldset>
		<!-- Text input-->
            <div class="form-group">
                <label class="control-label" for="ftitle">Title</label>
                <div class="">
					<input id="title" name="title" type="text" placeholder="" class="form-control fwinput" required="" value="<?=$vars['title']?>">
				</div>
            </div>
            <br>
            <hr>
            <label class="preblocklbl">System Requirements</label>
            <div class="fwblock">
				<?if(isset($vars['OS'])&&isset($vars['CPU'])&&!empty($vars['OS'])&&!empty($vars['CPU'])):?>
					<!-- Multiple Radios -->
					<div class="l2group">
						<?for($i=0;$i<count($vars['OS']);$i++):?>
						<?foreach($vars['OS'][$i] as $k=>$v):?>
							<?if($v==1):?>
							<input type="radio" name="OS" value="<?=$k?>" checked/><?=$k?><br />
							<?else:?>
							<input type="radio" name="OS" value="<?=$k?>"><?=$k?><br />	
							<?endif?>
						<?endforeach?>
						<?endfor;?>
					</div>
					<!-- Multiple Checkboxes -->
					<div class="r2group">
					<?for($i=0;$i<count($vars['CPU']);$i++):?>
						<?foreach($vars['CPU'][$i] as $k=>$v):?>
						<?if($v==1):?>
						<input type="checkbox" name="CPU[]" value="<?=$k?>" checked/><?=$k?><br />
						<?else:?>
						<input type="checkbox" name="CPU[]" value="<?=$k?>"><?=$k?><br />	
						<?endif?>
						<?endforeach?>
					<?endfor;?>
					</div>	
				<div class="clear"></div>	
				<?else:?>
					<!-- Multiple Radios -->
					<div class="l2group">
						<input type="radio" name="OS" value="10.6 Snow Leopard" checked/>10.6 Snow Leopard<br />
						<input type="radio" name="OS" value="10.7 Lion"/>10.7 Lion<br />
						<input type="radio" name="OS" value="10.8 Mountain Lion"/>10.8 Mountain Lion<br />
					</div>
					<!-- Multiple Checkboxes -->
					<div class="r2group">
						<input type="checkbox" name="CPU[]" value="32-bit CPU support"/>32-bit CPU support<br />
						<input type="checkbox" name="CPU[]" value="64-bit CPU support"/>64-bit CPU support<br />
					</div>	
				<?endif?>

            </div>
            <br>
            <hr>
		<div class="fwblock">
            <!-- Text input-->
            <div class="  l2group">
                <div class="g2el">
                    <label class="control-label" for="version">Version</label>
                    <br>
					<input id="version" name="version" type="text" placeholder="" class="form-control input-md" value="<?=$vars['version']?>">
				</div>
				<div class="g2el">
                    <label class="control-label" for="bundle_id">Bundle id</label>
                    <br>
					<input id="bundle_id" name="bundle_id" type="text" placeholder="" class="form-control input-md" value="<?=$vars['bundle_id']?>">
                    <span class="help-block">This is for Updates</span>
                </div>
            </div>
			<div class=" r2group">
                <!-- Text input-->
				<label class="control-label" for="renovation">Date of renovation</label>
                <br>
				<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
					<input class="span2 timeinput form-control" id="renovation" name="renovation" size="16" type="text" value="<?=$vars['renovation']?>" readonly="">
					<span class="add-on"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
        </div>
        <br>
        <hr>
		<div class="fwblock">
            <!-- Text input-->
            <div class="l2group">
                <label class="control-label" for="price">Price</label>
                <br>
                <input id="price" name="price" type="text" placeholder="" class="form-control input-md" value="<?=$vars['price']?>">
                <span class="help-block">If the application is free, skip this field</span>
			</div>
			<!-- Text input-->
            <div class="r2group">
                <label class="control-label" for="license">License</label>
                <br>
                <input id="license" name="license" type="text" placeholder="" class="form-control input-md" value="<?=$vars['license']?>">
                <span class="help-block">Name used by the application license</span>
            </div>
        </div>
        <br>
        <hr>
        <!-- Text input-->
        <div class="fwblock">
            <div class="l2group">
                <label class="control-label" for="author">Author</label>
                <br>
                <input id="author" name="author" type="text" placeholder="" class="form-control input-md" value="<?=$vars['author']?>">
                <span class="help-block">This can be a teem</span>
            </div>

            <!-- Text input-->
            <div class="r2group">
                <label class="control-label" for="site">Site</label>
                <br>
                <input id="site" name="site" type="text" placeholder="" class="form-control input-md" value="<?=$vars['site']?>">
            </div>
        </div>
        <br>
        <hr>
        <!-- File Button -->
        <div class="fwblock">
            <div class="form-group">
                <label class="control-label" for="file">File</label>
                <input id="ffile" name="file[]" class="input-file fwinput" type="file">
                <span class="help-block">Upload your application</span>
            </div>
        </div>
        <br>
        <br> 
		<!-- Ico Button -->
        <div class="fwblock">
            <div class="form-group">
                <label class="control-label" for="file">Ico</label>
                <input id="fico" name="file[]" class="input-file fwinput" type="file">
                <span class="help-block">Upload your icon</span>
            </div>
        </div>
        <br>
        <br>
        <!-- Text input-->
        <div class="form-group fwblock">
            <label class="control-label" for="link">Link to download</label>
            <br>
            <input id="link" name="link" type="text" placeholder="" class="form-control fwinput" value="<?=$vars['link']?>">
            <span class="help-block">Optionaly, you can specify a link for an application</span>
		</div>
        <!-- Textarea -->
        <div class="form-group fwblock">
			<label class="control-label" for="description">Description</label>
            <div class="fwinput">
            <textarea class="form-control " id="description" name="description"><?=$vars['description']?></textarea>
            <div class="precounter">Word count:<span class="counter" id="fdescriptioncounter">(1478)</span></div>
            </div>
        </div>
        <br>
        <br>
        <!-- Textarea -->
        <div class="form-group fwblock">
            <label class="control-label" for="novelty">What’s new in this version</label>
            <div class="fwinput">
			<textarea class="form-control" id="novelty" name="novelty"><?=$vars['novelty']?></textarea>
            <div class="precounter">Word count:<span class="counter" id="fnewcounter">(1478)</span></div>
            </div>
        </div>
        <br>
        <br>
        <!-- Text input-->
        <div class="form-group fwblock">
			<label class="control-label" for="release_notes">Release notes</label>
            <br>
            <input id="release_notes" name="release_notes" type="text" placeholder="" class="form-control fwinput" value="<?=$vars['release_notes']?>">
            <span class="help-block">If you have a release notes page, give us a link for it.</span>
		</div>
		<!-- Textarea -->
        <div class="form-group fwblock">
            <label class="control-label" for="sys_notes">System requirements: Notes</label>
			<span class="help-block hb2">Additional information about the requirements of the application</span>
            <div class="fwinput">
            <textarea class="form-control" id="sys_notes" name="sys_notes"><?=$vars['sys_notes']?></textarea>
            <div class="precounter">Word count:<span class="counter" id="fsrnotescounter">(1478)</span></div>
            </div>
        </div>
        <br>
        <hr>
        <!-- Multiple Checkboxes -->
        <div class="form-group fwblock">
            <label class="control-label" for="comments">Discussion</label>
            <div class="fwinput">
            <div class="checkbox">
			<?if($vars['comments']!=''):?>
				<input type="checkbox" name="comments" value="true" checked/>Allow comments<br />
			<?else:?>
				<input type="checkbox" name="comments" value="true"/>Allow comments<br />
			<?endif?>
           	</div>
			</div>
		</div>
        <hr style="margin-bottom:0px;">
        </fieldset>
		<input type="submit" name="submit" value="submit">
    </form>
 </div>
</div>

<div id="thirdmenu">
                <span class="m3title">LANGUAGE</span>
                <div class="m3el">
                    <select class="form-control">
                        <option>English</option>
                        <option>Russian</option>
                    </select>
                </div>
                <hr>
                <span class="m3title">PUBLISH</span>
                <div class="m3el">
                    <a href="">Save Draft</a>
                    <a href="">Preview</a>
                </div>
                <div class="m3el">
                    Staus:
                    <br>
                    <b>Draft</b>
                    <a href="">Edit</a>

                </div>
                <div class="m3el">
                    Visibility:
                    <br>
                    <b>Public</b>
                    <a href="">Edit</a>

                </div>
                <div class="m3el">
                    Publish:
                    <br>
                    <b>immediately</b>
                    <a href="">Edit</a>

                </div>
                <div class="m3el">
                    <button type="button" class="btn btn-info">PUBLISH</button>
                </div>

                <div class="m3el">
                    <a class="m3redlink" href="">Move to trash</a>

                </div>


                <hr>

                <span class="m3title">RUBRIC</span>
                <div class="m3elinside">

                    <div class="el">
                        <input type="checkbox">Graphics&amp; Design</div><hr>
                    <div class="el">
                        <input type="checkbox">Tools</div><hr>
                    <div class="el">
                        <input type="checkbox">Network</div><hr>
                    <div class="el">
                        <input type="checkbox">Productivity</div><hr>
                    <div class="el">
                        <input type="checkbox">Games</div><hr>
                    <div class="el">
                        <input type="checkbox">Developer tools</div><hr>
                    <div class="el">
                        <input type="checkbox">Music</div><hr>
                    <div class="el">
                        <input type="checkbox">Education</div><hr>
                    <div class="el">
                        <input type="checkbox">Security</div><hr>
                 

                </div>

                <div class="m3el">
                    <a href="">Add New Rubric</a>

                </div>
                <hr>
                <span class="m3title">SUPPORTED
                    <br>LANGUAGES</span>
                <div class="m3el">
                    <select class="form-control">
                        <option>English</option>
                        <option>Russian</option>
                    </select>
                    <br>
                    <select class="form-control">
                        <option>English</option>
                        <option>Russian</option>
                    </select>
                    <i class="glyphicon glyphicon-trash trash"></i>
                    <br>
                    <a href="">Add</a>
                </div>
                <hr>
                <span class="m3title">LISTS</span>
                <div class="m3el">
                    <select class="form-control">
                        <option>English</option>
                        <option>Russian</option>
                    </select>
                    <br>
                    <select class="form-control">
                        <option>English</option>
                        <option>Russian</option>
                    </select>
                    <i class="glyphicon glyphicon-trash trash"></i>
                    <br>
                    <a href="">Add</a>
                </div>
                <hr>
                <div class="m3el">
                    <span class="m3title">ICON</span><br><br>
                    <a href="">Upload</a>

                </div>
                <hr>
                <div class="m3el">
                    <span class="m3title">SCREENS</span><br><br>
                    <a href="">Upload</a>

                </div>

            </div>
    <script type="text/javascript">
    function toObject(arr) {
        var rv = {};
        for (var i = 0; i < arr.length; ++i)
            rv[i] = arr[i];
        return rv;
    }

 
    $(function() {
$('#dp3').datepicker();
  $("[name=description]").charCounter(1480, {
                container: "#descriptioncounter"
  });
  $("[name=novelty]").charCounter(1480, {
                container: "#fnewcounter"
  });
  $("[name=release_notes]").charCounter(1480, {
                container: "#fsrnotescounter"
  });


        $('#roundplus').parent('.hlcontrol').hover(function() {
                $(this).children().attr('src', 'v/img/roundpluswhite.png')
            },
            function() {
                $(this).children().attr('src', 'v/img/roundplus.png')
            }
        );
        var cssObjFirst = [];
        cssObjFirst['border-color'] = $('#srch-term').css('border-color');
        cssObjFirst['outline'] = $('#srch-term').css('outline');
        cssObjFirst['-webkit-box-shadow'] = $('#srch-term').css('-webkit-box-shadow');
        cssObjFirst['box-shadow'] = $('#srch-term').css('box-shadow');
        cssObjFirst = $.extend({}, cssObjFirst);
        $('#searchhack').css(cssObjFirst);
        $('#srch-term').on('focus', function() {
            var cssObj = {
                'border-color': '#66afe9',
                'outline': '0',
                '-webkit-box-shadow': 'inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)',
                'box-shadow': 'inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)'
            }
            $('#searchhack').css(cssObj);

        })



        $('#srch-term').on('focusout', function() {
            $('#searchhack').css(cssObjFirst);


        })

    })
    $('#appstable tr').hover(
        function() {
            $(this).find('#strmenu').show();
            $(this).find('.tdautor').hide();
            $(this).find('.tdos').hide();
            $(this).find('.tddate').hide();
        },
        function() {

            $(this).find('#strmenu').hide();
            $(this).find('.tdautor').show();
            $(this).find('.tdos').show();
            $(this).find('.tddate').show();
        }
    );
    </script>
