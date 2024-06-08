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
    autoplay: {
        delay: 5000,
    },

    pagination: {
        el: ".swiper-pagination",
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// ________________________________________________Конец (кода Свайпера)_________________________________________________
// ________________________________________________Начало (Выпадающий список)_________________________________________________
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

// ________________________________________________Конец (Выпадающего список)_________________________________________________
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
        iconImageSize: [120, 120],
        iconImageOffset: [-95, -95]
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
document.querySelector(".burger").addEventListener("click", function () {
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


// _________________________________chat_______________________________________

// конфигурация чат-бота
const configChatbot = {};
// CSS-селектор кнопки, посредством которой будем вызывать окно диалога с чат-ботом
configChatbot.btn = '.chatbot__btn';
// ключ для хранения отпечатка браузера
configChatbot.key = 'fingerprint';
// реплики чат-бота
configChatbot.replicas = '/assets/data/data-1.json';
// корневой элемент
configChatbot.root = SimpleChatbot.createTemplate();
// URL chatbot.php
configChatbot.url = '/assets/chatbot/chatbot.php';
// переменная для хранения экземпляра
let chatbot = null;
// добавление ключа для хранения отпечатка браузера в LocalStorage
let fingerprint = localStorage.getItem(configChatbot.key);
if (!fingerprint) {
    Fingerprint2.get(function (components) {
        fingerprint = Fingerprint2.x64hash128(components.map(function (pair) {
            return pair.value
        }).join(), 31)
        localStorage.setItem(configChatbot.key, fingerprint)
    });
}
// при клике по кнопке configChatbot.btn
document.querySelector(configChatbot.btn).onclick = function (e) {
    this.classList.add('d-none');
    const $tooltip = this.querySelector('.chatbot__tooltip');
    if ($tooltip) {
        $tooltip.classList.add('d-none');
    }
    configChatbot.root.classList.toggle('chatbot_hidden');
    if (chatbot) {
        return;
    }
    // получение json-файла, содержащего сценарий диалога для чат-бота через AJAX
    const request = new XMLHttpRequest();
    request.open('GET', configChatbot.replicas, true);
    request.responseType = 'json';
    request.onload = function () {
        const status = request.status;
        if (status === 200) {
            const data = request.response;
            if (typeof data === 'string') {
                configChatbot.replicas = JSON.parse(data);
            } else {
                configChatbot.replicas = data;
            }
            // инициализация SimpleChatbot
            chatbot = new SimpleChatbot(configChatbot);
            chatbot.init();
        } else {
            console.log(status, request.response);
        }
    };
    request.send();
};

// подсказка для кнопки
const $btn = document.querySelector(configChatbot.btn);
$btn.addEventListener('mouseover', function (e) {
    const $tooltip = $btn.querySelector('.chatbot__tooltip');
    if (!$tooltip.classList.contains('chatbot__tooltip_show')) {
        $tooltip.classList.remove('d-none');
        setTimeout(function () {
            $tooltip.classList.add('chatbot__tooltip_show');
        }, 0);
    }
});
$btn.addEventListener('mouseout', function (e) {
    const $tooltip = $btn.querySelector('.chatbot__tooltip');
    if ($tooltip.classList.contains('chatbot__tooltip_show')) {
        $tooltip.classList.remove('chatbot__tooltip_show');
        setTimeout(function () {
            $tooltip.classList.add('d-none');
        }, 200);
    }
});

setTimeout(function () {
    const tooltip = document.querySelector('.chatbot__tooltip');
    tooltip.classList.add('chatbot__tooltip_show');
    setTimeout(function () {
        tooltip.classList.remove('chatbot__tooltip_show');
    }, 10000)
}, 10000);

