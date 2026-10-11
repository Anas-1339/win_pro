// 1. كود العداد التنازلي للوقت (Countdown)
/*
var countDownDate = new Date("dec 18, 2026 15:00:00").getTime();

var x = setInterval(function() {
    var counter = document.querySelector("#countdown");
    var now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    if (counter) {
        counter.innerHTML = days + " يوم " + hours + " ساعه " + minutes + " دقيقه " + seconds + " ثانيه ";
    }

    if (distance < 0) {
        clearInterval(x);
        if (counter) counter.innerHTML = "لقد وصلت متاخراً";
    }
}, 1000);

// 2. إعداد عناصر التحكم بالـ Loader والـ Modal
const win = document.querySelector("#winner");
const cards = document.querySelector("#cards");
const loader = document.querySelector(".loader-con");
var myModal = new bootstrap.Modal(document.getElementById('modal'), {
    keyboard: false
});

win.addEventListener('click', function() {
    alert("test");
   // cards.style.display = "flex";
   // loader.style.display = 'block'; // إظهار حاوية التحميل
   // myModal.show();
   } );*/