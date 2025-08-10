document.addEventListener('DOMContentLoaded', function() {
    // Initialize card animations with staggered delay
    const cards = document.querySelectorAll('.brand-card');
    cards.forEach((card, index) => {
        // Set animation delay based on index
        card.style.animationDelay = `${index * 100}ms`;

        // Add hover effect to images
        const img = card.querySelector('.brand-image');
        card.addEventListener('mouseenter', () => {
            img.style.transform = 'scale(1.1)';
        });
        card.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
        });
    });

    // Add hover effect to CTA buttons
    const buttons = document.querySelectorAll('.brand-cta');
    buttons.forEach(button => {
        const arrow = button.querySelector('.cta-arrow');

        button.addEventListener('mouseenter', () => {
            arrow.style.transform = 'translateX(4px)';
        });

        button.addEventListener('mouseleave', () => {
            arrow.style.transform = 'translateX(0)';
        });
    });

    // Add click effect to CTA buttons
    buttons.forEach(button => {
        button.addEventListener('mousedown', () => {
            button.style.transform = 'scale(0.98)';
        });

        button.addEventListener('mouseup', () => {
            button.style.transform = 'scale(1.02)';
        });

        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
        });
    });

    // Smooth scroll behavior for the page
    document.documentElement.style.scrollBehavior = 'smooth';
});

document.addEventListener('DOMContentLoaded', function() {
    const viewButtons = document.querySelectorAll('.view-btn');
    const viewContents = document.querySelectorAll('.view-content');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            viewButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            // Hide all views
            viewContents.forEach(view => view.style.display = 'none');
            // Show selected view
            document.getElementById(`${this.dataset.view}-view`).style.display = 'block';
        });
    });
    
    // Activate grid view by default
    document.querySelector('.view-btn[data-view="grid"]').click();
});