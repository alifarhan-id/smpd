cc=0
var	openbooks =	new	Array()
openbooks["firstbookicon"]="open"
 


function showsubtoc(elmnt)
{
document.getElementById(elmnt).style.display="block"
}
function hidemenu(elmnt)
{
document.getElementById(elmnt).style.display="none"
}

function changetocimage(icon)
{
var	bi = document.getElementById(icon).id
var	f =	openbooks[bi];
// 0 means closed icon and 1 means open	icon
switch (f)
{
case 0:
document.getElementById(icon).src="images/expanded_open_book_icon.jpg"
openbooks[bi] =	1
break
case 1:
document.getElementById(icon).src="images/collasped_closed_book_icon.jpg"
openbooks[bi] =	0
break
default:
document.getElementById(icon).src="images/expanded_open_book_icon.jpg"
openbooks[bi] =	1
break
}
}

function dynamicmenu(element,icon)
{
var	bi = document.getElementById(icon).id
var	f =	openbooks[bi];
// 0 means closed icon and 1 means open	icon

switch (f)
{
case 0:
document.getElementById(icon).src="images/expanded_open_book_icon.jpg"
document.getElementById(element).style.display="block"
openbooks[bi] =	1
break
case 1:
document.getElementById(icon).src="images/collasped_closed_book_icon.jpg"
document.getElementById(element).style.display="none"
openbooks[bi] =	0
break
default:
document.getElementById(icon).src="images/expanded_open_book_icon.jpg"
document.getElementById(element).style.display="block"
openbooks[bi] =	1
break
}


}

function gup( name )
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}

function navigate()
{
  page = gup("page");
  if (page != "")
    window.frames[1].location = page;
}