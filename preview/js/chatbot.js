(function() {
    'use strict';

    const GEMINI_API_KEY = 'AIzaSyBN4E1uTJdm9tsPh1DX6oThI6Hj6EOKFtE';
    const GEMINI_MODELS = [
        'gemini-2.5-flash',
        'gemini-2.5-flash-lite',
        'gemini-1.5-flash'
    ];
    const getApiUrl = (model) => `https://generativelanguage.googleapis.com/v1beta/models/${model}:generateContent`;

    const SYSTEM_PROMPT = `Eres el asistente virtual de Hotel Can Quetglas, un hotel boutique de lujo ubicado en un palacio modernista de 1908 en el barrio de El Terreno, Palma de Mallorca.

INFORMACIÓN DEL HOTEL:
- Edificio: Palacio modernista catalogado de 1908, diseñado por un discípulo de Gaudí
- Ubicación: Calle Santa Rita 13, El Terreno, 07014 Palma de Mallorca
- El hotel abrió en Julio de 2022. Fue comprado por los actuales propietarios en 1992
- El Terreno fue el refugio de verano de la aristocracia de Palma y celebridades internacionales. En el siglo XX atrajo artistas, escritores y espíritus bohemios
- Vistas: Castillo de Bellver y su bosque (el pulmón verde de Palma)
- Características: Frescos modernistas originales de 1908, suelos hidráulicos con patrones geométricos, vidrieras, herrería de época, puertas de madera tallada
- Política: Solo Adultos (+14 años)
- Total: 9 habitaciones

HABITACIONES (5 tipos):
1. Standard con Terraza (20m²): Terraza privada, perfecta para parejas. Cama doble
2. Deluxe (30m²): Espaciosa, luz natural, toques mallorquines tradicionales, vistas al jardín
3. Deluxe Premium (30m²): Amenities premium, cama Queen + sofá cama, cerca de la piscina y jardín mediterráneo
4. Deluxe con Terraza (40m²): Amplia terraza privada con vistas al jardín centenario
5. Suite Can Quetglas (50m²): La joya del hotel. Frescos modernistas originales de 1908, cama King, terraza privada con vistas impresionantes

GASTRONOMÍA:
- Desayuno: Productos locales mallorquines y sabores mediterráneos. Servido en la terraza del jardín o junto a la piscina
  * Continental: Bollería fresca, panes artesanos, mermeladas locales y miel
  * Platos calientes: Huevos al gusto, tortitas, fruta fresca
  * Bebidas: Zumos naturales, café, selección de tés
- Snack Bar (junto a la piscina): Tapas mediterráneas bajo el sol mallorquín
  * Tapas: Tabla de quesos artesanos, jamón ibérico, nachos con guacamole
  * Snacks: Pizzas caseras, sándwiches gourmet, ensaladas frescas

WELLNESS Y SERVICIOS:
- Piscina de agua salada: Más suave para la piel que el cloro, rodeada de jardín mediterráneo con árboles centenarios
- Jardín mediterráneo: Naranjos, limoneros, palmeras y plantas autóctonas. Zonas de sombra para leer o relajarse
- El Torreón: Terraza panorámica en la azotea con vistas a la bahía de Palma, el Castillo de Bellver, su bosque y la Catedral. Sofás cómodos, ambiente al aire libre pero resguardado. Ideal para champagne al atardecer. Se puede reservar para tratamientos faciales con vistas
- Masajes y tratamientos: Por THINKCOSMETIC, con productos ecológicos mallorquines
- Yoga y Pilates: Sesiones disponibles
- Entrenamiento personal: En el bosque del Castillo de Bellver

HORARIOS:
- Check-in: a partir de las 15:00h
- Check-out: hasta las 11:00h
- Desayuno: 8:00h - 10:00h
- Piscina: 9:00h - 21:00h (solo del 1 de abril al 31 de octubre). Del 1 de noviembre al 31 de marzo la piscina está cerrada.
- Jardín: Abierto todo el año
- Snack Bar: 12:00h - 21:00h (del 1 de abril al 31 de octubre). 12:00h - 20:00h (del 1 de noviembre al 31 de marzo)

CONTACTO:
- Dirección: Calle Santa Rita 13, 07014 Palma de Mallorca
- Teléfono: +34 871 626 000
- Email: info@hotelcanquetglas.com
- Instagram: @hotelcanquetglas
- Facebook: /hotelcanquetglas

UBICACIÓN:
- A pocos minutos del centro histórico de Palma y del paseo marítimo
- Cerca de las mejores playas
- El Terreno: Barrio histórico con galerías de arte local y espíritu bohemio

INSTRUCCIONES:
- Responde siempre de forma amable, cálida y profesional, como un conserje de hotel de lujo
- IDIOMA: Responde SIEMPRE y COMPLETAMENTE en el mismo idioma del usuario. Si escriben en inglés, responde TODO en inglés. Si escriben en español, responde TODO en español. NUNCA mezcles idiomas.
- Si preguntan por precios exactos o disponibilidad, invita a contactar directamente: +34 871 626 000 o info@hotelcanquetglas.com
- Da respuestas informativas pero concisas (3-4 frases). Si piden más detalle, extiende la respuesta
- Destaca siempre la exclusividad, la historia y el ambiente único del hotel
- Puedes recomendar reservar el Torreón para ocasiones especiales

CUÁNDO RESPONDER "[NO_INFO]":
- SOLO responde exactamente "[NO_INFO]" (sin nada más, sin explicaciones) en estos casos:
  1. Preguntas personales sobre el usuario (su edad, nombre, etc.)
  2. Temas completamente ajenos al hotel (política, deportes, recetas, noticias, etc.)
  3. Precios exactos de habitaciones
  4. Disponibilidad de fechas específicas

NUNCA respondas "[NO_INFO]" para preguntas sobre:
- Número de habitaciones (son 9)
- Tipos de habitaciones
- Servicios del hotel
- Horarios
- Ubicación
- Historia del edificio
- Gastronomía
- Wellness
- Cualquier información que esté en este documento`;

    // Inject styles
    const styles = document.createElement('style');
    styles.textContent = `
        .chatbot-bubble {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 60px;
            height: 60px;
            background: #1a1a1a;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, background 0.3s ease;
        }
        .chatbot-bubble:hover {
            transform: scale(1.1);
            background: #2d2d2d;
        }
        .chatbot-bubble svg {
            width: 28px;
            height: 28px;
            fill: white;
        }
        .chatbot-window {
            position: fixed;
            bottom: 100px;
            right: 24px;
            width: 360px;
            max-width: calc(100vw - 48px);
            height: 500px;
            max-height: calc(100vh - 140px);
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.2);
            z-index: 9998;
            display: none;
            flex-direction: column;
            overflow: hidden;
            font-family: 'Montserrat', -apple-system, sans-serif;
        }
        .chatbot-window.open {
            display: flex;
        }
        .chatbot-header {
            background: #1a1a1a;
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chatbot-header-logo {
            height: 32px;
            width: auto;
            filter: brightness(0) invert(1);
        }
        .chatbot-close {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 4px;
            display: flex;
            opacity: 0.8;
            transition: opacity 0.2s;
        }
        .chatbot-close:hover {
            opacity: 1;
        }
        .chatbot-messages {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: #f7f3ed;
        }
        .chatbot-message {
            max-width: 85%;
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        .chatbot-message.bot {
            background: white;
            color: #1a1a1a;
            align-self: flex-start;
            border-bottom-left-radius: 4px;
        }
        .chatbot-message.bot a {
            color: #1a1a1a;
            text-decoration: underline;
            font-weight: 500;
        }
        .chatbot-message.bot a:hover {
            color: #8b7355;
        }
        .chatbot-message.user {
            background: #1a1a1a;
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }
        .chatbot-message.typing {
            display: flex;
            gap: 4px;
            padding: 16px 20px;
        }
        .chatbot-message.typing span {
            width: 8px;
            height: 8px;
            background: #1a1a1a;
            border-radius: 50%;
            animation: typing 1.4s infinite;
        }
        .chatbot-message.typing span:nth-child(2) { animation-delay: 0.2s; }
        .chatbot-message.typing span:nth-child(3) { animation-delay: 0.4s; }
        @keyframes typing {
            0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
            30% { transform: translateY(-8px); opacity: 1; }
        }
        .chatbot-input-area {
            padding: 16px;
            background: white;
            border-top: 1px solid #ebe5db;
            display: flex;
            gap: 10px;
        }
        .chatbot-input {
            flex: 1;
            border: 1px solid #ebe5db;
            border-radius: 24px;
            padding: 12px 18px;
            font-size: 0.9rem;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s;
        }
        .chatbot-input:focus {
            border-color: #1a1a1a;
        }
        .chatbot-send {
            width: 44px;
            height: 44px;
            background: #1a1a1a;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .chatbot-send:hover {
            background: #2d2d2d;
        }
        .chatbot-send:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        .chatbot-send svg {
            width: 20px;
            height: 20px;
            fill: white;
        }
    `;
    document.head.appendChild(styles);

    // Detect language from page
    const currentLang = localStorage.getItem('canquetglas-lang') || 'en';
    const welcomeMessages = {
        en: {
            welcome: 'Welcome to Can Quetglas. How can I help you?',
            placeholder: 'Type your question...',
            error: 'Apologies, I don\'t have that information. Please contact us at <a href="tel:+34871626000">+34 871 626 000</a>, email us at <a href="mailto:info@hotelcanquetglas.com">info@hotelcanquetglas.com</a>, or send us a <a href="https://wa.me/34613252641" target="_blank">WhatsApp</a> and we\'ll be happy to help.'
        },
        es: {
            welcome: 'Bienvenido a Can Quetglas. ¿En qué puedo ayudarte?',
            placeholder: 'Escribe tu pregunta...',
            error: 'Disculpe, no dispongo de esa información. Puede contactarnos en el <a href="tel:+34871626000">+34 871 626 000</a>, enviarnos un email a <a href="mailto:info@hotelcanquetglas.com">info@hotelcanquetglas.com</a>, o escribirnos por <a href="https://wa.me/34613252641" target="_blank">WhatsApp</a> y estaremos encantados de ayudarle.'
        },
        de: {
            welcome: 'Willkommen im Can Quetglas. Wie kann ich Ihnen helfen?',
            placeholder: 'Schreiben Sie Ihre Frage...',
            error: 'Entschuldigung, diese Information liegt mir leider nicht vor. Sie können uns unter <a href="tel:+34871626000">+34 871 626 000</a> anrufen, eine E-Mail an <a href="mailto:info@hotelcanquetglas.com">info@hotelcanquetglas.com</a> senden, oder uns per <a href="https://wa.me/34613252641" target="_blank">WhatsApp</a> schreiben. Wir helfen Ihnen gerne weiter.'
        },
        sv: {
            welcome: 'Välkommen till Can Quetglas. Hur kan jag hjälpa dig?',
            placeholder: 'Skriv din fråga...',
            error: 'Tyvärr har jag inte den informationen. Du kan kontakta oss på <a href="tel:+34871626000">+34 871 626 000</a>, mejla oss på <a href="mailto:info@hotelcanquetglas.com">info@hotelcanquetglas.com</a>, eller skicka ett <a href="https://wa.me/34613252641" target="_blank">WhatsApp</a> så hjälper vi dig gärna.'
        }
    };
    const langData = welcomeMessages[currentLang] || welcomeMessages.en;

    // Detect if in rooms subfolder
    const isInRooms = window.location.pathname.includes('/rooms/');
    const logoPath = isInRooms ? '../images/logo.png' : 'images/logo.png';

    // Create HTML
    const chatbotHTML = `
        <div class="chatbot-bubble" id="chatbot-bubble">
            <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.2L4 17.2V4h16v12z"/><path d="M7 9h10v2H7zm0-3h10v2H7z"/></svg>
        </div>
        <div class="chatbot-window" id="chatbot-window">
            <div class="chatbot-header">
                <img src="${logoPath}" alt="Can Quetglas" class="chatbot-header-logo">
                <button class="chatbot-close" id="chatbot-close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="chatbot-messages" id="chatbot-messages">
                <div class="chatbot-message bot">${langData.welcome}</div>
            </div>
            <div class="chatbot-input-area">
                <input type="text" class="chatbot-input" id="chatbot-input" placeholder="${langData.placeholder}">
                <button class="chatbot-send" id="chatbot-send">
                    <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                </button>
            </div>
        </div>
    `;

    const container = document.createElement('div');
    container.innerHTML = chatbotHTML;
    document.body.appendChild(container);

    // Elements
    const bubble = document.getElementById('chatbot-bubble');
    const window_ = document.getElementById('chatbot-window');
    const closeBtn = document.getElementById('chatbot-close');
    const messages = document.getElementById('chatbot-messages');
    const input = document.getElementById('chatbot-input');
    const sendBtn = document.getElementById('chatbot-send');

    let conversationHistory = [];

    // Function to update language
    function updateChatLanguage() {
        const lang = localStorage.getItem('canquetglas-lang') || 'en';
        const langData = welcomeMessages[lang] || welcomeMessages.en;
        input.placeholder = langData.placeholder;
        // Update welcome message if chat is empty (only welcome message)
        if (messages.children.length === 1) {
            messages.children[0].textContent = langData.welcome;
        }
    }

    // Listen for language changes
    window.addEventListener('storage', (e) => {
        if (e.key === 'canquetglas-lang') {
            updateChatLanguage();
        }
    });

    // Also listen for custom event from main page
    document.addEventListener('languageChanged', updateChatLanguage);

    // Toggle window
    bubble.addEventListener('click', () => {
        window_.classList.toggle('open');
        if (window_.classList.contains('open')) {
            updateChatLanguage(); // Update language when opening
            input.focus();
        }
    });

    closeBtn.addEventListener('click', () => {
        window_.classList.remove('open');
    });

    // Send message
    async function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        // Add user message
        addMessage(text, 'user');
        input.value = '';
        sendBtn.disabled = true;

        // Show typing indicator
        const typingEl = addTyping();

        // Add to history
        conversationHistory.push({ role: 'user', parts: [{ text }] });

        // Try each model until one works
        let success = false;
        const currentLangData = welcomeMessages[localStorage.getItem('canquetglas-lang') || 'en'] || welcomeMessages.en;

        for (const model of GEMINI_MODELS) {
            try {
                const response = await fetch(`${getApiUrl(model)}?key=${GEMINI_API_KEY}`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        system_instruction: { parts: [{ text: SYSTEM_PROMPT }] },
                        contents: conversationHistory
                    })
                });

                const data = await response.json();

                // Check for quota/rate limit errors (429) or other API errors
                if (data.error) {
                    console.log(`Model ${model} failed:`, data.error.message);
                    continue; // Try next model
                }

                if (data.candidates && data.candidates[0]?.content?.parts?.[0]?.text) {
                    const botText = data.candidates[0].content.parts[0].text;
                    typingEl.remove();

                    // Check if Gemini doesn't know the answer
                    if (botText.includes('[NO_INFO]')) {
                        addMessage(currentLangData.error, 'bot');
                    } else {
                        addMessage(botText, 'bot');
                        conversationHistory.push({ role: 'model', parts: [{ text: botText }] });
                    }
                    success = true;
                    break; // Success, stop trying models
                }
            } catch (error) {
                console.log(`Model ${model} error:`, error);
                continue; // Try next model
            }
        }

        // If all models failed
        if (!success) {
            typingEl.remove();
            addMessage(currentLangData.error, 'bot');
        }

        sendBtn.disabled = false;
    }

    function addMessage(text, type) {
        const msg = document.createElement('div');
        msg.className = `chatbot-message ${type}`;
        // Convert basic Markdown to HTML
        let html = text
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')  // **bold**
            .replace(/\*(.*?)\*/g, '<em>$1</em>')              // *italic*
            .replace(/\n/g, '<br>');                           // line breaks
        msg.innerHTML = html;
        messages.appendChild(msg);
        messages.scrollTop = messages.scrollHeight;
        return msg;
    }

    function addTyping() {
        const msg = document.createElement('div');
        msg.className = 'chatbot-message bot typing';
        msg.innerHTML = '<span></span><span></span><span></span>';
        messages.appendChild(msg);
        messages.scrollTop = messages.scrollHeight;
        return msg;
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
})();
