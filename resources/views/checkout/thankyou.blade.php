<div style="text-align:center;">
<img src="/images/kalt.png" alt="logo" width="150"/>
<h1>Payment Successful</h1>
<img src="/images/loading.gif" width="150"/>
<p>This page will redirect in <span id="time">5</span> seconds.</p>
<p>Please click <a href="/api/order/thankyou">here</a>, if the page does not redirect automatically.</p>
</div>

<script>
    function startTimer(duration, display) {
        var timer = duration, seconds;
        var end =setInterval(function () {
            seconds = parseInt(timer % 60, 10);

            seconds = seconds < 10 ? seconds : seconds;

            display.textContent = seconds;

            if (--timer < 0) {
                window.location = "/api/order/thankyou";
                clearInterval(end);
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 5,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>