// ПРЕДВАРИТЕЛЬНЫЙ ПОКАЗ ИЗОБРАЖЕНИЯ
function readURL(input) {

	if (input.files && input.files[0]) {
		 var reader = new FileReader();

		 reader.onload = function (e) {
			  $('#imgpredpocaz').attr('src', e.target.result);
			  // $('.preview span').css('display', 'none');
		 }

		 reader.readAsDataURL(input.files[0]);
	}
}

$("#inputimg").change(function(){
	readURL(this);
});

// Burger menu

let buttonMenuButton = document.querySelector(".hamburger");
let burgerMenu = document.querySelector(".hiddenlisthamburger");

buttonMenuButton.addEventListener("click", (e) => {
	e.preventDefault();
	burgerMenu.classList.toggle("active");
	if (burgerMenu.classList.contains("active")) {
		burgerMenu.style.display = "flex";
	} else {
		burgerMenu.style.display = "none";
	}
});