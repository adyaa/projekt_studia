
function init() {
	var toggle = false;
	let acc = document.getElementsByClassName("open-button");
	let openOverlay= document.querySelector(".open-overlay");

	for ( let i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", showContent);
	}

	function showContent() {

		if (toggle == true) {
			document.querySelector('.button-img').src = "images/menu-options.png";			
		} else {
			document.querySelector('.button-img').src = "images/cancel.png";	
		}

		toggle = !toggle; 
        this.nextElementSibling.classList.toggle("open-overlay");
    }
}

document.addEventListener("DOMContentLoaded", init);
