'use strict';
let input = document.querySelector('#search');
if(input !== null) {
 	input.addEventListener('keyup', () => {

 				let textFind = document.querySelector('#search').value;
 				console.log(textFind);
 				let req = new Request('./src/services/Search.php', {
 					method: 'POST',
 					body: JSON.stringify({ textToFind: textFind })
 				});
 				fetch(req)
 					.then(response => response.text())
 					.then(response => {
 						document.getElementById("target").innerHTML = response;
 					})})
}
