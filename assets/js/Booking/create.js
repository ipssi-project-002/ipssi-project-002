(() => {
    const form = document.querySelector('#booking-create-form');
    const now = new Date();
    const arrivalDateElement = form.querySelector('[name="arrival-date"]');
    arrivalDateElement.valueAsDate = now;
    // set the minimum date to today
    arrivalDateElement.min = now.toISOString().split('T')[0];
    // set the maximum date to 1 year from today
    arrivalDateElement.max = new Date(now.getFullYear() + 1, now.getMonth(), now.getDate()).toISOString().split('T')[0];

    form.addEventListener('submit', (event) => {
        const datetimeElement = form.querySelector('[name="arrival-datetime"]');
        const date = arrivalDateElement.valueAsDate;
        const time = form.querySelector('[name="arrival-time"]').value;
        const timeSplit = time.split(':');
        date.setHours(timeSplit[0]);
        date.setMinutes(timeSplit[1]);
        return true;
    });
})();
