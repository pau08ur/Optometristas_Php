const option1 = document.getElementById('option1')
const option2 = document.getElementById('option2')
const option3 = document.getElementById('option3')
const option4 = document.getElementById('option4')
const option5 = document.getElementById('option5')
const content1 = document.getElementById('content1')
const content2 = document.getElementById('content2')
const content3 = document.getElementById('content3')
const content4 = document.getElementById('content4')
const content5 = document.getElementById('content5')

let chose = 1

const changeOption = () => {
    chose == 1 ? (
        option1.classList.value = 'option option-active',
        content1.classList.value = 'content content-active'
    )
    : (
        option1.classList.value = 'option',
        content1.classList.value = 'content '
    )

    chose == 2 ? (
        option2.classList.value = 'option option-active',
        content2.classList.value = 'content content-active'
    )
    : (
        option2.classList.value = 'option',
        content2.classList.value = 'content '
    )

    chose == 3 ? (
        option3.classList.value = 'option option-active',
        content3.classList.value = 'content content-active'
    )
    : (
        option3.classList.value = 'option',
        content3.classList.value = 'content '
    )

    chose == 4 ? (
        option4.classList.value = 'option option-active',
        content4.classList.value = 'content content-active'
    )
    : (
        option4.classList.value = 'option',
        content4.classList.value = 'content '
    )

    chose == 5 ? (
        option5.classList.value = 'option option-active',
        content5.classList.value = 'content content-active'
    )
    : (
        option5.classList.value = 'option',
        content5.classList.value = 'content '
    )


}

option1.addEventListener('click', ()=> {
    chose = 1
    changeOption()
})

option2.addEventListener('click', ()=> {
    chose = 2
    changeOption()
})

option3.addEventListener('click', ()=> {
    chose = 3
    changeOption()
})

option4.addEventListener('click', ()=> {
    chose = 4
    changeOption()
})

option5.addEventListener('click', ()=> {
    chose = 5
    changeOption()
})