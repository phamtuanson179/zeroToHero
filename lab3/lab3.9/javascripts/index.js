const leftFrame = document.getElementById('left');
const rightFrame = document.getElementById('right');

leftFrame.addEventListener('load', () =>
{
    let savedBlog = getCookie('saved-blog');
    console.log(savedBlog);
    if (savedBlog)
    {
        displayBlog(savedBlog);
    }
    else
    {
        displayBlog("You don't have any saved blog!");
    }
});

rightFrame.addEventListener('load', () =>
{
    const saveBtn = rightFrame.contentWindow.document.getElementById('save');
    saveBtn.addEventListener('click', saveBlog)
})

function setCookie(name, value, expireDays)
{
    let time = new Date();
    time.setTime(time.getTime() + (expireDays * 24 * 60 * 60 * 1000));
    let expires = `expires=${time.toUTCString()}`;
    document.cookie = `${name}=${value};${expires};path=/`;
}

function getCookie(name)
{
    let cookie = document.cookie;
    let cookieArr = cookie.split('=');
    if (cookieArr[0] === 'saved-blog')
    {
        return cookieArr[1];
    }
    return "";
}

function saveBlog() 
{
    let inputBlog = document.getElementById('right').contentWindow.document.getElementById('blog-input').input.value;

    if (inputBlog === '')
    {
        return;
    }
    setCookie('saved-blog', inputBlog, 1);
    displayBlog(inputBlog);
}

function displayBlog(content)
{
    leftFrame.contentWindow.document.getElementById('blog-output').innerHTML = content;
}