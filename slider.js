const carouselSlide = document.querySelector('.carousel-slide');
const carouselItems = document.querySelectorAll('.carousel-slide item-card');

//Buttons
const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');

//Counter
let counter = 0;
const size = 265;
let numOfItems = document.getElementsByClassName('item-card').length;


//Button listeners
nextBtn.addEventListener('click', () => {
    if (counter < (numOfItems-4)) {
        carouselSlide.style.transition = "transform 0.4s ease-in-out";
        counter++;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}
})

prevBtn.addEventListener('click', () => {
    if (counter > 0) {
        carouselSlide.style.transition = "transform 0.4s ease-in-out";
        counter--;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
})