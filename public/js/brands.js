document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.brand-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 100}ms`;

        const img = card.querySelector('.brand-image');
        card.addEventListener('mouseenter', () => {
            img.style.transform = 'scale(1.1)';
        });
        card.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
        });
    });

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

    document.documentElement.style.scrollBehavior = 'smooth';
});

document.addEventListener('DOMContentLoaded', function() {
    const viewButtons = document.querySelectorAll('.view-btn');
    const viewContents = document.querySelectorAll('.view-content');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            viewContents.forEach(view => view.style.display = 'none');
            document.getElementById(`${this.dataset.view}-view`).style.display = 'block';
        });
    });
    
    document.querySelector('.view-btn[data-view="grid"]').click();
});