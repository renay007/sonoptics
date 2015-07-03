/*
$(document).ready(function(){
	
	$('form[name=location]').on('submit',function(e){
		 identifier = $('#identifier1').val();
		 address = $('#address1').val();
		 city = $('#city1').val();
		 state = $('#state1').val();
		 zip = $('#zip1').val();
		
		var	 	info =			'<div class="col-lg-6">'+
                ' <section class="panel">'+
                '   <header class="panel-heading">'+
                '      <span class="red-color">'+
                '        <a class="red-color" href="cityCollegeDevices.php">City College</a>'+                                                                                       
                '      </span>'+
                '      <span class="tools pull-right">'+
                '        <a class="fa fa-repeat box-refresh" href="javascript:;"></a>'+
                '        <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>'+
                '        <a class="t-close fa fa-times" href="javascript:;"></a>'+
                '      </span>'+	
								'		</header>'+
                '    <div class="panel-body" style="display: block;">'+
                '      <table class="table" style="'+
                '      border-collapse: separate;'+
                '      border-spacing: 36px;'+
                '      ">'+
                '        <colgroup><col style="width:10%">'+
                '        </colgroup>'+
                '        <tbody>'+
                '          <tr style>'+                                                                                                                                              
                '            <td id="quick-table-icon">'+
                '              <i class="fa fa-home" style="'+
                '              font-size: 1.6em;'+
                '              "></i>'+
                '            </td>'+
                '            <td id="quick-table-content">160 Convent Ave, New York, NY 10031'+
                '            </td>'+
                '          </tr>'+
                '          <tr>'+
                '            <td id="quick-table-icon">'+
                '              <i class="fa fa-cogs" style="font-size: 1.6em;"></i>'+
                '            </td>'+
                '            <td id="quick-table-content">6 devices'+
                '            </td>'+
                '          </tr>'+
                '          <tr>'+
                '            <td id="quick-table-icon">'+
                '            <i class="fa fa-edit" style="'+
                '            font-size: 1.6em;"></i>'+
                '            </td>'+
                '            <td id="quick-table-content">'+
                '              <div style="float: left;">4'+
                '                <i class="fa fa-check-circle green-check"></i>'+
                '              </div>'+
                '              <div style="float: right;">2'+
                '                <i class="fa fa-times-circle red-x"></i>'+
                '              </div>'+
                '            </td>'+
                '          </tr>'+
                '        </tbody>'+
                '      </table>'+
                '    </div>'+
                '  </section>'+
                '</div>';

		$('#locationAdded').prepend(info);
		console.log('testing');
		e.preventDefault();
		return false;

	});

});
*/
