<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chatbot on pure JavaScript by Itchief</title>
    <link rel="stylesheet" href="{{asset('assets/css/chatbot.css')}}">
    <script src="{{asset('assets/js/fp2.js')}}"></script>
    <script src="{{asset('assets/js/chatbot.js')}}"></script>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        @media (prefers-reduced-motion: no-preference) {
            :root {
                scroll-behavior: smooth;
            }
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
    </style>
</head>
<body>
<div class="chatbot__btn">
    <div class="chatbot__tooltip d-none">Есть вопрос?</div>
</div>

<script>
    // конфигурация чат-бота
    const configChatbot = {};
    // CSS-селектор кнопки, посредством которой будем вызывать окно диалога с чат-ботом
    configChatbot.btn = '.chatbot__btn';
    // ключ для хранения отпечатка браузера
    configChatbot.key = 'fingerprint';
    // реплики чат-бота
    configChatbot.replicas = '{{asset('assets/data/data-1.json')}}';
    // корневой элемент
    configChatbot.root = SimpleChatbot.createTemplate();
    // URL chatbot.php
    configChatbot.url = '{{asset('assets/chatbot/chatbot.php')}}';
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
                console.log('Реплики успешно загружены:', configChatbot.replicas); // Добавлено для отладки
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
</script>

</body>

</html>
