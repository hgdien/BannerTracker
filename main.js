


function setCurrentBanner()
{

    var list = document.getElementById("bannerList");
    document.getElementById("currentID").value = list.options[list.selectedIndex].value;
    
    var buttonList = document.getElementsByName("button");

    for(var count = 0; count < buttonList.length; count++)
    {
        
        buttonList[count].disabled = 0;

    }
}

function setCurrentCampaign()
{
    var list = document.getElementById("campaignList");
    document.getElementById("currentID").value = list.options[list.selectedIndex].value;

    var buttonList = document.getElementsByName("button");
    for(var count = 0; count < buttonList.length; count++)
    {
        buttonList[count].disabled = 0;
    }

    document.getElementById("campaignName").innerHTML =  "Campaign " + list.options[list.selectedIndex].innerHTML;

    
}


function setCurrentUser()
{

    var list = document.getElementById("userList");
    
    document.getElementById("currentID").value = list.options[list.selectedIndex].value;
    var buttonList = document.getElementsByName("button");
    for(var count = 0; count < buttonList.length; count++)
    {
        buttonList[count].disabled = 0;
    }

}

function showBanner()
{
    var currentID = document.getElementById("currentID").value;

    var link = document.getElementById("link" + currentID).value;

    var load = window.open(link,'','scrollbars=no,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
}


function getBannerList()
{
    var list = document.getElementById("campaignList");
    var id = list.options[list.selectedIndex].value;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("GET","getBannerList.php?type=full&campaignID=" + id,false);
    
    xmlhttp.send(null);

    document.getElementById("bannerListBox").innerHTML = xmlhttp.responseText;
    

}

function showAssociationBox()
{
    var list = document.getElementById("campaignList");
    var id = list.options[list.selectedIndex].value;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("GET","getBannerList.php?type=small&campaignID=" + id,false);

    xmlhttp.send(null);

    document.getElementById("associatedList").innerHTML = xmlhttp.responseText;

    document.getElementById("campainPage1").style.display = 'none';
    document.getElementById("campainPage2").style.display = '';
    
    document.getElementById("campaignID").value= id;

}


function associateBanner(name, id)
{
    var list =document.getElementById("associateListBox");

    var check = 1;
      for (var i = list.length - 1; i>=0; i--)
      {
        if (list.options[i].value == id)
        {
          check = 0;
        }
      }

    if(check)
    {
        list.options[list.options.length] = new Option(name, id);
    }
    

}

function removeAssociate()
{
  var list = document.getElementById('associateListBox');

  for (var i = list.length - 1; i>=0; i--)
  {
    if (list.options[i].selected)
    {
      list.remove(i);
    }
  }

}

function submitAssociate()
{

  var list = document.getElementById('associateListBox');

  for (var i = list.length - 1; i>=0; i--)
  {
    list.options[i].selected=true;
  }

    document.getElementById("associateForm").submit();
}

function enableRemove()
{
    document.getElementById("removeButton").disabled = 0;
}
//Function to limit the character number of textare
function limitText(limitField, limitNum)
{
    if (limitField.value.length > limitNum)
    {
            limitField.value = limitField.value.substring(0, limitNum);
    }
    else
    {
        var wordCount = document.getElementById('wordCount');
        var charLeft = (limitNum - limitField.value.length);
        wordCount.innerHTML="<i>" + charLeft + " characters left." + "</i>";
    }
}

