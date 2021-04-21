const navSlide = () => {
    const linies = document.querySelector(".linies");
    const nav = document.querySelector('.nav-links');
    const links = document.querySelectorAll('.nav-links li');

    linies.addEventListener('click', ()=> {
        nav.classList.toggle('nav-active');

        //Per cada link del menú li dona una animació
        links.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navAnimation 0.5s ease forwards ${index / 5 + 0.2}s`;
            }
        });
        //Afegeix classe per animació a les línies del menú
        linies.classList.toggle('animacioLinies');
    });
}

navSlide();