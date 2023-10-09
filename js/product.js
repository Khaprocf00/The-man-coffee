
const k = document.getElementById('price')//lấy element có id price

const buttonSizeItems = document.querySelectorAll("#container-product .buttonsize")// lấy hết phần tử có class là buttonsize trong thẻ có id container-product
const buttonTopingItems = document.querySelectorAll("#container-product .button-toping")
const priceSizeItems = document.querySelectorAll(".addprice-size")
const priceTopingItems = document.querySelectorAll(".addprice-toping")
let index = 0
let price = parseInt(k.innerHTML)
let xxx = 0;
let yyy = 0;
buttonSizeItems.forEach(function (buttonitem, index) {
    console.log(buttonitem, index)
    buttonSizeItems[index].addEventListener
        ("click", function () {
            const buttonactive = document.querySelector('.buttonsize.active')
            if (buttonactive)
                buttonactive.classList.remove('active')
            buttonSizeItems[index].classList.add('active')
            xxx = parseInt(priceSizeItems[index].innerHTML)
            if (xxx == 0 && yyy != 0) {
                k.innerHTML = price + yyy;
            }
            else if (yyy != 0 && xxx != 0) {

                k.innerHTML = price + xxx + yyy
            }
            else if (yyy == 0) {
                k.innerHTML = price + xxx;
            }

        })
})
buttonTopingItems.forEach(function (buttonitem, index) {
    buttonTopingItems[index].addEventListener
        ("click", function () {
            const buttonactive = document.querySelector('.button-toping.active')
            if (buttonactive)
                buttonactive.classList.remove('active')
            buttonTopingItems[index].classList.add('active')
            yyy = parseInt(priceTopingItems[index].innerHTML);
            if (xxx == 0) {
                k.innerHTML = price + yyy
            }
            else if (yyy != 0 && xxx != 0) {

                k.innerHTML = price + xxx + yyy
            }
            else if (xxx != 0 && yyy == 0) {
                k.innerHTML = price + xxx;
            }
        })
})

