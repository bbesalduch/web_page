// BOOKING POPUP
// ============================================
(function() {
    'use strict';

    const bookingPopupOverlay = document.getElementById('booking-popup-overlay');
    const bookingPopupClose = document.getElementById('booking-popup-close');
    const bookingPopupSearch = document.getElementById('booking-popup-search');
    const popupDates = document.getElementById('popup-dates');
    const bookingDateRow = document.getElementById('booking-date-row');
    const bookingCalendar = document.getElementById('booking-calendar');
    const bookingWhoRow = document.getElementById('booking-who-row');
    const bookingRoomsDropdown = document.getElementById('booking-rooms-dropdown');
    const bookingRoomsContainer = document.getElementById('booking-rooms-container');
    const bookingAddRoomBtn = document.getElementById('booking-add-room');
    const popupWhoSummary = document.getElementById('popup-who-summary');
    const promoCodeInput = document.getElementById('promo-code');

    // Get current language from localStorage or default to 'en'
    function getCurrentLang() {
        return localStorage.getItem('canquetglas-lang') || 'en';
    }

    // Booking state
    let checkInDate = new Date();
    let checkOutDate = new Date();
    checkOutDate.setDate(checkOutDate.getDate() + 1);
    let calendarMonth = new Date();
    let selectingCheckIn = true;

    // Multi-room state
    const MAX_ROOMS = 4;
    let rooms = [{ adults: 2, children: 0, infants: 0 }];

    // Room translations
    const roomTranslations = {
        en: { room: 'Room', adults: 'Adults', children: 'Children', infants: 'Infants', remove: 'Remove', addRoom: '+ Add Room', adultsAge: '(+14 years)', childrenAge: '(3-13 years)', infantsAge: '(0-2 years)' },
        es: { room: 'Habitación', adults: 'Adultos', children: 'Niños', infants: 'Bebés', remove: 'Eliminar', addRoom: '+ Añadir habitación', adultsAge: '(+14 años)', childrenAge: '(3-13 años)', infantsAge: '(0-2 años)' },
        de: { room: 'Zimmer', adults: 'Erwachsene', children: 'Kinder', infants: 'Kleinkinder', remove: 'Entfernen', addRoom: '+ Zimmer hinzufügen', adultsAge: '(+14 Jahre)', childrenAge: '(3-13 Jahre)', infantsAge: '(0-2 Jahre)' },
        sv: { room: 'Rum', adults: 'Vuxna', children: 'Barn', infants: 'Spädbarn', remove: 'Ta bort', addRoom: '+ Lägg till rum', adultsAge: '(+14 år)', childrenAge: '(3-13 år)', infantsAge: '(0-2 år)' }
    };

    function renderRooms() {
        const lang = getCurrentLang();
        const t = roomTranslations[lang] || roomTranslations.en;

        let html = '';
        rooms.forEach((room, index) => {
            html += `
                <div class="booking-room-section" data-room-index="${index}">
                    <div class="booking-room-header">
                        <span class="booking-room-title">${t.room} ${index + 1}</span>
                        ${rooms.length > 1 ? `<button class="booking-room-remove" data-remove-room="${index}">${t.remove}</button>` : ''}
                    </div>
                    <div class="booking-guest-row">
                        <div>
                            <span class="booking-guest-label">${t.adults}</span>
                        </div>
                        <div class="booking-adults-selector">
                            <button class="booking-adults-btn" data-room="${index}" data-type="adults" data-action="minus" ${room.adults <= 1 ? 'disabled' : ''}>−</button>
                            <span class="booking-adults-count">${room.adults}</span>
                            <button class="booking-adults-btn" data-room="${index}" data-type="adults" data-action="plus" ${room.adults >= 2 ? 'disabled' : ''}>+</button>
                        </div>
                    </div>
                </div>
            `;
        });

        bookingRoomsContainer.innerHTML = html;
        bookingAddRoomBtn.disabled = rooms.length >= MAX_ROOMS;
        bookingAddRoomBtn.textContent = t.addRoom;

        // Add event listeners for +/- buttons
        bookingRoomsContainer.querySelectorAll('.booking-adults-btn').forEach(btn => {
            btn.addEventListener('click', handleGuestCountChange);
        });

        // Add event listeners for remove buttons
        bookingRoomsContainer.querySelectorAll('.booking-room-remove').forEach(btn => {
            btn.addEventListener('click', handleRemoveRoom);
        });

        // Update summary
        updateWhoSummary();
    }

    function handleGuestCountChange(e) {
        e.stopPropagation();
        const roomIndex = parseInt(e.target.dataset.room);
        const type = e.target.dataset.type;
        const action = e.target.dataset.action;

        const limits = {
            adults: { min: 1, max: 2 },
            children: { min: 0, max: 3 },
            infants: { min: 0, max: 2 }
        };

        if (action === 'plus' && rooms[roomIndex][type] < limits[type].max) {
            rooms[roomIndex][type]++;
        } else if (action === 'minus' && rooms[roomIndex][type] > limits[type].min) {
            rooms[roomIndex][type]--;
        }

        renderRooms();
    }

    function handleRemoveRoom(e) {
        e.stopPropagation();
        const roomIndex = parseInt(e.target.dataset.removeRoom);
        if (rooms.length > 1) {
            rooms.splice(roomIndex, 1);
            renderRooms();
        }
    }

    function addRoom() {
        if (rooms.length < MAX_ROOMS) {
            rooms.push({ adults: 2, children: 0, infants: 0 });
            renderRooms();
        }
    }

    bookingAddRoomBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        addRoom();
    });

    // Update "Who" summary text
    function updateWhoSummary() {
        const lang = getCurrentLang();
        const totalAdults = rooms.reduce((sum, room) => sum + room.adults, 0);
        const numRooms = rooms.length;

        const summaryTranslations = {
            en: { adults: 'adults', adult: 'adult', rooms: 'rooms', room: 'room' },
            es: { adults: 'adultos', adult: 'adulto', rooms: 'habitaciones', room: 'habitación' },
            de: { adults: 'Erwachsene', adult: 'Erwachsener', rooms: 'Zimmer', room: 'Zimmer' },
            sv: { adults: 'vuxna', adult: 'vuxen', rooms: 'rum', room: 'rum' }
        };
        const t = summaryTranslations[lang] || summaryTranslations.en;

        const adultsText = totalAdults === 1 ? t.adult : t.adults;
        const roomsText = numRooms === 1 ? t.room : t.rooms;

        popupWhoSummary.textContent = `${totalAdults} ${adultsText}, ${numRooms} ${roomsText}`;
    }

    // Toggle rooms dropdown
    bookingWhoRow.addEventListener('click', (e) => {
        e.stopPropagation();
        bookingCalendar.classList.remove('active');
        bookingRoomsDropdown.classList.toggle('active');
    });

    // Close rooms dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!bookingWhoRow.contains(e.target)) {
            bookingRoomsDropdown.classList.remove('active');
        }
    });

    function formatDate(date, lang) {
        const options = { weekday: 'short', day: 'numeric', month: 'short' };
        const localeMap = { en: 'en-GB', es: 'es-ES', de: 'de-DE', sv: 'sv-SE' };
        return date.toLocaleDateString(localeMap[lang] || 'en-GB', options);
    }

    function formatDateISO(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    function updatePopupDates() {
        const lang = getCurrentLang();
        popupDates.textContent = `${formatDate(checkInDate, lang)} — ${formatDate(checkOutDate, lang)}`;
    }

    // Calendar functions
    function renderCalendar() {
        const lang = getCurrentLang();
        const localeMap = { en: 'en-GB', es: 'es-ES', de: 'de-DE', sv: 'sv-SE' };
        const dayNames = { en: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'], es: ['Lun','Mar','Mié','Jue','Vie','Sáb','Dom'], de: ['Mo','Di','Mi','Do','Fr','Sa','So'], sv: ['Mån','Tis','Ons','Tor','Fre','Lör','Sön'] };

        const year = calendarMonth.getFullYear();
        const month = calendarMonth.getMonth();
        const monthName = calendarMonth.toLocaleDateString(localeMap[lang], { month: 'long', year: 'numeric' });

        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const startDay = (firstDay.getDay() + 6) % 7; // Monday = 0
        const today = new Date();
        today.setHours(0,0,0,0);

        let html = `
            <div class="booking-calendar-header">
                <button class="booking-calendar-nav" id="cal-prev">←</button>
                <span class="booking-calendar-title">${monthName}</span>
                <button class="booking-calendar-nav" id="cal-next">→</button>
            </div>
            <div class="booking-calendar-grid">
        `;

        // Day names
        (dayNames[lang] || dayNames.en).forEach(d => {
            html += `<div class="booking-calendar-day-name">${d}</div>`;
        });

        // Empty cells before first day
        for (let i = 0; i < startDay; i++) {
            html += `<div class="booking-calendar-day disabled"></div>`;
        }

        // Days
        for (let day = 1; day <= lastDay.getDate(); day++) {
            const date = new Date(year, month, day);
            date.setHours(0,0,0,0);
            const isPast = date < today;
            const isToday = date.getTime() === today.getTime();
            const isCheckIn = checkInDate && date.getTime() === new Date(checkInDate).setHours(0,0,0,0);
            const isCheckOut = checkOutDate && date.getTime() === new Date(checkOutDate).setHours(0,0,0,0);
            const isInRange = checkInDate && checkOutDate && date > checkInDate && date < checkOutDate;

            let classes = 'booking-calendar-day';
            if (isPast) classes += ' disabled';
            if (isToday) classes += ' today';
            if (isCheckIn || isCheckOut) classes += ' selected';
            if (isInRange) classes += ' in-range';

            html += `<button class="${classes}" data-date="${formatDateISO(date)}" ${isPast ? 'disabled' : ''}>${day}</button>`;
        }

        html += '</div>';
        bookingCalendar.innerHTML = html;

        // Add event listeners
        document.getElementById('cal-prev').addEventListener('click', (e) => {
            e.stopPropagation();
            calendarMonth.setMonth(calendarMonth.getMonth() - 1);
            renderCalendar();
        });
        document.getElementById('cal-next').addEventListener('click', (e) => {
            e.stopPropagation();
            calendarMonth.setMonth(calendarMonth.getMonth() + 1);
            renderCalendar();
        });

        bookingCalendar.querySelectorAll('.booking-calendar-day:not(.disabled)').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                // Parse date correctly to avoid timezone issues
                const [y, m, d] = btn.dataset.date.split('-').map(Number);
                const selectedDate = new Date(y, m - 1, d);
                if (selectingCheckIn) {
                    checkInDate = selectedDate;
                    checkOutDate = new Date(y, m - 1, d + 1);
                    selectingCheckIn = false;
                } else {
                    if (selectedDate > checkInDate) {
                        checkOutDate = selectedDate;
                    } else {
                        checkInDate = selectedDate;
                        checkOutDate = new Date(y, m - 1, d + 1);
                    }
                    selectingCheckIn = true;
                    bookingCalendar.classList.remove('active');
                }
                updatePopupDates();
                renderCalendar();
            });
        });
    }

    // Toggle calendar
    bookingDateRow.addEventListener('click', (e) => {
        e.stopPropagation();
        bookingRoomsDropdown.classList.remove('active');
        calendarMonth = new Date(checkInDate);
        selectingCheckIn = true;
        renderCalendar();
        bookingCalendar.classList.toggle('active');
    });

    // Close calendar when clicking outside
    document.addEventListener('click', (e) => {
        if (!bookingDateRow.contains(e.target)) {
            bookingCalendar.classList.remove('active');
        }
    });

    function openBookingPopup(e) {
        if (e) e.preventDefault();
        // Reset all values to defaults
        checkInDate = new Date();
        checkOutDate = new Date();
        checkOutDate.setDate(checkOutDate.getDate() + 1);
        rooms = [{ adults: 2, children: 0, infants: 0 }];
        promoCodeInput.value = '';
        updatePopupDates();
        renderRooms();
        bookingPopupOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeBookingPopup() {
        bookingPopupOverlay.classList.remove('active');
        document.body.style.overflow = '';
        bookingCalendar.classList.remove('active');
    }

    // Open popup instead of direct booking link
    document.querySelectorAll('[data-booking-link]').forEach(el => {
        el.addEventListener('click', openBookingPopup);
    });

    // Also handle header CTA button
    const headerCta = document.querySelector('.header-cta .btn');
    if (headerCta) {
        headerCta.addEventListener('click', openBookingPopup);
    }

    bookingPopupClose.addEventListener('click', closeBookingPopup);
    bookingPopupOverlay.addEventListener('click', (e) => {
        if (e.target === bookingPopupOverlay) closeBookingPopup();
    });

    // Search button goes to booking engine with selected options
    bookingPopupSearch.addEventListener('click', () => {
        const lang = getCurrentLang();
        const langMap = { en: 'en', es: 'es', de: 'de', sv: 'sv' };
        const locale = langMap[lang] || 'en';
        const promoCode = promoCodeInput.value.trim();

        // Build items parameters for all rooms
        let itemsParams = '';
        rooms.forEach((room, index) => {
            itemsParams += `&items[${index}][adults]=${room.adults}&items[${index}][children]=${room.children}&items[${index}][infants]=${room.infants}`;
        });

        let url = `https://direct-book.com/properties/hotelcanquetglas?locale=${locale}${itemsParams}&currency=EUR&checkInDate=${formatDateISO(checkInDate)}&checkOutDate=${formatDateISO(checkOutDate)}&trackPage=yes`;

        if (promoCode) {
            url += `&promocode=${encodeURIComponent(promoCode)}`;
        }

        window.location.href = url;
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && bookingPopupOverlay.classList.contains('active')) {
            closeBookingPopup();
        }
    });

    // Initialize rooms display
    renderRooms();
})();
