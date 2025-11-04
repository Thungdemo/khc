<img src="{{ $route }}"
     alt="captcha"
     style="cursor:pointer;width:{{ $width }}px;height:{{ $height }}px;"
     title="Click to refresh"
     onclick="this.setAttribute('src','{{ $route }}?_='+Math.random());var captcha=document.getElementById('{{ $input_id }}');if(captcha){captcha.focus()}"
>
