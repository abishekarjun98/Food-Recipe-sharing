
function getdata() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

     document.getElementById("flamecount").innerHTML = this.responseText;
         	
    }
  };
  xhttp.open("GET", "flameupdate.php", true);
  xhttp.send();
}

function postdata()
{
	var term=document.getElementById("entered_comment").value;
  var xhr = new XMLHttpRequest();

 

xhr.open("POST", "add_comment.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("commenti="+term);

}