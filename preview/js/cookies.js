(function() {
    'use strict';

    // ============================================
    // CONFIGURACIÓN - CAMBIAR AQUÍ EL ID DE GA
    // ============================================
    const GA_MEASUREMENT_ID = 'G-7JRGW78ZBB';

    // Traducciones del banner de cookies
    const cookieTranslations = {
        en: {
            title: 'Cookie Preferences',
            description: 'We use our own and third-party cookies for analytical purposes and to show you personalised advertising based on a profile created from your browsing habits (e.g. pages visited). You can get more information and configure your preferences in our',
            shortDescription: 'We use cookies to improve your experience',
            mobileDescription: 'We use cookies',
            cookiePolicy: 'Cookie Policy',
            moreInfo: 'More info',
            continueWithout: 'Continue without accepting',
            manageCookies: 'Manage Cookies',
            acceptAndClose: 'Accept and Close',
            necessary: 'Necessary cookies',
            necessaryDesc: 'Necessary cookies help make a website usable by enabling basic functions such as page navigation and access to secure areas of the website. The website cannot function properly without these cookies.',
            preferences: 'Preference cookies',
            preferencesDesc: 'Preference cookies enable a website to remember information that changes the way the website behaves or looks, like your preferred language.',
            analytics: 'Statistical cookies',
            analyticsDesc: 'Statistical cookies help website owners to understand how visitors interact with websites by collecting and reporting information anonymously.',
            marketing: 'Marketing cookies',
            marketingDesc: 'Marketing cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user.',
            savePreferences: 'Save Preferences',
            moreDetail: 'More detail',
            hideDetail: 'Hide detail'
        },
        es: {
            title: 'Preferencias de cookies',
            description: 'Utilizamos cookies propias y de terceros para fines analíticos y para mostrarte publicidad personalizada en base a un perfil elaborado a partir de tus hábitos de navegación (por ejemplo, páginas visitadas). Puedes obtener más información y configurar tus preferencias en la',
            shortDescription: 'Usamos cookies para mejorar tu experiencia',
            mobileDescription: 'Usamos cookies',
            cookiePolicy: 'Política de cookies',
            moreInfo: 'Más info',
            continueWithout: 'Continuar sin aceptar',
            manageCookies: 'Gestionar Cookies',
            acceptAndClose: 'Aceptar y Cerrar',
            necessary: 'Cookies necesarias',
            necessaryDesc: 'Las cookies necesarias ayudan a hacer una página web utilizable activando funciones básicas como la navegación en la página y el acceso a áreas seguras de la página web. La página web no puede funcionar adecuadamente sin estas cookies.',
            preferences: 'Cookies de preferencias',
            preferencesDesc: 'Las cookies de preferencias permiten a la página web recordar información que cambia la forma en que la página se comporta o el aspecto que tiene, como su idioma preferido.',
            analytics: 'Cookies de estadística',
            analyticsDesc: 'Las cookies estadísticas ayudan a los propietarios de páginas web a comprender cómo interactúan los visitantes con las páginas web reuniendo y proporcionando información de forma anónima.',
            marketing: 'Cookies de marketing',
            marketingDesc: 'Las cookies de marketing se utilizan para rastrear a los visitantes en las páginas web. La intención es mostrar anuncios relevantes y atractivos para el usuario individual.',
            savePreferences: 'Guardar Preferencias',
            moreDetail: 'Más detalle',
            hideDetail: 'Ocultar detalle'
        },
        de: {
            title: 'Cookie-Einstellungen',
            description: 'Wir verwenden eigene Cookies und Cookies von Drittanbietern für analytische Zwecke und um Ihnen personalisierte Werbung anzuzeigen, die auf einem Profil basiert, das aus Ihren Surfgewohnheiten erstellt wurde (z.B. besuchte Seiten). Weitere Informationen und Konfigurationsmöglichkeiten finden Sie in unserer',
            shortDescription: 'Wir verwenden Cookies, um Ihre Erfahrung zu verbessern',
            mobileDescription: 'Wir verwenden Cookies',
            cookiePolicy: 'Cookie-Richtlinie',
            moreInfo: 'Mehr Infos',
            continueWithout: 'Ohne Akzeptieren fortfahren',
            manageCookies: 'Cookies verwalten',
            acceptAndClose: 'Akzeptieren und Schließen',
            necessary: 'Notwendige Cookies',
            necessaryDesc: 'Notwendige Cookies helfen dabei, eine Webseite nutzbar zu machen, indem sie Grundfunktionen wie Seitennavigation und Zugriff auf sichere Bereiche der Webseite ermöglichen. Die Webseite kann ohne diese Cookies nicht richtig funktionieren.',
            preferences: 'Präferenz-Cookies',
            preferencesDesc: 'Präferenz-Cookies ermöglichen einer Webseite sich an Informationen zu erinnern, die die Art beeinflussen, wie sich eine Webseite verhält oder aussieht, wie z.B. Ihre bevorzugte Sprache.',
            analytics: 'Statistik-Cookies',
            analyticsDesc: 'Statistik-Cookies helfen Webseiten-Besitzern zu verstehen, wie Besucher mit Webseiten interagieren, indem Informationen anonym gesammelt und gemeldet werden.',
            marketing: 'Marketing-Cookies',
            marketingDesc: 'Marketing-Cookies werden verwendet, um Besucher auf Webseiten zu verfolgen. Die Absicht ist, Anzeigen zu zeigen, die relevant und ansprechend für den einzelnen Benutzer sind.',
            savePreferences: 'Einstellungen speichern',
            moreDetail: 'Mehr Details',
            hideDetail: 'Details ausblenden'
        },
        sv: {
            title: 'Cookie-inställningar',
            description: 'Vi använder egna och tredjepartscookies för analytiska ändamål och för att visa dig personlig reklam baserat på en profil skapad från dina surfvanor (t.ex. besökta sidor). Du kan få mer information och konfigurera dina inställningar i vår',
            shortDescription: 'Vi använder cookies för att förbättra din upplevelse',
            mobileDescription: 'Vi använder cookies',
            cookiePolicy: 'Cookiepolicy',
            moreInfo: 'Mer info',
            continueWithout: 'Fortsätt utan att acceptera',
            manageCookies: 'Hantera cookies',
            acceptAndClose: 'Acceptera och stäng',
            necessary: 'Nödvändiga cookies',
            necessaryDesc: 'Nödvändiga cookies hjälper till att göra en webbplats användbar genom att aktivera grundläggande funktioner som sidnavigering och åtkomst till säkra områden på webbplatsen. Webbplatsen kan inte fungera korrekt utan dessa cookies.',
            preferences: 'Inställningscookies',
            preferencesDesc: 'Inställningscookies gör det möjligt för en webbplats att komma ihåg information som ändrar hur webbplatsen beter sig eller ser ut, som ditt föredragna språk.',
            analytics: 'Statistikcookies',
            analyticsDesc: 'Statistikcookies hjälper webbplatsägare att förstå hur besökare interagerar med webbplatser genom att samla in och rapportera information anonymt.',
            marketing: 'Marknadsföringscookies',
            marketingDesc: 'Marknadsföringscookies används för att spåra besökare på webbplatser. Avsikten är att visa annonser som är relevanta och engagerande för den enskilda användaren.',
            savePreferences: 'Spara inställningar',
            moreDetail: 'Mer detaljer',
            hideDetail: 'Dölj detaljer'
        }
    };

    // Obtener idioma actual
    const currentLang = localStorage.getItem('canquetglas-lang') || 'en';
    const t = cookieTranslations[currentLang] || cookieTranslations.en;

    // Detect if in rooms subfolder for cookie policy link
    const isInRooms = window.location.pathname.includes('/rooms/');
    const policyPath = isInRooms ? '../cookie-policy.html' : 'cookie-policy.html';

    // Estilos del banner - Franja inferior discreta estilo Google
    const styles = document.createElement('style');
    styles.textContent = `
        .cookie-overlay {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            transform: translateY(100%);
        }
        .cookie-overlay.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .cookie-modal {
            background: #1a1a1a;
            color: #fff;
            width: 100%;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            font-family: 'Montserrat', -apple-system, sans-serif;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }
        .cookie-main-view {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            max-width: 1200px;
            width: 100%;
        }
        .cookie-continue {
            display: none;
        }
        .cookie-title {
            display: none;
        }
        .cookie-text-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .cookie-description {
            font-size: 0.875rem;
            line-height: 1.5;
            color: #fff;
            margin: 0;
            text-align: center;
        }
        .cookie-text-mobile {
            display: none;
        }
        .cookie-text-desktop {
            display: inline;
        }
        .cookie-description a {
            color: #fff;
            text-decoration: underline;
        }
        .cookie-buttons {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-shrink: 0;
        }
        .cookie-btn {
            padding: 10px 24px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            border-radius: 4px;
            white-space: nowrap;
        }
        .cookie-btn-manage {
            background: transparent;
            color: #fff;
            border: 1px solid #fff;
        }
        .cookie-btn-manage:hover {
            background: rgba(255,255,255,0.1);
        }
        .cookie-btn-accept {
            background: #fff;
            color: #1a1a1a;
            border: none;
        }
        .cookie-btn-accept:hover {
            background: #f0f0f0;
        }
        .cookie-btn-close {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 1.5rem;
            line-height: 1;
            cursor: pointer;
            padding: 4px 8px;
            transition: opacity 0.3s ease;
        }
        .cookie-btn-close:hover {
            opacity: 0.7;
        }

        /* Modal de gestión de cookies */
        .cookie-manage-view {
            display: none;
        }
        .cookie-manage-view.visible {
            display: block;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            max-width: 700px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            padding: 40px 50px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            z-index: 10001;
        }
        .cookie-manage-view.visible ~ .cookie-main-view,
        .cookie-main-view.hidden {
            display: none;
        }
        .cookie-overlay.has-manage-view {
            background: rgba(0, 0, 0, 0.5);
            top: 0;
            bottom: 0;
        }
        .cookie-overlay.has-manage-view .cookie-modal {
            background: transparent;
            box-shadow: none;
        }
        .cookie-manage-view .cookie-title {
            display: block;
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 2rem;
            font-weight: 400;
            text-align: center;
            margin-bottom: 25px;
            color: #1a1a1a;
        }
        .cookie-manage-view .cookie-description {
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 30px;
        }
        .cookie-manage-view .cookie-description a {
            color: #1a1a1a;
        }
        .cookie-option {
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }
        .cookie-option:last-of-type {
            border-bottom: none;
        }
        .cookie-option-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cookie-option-name {
            font-weight: 500;
            font-size: 1rem;
            color: #1a1a1a;
        }
        .cookie-option-detail {
            font-size: 0.85rem;
            color: #1a1a1a;
            cursor: pointer;
            background: none;
            border: none;
            font-family: 'Montserrat', sans-serif;
        }
        .cookie-option-detail:hover {
            text-decoration: underline;
        }
        .cookie-option-desc {
            font-size: 0.85rem;
            color: #666;
            line-height: 1.6;
            margin-top: 15px;
            display: none;
        }
        .cookie-option-desc.visible {
            display: block;
        }
        .cookie-toggle {
            position: relative;
            width: 50px;
            height: 26px;
            margin-left: 20px;
        }
        .cookie-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .cookie-toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.3s;
            border-radius: 26px;
        }
        .cookie-toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.3s;
            border-radius: 50%;
        }
        .cookie-toggle input:checked + .cookie-toggle-slider {
            background-color: #1a1a1a;
        }
        .cookie-toggle input:checked + .cookie-toggle-slider:before {
            transform: translateX(24px);
        }
        .cookie-toggle input:disabled + .cookie-toggle-slider {
            opacity: 0.6;
            cursor: not-allowed;
        }
        .cookie-manage-buttons {
            margin-top: 30px;
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .cookie-manage-view .cookie-btn-manage {
            background: #fff;
            color: #1a1a1a;
            border: 1px solid #1a1a1a;
        }
        .cookie-manage-view .cookie-btn-accept {
            background: #1a1a1a;
            color: #fff;
        }
        .cookie-manage-view .cookie-btn-accept:hover {
            background: #333;
        }

        @media (max-width: 768px) {
            .cookie-modal {
                flex-direction: column;
                padding: 12px 16px;
                gap: 10px;
                align-items: flex-start;
            }
            .cookie-main-view {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
            .cookie-description {
                font-size: 0.75rem;
                line-height: 1.4;
                text-align: left;
            }
            .cookie-text-desktop {
                display: none;
            }
            .cookie-text-mobile {
                display: inline;
            }
            .cookie-buttons {
                width: 100%;
                flex-direction: row;
                gap: 8px;
                justify-content: space-between;
            }
            .cookie-btn {
                flex: 1;
                padding: 8px 12px;
                font-size: 0.7rem;
            }
            .cookie-btn-close {
                flex: 0 0 auto;
                padding: 4px;
                font-size: 1.2rem;
            }
            .cookie-manage-buttons {
                flex-direction: column;
            }
        }
    `;
    document.head.appendChild(styles);

    // Comprobar si ya hay consentimiento
    const consent = getCookie('cookie_consent');
    if (!consent) {
        showBanner();
    } else {
        const preferences = JSON.parse(consent);
        if (preferences.analytics) {
            loadGoogleAnalytics();
        }
    }

    function showBanner() {
        const overlay = document.createElement('div');
        overlay.className = 'cookie-overlay';
        overlay.innerHTML = `
            <div class="cookie-modal">
                <button class="cookie-continue" id="cookie-continue">${t.continueWithout}</button>

                <!-- Vista principal - Barra inferior -->
                <div class="cookie-main-view" id="cookie-main-view">
                    <div class="cookie-text-content">
                        <p class="cookie-description">
                            <span class="cookie-text-desktop">🍪 ${t.shortDescription}. <a href="${policyPath}">${t.moreInfo}</a>.</span>
                            <span class="cookie-text-mobile">🍪 ${t.mobileDescription}. <a href="${policyPath}">${t.moreInfo}</a>.</span>
                        </p>
                    </div>
                    <div class="cookie-buttons">
                        <button class="cookie-btn cookie-btn-manage" id="cookie-manage">${t.manageCookies}</button>
                        <button class="cookie-btn cookie-btn-accept" id="cookie-accept">${t.acceptAndClose}</button>
                        <button class="cookie-btn-close" id="cookie-close" title="${t.continueWithout}">✕</button>
                    </div>
                </div>

                <!-- Vista de gestión -->
                <div class="cookie-manage-view" id="cookie-manage-view">
                    <h2 class="cookie-title">${t.title}</h2>
                    <p class="cookie-description">
                        ${t.description} <a href="${policyPath}">${t.cookiePolicy}</a>.
                    </p>

                    <div class="cookie-option">
                        <div class="cookie-option-header">
                            <span class="cookie-option-name">${t.necessary}</span>
                            <div style="display: flex; align-items: center;">
                                <button class="cookie-option-detail" data-target="necessary-desc">${t.moreDetail}</button>
                                <label class="cookie-toggle">
                                    <input type="checkbox" checked disabled>
                                    <span class="cookie-toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="cookie-option-desc" id="necessary-desc">${t.necessaryDesc}</div>
                    </div>

                    <div class="cookie-option">
                        <div class="cookie-option-header">
                            <span class="cookie-option-name">${t.preferences}</span>
                            <div style="display: flex; align-items: center;">
                                <button class="cookie-option-detail" data-target="preferences-desc">${t.moreDetail}</button>
                                <label class="cookie-toggle">
                                    <input type="checkbox" id="cookie-preferences-toggle">
                                    <span class="cookie-toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="cookie-option-desc" id="preferences-desc">${t.preferencesDesc}</div>
                    </div>

                    <div class="cookie-option">
                        <div class="cookie-option-header">
                            <span class="cookie-option-name">${t.analytics}</span>
                            <div style="display: flex; align-items: center;">
                                <button class="cookie-option-detail" data-target="analytics-desc">${t.moreDetail}</button>
                                <label class="cookie-toggle">
                                    <input type="checkbox" id="cookie-analytics-toggle">
                                    <span class="cookie-toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="cookie-option-desc" id="analytics-desc">${t.analyticsDesc}</div>
                    </div>

                    <div class="cookie-option">
                        <div class="cookie-option-header">
                            <span class="cookie-option-name">${t.marketing}</span>
                            <div style="display: flex; align-items: center;">
                                <button class="cookie-option-detail" data-target="marketing-desc">${t.moreDetail}</button>
                                <label class="cookie-toggle">
                                    <input type="checkbox" id="cookie-marketing-toggle">
                                    <span class="cookie-toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="cookie-option-desc" id="marketing-desc">${t.marketingDesc}</div>
                    </div>

                    <div class="cookie-manage-buttons">
                        <button class="cookie-btn cookie-btn-manage" id="cookie-save">${t.savePreferences}</button>
                        <button class="cookie-btn cookie-btn-accept" id="cookie-accept-all">${t.acceptAndClose}</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(overlay);

        // Mostrar con animación
        setTimeout(() => overlay.classList.add('visible'), 100);

        // Event listeners
        const mainView = document.getElementById('cookie-main-view');
        const manageView = document.getElementById('cookie-manage-view');

        // Continuar sin aceptar
        document.getElementById('cookie-continue').addEventListener('click', () => {
            saveConsent({ necessary: true, preferences: false, analytics: false, marketing: false });
            hideOverlay(overlay);
        });

        // Botón cerrar (X)
        document.getElementById('cookie-close').addEventListener('click', () => {
            saveConsent({ necessary: true, preferences: false, analytics: false, marketing: false });
            hideOverlay(overlay);
        });

        // Aceptar todas (vista principal)
        document.getElementById('cookie-accept').addEventListener('click', () => {
            saveConsent({ necessary: true, preferences: true, analytics: true, marketing: true });
            hideOverlay(overlay);
            loadGoogleAnalytics();
        });

        // Mostrar gestión de cookies
        document.getElementById('cookie-manage').addEventListener('click', () => {
            mainView.classList.add('hidden');
            manageView.classList.add('visible');
            overlay.classList.add('has-manage-view');
        });

        // Toggle detalles
        document.querySelectorAll('.cookie-option-detail').forEach(btn => {
            btn.addEventListener('click', () => {
                const target = document.getElementById(btn.dataset.target);
                const isVisible = target.classList.contains('visible');
                target.classList.toggle('visible');
                btn.textContent = isVisible ? t.moreDetail : t.hideDetail;
            });
        });

        // Guardar preferencias
        document.getElementById('cookie-save').addEventListener('click', () => {
            const prefs = {
                necessary: true,
                preferences: document.getElementById('cookie-preferences-toggle').checked,
                analytics: document.getElementById('cookie-analytics-toggle').checked,
                marketing: document.getElementById('cookie-marketing-toggle').checked
            };
            saveConsent(prefs);
            hideOverlay(overlay);
            if (prefs.analytics) {
                loadGoogleAnalytics();
            }
        });

        // Aceptar todas (vista gestión)
        document.getElementById('cookie-accept-all').addEventListener('click', () => {
            saveConsent({ necessary: true, preferences: true, analytics: true, marketing: true });
            hideOverlay(overlay);
            loadGoogleAnalytics();
        });
    }

    function hideOverlay(overlay) {
        overlay.classList.remove('visible');
        setTimeout(() => overlay.remove(), 300);
    }

    function saveConsent(preferences) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (365 * 24 * 60 * 60 * 1000));
        document.cookie = `cookie_consent=${JSON.stringify(preferences)}; expires=${expires.toUTCString()}; path=/; SameSite=Lax`;
    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    function loadGoogleAnalytics() {
        if (GA_MEASUREMENT_ID === 'G-XXXXXXXXXX') {
            console.log('Google Analytics: ID not configured.');
            return;
        }

        const script = document.createElement('script');
        script.async = true;
        script.src = `https://www.googletagmanager.com/gtag/js?id=${GA_MEASUREMENT_ID}`;
        document.head.appendChild(script);

        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', GA_MEASUREMENT_ID, {
            anonymize_ip: true
        });
        window.gtag = gtag;
    }
})();
