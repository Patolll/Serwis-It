document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(
    ".fade-in-right, .fade-in-left, .fade-in-down"
  );

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate");
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.1,
    }
  );

  elements.forEach((el) => observer.observe(el));
});
