<form action="success.php" method="POST" id="checkout" name="checkoutForm">
    <div class="checkout">
        <div class="customer-details">
            <div class="form-group">
                <div class="form-control">
                    <label for="firstName">First Name</label>
                    <span>:</span>
                    <input type="text" id="firstName" name="firstName">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="lastName">Last Name</label>
                    <span>:</span>
                    <input type="text" id="lastName" name="lastName">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="address">Address</label>
                    <span>:</span>
                    <input type="text" id="address" name="address">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="phone">Phone</label>
                    <span>:</span>
                    <input type="text" id="phone" name="phone">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="email">Email</label>
                    <span>:</span>
                    <input type="text" id="email" name="email">
                </div>
                <small class="formError"></small>
            </div>
        </div>
        <div class="card-details">
            <div class="form-group">
                <div class="form-control">
                    <label for="creditcard">Credit card number</label>
                    <span>:</span>
                    <input type="text" id="creditcard" name="creditcard">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="nameOnCard">Name on card</label>
                    <span>:</span>
                    <input type="text" id="nameOnCard" name="nameOnCard">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="expiry">Expiry date</label>
                    <span>:</span>
                    <input type="text" id="expiry" name="expiry">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="csv">CSV</label>
                    <span>:</span>
                    <input type="text" id="csv" name="csv">
                </div>
                <small class="formError"></small>
            </div>
            <div class="form-control">
                <input class="checkoutBtn pay" type="submit" id="pay" name="pay" value="Pay Now" >
            </div>
        </div>
    </div>
</form>