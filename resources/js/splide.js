/* Splide 
docs https://splidejs.com/
*/
import Splide from '@splidejs/splide';

window.Splide = require("@splidejs/splide"); //splide default
/*
new Splide( '#splide', {
	rewind: true,
	gap: "1em",
	type: "loop",
	pagination: true,
	autoplay: true,
	perPage: 2, 
	perMove: 1,
	height: "12rem",
	fixedWidth: "12rem", 
	focus: "center", 
	lazyLoad: true,
	breakpoints: {
		640: {
			perPage: 1,
		},
	}
}).mount();
*/

//galeria de fotos
/* var secondarySlider = new Splide( '#secondary-slider', {
		fixedWidth  : 100,
		height      : 60,
		gap         : 10,
		cover       : true,
		isNavigation: true,
		focus       : 'center',
		breakpoints : {
			'600': {
				fixedWidth: 66,
				height    : 40,
			}
		},
	} ).mount();
	
var primarySlider = new Splide( '#primary-slider', {
	type       : 'fade',
	heightRatio: 0.5,
	pagination : false,
	arrows     : false,
	cover      : true,
} ); // do not call mount() here.

primarySlider.sync( secondarySlider ).mount();
*/