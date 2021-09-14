<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">

	<script type="text/ecmascript" src="jquery-3.2.1.min.js"></script> 
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
                var oMYKAD = new ActiveXObject("mykidproweb.mykidproweb.jpn");
                var strRet = oMYKAD.BeginJPN("Feitian SCR301 0");
                if (strRet == "0") {

                	$('#txtIDNum').text(oMYKAD.getIDNum())
                    $('#txtBirthDate').text(oMYKAD.getBirthDate())
                    $('#txtBirthPlace').text(oMYKAD.getBirthPlace())
                    $('#txtGMPCName').text(oMYKAD.getGMPCName())
                    // $('#txtOldIDNum').text(oMYKAD.getOldIDNum())
                    $('#txtReligion').text(oMYKAD.getReligion())
                    $('#txtGender').text(oMYKAD.getGender())
                    $('#txtAddress1').text(oMYKAD.getAddress1())
                    $('#txtAddress2').text(oMYKAD.getAddress2())
                    $('#txtAddress3').text(oMYKAD.getAddress3())
                    $('#txtPostcode').text(oMYKAD.getPostcode())
                    $('#txtCity').text(oMYKAD.getCity())
                    $('#txtState').text(oMYKAD.getState())
                    $('#txtAddress').text(oMYKAD.getAddress())

                    // document.forms[0].txtIDNum.value = oMYKAD.getIDNum();
                    // document.forms[0].txtBirthDate.value = oMYKAD.getBirthDate();
                    // document.forms[0].txtGMPCName.value = oMYKAD.getKPTName();
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
                    var newImage = document.createElement('img');
                    newImage.src = src;

                    newImage.width = "150";
                    newImage.height = "200";
                    newImage.style = "margin: 15px; border: 1px solid grey;";

                    var file_location = document.getElementById('pic');
                    file_location.innerHTML = newImage.outerHTML;
                    
                    oMYKAD.EndJPN();

                    var objdata = {
                        'type' : 'mykid',
                        'txtIDNum' : $('#txtIDNum').text(),
                        'txtBirthDate' : $('#txtBirthDate').text(),
                        'txtBirthPlace' : $('#txtBirthPlace').text(),
                        'txtGMPCName' : $('#txtGMPCName').text(),
                        'txtReligion' : $('#txtReligion').text(),
                        'txtGender' : $('#txtGender').text(),
                        'txtAddress1' : $('#txtAddress1').text(),
                        'txtAddress2' : $('#txtAddress2').text(),
                        'txtAddress3' : $('#txtAddress3').text(),
                        'txtPostcode' : $('#txtPostcode').text(),
                        'txtCity' : $('#txtCity').text(),
                        'txtState' : $('#txtState').text(),
                        'txtAddress' : $('#txtAddress').text(),
                        'base64' : base64
                    }

                    $.post( "./store.php",objdata, function( data ) {
                        $('#overlay').fadeOut();
                    });

                }
                else {
                    alert("mykadproweb message: " + strRet);
                }
            } catch (e) {
                    alert("mykadpro: You dont have MYKAD SDK or FT SCR2000 reader." + e.message);
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
		  <div id="progstat">Reading Mykid ... </div>
	</div>
	<form class="form-horizontal" id="myform" style="padding: 1em 3em 1em 3em; width: 70%; margin: auto" >
        <div class="modal-content" >
            <div class="modal-header label-warning" style="padding: 1em 3em 1em 3em">
                <b style="font-size: 14px;color: white;letter-spacing: 0.5px;">MyKid Reader</b>
            </div>

            <div class="panel panel-default" style="margin: 1em 3em 1em 3em">
            <table class="table table-striped table-hover table-bordered" style="letter-spacing: 0.3px;">
                <tbody>
                    <tr>
                        <th width="15%" class="warning">IC NO</th>
                        <td id="txtIDNum"></td>
                    </tr>
                    <tr>
                        <th class="warning" >DOB</th>
                        <td id="txtBirthDate"></td>
                    </tr>
                    <tr>
                        <th class="warning">NAME</th>
                        <td id="txtGMPCName"></td>
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
                        <th class="warning">BIRTH PLACE</th>
                        <td id="txtBirthPlace"></td>
                    </tr>
                    <tr>
                        <th class="warning">ADDRESS 1</th>
                        <td id="txtAddress1"></td>
                    </tr>
                    <tr>
                        <th class="warning">ADDRESS 2</th>
                        <td id="txtAddress2"></td>
                    </tr>
                    <tr>
                        <th class="warning">ADDRESS 3</th>
                        <td id="txtAddress3"></td>
                    </tr>
                    <tr>
                        <th class="warning">POSTCODE</th>
                        <td id="txtPostcode"></td>
                    </tr>
                    <tr>
                        <th class="warning">CITY</th>
                        <td id="txtCity"></td>
                    </tr>
                    <tr>
                        <th class="warning">STATE</th>
                        <td id="txtState"></td>
                    </tr>
                    <tr>
                        <th class="warning">FULL ADDRESS</th>
                        <td id="txtAddress"></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

        <div class="modal-footer">
            <button id="btn_register_close" type="button" class="btn btn-default" onclick="closeWindow();return false;">Confirm</button>
            <button id="btn_register_close" type="button" class="btn btn-info" onclick="refresh()">Refresh</button>
        </div>
    </form>


</body>


</html>