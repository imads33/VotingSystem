
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;
var valid = true;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        validateForm();
        if (valid) {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        }
        else
            return
    });
});


function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i;
    x = document.getElementsByClassName("form-step");
    y = x[formStepsNum].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].reportValidity();
            // and set the current valid status to false:
            valid = false;
        }
        else if (y[i].value != "") {
            valid = true;
        }
    }
    return valid;

}


function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("form-step-active") &&
            formStep.classList.remove("form-step-active");
    });

    formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-active");
        } else {
            progressStep.classList.remove("progress-step-active");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active");

    progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
