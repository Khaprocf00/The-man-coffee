const imgposition = document.querySelectorAll(".aspect-ratio-169 a");
const imgchuyendong = document.querySelector('.aspect-ratio-169');
const dotitem = document.querySelectorAll(".dotcontainer .dot")
let imgnumber = imgposition.length;
let index = 0;

imgposition.forEach(function (image, index) {
    image.style.left = index * 100 + "%";
    dotitem[index].addEventListener("click", function () {
        slide(index);
    })
});
function imgSlide() {
    index++;
    if (index >= imgnumber) {
        index = 0;
    }
    slide(index);
}

function slide(k) {
    imgchuyendong.style.left = "-" + k * 100 + "%";
    const dotactive = document.querySelector('.active');
    dotactive.classList.remove('active');
    dotitem[k].classList.add('active');
    index = k;
}
setInterval(imgSlide, 10000);