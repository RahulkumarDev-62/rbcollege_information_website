// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Tooltip initialization (if using Bootstrap)
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});

// Pause notice scroll on hover (Optional manual control)
const noticeMarquee = document.querySelector('marquee');
if(noticeMarquee) {
    noticeMarquee.addEventListener('mouseover', () => noticeMarquee.stop());
    noticeMarquee.addEventListener('mouseout', () => noticeMarquee.start());
}