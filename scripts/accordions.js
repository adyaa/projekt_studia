function init() {
	let acc = document.getElementsByClassName("accordion__header");
	for ( let i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", showContent);
	}
	function showContent() {
        this.nextElementSibling.classList.toggle("open");
        this.classList.toggle("active");
	}
}
document.addEventListener("DOMContentLoaded", init);
