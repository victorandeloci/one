<?php
/**
 * Template Name: Avatares da Live
 */
?>

<div id="field"></div>

<script>
    const field = document.getElementById("field");
    let existingAvatars = new Map(); // existing avatars

    async function fetchAvatars() {
        try {
            const response = await fetch("/wp-admin/admin-ajax.php?action=one_get_latest_avatars");
            const users = await response.json();

            users.forEach(user => {
                if (!existingAvatars.has(user.id)) {
                    addAvatarToField(user);
                }
            });
        } catch (error) {
            console.error("Error fetching avatars:", error);
        }
    }

    function addAvatarToField(user) {
        const avatarElement = document.createElement("div");
        avatarElement.classList.add("avatar");
        avatarElement.innerHTML = `
            <img src="${user.avatar_url}" alt="${user.username}" />
            <span>@${user.username}</span>
        `;

        field.appendChild(avatarElement);
        existingAvatars.set(user.id, avatarElement);

        // initial position & init movement
        setPosition(avatarElement);
        startRandomMovement(avatarElement);
    }

    function setPosition(element) {
        const fieldRect = field.getBoundingClientRect();
        const maxX = fieldRect.width - 60;
        const maxY = fieldRect.height - 60;

        const x = Math.random() * maxX;
        const y = Math.random() * maxY;

        element.style.left = `${x}px`;
        element.style.top = `${y}px`;
    }

    // random movement
    function startRandomMovement(avatarElement) {
        function move() {
            const fieldRect = field.getBoundingClientRect();
            const maxX = fieldRect.width - 60;
            const maxY = fieldRect.height - 60;

            const newX = Math.random() * maxX;
            const newY = Math.random() * maxY;

            const duration = Math.random() * 5 + 3; // movement random time

            avatarElement.style.transition = `transform ${duration}s linear`;
            avatarElement.style.transform = `translate(${newX - parseFloat(avatarElement.style.left)}px, ${newY - parseFloat(avatarElement.style.top)}px)`;

            // next movement random start time
            setTimeout(move, Math.random() * 8000 + 4000);
        }

        setTimeout(move, Math.random() * 5000 + 1000);
    }

    // fetch avatars 10s loop
    fetchAvatars();
    setInterval(fetchAvatars, 30000);
</script>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
    }

    #field {
        position: relative;
        width: 100%;
        height: 100vh;
        background: url('<?= get_the_post_thumbnail_url() ?>') no-repeat center center;
        background-size: cover;
        overflow: hidden;
    }

    .avatar {
        position: absolute;
        text-align: center;
        transition: transform 3s linear;
    }

    .avatar img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        -webkit-filter: drop-shadow(5px 5px 5px #222);
        filter: drop-shadow(5px 5px 5px #222);
        position: relative;
        z-index: 1;
    }

    .avatar span {
        display: block;
        font-size: 14px;
        color: white;
        text-shadow: 2px 2px 4px black;
        position: relative;
        z-index: 2;
    }
</style>
