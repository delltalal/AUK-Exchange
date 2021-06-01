/* 

Item card slider for Homepage
Hamad Al-Hendi S0004067

 */

//select the container for the item cards
const carouselSlide = document.querySelector('.carousel-slide');
//select the item cards
const carouselItems = document.querySelectorAll('.carousel-slide item-card');

//Buttons to navigate through the slider 
const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');

//Counter to keep track of which item the carousel is at
var counter = 0;
//The size of each item card is about 265 pixels.
const size = 265;
//get the number of items within the hompage (maximum is 12)
var numOfItems = document.getElementsByClassName('item-card').length;


//Button listeners that will add a css animation that moves the item card 256pixels on either sides on a press of a button (using an x-coordinate).
nextBtn.addEventListener('click', () => {
    if (counter < (numOfItems - 4)) {
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