import { createIcons, icons } from 'lucide';

// Initialize Lucide Icons
function initLucide() {
    createIcons({
        icons,
        attrs: {
            'stroke-width': 1.8,
            class: 'lucide-icon inline-block',
        },
    });
}

// Particle Background Animation
function initParticles() {
    const canvas = document.getElementById('particles-canvas');
    if (!canvas) return;

    // Check prefers-reduced-motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const ctx = canvas.getContext('2d');
    let width = (canvas.width = window.innerWidth);
    let height = (canvas.height = window.innerHeight);

    window.addEventListener('resize', () => {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight;
    });

    const particleCount = Math.min(width < 768 ? 25 : 55, 60);
    const particles = [];

    const colors = [
        'rgba(139, 92, 246, 0.5)', // Purple #8B5CF6
        'rgba(236, 72, 153, 0.45)', // Pink #EC4899
        'rgba(6, 212, 244, 0.4)',   // Cyan #06D4F4
        'rgba(196, 181, 253, 0.35)',
    ];

    for (let i = 0; i < particleCount; i++) {
        particles.push({
            x: Math.random() * width,
            y: Math.random() * height,
            radius: Math.random() * 2 + 0.8,
            color: colors[Math.floor(Math.random() * colors.length)],
            vx: (Math.random() - 0.5) * 0.4,
            vy: (Math.random() - 0.5) * 0.4,
            pulse: Math.random() * Math.PI,
        });
    }

    function animate() {
        ctx.clearRect(0, 0, width, height);

        for (let i = 0; i < particles.length; i++) {
            const p = particles[i];
            p.x += p.vx;
            p.y += p.vy;
            p.pulse += 0.02;

            if (p.x < 0) p.x = width;
            if (p.x > width) p.x = 0;
            if (p.y < 0) p.y = height;
            if (p.y > height) p.y = 0;

            const currentRadius = p.radius + Math.sin(p.pulse) * 0.4;

            ctx.beginPath();
            ctx.arc(p.x, p.y, Math.max(0.5, currentRadius), 0, Math.PI * 2);
            ctx.fillStyle = p.color;
            ctx.shadowBlur = 8;
            ctx.shadowColor = p.color;
            ctx.fill();

            // Connect nearby particles with subtle glowing lines
            for (let j = i + 1; j < particles.length; j++) {
                const p2 = particles[j];
                const dx = p.x - p2.x;
                const dy = p.y - p2.y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < 110) {
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.strokeStyle = `rgba(139, 92, 246, ${0.12 * (1 - dist / 110)})`;
                    ctx.lineWidth = 0.6;
                    ctx.stroke();
                }
            }
        }

        requestAnimationFrame(animate);
    }

    animate();
}

// Global Setup
document.addEventListener('DOMContentLoaded', () => {
    initLucide();
    initParticles();
});

// Re-init Lucide when Livewire morphs the DOM
document.addEventListener('livewire:navigated', () => {
    initLucide();
});

if (window.Livewire) {
    window.Livewire.hook('morph.updated', () => {
        initLucide();
    });
}

window.initLucide = initLucide;
