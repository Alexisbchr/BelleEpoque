'use strict';
let input = document.querySelector('#searchadm');

input.addEventListener('keyup', () => {

	let textFind = document.querySelector('#searchadm').value;
	console.log(textFind);
	let req = new Request('../src/services/SearchAdm.php', {
		method: 'POST',
		body: JSON.stringify({ textToFind: textFind })
	});
	fetch(req)
		.then(response => response.text())
		.then(response => {
			document.getElementById("targetadm").innerHTML = response;
		})
})
