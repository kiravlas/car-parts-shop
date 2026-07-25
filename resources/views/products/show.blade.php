<x-layouts.app>
    hello from products show page
    Product name: {{$product}}

    <form id="order-form">
        <label for="email">email for sales</label>
        <input type="text" name="email">
        <input type="hidden" name="product_name" value="{{$product}}">
        <button type="submit">order</button>
    </form>
    <p id="email-error" style="color:red;"></p>
    <p id="success-message" style="color:green;"></p>
    <script>
        const orderForm = document.querySelector('#order-form');
        const token = document.querySelector('meta[name="csrf-token"]').content;

        orderForm.addEventListener('submit', async function (event) {

            event.preventDefault();

            document.getElementById('email-error').textContent = '';
            document.getElementById('success-message').textContent = '';

            const formData = new FormData(orderForm);

            const response = await fetch('/orders', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                document.getElementById('success-message').textContent = data.message;
                orderForm.reset();
                return;
            }

            if (response.status === 422) {
                if (data.errors.email) {
                    document.getElementById('email-error').textContent = data.errors.email[0];
                }
            }
        });

    </script>

</x-layouts.app>
