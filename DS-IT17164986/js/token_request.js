//Name - Kapuge P.K.M.C
//SID  -  IT17164986

function tokenRequest(cookie) {
  //Get cookies
  var cookieSet = document.cookie;

  var EditedcookieSet = cookieSet.replace(/ /g,"");
  var arr = EditedcookieSet.split(";");
  var arrSize = arr.length;
  var csrfToken = "";
  var csrfCookie = "";
  var i = 0;

  //Search for CSRF Token Among Other Cookies
  while(i <= arrSize){
    var element = arr[i];
    var result = element.match(cookie+"=");
    if(result != null){
      var arr2 = arr[i].split("=");
      csrfToken = arr2[1];
      csrfCookie = arr2[0];
      break;
    }
    i++;
  }
  document.getElementById("MyToken").setAttribute("value", csrfToken);
  document.getElementById("CSRFcookie").setAttribute("value", csrfCookie);
}
