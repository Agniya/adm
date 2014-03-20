<div id="mainblock">
<div id="mbhead">
    <div id="mbhtext">
        ALL APPS
    </div>
    <div id="mbhsearch">
        <form class="navbar-form" role="search">
			<div id="searchhack" style="border-color: rgb(204, 204, 204); outline: rgb(85, 85, 85) none 0px; -webkit-box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset; box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset;">
				<div id="searchhack2"></div><i id="searchbut" class="glyphicon glyphicon-search"></i>
			</div>
			<input type="text" class="form-control" name="srch-term" id="srch-term">
		</form>
    </div>
</div>
<div id="mbhead2">
    <div class="mbh2el mbh2elactive">
    ALL(20)
    </div>
    <div class="mbh2el">
    PUBLISHED(15)
    </div>
	<div class="mbh2el">
    TRASH(0)
    </div>
	<div class="mbh2el">
    DRAFTS(0)
    </div>
</div>

<div id="mbhead3">
    <div id="mbh3leftcontrols">
		<input id="all_apps" type="checkbox" name="selected[]" value="all" type="checkbox">
        <span class="mbh3lel">Select all</span>
        <span id="mbh3edit" class="mbh3lel editselected">Edit selected</span>
        <span id="mbh3delete" class="mbh3lel deleteselected">Delete selected</span>
    </div>
    <div id="mbh3rightcontrols">
        <span class="mbh3rel mbh3relunactive"><i class="glyphicon glyphicon-step-backward"></i>
        </span>
        <span class="mbh3rel mbh3relunactive">◄</span>
        <span class="mbh3rel mbh3relnumb">1</span>
        <span class="mbh3rel mbh3relnumb">2</span>
        <span class="mbh3rel mbh3relnumb">3</span>
        <span class="mbh3rel">►</span>
        <span class="mbh3rel"><i class="glyphicon glyphicon-step-forward"></i>
        </span>
	</div>
</div>

<div id="tblcontrols">
                    <input type="checkbox" id="chksall2">

                    <div id="tblctitle" class="tblcel">
                        <div class="upndown">
                            <span class="up upndwonactive">▲</span>
                            <br>
                            <span class="down">▼</span>
                        </div>
                        Title
                    </div>

                    <div id="tblcauthor" class="tblcel">
                        <div class="upndown">
                            <span class="up">▲</span>
                            <br>
                            <span class="down">▼</span>
                        </div>
                        Author
                    </div>
                    <div id="tblcos" class="tblcel">
                        <div class="upndown">
                            <span class="up">▲</span>
                            <br>
                            <span class="down">▼</span>
                        </div>
                        Os
                    </div>
                    <div id="tblcdate" class="tblcel">
                        <div class="upndown">
                            <span class="up">▲</span>
                            <br>
                            <span class="down">▼</span>
                        </div>
                        Date
    </div>
</div>
<div id="appstable">
	<table id="appstable" class="table table-striped">
		<?for($i=0;$i<count($vars);$i++):?>
			<tr id="<?=$vars[$i]['id']?>" class="apps_select">
				<td class="tdchk">
                    <input  name="selected[]" value="<?=$vars[$i]['id']?>" class="selected apps_select"  type="checkbox">
                    <img src="<?=BASE_URL?><?=$vars[$i]['icon']?>">
                </td>
				<td class="tdtitle"><?=$vars[$i]['title']?></td>
				<td id="strmenu" style="display:none;" colspan="3">
                    <img id="bluearrow" src="<?=BASE_URL?>v/img/arrow.png">
                    <div id="strmenublock" class="apps_select" data-item="<?=$vars[$i]['id']?>">
						<div id="strmedit"><a class="upd"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Edit</a></div>
						<div id="strmset"><i class="glyphicon glyphicon-cog"></i>&nbsp;Setings</div>
						<div id="strmdel"><a class="del"><i class="glyphicon glyphicon-trash"></i>&nbsp;Delete</a></div>
						<div id="strmview"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;View</div>
                    </div>
                </td>
				<td class="tdautor"><?=$vars[$i]['author']?></td>
				<td class="tdos"><?=$vars[$i]['OS']?></td>
				<td class="tddate"><?=$vars[$i]['renovation']?></td>
			</tr>
		<?endfor?>
	<table>

</div>
</div>