const forms = document.querySelector(".forms"),
    pwShowHide = document.querySelectorAll(".eye-icon"),
    links = document.querySelectorAll(".link");
const userBtn = document.querySelectorAll("#btn-userpage");
const toggleBtns = document.querySelectorAll("#menu-icon");
const dropDownMenu = document.querySelector(".dropdown-menu");

toggleBtns.forEach(btn => {
    btn.addEventListener('click', function (event) {
        event.preventDefault();
        dropDownMenu.classList.toggle('open');
    });
});

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

        pwFields.forEach(password => {
            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        })

    })
})

links.forEach(link => {
    link.addEventListener("click", e => {
        e.preventDefault();
        forms.classList.toggle("show-signup");
    })
})

document.getElementById('btn-userpage').addEventListener('click', () => {
    window.location.href = 'user.php'
})

document.getElementById('btn-cart').addEventListener('click', () => {
    window.location.href = 'cart.php'
})






