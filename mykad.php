<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">

	<script type="text/ecmascript" src="jq1.min.js"></script> 
	<script type="text/ecmascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	<script type="text/javascript">

        function closeWindow() {
            window.open('','_parent','');
            window.close();
        }

        $( document ).ready(function() {
		    comEventOccured()
		});

        var delay = ( function() {
            var timer = 0;
            return function(callback, ms) {
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
            };
        })();

        function refresh(){
            $('#overlay').show();

            delay(function(){
                comEventOccured();
            }, 100 );
        }
    
        function comEventOccured() {
            try {
                var oMYKAD = new ActiveXObject("mykadproweb.mykadproweb.jpn");
                var strRet = oMYKAD.BeginJPN("Feitian SCR301 0");
                if (strRet == "0") {

                	$('#txtIDNum').text(oMYKAD.getIDNum())
                    $('#txtBirthDate').text(oMYKAD.getBirthDate())
                    $('#txtKPTName').text(oMYKAD.getGMPCName())
                    //$('#txtOldIDNum').text(oMYKAD.getOldIDNum())
                    $('#txtReligion').text(oMYKAD.getReligion())
                    $('#txtGender').text(oMYKAD.getGender())
                    $('#txtRace').text(oMYKAD.getRace())
                    $('#txtAddress1').text(oMYKAD.getAddress1())
                    $('#txtAddress2').text(oMYKAD.getAddress2())
                    $('#txtAddress3').text(oMYKAD.getAddress3())
                    $('#txtPostcode').text(oMYKAD.getPostcode())
                    $('#txtCity').text(oMYKAD.getCity())
                    $('#txtState').text(oMYKAD.getState())
                    $('#txtAddress').text(oMYKAD.getAddress())

                    $('#txtIDNum_inp').val(oMYKAD.getIDNum())
                    $('#txtBirthDate_inp').val(oMYKAD.getBirthDate())
                    $('#txtKPTName_inp').val(oMYKAD.getGMPCName())
                    //$('#txtOldIDNum_inp').val(oMYKAD.getOldIDNum())
                    $('#txtReligion_inp').val(oMYKAD.getReligion())
                    $('#txtGender_inp').val(oMYKAD.getGender())
                    $('#txtRace_inp').val(oMYKAD.getRace())
                    $('#txtAddress1_inp').val(oMYKAD.getAddress1())
                    $('#txtAddress2_inp').val(oMYKAD.getAddress2())
                    $('#txtAddress3_inp').val(oMYKAD.getAddress3())
                    $('#txtPostcode_inp').val(oMYKAD.getPostcode())
                    $('#txtCity_inp').val(oMYKAD.getCity())
                    $('#txtState_inp').val(oMYKAD.getState())
                    $('#txtAddress_inp').val(oMYKAD.getAddress())

                    // document.forms[0].txtIDNum.value = oMYKAD.getIDNum();
                    // document.forms[0].txtBirthDate.value = oMYKAD.getBirthDate();
                    // document.forms[0].txtKPTName.value = oMYKAD.getKPTName();
                    // document.forms[0].txtOldIDNum.value = oMYKAD.getOldIDNum();
                    // document.forms[0].txtReligion.value = oMYKAD.getReligion();
                    // document.forms[0].txtGender.value = oMYKAD.getGender();
                    // document.forms[0].txtRace.value = oMYKAD.getRace();
                    // document.forms[0].txtAddress1.value = oMYKAD.getAddress1();
                    // document.forms[0].txtAddress2.value = oMYKAD.getAddress2();
                    // document.forms[0].txtAddress3.value = oMYKAD.getAddress3();
                    // document.forms[0].txtPostcode.value = oMYKAD.getPostcode();
                    // document.forms[0].txtCity.value = oMYKAD.getCity();
                    // document.forms[0].txtState.value = oMYKAD.getState();
                    // document.forms[0].txtAddress.value = oMYKAD.getAddress();
                    // strRet=oMYKAD.getPhoto("c:\\MYKADSDKWEB\\myphotov1.jpg");
                    
                    //load image
                    //var file_location = document.getElementById('show_pic');
                    //file_location.innerHTML='<img src="c:\\MYKADSDKWEB\\myphotov1.jpg" width="150px" height="200px"></img>';

                    //load image base64
                    strRet = oMYKAD.getPhotoBase64String();
                    base64 = strRet;
                    var src = "data:image/jpeg;base64,";
                    src += strRet;
                    $('#base64').val(strRet)

                    $('#mypic').attr('src',src);
                    // var newImage = document.createElement('img');
                    // newImage.src = src;

                    // newImage.width = "150";
                    // newImage.height = "200";
                    // newImage.style = "margin: 15px; border: 1px solid grey;";

                    // var file_location = document.getElementById('pic');
                    // file_location.innerHTML = newImage.outerHTML;
                    
                    oMYKAD.EndJPN();

                    $("#btn_register_s").click();

                    // var objdata = {
                    //     'type' : 'mykad',
                    //     'txtIDNum' : $('#txtIDNum').text(),
                    //     'txtBirthDate' : $('#txtBirthDate').text(),
                    //     'txtKPTName' : $('#txtKPTName').text(),
                    //     'txtOldIDNum' : $('#txtOldIDNum').text(),
                    //     'txtReligion' : $('#txtReligion').text(),
                    //     'txtGender' : $('#txtGender').text(),
                    //     'txtRace' : $('#txtRace').text(),
                    //     'txtAddress1' : $('#txtAddress1').text(),
                    //     'txtAddress2' : $('#txtAddress2').text(),
                    //     'txtAddress3' : $('#txtAddress3').text(),
                    //     'txtPostcode' : $('#txtPostcode').text(),
                    //     'txtCity' : $('#txtCity').text(),
                    //     'txtState' : $('#txtState').text(),
                    //     'txtAddress' : $('#txtAddress').text(),
                    //     'base64' : base64
                    // }

                    // $.post( "./store.php",objdata, function( data ) {
                    //     $('#overlay').fadeOut();
                    // });

                }
                else {
                    alert("mykadproweb message: " + strRet);
                }
            } catch (e) {
                $('#overlay').fadeOut();
                //alert("mykadpro: You dont have MYKAD SDK or FT SCR2000 reader." + e.message);
            }
        }
    </script>

	<style type="text/css" class="init">
		#overlay{
		  position:fixed;
		  z-index:99999;
		  top:0;
		  left:0;
		  bottom:0;
		  right:0;
		  background:rgba(0,0,0,0.5);
		  transition: 1s 0.4s;
		}
		#progstat{
		  font-size:0.7em;
		  letter-spacing: 3px;
		  position:absolute;
		  top:50%;
		  margin-top:-40px;
		  width:100%;
		  text-align:center;
		  color:#fff;
		}
		.table{
			font-size: 11px;
		}
		.modal-header {
			min-height: 16.42857143px;
			padding: 5px;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-body {
			position: relative;
			padding: 10px;
		}

		.form-group{
			margin-bottom: 5px;
		}
		
		.form-mandatory{
			background-color: lightyellow;
		}
		
		.form-disabled{
			background-color: #DDD;
			color: #999;
		}
		
		.modal-open {
		  overflow: scroll;
		}
		.justbc{
			background-color: #dff0d8 !important;
		}
		label.error{
			color: rgb(169, 68, 66);
		}
		#mykad_reponse{
			color: rgb(169, 68, 66);
			font-weight: bolder;
		}
		.addressinp{
			margin-bottom: 5px;
		}
		#pic img{
			margin: 5px;
			border: solid 1px grey;
		}
	</style>
    <title>Mykad and Mykid Reader</title>

</head>


<body class="header-fixed">
	<div id="overlay">
		  <div id="progstat">Reading Mykad ... </div>
	</div>
	<form class="form-horizontal" id="myform" style="padding: 1em 3em 1em 3em; width: 70%; margin: auto"  action="./store.php" method="post">
	
        <div class="modal-content" >
            <div class="modal-header label-warning" style="padding: 1em 3em 1em 3em">
                <b style="font-size: 14px;color: white;letter-spacing: 0.5px;">MyKad Reader</b>
            </div>

            <div class="panel panel-default" style="margin: 1em 3em 1em 3em">
            <table class="table table-striped table-hover table-bordered" style="letter-spacing: 0.3px;">
                <tbody>
                    <tr>
                        <th width="15%" class="warning">IC NO</th>
                        <td id="txtIDNum"></td>
                        <td width="25%" rowspan="6" style="text-align: center;">
			                <span id="pic">
				                <img id="mypic" width="150px" height="200px" src="photoblank.jpg" />
				            </span>
            				<input type="hidden" name="base64" id="base64" >
                        </td>
                    </tr>
                    <tr>
                        <th class="warning" >DOB</th>
                        <td id="txtBirthDate"></td>
                    </tr>
                    <tr>
                        <th class="warning">NAME</th>
                        <td id="txtKPTName"></td>
                    </tr>
                    <tr>
                        <th class="warning">OLD IC NO</th>
                        <td id="txtOldIDNum"></td>
                    </tr>
                    <tr>
                        <th class="warning">RELIGION</th>
                        <td id="txtReligion"></td>
                    </tr>
                    <tr>
                        <th class="warning">GENDER</th>
                        <td id="txtGender"></td>
                    </tr>
                    <tr>
                        <th class="warning">RACE</th>
                        <td colspan="2" id="txtRace"></td>
                    </tr>
                    <tr>
                        <th class="warning">ADDRESS 1</th>
                        <td colspan="2" id="txtAddress1"></td>
                    </tr>
                    <tr>
                        <th class="warning">ADDRESS 2</th>
                        <td colspan="2" id="txtAddress2"></td>
                    </tr>
                    <tr>
                        <th class="warning">ADDRESS 3</th>
                        <td colspan="2" id="txtAddress3"></td>
                    </tr>
                    <tr>
                        <th class="warning">POSTCODE</th>
                        <td colspan="2" id="txtPostcode"></td>
                    </tr>
                    <tr>
                        <th class="warning">CITY</th>
                        <td colspan="2" id="txtCity"></td>
                    </tr>
                    <tr>
                        <th class="warning">STATE</th>
                        <td colspan="2" id="txtState"></td>
                    </tr>
                    <tr>
                        <th class="warning">FULL ADDRESS</th>
                        <td colspan="2" id="txtAddress"></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
	
        <input type="hidden" name="type" id="type" value="mykad">
        <input type="hidden" name="txtIDNum" id="txtIDNum_inp"> 
        <input type="hidden" name="txtBirthDate" id="txtBirthDate_inp"> 
        <input type="hidden" name="txtKPTName" id="txtKPTName_inp"> 
        <input type="hidden" name="txtOldIDNum" id="txtOldIDNum_inp"> 
        <input type="hidden" name="txtReligion" id="txtReligion_inp"> 
        <input type="hidden" name="txtGender" id="txtGender_inp"> 
        <input type="hidden" name="txtRace" id="txtRace_inp"> 
        <input type="hidden" name="txtAddress1" id="txtAddress1_inp"> 
        <input type="hidden" name="txtAddress2" id="txtAddress2_inp"> 
        <input type="hidden" name="txtAddress3" id="txtAddress3_inp"> 
        <input type="hidden" name="txtPostcode" id="txtPostcode_inp"> 
        <input type="hidden" name="txtCity" id="txtCity_inp"> 
        <input type="hidden" name="txtState" id="txtState_inp"> 
        <input type="hidden" name="txtAddressp" id="txtAddress_inp"> 

        <div class="modal-footer">
            <button id="btn_register_r" type="button" class="btn btn-default" onclick="refresh()">Refresh</button>
            <button id="btn_register_s" type="submit" class="btn btn-info" style="">submit</button>
        </div>
    </form>


</body>


</html>