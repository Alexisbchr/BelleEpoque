const burger = document.querySelector('.burger');
const modalMenu = document.getElementById('modalBurger');

burger.addEventListener('click', () => {
	burger.classList.toggle('active');
	modalMenu.classList.toggle('active-menu');
});
