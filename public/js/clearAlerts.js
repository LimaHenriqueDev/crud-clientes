document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('input');
console.log('asdasd');
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            input.classList.remove('is-invalid');
        });
    });


    const inputsErrors = document.querySelectorAll('.is-invalid');

    inputsErrors.forEach(input => {
      input.addEventListener('focus', () => {
        input.classList.remove('is-invalid');
      });
      input.addEventListener('input', () => {
        input.classList.remove('is-invalid');
      });
    });
    });
