function generateCaptcha() {
    var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var captcha = '';
    for (var i = 0; i < 6; i++) {
        captcha += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById('captcha').innerText = captcha;
    document.getElementById('captchaInput').value = '';
    document.getElementById('captchaHidden').value = captcha;
}


window.onload = generateCaptcha;