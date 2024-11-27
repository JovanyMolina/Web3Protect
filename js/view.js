document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animate-on-scroll");

    const isVisible = (el) => {
        const rect = el.getBoundingClientRect();
        return rect.top < window.innerHeight * 0.75 && rect.bottom > 0;
    };

    const handleScroll = () => {
        elements.forEach((el) => {
            if (isVisible(el)) {
                el.classList.add("visible");
            }
        });
    };

    window.addEventListener("scroll", handleScroll);
    handleScroll();
});
