const slideContainer = document.querySelector(".slides-show");
const slideImages = document.querySelectorAll(".slide");
const prevBtn = document.querySelector('#prev')
const nextBtn = document.querySelector('#next')

let counter = 0;
const size = slideImages[0].clientWidth

slideContainer.style.width = `${slideImages.length * size}px`
// slideContainer.style.transform = `translateX(-${size*counter}px)`


prevBtn.addEventListener('click',()=>{
    if(counter === 0)
    {
        counter = slideImages.length - 1
    }
    else
    {
        counter--
    }
    slideContainer.style.transform = `translateX(-${size*counter}px)`
})

nextBtn.addEventListener('click',()=>{
    if(counter < slideImages.length -1)
    {
        counter++
    }
    else{
        counter = 0
    }
    slideContainer.style.transform = `translateX(-${size*counter}px)`
})
