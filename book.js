document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const closeMenu = document.getElementById("close-menu");
  const mobileMenuContainer = document.querySelector(".mobile-menu-container");
  const mobileMenu = document.querySelector(".mobile-menu");

  hamburger.addEventListener("click", function () {
    mobileMenu.style.display = "flex";
    closeMenu.style.display = "block";
  });

  closeMenu.addEventListener("click", function () {
    mobileMenu.style.display = "none";
    closeMenu.style.display = "none";
  });
});

// Book a slot script
let currentStep = 1;

function showStep(step) {
  // Update currentStep and show the corresponding section
  currentStep = step;
  updateFillStatus();
  showSection();
}

function showSection() {
  document.querySelector(".topic-selection-section").style.display = "none";
  document.querySelector(".slot-section").style.display = "none";
  document.querySelector(".personal-info-section").style.display = "none";

  if (currentStep === 1) {
    document.querySelector(".topic-selection-section").style.display = "block";
  } else if (currentStep === 2) {
    document.querySelector(".slot-section").style.display = "block";
  } else if (currentStep === 3) {
    document.querySelector(".personal-info-section").style.display = "block";
  }
}

function showSlotSection() {
  var topicFormValid = document.getElementById("topicForm").checkValidity();

  if (topicFormValid) {
    currentStep = 2;
    updateFillStatus();
    showSection();
  }
}

function showPersonalInfoSection() {
  var slotFormValid = document.getElementById("slotForm").checkValidity();

  if (slotFormValid) {
    currentStep = 3;
    updateFillStatus();
    showSection();
  }
}

function updateFillStatus() {
  // Check if the corresponding form is filled
  var formFilled = false;

  if (currentStep === 1) {
    formFilled = document.getElementById("topicForm").checkValidity();
  } else if (currentStep === 2) {
    formFilled = document.getElementById("slotForm").checkValidity();
  }
  // Add more conditions if there are additional forms

  // Update fill status box colors dynamically
  for (var i = 1; i <= 3; i++) {
    var stepElement = document.querySelector(".fill-status .step-" + i);
    stepElement.classList.remove("show-step-1", "show-step-2", "show-step-3");

    if (i === currentStep) {
      stepElement.classList.add("show-step-" + currentStep);
    }
  }
}

// Set the background color for the first step initially
document.querySelector(".fill-status .step-1").classList.add("show-step-1");
