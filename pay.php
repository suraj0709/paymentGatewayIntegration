<?php
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$amount = $_POST['amount'];
?>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_a3g95uePOP2RHN",
    "amount": "<?php echo $amount*100 ?>",
    "currency": "INR",
    "name": "Donation For Child Education",
    "description": "Donation For Child Education",
    "image": "https://thumbs.dreamstime.com/b/dreamstime-187588323.jpg",
    // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        window.location="./thankyou.php";
    },
    "prefill": {
        "name": "<?php echo $name ?>",
        "email": "<?php echo $email ?>",
        "contact": "<?php echo $mobile ?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#8AC581"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
    window.location="./failed.php";
});

    rzp1.open();
    e.preventDefault();

</script>