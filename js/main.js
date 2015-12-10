function loadScreen(screen,div)
{
	$("#"+div).html('<img id="theImg" src="img/ajax_loader.gif" />');
	$("#"+div).load(screen);
}

function getTableData(url,table,rowId,customButton,exclude)
{
	$("#"+table+" tbody" ).html('<img id="theImg" src="img/ajax_loader.gif" />');
	$.ajax({
		url:url,
		type: "GET",
		success: function(response)
		{
			var data = $.parseJSON(response);
			fillTable(table,data,rowId,customButton,exclude);
		}
	});
}

function fillTable(table,data,rowId,customButton,exclude)
{
	$("#"+table+" tbody" ).html('');
	var fields = Object.keys(data[0]);
	var tableBody = "";
	for (var i = 0; i < data.length; i++) 
	{
		tableBody += "<tr id = "+data[i][rowId]+">";

		for (var j = 0; j < fields.length; j++) 
		{
			var field = fields[j];
			if(field != rowId)
		 	{
		 		if(typeof exclude !== 'undefined')
		 		{
		 			console.log(exclude.indexOf(field));
		 			if(exclude.indexOf(field) == -1)
		 			{
		 				tableBody +="<td>"+data[i][field]+"</td>";
		 			}
		 		}
		 		else
		 		{
		 			tableBody +="<td>"+data[i][field]+"</td>";
		 		}
		    }
		}
		if(typeof customButton !== 'undefined' && customButton != null)
		{	
			tableBody +="<td><button class = '"+customButton.clase+"'>"+customButton.text+"</button></td>";
		}
		tableBody += "</tr>";
	}

	$("#"+table+" tbody" ).append(tableBody);

	$("#"+table).DataTable();
}

function fillSelect(select,url,rowId,rowValue,selected)
{

	var selectedValue = (typeof selected !== 'undefined') ? selected : '';
	$.ajax({
		url:url,
		type: "GET",
		success: function(response)
		{
			var data = $.parseJSON(response);
			var selectContent = "";
			var s = "";
			for (var i = 0; i < data.length; i++) 
			{
				if(data[i][rowId] == selectedValue)
				{
					 s = "selected";
				}
				selectContent += "<option value = '"+data[i][rowId]+"'"+s+" >";

				selectContent +=data[i][rowValue];
				
				selectContent += "</option>";

				s = "";
			}

			$("#"+select).append(selectContent);
		}
	});
}

function sendForm(url,form,callback,noValid)
{

	var isValid = (noValid == true) ? true : validateForm(form) ;
	if(isValid)
	{
		var data = $("#"+form).serialize();
		$.ajax({
			url:url,
			type: "GET",
			data: data,
			success: function(response)
			{
				var data = $.parseJSON(response);

				if(typeof callback !== 'undefined')
				{	
					callback(data.status,data.message);
				}
			}
		});
	}
}

function validateForm(form)
{
	var valid = true;
	$("#"+form).find("input,select").each(function()
	{	
		var element = $(this);
		if(element.is( "input") || element.is("select"))
		{
			if(element.val() == '' || element.val().length == 0 || element.val() == null)
			{
				valid = false;
				element.parent().addClass("has-error");
			}
			else
			{
				if(element.is( "input"))
				{
					var type  = element.attr("type");
					if(type == "mail")
					{
						var emailReg  = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  					var validMail = emailReg.test( element.val() );
						if(!validMail)
						{
							valid = false;
							element.parent().addClass("has-error");
						}
						else
						{
							element.parent().removeClass("has-error");
						}
					}
					else
					{
						element.parent().removeClass("has-error");
					}
				}
				else
				{
					element.parent().removeClass("has-error");
				}
			}
		}
	});

	return valid;
}

function clearForm(form)
{
	$("#"+form).find("input","select").each(function()
	{	
		var element = $(this);
		if(element.is( "input"))
		{
			//element.val('');
		}
		element.val('');
	});
}