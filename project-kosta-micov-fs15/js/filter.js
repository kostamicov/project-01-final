let cardsAll = document.querySelectorAll(".cards");
let marketing = document.querySelector("#marketing");
let frontEnd = document.querySelector("#front-end");
let design = document.querySelector("#design");
let activeClassFrontend = document.querySelector(".activeclassfrontend");
let activeClassDesign = document.querySelector(".activeclassdesign");
let activeClassMarketing = document.querySelector(".activeclassmarketing");
let loading = document.querySelector("#loadMore");
let currentCards = 6;

marketing.addEventListener("change", cardsMarketing);
function cardsMarketing() {
    frontEnd.checked = false;
    design.checked = false;
    activeClassFrontend.classList.remove('active');
    activeClassDesign.classList.remove('active');
    if (marketing.checked) {
        activeClassMarketing.classList.add('active');
        hideAllCards();
        let marketingAll = document.querySelectorAll(".marketing");
        for (let index = 0; index < marketingAll.length; index++)
            marketingAll[index].style.display = "inline-block";
        loading.style.display = "none";
    } else {
        activeClassMarketing.classList.remove('active');
        showAllCards();
    }
}

frontEnd.addEventListener("change", cardsFrontEnd);
function cardsFrontEnd() {
    marketing.checked = false;
    design.checked = false;
    activeClassMarketing.classList.remove('active');
    activeClassDesign.classList.remove('active');
    if (frontEnd.checked) {
        activeClassFrontend.classList.add('active');
        hideAllCards();
        let programiranjeAll = document.querySelectorAll(".programiranje");
        for (let index = 0; index < programiranjeAll.length; index++)
            programiranjeAll[index].style.display = "inline-block";
        loading.style.display = "none";
    } else {
        activeClassFrontend.classList.remove('active');
        showAllCards();
    }
}

design.addEventListener("change", cardsDesign);
function cardsDesign() {
    marketing.checked = false;
    frontEnd.checked = false;
    activeClassMarketing.classList.remove('active');
    activeClassFrontend.classList.remove('active');
    if (design.checked) {
        activeClassDesign.classList.add('active');
        hideAllCards();
        let dizajnAll = document.querySelectorAll(".dizajn");
        for (let index = 0; index < dizajnAll.length; index++)
            dizajnAll[index].style.display = "inline-block";
        loading.style.display = "none";
    } else {
        activeClassDesign.classList.remove('active');
        showAllCards();
    }
}

function hideAllCards() {
    for (let index = 0; index < cardsAll.length; index++)
        cardsAll[index].style.display = "none";
}

function showAllCards() {
    for (let index = 0; index < cardsAll.length; index++)
        cardsAll[index].style.display = "inline-block";
}

loading.addEventListener("click", loadMoreBtn);
function loadMoreBtn() {
    loading.style.backgroundColor = '#ff0000';
    for (let index = currentCards; index < currentCards + 6; index++) {
        if (cardsAll[index]) {
            cardsAll[index].style.display = "inline-block";
        }
    }
    currentCards += 6;
    if (currentCards >= cardsAll.length) {
        loading.style.display = "none";
    }
}

$(document).ready(function () {
    $(".close").click(function () {
        $(".collapse").collapse('hide');
    });
});
