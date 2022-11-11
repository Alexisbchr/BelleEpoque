const openMenu = document.getElementById('openBurger');
const modalMenu = document.getElementById('modalBurger');
console.log(openMenu);
openMenu.addEventListener('click', () => {
	console.log('click');
	modalMenu.style.display = 'flex';
});
