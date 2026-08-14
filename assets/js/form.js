document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('leadCaptureForm');
    if (!form) return;

    var steps = Array.from(form.querySelectorAll('.step'));
    var progressItems = Array.from(form.querySelectorAll('.form-progress span'));
    var currentIndex = 0;

    function showStep(index) {
        steps.forEach(function (step, stepIndex) {
            step.classList.toggle('active', stepIndex === index);
        });
        progressItems.forEach(function (item, itemIndex) {
            item.classList.toggle('active', itemIndex <= index);
        });
    }

    function validateStep(index) {
        var inputs = Array.from(steps[index].querySelectorAll('input, select'));
        return inputs.every(function (input) {
            if (input.hasAttribute('required')) {
                if (input.type === 'email') {
                    return input.value.trim() !== '' && /^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(input.value);
                }
                return input.value.trim() !== '';
            }
            return true;
        });
    }

    form.addEventListener('click', function (event) {
        var action = event.target.getAttribute('data-action');
        if (!action) return;
        event.preventDefault();
        if (action === 'next') {
            if (!validateStep(currentIndex)) {
                alert('Please fill in all required fields for this section.');
                return;
            }
            currentIndex = Math.min(steps.length - 1, currentIndex + 1);
            showStep(currentIndex);
        }
        if (action === 'back') {
            currentIndex = Math.max(0, currentIndex - 1);
            showStep(currentIndex);
        }
    });

    showStep(currentIndex);
});
