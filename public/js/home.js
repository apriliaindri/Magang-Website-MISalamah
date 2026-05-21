document.addEventListener("DOMContentLoaded", () => {

    // COUNTER
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {

        const updateCount = () => {

            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / 100;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target + "+";
            }

        };

        updateCount();
    });

    // SLIDER PENGUMUMAN
    let currentSlide = 0;

    const slider = document.getElementById('pengumumanSlider');
    const slides = document.querySelectorAll('.pengumuman-slide');

    document.getElementById('nextPengumuman').addEventListener('click', () => {

        if (currentSlide < slides.length - 1) {
            currentSlide++;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

    });

    document.getElementById('prevPengumuman').addEventListener('click', () => {

        if (currentSlide > 0) {
            currentSlide--;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

    });

});
