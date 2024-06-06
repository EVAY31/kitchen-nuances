
/*_______________________________________Кнопка на верх на сайте_________________________________________*/
const btnUp = {
    el: document.querySelector('.btn-up'),
    scrolling: false,
    show() {
        if (this.el.classList.contains('btn-up_hide') && !this.el.classList.contains('btn-up_hiding')) {
            this.el.classList.remove('btn-up_hide');
            this.el.classList.add('btn-up_hiding');
            window.setTimeout(() => {
                this.el.classList.remove('btn-up_hiding');
            }, 300);
        }
    },
    hide() {
        if (!this.el.classList.contains('btn-up_hide') && !this.el.classList.contains('btn-up_hiding')) {
            this.el.classList.add('btn-up_hiding');
            window.setTimeout(() => {
                this.el.classList.add('btn-up_hide');
                this.el.classList.remove('btn-up_hiding');
            }, 300);
        }
    },
    addEventListener() {
        // при прокрутке окна (window)
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY || document.documentElement.scrollTop;
            if (this.scrolling && scrollY > 0) {
                return;
            }
            this.scrolling = false;
            if (scrollY > 400) {
                this.show();
            } else {
                this.hide();
            }
        });

        document.querySelector('.btn-up').onclick = () => {
            this.scrolling = true;
            this.hide();

            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        }
    }
}

btnUp.addEventListener();
// ________________________________________________Начало (кода Свайпера)__________________________________________________
const swiper = new Swiper(".swiper", {

    direction: "horizontal",
    loop: true,
    // autoplay: {
    //     delay: 5000,
    // },

    pagination: {
        el: ".swiper-pagination",
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    // scrollbar: {
    //   el: ".swiper-scrollbar",
    // },
    // ______________________Для______________________
    // Default parameters
    // slidesPerView: 1,
    // spaceBetween: 10,
    // // Responsive breakpoints
    // breakpoints: {
    //   // when window width is >= 320px
    //   320: {
    //     slidesPerView: 2,
    //     spaceBetween: 20
    //   },
    //   // when window width is >= 480px
    //   480: {
    //     slidesPerView: 3,
    //     spaceBetween: 30
    //   },
    //   // when window width is >= 640px
    //   640: {
    //     slidesPerView: 4,
    //     spaceBetween: 40
    //   }
    // }
});

// ________________________________________________Конец (кода Свайпера)_________________________________________________
const params = {
    btnClassName: "js-header-dropdown-btn",
    dropClassName: "js-header-drop",
    activeClassName: "is-active",
    disabledClassName: "is-disabled"
};

function onDisable(evt) {
    if (evt.target.classList.contains(params.disabledClassName)) {
        evt.target.classList.remove(
            params.disabledClassName,
            params.activeClassName
        );
        evt.target.removeEventListener("animationend", onDisable);
    }
}

function setMenuListener() {
    document.body.addEventListener("click", (evt) => {
        const activeElements = document.querySelectorAll(
            `.${params.btnClassName}.${params.activeClassName}, .${params.dropClassName}.${params.activeClassName}`
        );

        if (
            activeElements.length &&
            !evt.target.closest(`.${params.activeClassName}`)
        ) {
            activeElements.forEach((current) => {
                if (current.classList.contains(params.btnClassName)) {
                    current.classList.remove(params.activeClassName);
                } else {
                    current.classList.add(params.disabledClassName);
                }
            });
        }

        if (evt.target.closest(`.${params.btnClassName}`)) {
            const btn = evt.target.closest(`.${params.btnClassName}`);
            const path = btn.dataset.path;
            const drop = document.querySelector(
                `.${params.dropClassName}[data-target="${path}"]`
            );

            btn.classList.toggle(params.activeClassName);

            if (!drop.classList.contains(params.activeClassName)) {
                drop.classList.add(params.activeClassName);
                drop.addEventListener("animationend", onDisable);
            } else {
                drop.classList.add(params.disabledClassName);
            }
        }
    });
}

setMenuListener();
// ________________________________________________Начало (кода карты)___________________________________________________
ymaps.ready(init);
let center = [54.62461917804238, 39.73487543922871];
function init() {
    const map = new ymaps.Map("map", {

            center: center,
            zoom: 17,
            controls: ['geolocationControl', 'zoomControl']
        },
        {
            suppressMapOpenBlock: true,
            geolocationControlSize: "large",
            geolocationControlPosition: {top: "354px", right: "13px"},
            geolocationControlFloat: 'none',
            zoomControlSize: "small",
            zoomControlFloat: "none",
            zoomControlPosition: {top: "261px", right: "22px"},

        });
    let placemark = new ymaps.Placemark(center, {
        balloonContent: `
          <div class="balloon">
            <div class="balloon__country">г. Рязань</div>
            <div class="balloon__address">ул. Чапаева</div>
            <div class="balloon__street">д. 56</div>
          </div>
          `
    }, {
        iconLayout: 'default#image',
        iconImageHref: 'assets/image/icon.svg',
        iconImageSize: [150, 150],
        iconImageOffset: [-110, -110]
    });

    map.geoObjects.add(placemark);
    map.container.fitToViewport();
    map.controls.remove('geolocationControl'); // удаляем геолокацию
    map.controls.remove('searchControl'); // удаляем поиск
    map.controls.remove('trafficControl'); // удаляем контроль трафика
    map.controls.remove('typeSelector'); // удаляем тип
    map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
    // map.controls.remove('zoomControl'); // удаляем контрол зуммирования
    map.controls.remove('rulerControl'); // удаляем контрол правил
    map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
}
// ________________________________________________Конец (кода карты)___________________________________________________
//______________________________________________________БУРГЕР__________________________________________________________
document.querySelector(".burger").addEventListener("click", function() {
    this.classList.toggle("active");
})
const burger = document.querySelector('.burger');
const menu = document.querySelector('.header__nav');
const body = document.body;
const menuLinks = document.querySelectorAll('.nav__link');
const close = document.querySelector('.close');
const search = document.querySelector('.search');


burger.addEventListener('click', (e) => {
    e.currentTarget.classList.toggle('burger--active');
    menu.classList.toggle('header__nav--active');
    body.classList.toggle('stop-scroll');

});

menuLinks.forEach(el => {
    el.addEventListener('click', (e) => {
        burger.classList.remove('burger--active');
        menu.classList.remove('header__nav--active');
        body.classList.remove('stop-scroll');
    });
});
