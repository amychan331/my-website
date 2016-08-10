function toggleNav() {
	var navitem = document.getElementById("main-menu");
	if (navitem.style.display != 'block') {
		//Show menu
		navitem.setAttribute('style', 'display: block; visibility: visible');
		document.getElementById('primary-menu').setAttribute('style', 'width: 100%');
		document.getElementById("navicon").setAttribute('style', 'width: 100%;');
	} else {
		//Hide menu
		navitem.setAttribute('style', 'display: none; visibility: hidden');
		document.getElementById('primary-menu').setAttribute('style', 'width: auto');
		document.getElementById("navicon").setAttribute('style', 'width: auto;');
	}
}
