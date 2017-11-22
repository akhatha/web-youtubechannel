<?php  include "header.php";
include('function.php');
$val = $_GET['videoid']; ?>
<form id="myCCForm" action="paymentsupport.php" method="post">
    <input id="token" name="token" type="hidden" value="">
    <input id="channel" name="videoid" type="text" value="<?php echo $val; ?>">
     <input id="subscribed" name="subscribed" type="text" value="<?php echo $_SESSION['user_id']; ?>">
	 <div>
        <label>
            <span>Donation account</span>
        </label>
        <input id="amount" name="amount" type="text" size="20" value=""  required />
    </div>
    <div>
        <label>
            <span>Card Number</span>
        </label>
        <input id="ccNo" type="text" size="20" value="" autocomplete="off" required />
    </div>
    <div>
        <label>
            <span>Expiration Date (MM/YYYY)</span>
        </label>
        <input type="text" size="2" id="expMonth" required />
        <span> / </span>
        <input type="text" size="2" id="expYear" required />
    </div>
    <div>
        <label>
            <span>CVC</span>
        </label>
        <input id="cvv" size="4" type="text" value="" autocomplete="off" required />
    </div>
    <input type="submit" value="Submit Payment">
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

<script>
    // Called when token created successfully.
    var successCallback = function(data) {
        var myForm = document.getElementById('myCCForm');

        // Set the token as the value for the token input
        myForm.token.value = data.response.token.token;

        // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
        myForm.submit();
    };

    // Called when token creation fails.
    var errorCallback = function(data) {
        if (data.errorCode === 200) {
            tokenRequest();
        } else {
            alert(data.errorMsg);
        }
    };

    var tokenRequest = function() {
        // Setup token request arguments
        var args = {
            sellerId: "901363347",
            publishableKey: "E069F885-2CEF-454C-87F0-75B998B917FE",
            ccNo: $("#ccNo").val(),
            cvv: $("#cvv").val(),
            expMonth: $("#expMonth").val(),
            expYear: $("#expYear").val()
        };

        // Make the token request
        TCO.requestToken(successCallback, errorCallback, args);
    };

    $(function() {
        // Pull in the public encryption key for our environment
        TCO.loadPubKey('sandbox');

        $("#myCCForm").submit(function(e) {
            // Call our token request function
            tokenRequest();

            // Prevent form from submitting
            return false;
        });
    });
</script>