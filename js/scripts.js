/*!
* Start Bootstrap - Shop Homepage v5.0.6
*/

// 1. SCRIPT TỰ ĐỘNG CUỘN PRE-ORDER 
document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector('.scrolling-wrapper');
    
    if (wrapper) {
        const originalHTML = wrapper.innerHTML;
        wrapper.innerHTML = originalHTML.repeat(6);
        const originalWidth = wrapper.scrollWidth / 6;
        
        let isPaused = false;
        
        wrapper.addEventListener('mouseenter', () => isPaused = true);
        wrapper.addEventListener('mouseleave', () => isPaused = false);
        wrapper.addEventListener('touchstart', () => isPaused = true, {passive: true});
        wrapper.addEventListener('touchend', () => isPaused = false);

        function autoScroll() {
            if (!isPaused) {
                wrapper.scrollLeft += 0.5; 
                if (wrapper.scrollLeft >= originalWidth) {
                    wrapper.scrollLeft -= originalWidth;
                }
            }
            requestAnimationFrame(autoScroll);
        }
        
        autoScroll();
    }
});

// 2. SCRIPT XỬ LÝ NÚT MỞ RỘNG & THU GỌN 
document.addEventListener("DOMContentLoaded", function() {
    const btnExpand = document.getElementById("btnExpandProducts");
    const btnCollapse = document.getElementById("btnCollapseProducts");
    const hiddenProducts = document.querySelectorAll(".extra-product");

    if (btnExpand && btnCollapse) {
        btnExpand.addEventListener("click", function() {
            hiddenProducts.forEach(product => product.classList.remove("d-none"));
            btnExpand.classList.add("d-none");
            btnCollapse.classList.remove("d-none");
        });

        btnCollapse.addEventListener("click", function() {
            hiddenProducts.forEach(product => product.classList.add("d-none"));
            btnCollapse.classList.add("d-none");
            btnExpand.classList.remove("d-none");
            
            // Cuộn lên cho gọn
            window.scrollTo({
                top: document.querySelector('.row-cols-lg-4').offsetTop - 150,
                behavior: 'smooth'
            });
        });
    }
});

// 3. SCRIPT LOAD TRANG
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.reload-page').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const loader = document.getElementById('page-loader');
            if(loader) loader.classList.add('active');
            setTimeout(() => {
                window.location.href = this.href;
            }, 500);
        });
    });
});

// Đếm ngược thời gian
let timeInSeconds = 14 * 3600 + 1 * 60 + 4; // Ví dụ: 14h 01m 04s
const display = document.getElementById('time-display');

setInterval(() => {
    let hours = Math.floor(timeInSeconds / 3600);
    let minutes = Math.floor((timeInSeconds % 3600) / 60);
    let seconds = timeInSeconds % 60;

    display.textContent = 
        String(hours).padStart(2, '0') + ":" + 
        String(minutes).padStart(2, '0') + ":" + 
        String(seconds).padStart(2, '0');

    if (timeInSeconds > 0) timeInSeconds--;
}, 1000);