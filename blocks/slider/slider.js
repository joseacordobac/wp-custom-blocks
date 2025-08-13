window.addEventListener('DOMContentLoaded', function () {
	const swiperContainers = document.querySelectorAll('.swiper-container');
	const swipers = {};
	const thumbsIds = [];


	swiperContainers.forEach(container => {
		const id = container.getAttribute('id');
		const swiperOptions = JSON.parse(container.getAttribute('data-swiper'));

		if (!swiperOptions?.Hasthumbs) {
			swipers[id] = new Swiper(container, swiperOptions);
			thumbsIds.push(swipers[id]);
		}
	});

	console.log(thumbsIds);
	swiperContainers.forEach(container => {
		const id = container.getAttribute('id');
		const swiperOptions = JSON.parse(container.getAttribute('data-swiper'));

		if (swiperOptions.Hasthumbs) {
			swiperOptions.thumbs = {
				swiper: thumbsIds[0]
			};

			console.log(swiperOptions);
			swipers[id] = new Swiper(container, swiperOptions);
		}


	});
});
