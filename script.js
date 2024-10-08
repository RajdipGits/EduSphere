const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});

const main1 = document.querySelectorAll('.first h1');
const main2 = document.querySelectorAll('.sectitle h2');
const main3 = document.querySelectorAll('.sectitle p');
const features = document.querySelectorAll('.sec-first h1');
const card1 = document.querySelectorAll('.card-1');
const card2 = document.querySelectorAll('.card-2');
const card3 = document.querySelectorAll('.card-3');
const about = document.querySelectorAll('.about h1');
const abouttitle = document.querySelectorAll('.abouttext p');


main1.forEach(el => {
    observer.observe(el);
});
main2.forEach(el => {
    observer.observe(el);
});
main3.forEach(el => {
    observer.observe(el);
});
features.forEach(el => {
    observer.observe(el);
});
card1.forEach(el => {
    observer.observe(el);
});
card2.forEach(el => {
    observer.observe(el);
});
card3.forEach(el => {
    observer.observe(el);
});
about.forEach(el => {
    observer.observe(el);
});
abouttitle.forEach(el => {
    observer.observe(el);
});

document.querySelectorAll('.scroll-link').forEach(link => {
    link.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('data-target'));
        target.scrollIntoView({ behavior: 'smooth' });
    });
});

window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    const section = params.get('section');
    if (section) {
        const target = document.querySelector('.' + section);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    }
};