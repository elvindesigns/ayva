// Existing script content (smooth scroll, nav, etc.) remains unchanged
// Add this to the end of script.js

// FAQ Accordion
const faqQuestions = document.querySelectorAll(".faq-question");
faqQuestions.forEach((question) => {
  question.addEventListener("click", () => {
    const answer = question.nextElementSibling;
    const icon = question.querySelector("i");
    const isOpen = answer.style.display === "block";

    // Close all other answers
    document
      .querySelectorAll(".faq-answer")
      .forEach((ans) => (ans.style.display = "none"));
    document
      .querySelectorAll(".faq-question i")
      .forEach((ic) => (ic.className = "fa-solid fa-plus"));

    // Toggle current answer
    if (!isOpen) {
      answer.style.display = "block";
      icon.className = "fa-solid fa-minus";
    } else {
      answer.style.display = "none";
      icon.className = "fa-solid fa-plus";
    }
  });
});
