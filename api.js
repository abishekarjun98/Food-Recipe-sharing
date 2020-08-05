
<?php



?>








var url=" https://www.googleapis.com/customsearch/v1?key=AIzaSyCeOsf_ZutZPxiRMTeBHeQcZzGiiteSnX8&cx=008767739067013867662:qovos-gsxu8&q=capsicum+panner"

async function getdata()
{

const response=await fetch(url);
const json=await response.json();





/*
document.getElementById("name").innerHTML=json.items[1].title;
document.getElementById("img").setAttribute("src",json.items[1].pagemap.cse_thumbnail[0].src);
document.getElementById("link").setAttribute("href",json.items[1].formattedUrl);
document.getElementById("descp").innerHTML=json.items[1].snippet;

*/

for (var i = 0; i<5 ; i++)
 {
	
		var title = document.createElement("H3");
		title.innerHTML = json.items[i].title;                
		document.getElementById("content").appendChild(title);

		var descp = document.createElement("P");
		descp.innerHTML = json.items[i].snippet;                
		document.getElementById("content").appendChild(descp);



	  		var fimg = document.createElement("IMG");
  			fimg.setAttribute("src", json.items[i].pagemap.cse_thumbnail[0].src);
			document.getElementById("content").appendChild(fimg);

	  			
	  			var a = document.createElement('a'); 
                var link = document.createTextNode("View Full Recipe");
                a.appendChild(link);   
                a.title = "View Full Recipe"; 
                a.href = json.items[i].formattedUrl;  
                document.getElementById("content").appendChild(a);

                
}





}

getdata();