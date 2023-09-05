class Form
{
    resultPrice = document.getElementById('price');
    resultDate = document.getElementById('date');
    resultError = document.getElementById('error');

    run() {
        fetch('/calculate', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify
            ({
                 kladrTo: document.getElementById('kladrFrom').value,
                 kladrFrom: document.getElementById('kladrTo').value,
                 weight: document.getElementById('weight').value,
                 deliveryType: document.getElementById('deliveryType').value
            })
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.error) {
                    this.resultError.innerText = 'Ошибка: ' + data.error;
                } else {
                    this.resultPrice.innerText = 'Цена: ' + data.price;
                    this.resultDate.innerText = 'Дата доставки: ' + data.date;
                }
            })
    }
}

const form = new Form();

document
    .querySelector('div#calculate button#submit')
    .addEventListener('click', () => {
        form.run();
    });
