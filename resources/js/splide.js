/* Splide 
docs https://splidejs.com/
*/
import Splide from '@splidejs/splide';

new Splide( '.splide', {
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