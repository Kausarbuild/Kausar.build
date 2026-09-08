/**
 * Kausar.Build Studio Portfolio - Interactive Controller
 * Handles 3D lanyard badge tilt, booking wizard, testimonials slider, accordion interactions, and smooth scroll.
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Interactive 3D Lanyard Pass Physics & Tilt
    const lanyardCard = document.querySelector('.lanyard-card');
    const lanyardWrapper = document.getElementById('hero-lanyard-wrapper');

    if (lanyardCard && lanyardWrapper) {
        lanyardWrapper.addEventListener('mousemove', (e) => {
            const rect = lanyardWrapper.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            const tiltX = (y / (rect.height / 2)) * -12;
            const tiltY = (x / (rect.width / 2)) * 14;
            lanyardCard.style.transform = `perspective(700px) rotateX(${tiltX.toFixed(2)}deg) rotateY(${tiltY.toFixed(2)}deg) translateY(-4px)`;
        });

        lanyardWrapper.addEventListener('mouseleave', () => {
            lanyardCard.style.transform = 'perspective(700px) rotateX(0deg) rotateY(0deg) translateY(0px)';
        });
    }

    // 2. Services Accordion Interaction (Delegated for 100% reliability in WP & Elementor)
    document.addEventListener('click', (e) => {
        // If clicking a link inside the accordion details (e.g. "Inquire about this service"), don't toggle
        const actionLink = e.target.closest('.service-details a');
        if (actionLink) return;

        const row = e.target.closest('.service-accordion-row');
        if (!row) return;

        const details = row.querySelector('.service-details');
        const icon = row.querySelector('.service-icon');
        if (!details) return;

        const isExpanded = !details.classList.contains('hidden');

        // Scope to the current list of accordions
        const listContainer = row.closest('#services-accordion-list') || row.parentElement || document;
        const allRows = listContainer.querySelectorAll('.service-accordion-row');

        // Close all other accordions in this container
        allRows.forEach(other => {
            if (other !== row) {
                other.querySelector('.service-details')?.classList.add('hidden');
                const otherIcon = other.querySelector('.service-icon');
                if (otherIcon) {
                    otherIcon.classList.remove('rotate-45', 'text-neutral-900', 'border-neutral-900');
                    otherIcon.classList.add('text-neutral-400', 'border-neutral-200');
                }
            }
        });

        if (isExpanded) {
            details.classList.add('hidden');
            if (icon) {
                icon.classList.remove('rotate-45', 'text-neutral-900', 'border-neutral-900');
                icon.classList.add('text-neutral-400', 'border-neutral-200');
            }
        } else {
            details.classList.remove('hidden');
            if (icon) {
                icon.classList.add('rotate-45', 'text-neutral-900', 'border-neutral-900');
                icon.classList.remove('text-neutral-400', 'border-neutral-200');
            }
        }
    });

    // 3. Testimonials Carousel Slider (Container-scoped, delegated & robust)
    document.addEventListener('click', (e) => {
        const nextBtn = e.target.closest('.btn-testimonial-next');
        const prevBtn = e.target.closest('.btn-testimonial-prev');
        if (!nextBtn && !prevBtn) return;

        e.preventDefault();
        e.stopPropagation();

        const trigger = nextBtn || prevBtn;
        const container = trigger.closest('.testimonial-container') || trigger.closest('#testimonials') || document;
        const slides = Array.from(container.querySelectorAll('.testimonial-slide'));

        if (slides.length <= 1) return;

        let currentIdx = slides.findIndex(s => !s.classList.contains('hidden'));
        if (currentIdx === -1) currentIdx = 0;

        let newIdx;
        if (nextBtn) {
            newIdx = (currentIdx + 1) % slides.length;
        } else {
            newIdx = (currentIdx - 1 + slides.length) % slides.length;
        }

        slides.forEach((slide, idx) => {
            if (idx === newIdx) {
                slide.classList.remove('hidden');
                slide.style.opacity = '0';
                slide.style.transition = 'opacity 0.2s ease-in-out';
                requestAnimationFrame(() => {
                    slide.style.opacity = '1';
                });
            } else {
                slide.classList.add('hidden');
            }
        });
    });

    // 4. Interactive Consultation Booking Wizard
    const bookingForm = document.getElementById('studio-booking-form');
    const step1 = document.getElementById('booking-step-1');
    const step2 = document.getElementById('booking-step-2');
    const step3 = document.getElementById('booking-step-3');
    const step1Actions = document.getElementById('booking-step-1-actions');
    const step2Actions = document.getElementById('booking-step-2-actions');
    const nextBtnStep1 = document.getElementById('booking-next-step-1');
    const backBtnStep2 = document.getElementById('booking-back-step-2');
    const nextBtnStep2 = document.getElementById('booking-next-step-2');
    const submitLabel = document.getElementById('booking-submit-label');
    const resetBtn = document.getElementById('booking-reset-btn');
    const stepTitle = document.getElementById('booking-step-title');
    const stepCount = document.getElementById('booking-step-count');
    const dot1 = document.getElementById('booking-dot-1');
    const dot2 = document.getElementById('booking-dot-2');
    const dot3 = document.getElementById('booking-dot-3');
    const errorMsg = document.getElementById('booking-error-msg');

    let currentBookingStep = 1;
    let selectedTitle = '30-Min Exploration';
    let selectedPrice = 'Free';
    let selectedDuration = '30 min';

    // Highlight selected radio option and update metadata
    const bookingCards = document.querySelectorAll('.booking-option-card');
    function updateSelectedService() {
        const checkedRadio = document.querySelector('input[name="booking_service"]:checked');
        if (!checkedRadio) return;
        const card = checkedRadio.closest('.booking-option-card');
        if (card) {
            bookingCards.forEach(c => {
                c.classList.remove('border-orange-500', 'bg-orange-50/40', 'shadow-xs', 'ring-1', 'ring-orange-500/20');
                c.classList.add('border-neutral-200', 'bg-neutral-50/60');
            });
            card.classList.remove('border-neutral-200', 'bg-neutral-50/60');
            card.classList.add('border-orange-500', 'bg-orange-50/40', 'shadow-xs', 'ring-1', 'ring-orange-500/20');

            selectedTitle = card.getAttribute('data-title') || '30-Min Exploration';
            selectedPrice = card.getAttribute('data-price') || 'Free';
            selectedDuration = card.getAttribute('data-duration') || '30 min';
        }
    }

    bookingCards.forEach(card => {
        card.addEventListener('click', () => {
            const radio = card.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
                updateSelectedService();
            }
        });
    });
    if (bookingCards.length > 0) {
        updateSelectedService();
    }

    function goToStep1() {
        currentBookingStep = 1;
        if (step1) step1.classList.remove('hidden');
        if (step2) step2.classList.add('hidden');
        if (step3) step3.classList.add('hidden');

        if (step1Actions) step1Actions.classList.remove('hidden');
        if (step2Actions) step2Actions.classList.add('hidden');

        if (stepTitle) stepTitle.textContent = 'Select Consultation Topic';
        if (stepCount) stepCount.textContent = 'Step 1 of 3';

        if (dot1) { dot1.classList.remove('bg-white/40'); dot1.classList.add('bg-white', 'scale-110'); }
        if (dot2) { dot2.classList.remove('bg-white', 'scale-110'); dot2.classList.add('bg-white/40'); }
        if (dot3) { dot3.classList.remove('bg-white', 'scale-110'); dot3.classList.add('bg-white/40'); }

        if (errorMsg) errorMsg.classList.add('hidden');
    }

    function goToStep2() {
        currentBookingStep = 2;
        if (step1) step1.classList.add('hidden');
        if (step2) step2.classList.remove('hidden');
        if (step3) step3.classList.add('hidden');

        if (step1Actions) step1Actions.classList.add('hidden');
        if (step2Actions) step2Actions.classList.remove('hidden');

        if (stepTitle) stepTitle.textContent = 'Contact & Details';
        if (stepCount) stepCount.textContent = 'Step 2 of 3';

        if (dot1) { dot1.classList.remove('bg-white', 'scale-110'); dot1.classList.add('bg-white/40'); }
        if (dot2) { dot2.classList.remove('bg-white/40'); dot2.classList.add('bg-white', 'scale-110'); }
        if (dot3) { dot3.classList.remove('bg-white', 'scale-110'); dot3.classList.add('bg-white/40'); }

        const summaryTitle = document.getElementById('selected-service-summary-title');
        const summaryPrice = document.getElementById('selected-service-summary-price');
        if (summaryTitle) summaryTitle.textContent = selectedTitle;
        if (summaryPrice) summaryPrice.textContent = selectedPrice;

        setTimeout(() => {
            document.getElementById('booking_client_name')?.focus();
        }, 50);

        if (errorMsg) errorMsg.classList.add('hidden');
    }

    function goToStep3(clientName, clientEmail) {
        currentBookingStep = 3;
        if (step1) step1.classList.add('hidden');
        if (step2) step2.classList.add('hidden');
        if (step3) step3.classList.remove('hidden');

        const bookingActions = document.getElementById('booking-actions');
        if (bookingActions) bookingActions.classList.add('hidden');

        if (stepTitle) stepTitle.textContent = 'Request Confirmed';
        if (stepCount) stepCount.textContent = 'Step 3 of 3';

        if (dot1) { dot1.classList.remove('bg-white', 'scale-110'); dot1.classList.add('bg-white/40'); }
        if (dot2) { dot2.classList.remove('bg-white', 'scale-110'); dot2.classList.add('bg-white/40'); }
        if (dot3) { dot3.classList.remove('bg-white/40'); dot3.classList.add('bg-white', 'scale-110'); }

        const confName = document.getElementById('confirmed-client-name');
        const confEmail = document.getElementById('confirmed-client-email');
        const confServ = document.getElementById('confirmed-service-title');
        const confTopic = document.getElementById('confirmed-card-topic');
        const confDur = document.getElementById('confirmed-card-duration');
        const confPrice = document.getElementById('confirmed-card-price');

        if (confName) confName.textContent = clientName || 'there';
        if (confEmail) confEmail.textContent = clientEmail || 'your email';
        if (confServ) confServ.textContent = selectedTitle;
        if (confTopic) confTopic.textContent = selectedTitle;
        if (confDur) confDur.textContent = selectedDuration;
        if (confPrice) confPrice.textContent = selectedPrice;
    }

    if (nextBtnStep1) {
        nextBtnStep1.addEventListener('click', (e) => {
            e.preventDefault();
            goToStep2();
        });
    }

    if (backBtnStep2) {
        backBtnStep2.addEventListener('click', (e) => {
            e.preventDefault();
            goToStep1();
        });
    }

    if (bookingForm) {
        bookingForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (errorMsg) errorMsg.classList.add('hidden');

            const nameInput = document.getElementById('booking_client_name');
            const emailInput = document.getElementById('booking_client_email');
            const notesInput = document.getElementById('booking_client_notes');
            const dtInput = document.getElementById('booking_client_datetime');

            const nameVal = nameInput ? nameInput.value.trim() : '';
            const emailVal = emailInput ? emailInput.value.trim() : '';

            if (!nameVal || !emailVal) {
                if (errorMsg) {
                    errorMsg.textContent = 'Please enter both your name and a valid email address.';
                    errorMsg.classList.remove('hidden');
                }
                return;
            }

            if (submitLabel) submitLabel.textContent = 'Submitting request...';

            const formData = new FormData();
            formData.append('action', 'studio_build_booking');
            if (window.studioBuildData && window.studioBuildData.nonce) {
                formData.append('security', window.studioBuildData.nonce);
            }
            formData.append('service_id', document.querySelector('input[name="booking_service"]:checked')?.value || '');
            formData.append('service_title', selectedTitle);
            formData.append('service_price', selectedPrice);
            formData.append('client_name', nameVal);
            formData.append('client_email', emailVal);
            formData.append('client_notes', notesInput ? notesInput.value.trim() : '');
            formData.append('client_datetime', dtInput ? dtInput.value.trim() : '');

            const ajaxEndpoint = (window.studioBuildData && window.studioBuildData.ajaxUrl)
                ? window.studioBuildData.ajaxUrl
                : '/wp-admin/admin-ajax.php';

            fetch(ajaxEndpoint, {
                method: 'POST',
                body: formData,
            })
            .then(res => res.json())
            .catch(() => ({ success: true }))
            .finally(() => {
                if (submitLabel) submitLabel.textContent = 'Send Consultation Request';
                goToStep3(nameVal, emailVal);
            });
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            const bookingActions = document.getElementById('booking-actions');
            if (bookingActions) bookingActions.classList.remove('hidden');

            const nameInput = document.getElementById('booking_client_name');
            const emailInput = document.getElementById('booking_client_email');
            const notesInput = document.getElementById('booking_client_notes');
            const dtInput = document.getElementById('booking_client_datetime');
            if (nameInput) nameInput.value = '';
            if (emailInput) emailInput.value = '';
            if (notesInput) notesInput.value = '';
            if (dtInput) dtInput.value = '';

            goToStep1();
        });
    }

    // 5. Interactive Curriculum Vitae Modal
    const cvModal = document.getElementById('studio-cv-modal');
    const cvBtn = document.getElementById('btn-download-cv');
    const cvCloseBtn = document.getElementById('btn-close-cv-modal');
    const cvCloseBottomBtn = document.getElementById('btn-close-cv-modal-bottom');
    const cvPrintBtn = document.getElementById('btn-print-cv');
    const cvDiscussBtn = document.getElementById('btn-cv-discuss');

    function openCVModal() {
        if (cvModal) {
            cvModal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
    }

    function closeCVModal() {
        if (cvModal) {
            cvModal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    }

    // Delegated CV button handler (supports direct file download or modal fallback)
    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('#btn-download-cv, .btn-download-cv');
        if (!trigger) return;
        const href = trigger.getAttribute('href');
        if (!href || href === '#cv' || href === '#' || (href.startsWith('#') && !href.includes('.pdf'))) {
            e.preventDefault();
            openCVModal();
        }
    });

    if (cvCloseBtn) cvCloseBtn.addEventListener('click', closeCVModal);
    if (cvCloseBottomBtn) cvCloseBottomBtn.addEventListener('click', closeCVModal);
    if (cvModal) {
        cvModal.addEventListener('click', (e) => {
            if (e.target === cvModal) closeCVModal();
        });
    }

    if (cvPrintBtn) {
        cvPrintBtn.addEventListener('click', () => {
            window.print();
        });
    }

    if (cvDiscussBtn) {
        cvDiscussBtn.addEventListener('click', (e) => {
            closeCVModal();
            const target = document.getElementById('book');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // 6. Hero Greeting Word Cycler Animation
    const greetingCycler = document.getElementById('hero-greeting-cycler');
    if (greetingCycler) {
        const greetingsList = ['Hello', 'Bonjour', 'Hola', 'Ciao', 'Namaste'];
        let greetingIdx = 0;
        setInterval(() => {
            greetingCycler.style.opacity = '0';
            greetingCycler.style.transform = 'translateY(-12px)';
            setTimeout(() => {
                greetingIdx = (greetingIdx + 1) % greetingsList.length;
                greetingCycler.textContent = greetingsList[greetingIdx];
                greetingCycler.style.transform = 'translateY(12px)';
                requestAnimationFrame(() => {
                    greetingCycler.style.opacity = '1';
                    greetingCycler.style.transform = 'translateY(0)';
                });
            }, 250);
        }, 2500);
    }

    // 7. Mobile Navigation Menu Toggle
    const mobileMenuToggle = document.getElementById('btn-mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-nav-menu');
    const menuIconOpen = document.getElementById('menu-icon-open');
    const menuIconClose = document.getElementById('menu-icon-close');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                menuIconOpen?.classList.add('hidden');
                menuIconClose?.classList.remove('hidden');
                mobileMenuToggle.setAttribute('aria-expanded', 'true');
            } else {
                mobileMenu.classList.add('hidden');
                menuIconOpen?.classList.remove('hidden');
                menuIconClose?.classList.add('hidden');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
            }
        });

        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuIconOpen?.classList.remove('hidden');
                menuIconClose?.classList.add('hidden');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // 8. Smooth Anchor Scrolling & Section Aliases
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (!href) return;

            // If it's a CV modal trigger
            if (href === '#cv') {
                e.preventDefault();
                openCVModal();
                return;
            }

            // Extract hash part
            const hashIndex = href.indexOf('#');
            if (hashIndex !== -1) {
                const hash = href.substring(hashIndex);
                if (hash.length > 1) {
                    let target = document.querySelector(hash);

                    // If not found directly, check aliases
                    if (!target) {
                        if (hash === '#projects') target = document.getElementById('work') || document.getElementById('projects');
                        else if (hash === '#work') target = document.getElementById('projects') || document.getElementById('work');
                        else if (hash === '#process') target = document.getElementById('pricing') || document.getElementById('process');
                        else if (hash === '#pricing') target = document.getElementById('process') || document.getElementById('pricing');
                        else if (hash === '#book') target = document.getElementById('consultation') || document.getElementById('book');
                    }

                    if (target) {
                        // Only prevent default if we are on the page containing the target
                        e.preventDefault();
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            }
        });
    });
});
