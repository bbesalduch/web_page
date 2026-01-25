(function() {
    'use strict';

    const GEMINI_API_KEY = 'AIzaSyBt1QpUdQg6V7y-WIqFdU2H4vjWV5RX9V4';
    const GEMINI_API_URL = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';

    const SYSTEM_PROMPT = `Eres el asistente virtual de Hotel Can Quetglas, un hotel boutique ubicado en un palacio modernista de 1908 en el barrio de El Terreno, Palma de Mallorca.

INFORMACIÓN DEL HOTEL:
- Edificio: Palacio modernista catalogado de 1908, restaurado con respeto a su arquitectura original
- Ubicación: Barrio de El Terreno, Palma de Mallorca. A pocos minutos del centro histórico y el paseo marítimo
- Vistas: Castillo de Bellver y su bosque
- Características: Frescos originales, suelos hidráulicos, vidrieras, herrería de época

HABITACIONES:
- Standard Terrace: Habitación con terraza privada
- Deluxe: Habitación espaciosa con detalles modernistas
- Deluxe Terrace: Deluxe con terraza privada
- Deluxe Premium: La más amplia de las Deluxe
- Suite: La experiencia más exclusiva

SERVICIOS WELLNESS:
- El Torreón: Terraza panorámica con vistas al Castillo de Bellver
- Entrenamiento personal: Sesiones en el bosque del Castillo de Bellver
- Spa y masajes disponibles

CONTACTO:
- Dirección: Barrio de El Terreno, Palma de Mallorca
- Web: canquetglas.com

INSTRUCCIONES:
- Responde siempre de forma amable, profesional y concisa
- Usa el idioma en que te escriban (español, inglés, alemán o sueco)
- Si no sabes algo específico (como precios exactos), invita a contactar directamente con el hotel
- Mantén respuestas breves (2-3 frases máximo) a menos que pidan más detalle`;

    // Inject styles
    const styles = document.createElement('style');
    styles.textContent = `
        .chatbot-bubble {
            position: fixed;
            bottom: 24px;
            left: 24px;
            width: 60px;
            height: 60px;
            background: #8b7355;
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
            background: #a08b6f;
        }
        .chatbot-bubble svg {
            width: 28px;
            height: 28px;
            fill: white;
        }
        .chatbot-window {
            position: fixed;
            bottom: 100px;
            left: 24px;
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
            background: #8b7355;
            color: white;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chatbot-header-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 1.2rem;
            font-weight: 500;
            letter-spacing: 0.03em;
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
        .chatbot-message.user {
            background: #8b7355;
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
            background: #8b7355;
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
            border-color: #8b7355;
        }
        .chatbot-send {
            width: 44px;
            height: 44px;
            background: #8b7355;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .chatbot-send:hover {
            background: #a08b6f;
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

    // Create HTML
    const chatbotHTML = `
        <div class="chatbot-bubble" id="chatbot-bubble">
            <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.2L4 17.2V4h16v12z"/><path d="M7 9h10v2H7zm0-3h10v2H7z"/></svg>
        </div>
        <div class="chatbot-window" id="chatbot-window">
            <div class="chatbot-header">
                <span class="chatbot-header-title">Can Quetglas</span>
                <button class="chatbot-close" id="chatbot-close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="chatbot-messages" id="chatbot-messages">
                <div class="chatbot-message bot">Bienvenido a Can Quetglas. ¿En qué puedo ayudarte?</div>
            </div>
            <div class="chatbot-input-area">
                <input type="text" class="chatbot-input" id="chatbot-input" placeholder="Escribe tu pregunta...">
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

    // Toggle window
    bubble.addEventListener('click', () => {
        window_.classList.toggle('open');
        if (window_.classList.contains('open')) {
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

        try {
            const response = await fetch(`${GEMINI_API_URL}?key=${GEMINI_API_KEY}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    system_instruction: { parts: [{ text: SYSTEM_PROMPT }] },
                    contents: conversationHistory
                })
            });

            const data = await response.json();
            typingEl.remove();

            if (data.candidates && data.candidates[0]?.content?.parts?.[0]?.text) {
                const botText = data.candidates[0].content.parts[0].text;
                addMessage(botText, 'bot');
                conversationHistory.push({ role: 'model', parts: [{ text: botText }] });
            } else {
                addMessage('Lo siento, ha ocurrido un error. Por favor, contacta directamente con el hotel.', 'bot');
            }
        } catch (error) {
            typingEl.remove();
            addMessage('Lo siento, ha ocurrido un error. Por favor, contacta directamente con el hotel.', 'bot');
        }

        sendBtn.disabled = false;
    }

    function addMessage(text, type) {
        const msg = document.createElement('div');
        msg.className = `chatbot-message ${type}`;
        msg.textContent = text;
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
