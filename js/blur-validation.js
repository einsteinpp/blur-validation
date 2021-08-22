(function () {
  document
    .querySelectorAll('input[validate\\:rules],textarea[validate\\:rules]')
    .forEach((input) => {
      input.addEventListener('blur', () => {
        let rules = input.getAttribute('validate:rules');
        let value = input.value;
        let name = input.name;

        fetch('/__blur-validation__', {
          method: 'POST',
          headers: {
            'X-CSRF-Token': document
              .querySelector('meta[name="csrf-token"]')
              .getAttribute('content'),
            'Content-Type': 'application/json',
            Accept: 'application/json',
          },
          body: JSON.stringify({
            _rules: rules,
            _field: name,
            [name]: value,
          }),
        })
          .then((response) => response.json())
          .then((response) => {
            let errorElement = document.querySelector(
              `[validate\\:error="${name}"]`
            );
            if (response.errors) {
              errorElement.innerText = response.errors[name][0];
            } else {
              errorElement.innerText = '';
            }
          });
      });
    });
})();
