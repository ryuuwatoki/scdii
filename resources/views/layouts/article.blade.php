<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>My Schedule</title>
</head>
<body>

    <main class="m-4">
        @if(session()->has('notice'))
        <div id="notice" style="color: red;">
            {{ session()->get('notice') }}
        </div>
        @endif


        @yield('main')
    </main>

<script src="{{asset('js/app.js') }}" ></script>

<script>
    // 選擇要隱藏的通知元素
    var notice = document.getElementById('notice');

    // 5 秒後隱藏通知
    setTimeout(function() {
        // 將通知的透明度逐漸減小到 0
        notice.style.transition = 'opacity 1s';
        notice.style.opacity = 0;

        // 1 秒後移除通知元素
        setTimeout(function() {
            notice.remove();
        }, 1000);
    }, 2000);
</script>

    
</body>
</html>