<script>
    function openModal() {
        document.getElementById('invoiceModal').style.display = 'block';
    }

    function closeInvoiceModal() {
        document.getElementById('invoiceModal').style.display = 'none';
    }

    // Close modal when clicking outside of it
    // Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('invoiceModal');
        if (event.target === modal) {
            closeInvoiceModal();
        }
    }



    // Handle form submission
    document.getElementById('invoiceForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const email = document.getElementById('email').value;
        const selectedInvoice = document.querySelector('input[name="invoice"]:checked');
        const transactionId = document.getElementById('transaction_id').value;

        if (selectedInvoice) {
            const invoiceType = selectedInvoice.value;

            // Send data to your server to process the payment
            // You can use AJAX here or submit the form to a route
            console.log({
                email: email,
                invoiceType: invoiceType,
                transactionId: transactionId
            });

            // Close the modal after processing
            closeModal();
        } else {
            ('Please select an invoice type.');
        }
    });
</script>


<div id="invoiceModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeInvoiceModal()">&times;</span>
        <h2>Verify Payment</h2>
        <form id="invoiceForm" action="{{ route('verify_payments.submit') }}" method="GET">
            @csrf <!-- Add CSRF token for security -->
            <div class="form-group">
                <label for="filter_value">Invoice Number</label>
                <br>
                <span class="error_message hidden"></span>
                <input type="text" id="filter_value" name="invoice_number" class="form-control" required>
            </div>

            <div class="form-group">
                <span id="amount_due" style="color: rgb(30, 0, 128)">Amount Due: </span>
                <br>
                <span id="amount_left" style="color: rgb(255, 58, 36)">Amount Left: </span>
            </div>

            <div class="form-group">
                <label for="account_number">Your Account Number or Phone (if paid through Mobile Money)</label>
                <input type="text" id="account_number" name="account_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="account_name">Account Name Used To Pay</label>
                <input type="text" id="account_name" name="account_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="amount_paid">Amount Paid (in Tsh)</label>
                <input type="text" id="amount_paid" name="amount_paid" class="form-control" required>
            </div>


            <div class="form-group">
                <label for="transaction_id" style="color: green">Payment Transaction ID</label>
                <input type="number" id="transaction_id" name="transaction_id" class="form-control" required>
            </div>

            <button type="submit" id="verify-btn" class="btn btn-primary">Verify</button>
        </form>
    </div>
</div>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        position: relative;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>


<script>
    // invoice issues hapa
    $("#filter_value").on("change", function() {
        const filterValue = $(this).val();
        const errorMessage = $(".error_message");

        // Reset styles and error messages
        $(this).css("border-color", "");
        errorMessage.addClass("hidden").text("");

        if (filterValue) {
            // AJAX call to get invoice data
            $.ajax({
                url: `/get-invoice-data/${filterValue}`,
                type: 'GET',
                success: function(response) {
                    if (response.found) {
                        // Populate data in the modal fields
                        $("#amount_due").text('Amount Due: ' + response.data.due_amount);
                        $("#amount_paid").text('Amount Paid: ' + response.data.amount_paid);
                        $("#amount_left").text('Amount Left: ' + response.data.amount_left);


                        if (response.data.amount_left < 1) {
                            // Show success message
                            errorMessage.removeClass("hidden").css("color", "green").text(`Success! Invoice located for ${response.data.user_email}.
                            \n This invoice has already been fully paid.`);

                            // Disable input fields and button
                            $('#account_number').prop("disabled", true);
                            $('#amount_paid').prop("disabled", true);
                            $('#transaction_id').prop("disabled", true);
                            $('#verify-btn').prop("disabled", true);

                            // Return the Amount left 0 incase user has paid excess
                            $("#amount_left").text('Amount Left: ' + 0);

                        } else {
                            // Show success message
                            errorMessage.removeClass("hidden").css("color", "green").text(
                                `Invoice Found: ${response.data.user_email}
                                \n For ${response.data.invoice_type} Registration`
                            );
                        }
                    } else {
                        // Highlight the input and show error if invoice is not found
                        $("#filter_value").css("border-color", "red");
                        errorMessage.removeClass("hidden").css("color", "red").text(
                            "Email or Invoice Number not found");
                        $("#amount_due").text('Amount Due: ');
                        $("#amount_paid").text('Amount Paid: ');
                        $("#amount_left").text('Amount Left: ');

                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching invoice data:", error);
                    errorMessage.removeClass("hidden").css("color", "red").text(
                        "Error fetching data. Please try again.");
                }
            });
        }
    });
</script>
