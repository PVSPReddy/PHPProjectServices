function TestingGAS()
{ var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'http://phpprojectservices.gearhostpreview.com/ProjFiles/PHPServices/GetDataFromDrive/PHPTemp3.php', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () 
    {
      if (xobj.readyState == 4 && xobj.status == 200)
      {
        // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
        //callback(xobj.responseText);
        var data = xobj.response;
        var options = JSON.parse(data);
        var option = document.getElementById('URLOptions');
        var optionsHTML="";
        for(i=0; i<options.length; i++ )
        {
          optionsHTML = optionsHTML+"<option value="+options[i].url+">"+options[i].name+"</option>";
        }
        option.innerHTML = option.innerHTML+optionsHTML;
      }
    };
    xobj.send();
}


function Testing()
{ 
  var url = "../LocalImages";
  var localURL = "ProjFiles/LocalImages/";
  var obj = { "localURL":url };
  dbParam = JSON.stringify(obj);
  var xobj = new XMLHttpRequest();
    // xobj.overrideMimeType("application/json");
    xobj.onreadystatechange = function () 
    {
      if (xobj.readyState == 4 && xobj.status == 200)
      {
        // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
        //callback(xobj.responseText);
         var data ="";
        var responseData = xobj.response;
        var options = JSON.parse(responseData);
        var optionsHTML="";
        for(i=0; i<options.all_local_files.length; i++ )
        {
          data += "<div id=\"lvtemplate\" style=\" position:static; margin:auto; padding-top: 12px; padding-right: 13px; padding-bottom: 16px; padding-left: 15px; height:400px; width:160px; float:left; vertical-align:middle\">"+"\n"+"<center>"+"\n"+"<h2>"+"\n"+" hi, hello"+"\n"+"</h2>"+"\n"+"<a href=\""+localURL+options.all_local_files[i]+"\" target=\"_blank\" >"+"\n"+"<img style=\"height : 200px; width : 200px; float:left\"src=\""+localURL+options.all_local_files[i]+"\" />"+"\n"+"</a>"+"\n"+"<h3>"+"\n"+"see you..."+"\n"+"</h3>"+"\n"+"</center>"+"\n"+"</div>";
        }
        var y=document.getElementById("listview");
        y.innerHTML = data;
      }
    };
    xobj.open("POST", "./ProjFiles/PHPServices/ReceiveService.php?userRequest=GetLocalImages", true);
    xobj.setRequestHeader("Content-type", "application/json");
    xobj.send(dbParam);
}

function TestingOne()
{
    // http://phpprojectservices.gearhostpreview.com/ProjFiles/PHPServices/GetDataFromDrive/PHPTemp3.php
}