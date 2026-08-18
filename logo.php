<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .icons {
        display: flex;
        /* justify-content: center; */
        /* Center all boxes horizontally */
        gap: 15px;
        /* Add spacing between buttons */
        margin: 20px;
    }

    .box-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 45px;
        width: 120px;
        /* Wider for balanced text */
        background-color: #f5f5f5;
        /* Light neutral background */
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .box-icon:hover {
        background-color: #e0e0e0;
        /* Subtle hover effect */
    }

    .icon img,
    .icon i {
        height: 24px;
        width: 24px;
    }

    .logo-text {
        margin-left: 10px;
        font-size: 16px;
        font-weight: 700;
        color: #333;
        font-family: sans-serif;
    }
</style>


<div class="icons">

    <div class="box-icon">
        <div class="icon google">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/google/google-original.svg" />
        </div>
        <p class="logo-text">Google</p>
    </div>

    <div class="box-icon">
        <div class="icon facebook">
            <img src="./images/icons8-meta-48.png" alt="">
        </div>
        <p class="logo-text">Meta</p>
    </div>

    <div class="box-icon">
        <div class="icon apple">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/apple/apple-original.svg" />
        </div>
        <p class="logo-text">Apple</p>
    </div>

    <div class="box-icon">
        <div class="icon x">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/twitter/twitter-original.svg" />
        </div>
        <p class="logo-text">X</p>
    </div>

</div>