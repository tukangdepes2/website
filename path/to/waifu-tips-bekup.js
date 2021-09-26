function render(template, context) {

    var tokenReg = /(\\)?\{([^\{\}\\]+)(\\)?\}/g;

    return template.replace(tokenReg, function (word, slash1, token, slash2) {
        if (slash1 || slash2) {
            return word.replace('\\', '');
        }

        var variables = token.replace(/\s/g, '').split('.');
        var currentObject = context;
        var i, length, variable;

        for (i = 0, length = variables.length; i < length; ++i) {
            variable = variables[i];
            currentObject = currentObject[variable];
            if (currentObject === undefined || currentObject === null) return '';
        }
        return currentObject;
    });
}

String.prototype.render = function (context) {
    return render(this, context);
};

var re = /x/;
console.log(re);
re.toString = function() {
    showMessage('哈哈，你打开了控制台，是想要看看我的秘密吗？', 5000);
    return '';
};

$(document).on('copy', function (){
    showMessage('你都复制了些什么呀，转载要记得加上出处哦', 5000);
});

$.ajax({
    cache: true,
    url: "path/to/waifu-tips.json",
    dataType: "json",
    success: function (result){
        $.each(result.mouseover, function (index, tips){
            $(document).on("mouseover", tips.selector, function (){
                var text = tips.text;
                if(Array.isArray(tips.text)) text = tips.text[Math.floor(Math.random() * tips.text.length + 1)-1];
                text = text.render({text: $(this).text()});
                showMessage(text, 3000);
            });
        });
        $.each(result.click, function (index, tips){
            $(document).on("click", tips.selector, function (){
                var text = tips.text;
                if(Array.isArray(tips.text)) text = tips.text[Math.floor(Math.random() * tips.text.length + 1)-1];
                text = text.render({text: $(this).text()});
                showMessage(text, 3000);
            });
        });
    }
});

(function (){
    var text;
    if(document.referrer !== ''){
        var referrer = document.createElement('a');
        referrer.href = document.referrer;
        text = 'Hello! Pengunjung dari <span style="color:#0099cc;">' + referrer.hostname + '</span> !';
        var domain = referrer.hostname.split('.')[1];
        if (domain == 'baidu') {
            text = 'Hello! 来自 百度搜索 的朋友<br>你是搜索 <span style="color:#0099cc;">' + referrer.search.split('&wd=')[1].split('&')[0] + '</span> 找到的我吗？';
        }else if (domain == 'so') {
            text = 'Hello! 来自 360搜索 的朋友<br>你是搜索 <span style="color:#0099cc;">' + referrer.search.split('&q=')[1].split('&')[0] + '</span> 找到的我吗？';
        }else if (domain == 'google') {
            text = 'Hello! 来自 谷歌搜索 的朋友<br>欢迎阅读<span style="color:#0099cc;">『' + document.title.split(' - ')[0] + '』</span>';
        }
    }else {
        if (window.location.href !== 'https://imjad.cn/') { //如果是主页
            var now = (new Date()).getHours();
            if (now > 23 || now <= 5) {
                text = 'Selamat Datang kak >_< <br>Apakah kakak burung hantu malam? Aku tidak akan tidur terlalu larut, jadi aku bangun besok';
            } else if (now > 5 && now <= 7) {
                text = 'Selamat pagi kak >_< <br> selamat datang di website <font color=red>https://exploits.site/</font>';
            } else if (now > 7 && now <= 11) {
                text = 'Selamat pagi kak >_< <br> selamat datang di website <font color=red>https://exploits.site/</font>';
            } else if (now > 11 && now <= 14) {
                text = 'Selamat siang kak >_< <br> selamat datang di website <font color=red>https://exploits.site/</font>';
            } else if (now > 14 && now <= 17) {
                text = 'Selamat sore kak >_< <br> selamat datang di website <font color=red>https://exploits.site/</font>';
            } else if (now > 17 && now <= 19) {
                text = 'Selamat sore kak >_< <br> selamat datang di website <font color=red>https://exploits.site/</font>';
            } else if (now > 19 && now <= 21) {
                text = 'Selamat malam kak >_< <br> selamat datang di website <font color=red>https://exploits.site/</font>';
            } else if (now > 21 && now <= 23) {
                text = 'Selamat malam kak >_< <br> selamat datang di website <font color=red>https://exploits.site/</font>';
            } else {
                text = 'Hai~ Datang dan bermainlah denganku!';
            }
        }else {
            text = 'Selamat datang kak di website <font color=red>https://exploits.site/</font><br>Semoga betah ya >_<';
        }
    }
    showMessage(text, 6000);
})();

window.setInterval(showHitokoto,30000);

//function showHitokoto(){
//    $.getJSON('https://api.imjad.cn/hitokoto/?cat=&charset=utf-8&length=28&encode=json',function(result){
//        console.log(result)
//        showMessage(result.hitokoto, 5000);
//    });
//}

function showMessage(text, timeout){
    if(Array.isArray(text)) text = text[Math.floor(Math.random() * text.length + 1)-1];
    console.log(text);
    $('.waifu-tips').stop();
    $('.waifu-tips').html(text).fadeTo(200, 1);
    if (timeout === null) timeout = 5000;
    hideMessage(timeout);
}
function hideMessage(timeout){
    $('.waifu-tips').stop().css('opacity',1);
    if (timeout === null) timeout = 5000;
    $('.waifu-tips').delay(timeout).fadeTo(200, 0);
}
