<div style="text-align:center;">
<img src="/images/kalt.png" alt="logo" width="150"/>
@if($status === 'true')
    <h1>Payment Successful</h1>
    <img src="/images/loading.gif" width="150"/>
    <p>This page will redirect in <span id="time">5</span> seconds.</p>
    <p>Please click <a href="/api/order/thankyou">here</a>, if the page does not redirect automatically.</p>
@else
    <h1>Payment Fail</h1>
    <img src="/images/loading.gif" width="150"/>
    <p>This page will redirect in <span id="time">5</span> seconds.</p>
    <p>Please click <a href="/">here</a>, if the page does not redirect automatically.</p>
@endif
</div>

<script>
    function startTimer(duration, display) {
        var status = {!! json_encode($status) !!};
        console.log(status);
        var timer = duration, seconds;
        var end =setInterval(function () {
            seconds = parseInt(timer % 60, 10);

            seconds = seconds < 10 ? seconds : seconds;

            display.textContent = seconds;

            if (--timer < 0) {
                if(status == 'true')
                    window.location = "/api/order/thankyou";
                else
                    window.location = "/";

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