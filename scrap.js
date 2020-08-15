let mysql = require('mysql');

let config = mysql.createConnection({
    host: 'localhost',
    user: 'chandler',
    password: 'chandler',
    database: 'recipe'
});


var arr=[];

config.connect(function(err) {
  if (err) {
    return console.error('error: ' + err.message);
  }

  console.log('Connected to the MySQL server.');

  });

   var sql ="INSERT INTO daily_tips (ID,Tip) VALUES ?";

const puppeteer = require('puppeteer');

(async () => {
  const browser = await puppeteer.launch();
  const page = await browser.newPage();
  await page.goto('https://www.indianfoodforever.com/cooking-tips.html', {waitUntil: 'load', timeout: 0});
  //await page.screenshot({path: 'example.png'});


  const result = await page.evaluate(() => {

  	let everything=document.querySelectorAll(".entry-content");
  	let tips =[];
  	let arra=[2,4,7,11];
  	var len;
  	everything.forEach(linkelement=>{

  		arra.forEach(func);

  		function func(item)
  		{			
  			len=5;
  			
  		for (var i = 1; i <= len; i++) {

  		const curre=linkelement.querySelector("#post-4179 > div > div > ul:nth-child("+item+") > li:nth-child("+i+")").innerText;
  		tips.push(curre);
  			
  		}


  	}
  	for (var i = 1; i <= 18; i++) {

  		const curre=linkelement.querySelector("#post-4179 > div > div > ul:nth-child(14) > li:nth-child("+i+")").innerText;
  		tips.push(curre);
  			
  		}
  			for (var i = 1; i <= 23; i++) {

  		const curre=linkelement.querySelector("#post-4179 > div > div > ul:nth-child(9) > li:nth-child("+i+")").innerText;
  		tips.push(curre);
  			
  		}



  	});

 
  		return tips;

  });


//console.log(result[5]);

for (var i =0; i < 61; i++) {

  var sam=[];
  sam.push(i);
  sam.push(result[i]);
 
 arr.push(sam);

 delete sam;
 //console.log(result[i]);

}
console.log(arr.length);

config.query(sql, [arr], function (err, result) {
    if (err) throw err;
    console.log("Number of records inserted: " + result.affectedRows);
  });



  await browser.close();
})();







